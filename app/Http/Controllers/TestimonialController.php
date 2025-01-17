<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTestimonialRequest;
use App\Http\Requests\UpdateTestimonialRequest;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Testimonial::latest()->get();

        $title = 'Delete Data!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        
        return view('employees.pages.testimonials.index', [
            "menu" => "Testimonials",
            "datas" => $datas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employees.pages.testimonials.create', [
            "menu" => "Create Testimonial"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'description' => 'required',
            'photo' => 'image|file',
            'is_active' => '',
            'company' => ''
        ];

        $validateData = $request->validate($rules);

        if ($request->file('photo')) {
            $validateData['photo'] = $request->file('photo')->store('testimonials');
        } else {
            $validateData['photo'] = null;
        }

        $result = Testimonial::create($validateData);

        if ($result) {
            Alert::success('Congrats', 'Successfully created');
            return to_route('testimonials.index');
        } else {
            Alert::error('Failed', 'Failed to created');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Testimonial $testimonial)
    {
        return view('employees.pages.testimonials.detail', [
            "menu" => "Detail Testimonials",
            "data" => $testimonial
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Testimonial $testimonial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Testimonial $testimonial)
    {
        $rules = [
            'name' => 'required',
            'description' => 'required',
            'photo' => 'image|file',
            'is_active' => '',
            'company' => ''
        ];

        $validateData = $request->validate($rules);

        if ($request->file('photo')) {
            if ($testimonial->photo) {
                Storage::delete($testimonial->photo);
            }

            $validateData['photo'] = $request->file('photo')->store('testimonials');
        } else {
            $validateData['photo'] =$testimonial->photo;
        }

        $result = Testimonial::where('id', $testimonial->id)->update($validateData);

        if ($result) {
            Alert::success('Congrats', 'Successfully updated');
            return redirect()->back();
        } else {
            Alert::error('Failed', 'Failed to update');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Testimonial $testimonial)
    {
        if ($testimonial->photo) {
            Storage::delete($testimonial->photo);
        }

        $result = Testimonial::destroy($testimonial->id);

        if ($result) {
            Alert::success('Success', 'Successfully deleted');
            return back();
        } else {
            Alert::error('Failed', 'Failed to delete');
            return back();
        }
    }
}
