<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSosialMediaRequest;
use App\Http\Requests\UpdateSosialMediaRequest;
use App\Models\SosialMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class SosialMediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = SosialMedia::latest()->get();

        $title = 'Delete Data!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        
        return view('employees.pages.sosmeds.index', [
            "menu" => "Sosial Media",
            "datas" => $datas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employees.pages.sosmeds.create', [
            "menu" => "Create Sosial Media"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'url' => 'required',
            'photo' => 'image|file',
            'is_active' => ''
        ];

        $validateData = $request->validate($rules);

        if ($request->file('photo')) {
            $validateData['photo'] = $request->file('photo')->store('sosmeds');
        } else {
            $validateData['photo'] = null;
        }

        $result = SosialMedia::create($validateData);

        if ($result) {
            Alert::success('Congrats', 'Successfully created');
            return to_route('sosmeds.index');
        } else {
            Alert::error('Failed', 'Failed to created');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(SosialMedia $sosmed)
    {
        return view('employees.pages.sosmeds.detail', [
            "menu" => "Detail Sosial Media",
            "data" => $sosmed
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SosialMedia $sosialMedia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SosialMedia $sosmed)
    {
        $rules = [
            'name' => 'required',
            'url' => 'required',
            'photo' => 'image|file',
            'is_active' => '',
        ];

        $validateData = $request->validate($rules);

        if ($request->file('photo')) {
            if ($sosmed->photo) {
                Storage::delete($sosmed->photo);
            }

            $validateData['photo'] = $request->file('photo')->store('sosmeds');
        } else {
            $validateData['photo'] =$sosmed->photo;
        }

        $result = SosialMedia::where('id', $sosmed->id)->update($validateData);

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
    public function destroy(SosialMedia $sosmed)
    {
        if ($sosmed->photo) {
            Storage::delete($sosmed->photo);
        }

        $result = SosialMedia::destroy($sosmed->id);

        if ($result) {
            Alert::success('Success', 'Successfully deleted');
            return back();
        } else {
            Alert::error('Failed', 'Failed to delete');
            return back();
        }
    }
}
