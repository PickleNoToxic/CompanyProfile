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
            'about_thumbnail' => 'image|file',
            'value_photo1' => 'image|file',
            'value_photo2' => 'image|file',
            'value_photo3' => 'image|file',
            'order' => 'image|file',
            'statistik_photo' => 'image|file',
            'testimonial_photo' => 'image|file',
        ];

        $validateData = $request->validate($rules);

        $validateData['about_title'] = $request->about_title ?? $master->about_title;
        $validateData['about_description'] = $request->about_description ?? $master->about_description;
        $validateData['about_video'] = $request->about_video ?? $master->about_video;
        $validateData['value_title'] = $request->value_title ?? $master->value_title;
        $validateData['value_description'] = $request->value_description ?? $master->value_description;
        $validateData['statistik_title'] = $request->statistik_title ?? $master->statistik_title;
        $validateData['benefit_title'] = $request->benefit_title ?? $master->benefit_title;
        $validateData['program_title'] = $request->program_title ?? $master->program_title;
        $validateData['testimonial_title'] = $request->testimonial_title ?? $master->testimonial_title;
        $validateData['gallery_title'] = $request->gallery_title ?? $master->gallery_title;

        if ($request->file('about_thumbnail')) {
            if ($master->about_thumbnail) {
                Storage::delete($master->about_thumbnail);
            }

            $validateData['about_thumbnail'] = $request->file('about_thumbnail')->store('homes');
        }

        if ($request->file('value_photo1')) {
            if ($master->value_photo1) {
                Storage::delete($master->value_photo1);
            }

            $validateData['value_photo1'] = $request->file('value_photo1')->store('homes');
        }

        if ($request->file('value_photo2')) {
            if ($master->value_photo2) {
                Storage::delete($master->value_photo2);
            }

            $validateData['value_photo2'] = $request->file('value_photo2')->store('homes');
        }

        if ($request->file('value_photo3')) {
            if ($master->value_photo3) {
                Storage::delete($master->value_photo3);
            }

            $validateData['value_photo3'] = $request->file('value_photo3')->store('homes');
        }

        if ($request->file('order')) {
            if ($master->order) {
                Storage::delete($master->order);
            }

            $validateData['order'] = $request->file('order')->store('homes');
        }

        if ($request->file('statistik_photo')) {
            if ($master->statistik_photo) {
                Storage::delete($master->statistik_photo);
            }

            $validateData['statistik_photo'] = $request->file('statistik_photo')->store('homes');
        }

        if ($request->file('testimonial_photo')) {
            if ($master->testimonial_photo) {
                Storage::delete($master->testimonial_photo);
            }

            $validateData['testimonial_photo'] = $request->file('testimonial_photo')->store('homes');
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
