<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOurGalleryRequest;
use App\Http\Requests\UpdateOurGalleryRequest;
use App\Models\OurGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class OurGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = OurGallery::latest()->get();

        $title = 'Delete Data!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view('employees.pages.galleries.index', [
            "menu" => "Photo Gallery",
            "datas" => $datas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'photo' => 'required|image|file'
        ];

        $validateData = $request->validate($rules);

        if ($request->file('photo')) {
            $validateData['photo'] = $request->file('photo')->store('galleries');
        }

        $result = OurGallery::create($validateData);

        if ($result) {
            Alert::success('Congrats', 'Successfully created');
            return redirect()->back();
        } else {
            Alert::error('Failed', 'Failed to created');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(OurGallery $ourGallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OurGallery $ourGallery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOurGalleryRequest $request, OurGallery $ourGallery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OurGallery $gallery)
    {
        if ($gallery->photo) {
            Storage::delete($gallery->photo);
        }

        $result = OurGallery::destroy($gallery->id);

        if ($result) {
            Alert::success('Success', 'Successfully deleted');
            return back();
        } else {
            Alert::error('Failed', 'Failed to delete');
            return back();
        }
    }
}
