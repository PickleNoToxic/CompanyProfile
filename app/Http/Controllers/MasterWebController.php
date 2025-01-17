<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMasterWebRequest;
use App\Http\Requests\UpdateMasterWebRequest;
use App\Models\MasterWeb;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class MasterWebController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $data = MasterWeb::first();
        // return view('employees.pages.master.index', [
        //     "title" => "Master Web ",
        //     "data" => $data
        // ]);
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
    public function store(StoreMasterWebRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(MasterWeb $masterWeb)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MasterWeb $masterWeb)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MasterWeb $master)
    {
        $rules = [
            'hero_background' => 'image|file',
            'company_icon' => 'image|file',
            'testimonial_background' => 'image|file',
        ];

        $validateData = $request->validate($rules);

        $validateData['title'] = $request->title ?? $master->title;
        $validateData['description'] = $request->description ?? $master->description;
        $validateData['companies_title'] = $request->companies_title ?? $master->companies_title;
        $validateData['motto'] = $request->motto ?? $master->motto;
        $validateData['directors_title'] = $request->directors_title ?? $master->directors_title;
        $validateData['testimonials_title'] = $request->testimonials_title ?? $master->testimonials_title;
        $validateData['testimonials_description'] = $request->testimonials_description ?? $master->testimonials_description;
        $validateData['contact_us_title'] = $request->contact_us_title ?? $master->contact_us_title;

        if ($request->file('hero_background')) {
            if ($master->hero_background) {
                Storage::delete($master->hero_background);
            }

            $validateData['hero_background'] = $request->file('hero_background')->store('homes');
        }

        if ($request->file('company_icon')) {
            if ($master->company_icon) {
                Storage::delete($master->company_icon);
            }

            $validateData['company_icon'] = $request->file('company_icon')->store('homes');
        }

        if ($request->file('testimonial_background')) {
            if ($master->testimonial_background) {
                Storage::delete($master->testimonial_background);
            }

            $validateData['testimonial_background'] = $request->file('testimonial_background')->store('homes');
        }

        $result = MasterWeb::where('id', $master->id)->update($validateData);

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
    public function destroy(MasterWeb $masterWeb)
    {
        //
    }
}
