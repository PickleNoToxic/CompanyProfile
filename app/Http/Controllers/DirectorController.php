<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Director;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class DirectorController extends Controller
{
    public function index()
    {
        $datas = Director::latest()->get();

        $title = 'Delete Data!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        
        return view('employees.pages.homes.directors.index', [
            "menu" => "Our Directors",
            "datas" => $datas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employees.pages.homes.directors.create', [
            "menu" => "Create Director"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'photo' => 'image|file',
            'is_active' => ''
        ];

        $validateData = $request->validate($rules);

        if ($request->file('photo')) {
            $validateData['photo'] = $request->file('photo')->store('directors');
        } else {
            $validateData['photo'] = null;
        }

        $result = director::create($validateData);

        if ($result) {
            Alert::success('Congrats', 'Successfully created');
            return to_route('directors.index');
        } else {
            Alert::error('Failed', 'Failed to created');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Director $director)
    {
        return view('employees.pages.homes.directors.detail', [
            "menu" => "Detail Director",
            "data" => $director
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Director $director)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Director $director)
    {
        $rules = [
            'name' => 'required',
            'photo' => 'image|file',
            'is_active' => '',
        ];

        $validateData = $request->validate($rules);

        if ($request->file('photo')) {
            if ($director->photo) {
                Storage::delete($director->photo);
            }

            $validateData['photo'] = $request->file('photo')->store('directors');
        } else {
            $validateData['photo'] =$director->photo;
        }

        $result = Director::where('id', $director->id)->update($validateData);

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
    public function destroy(Director $director)
    {
        if ($director->photo) {
            Storage::delete($director->photo);
        }

        $result = Director::destroy($director->id);

        if ($result) {
            Alert::success('Success', 'Successfully deleted');
            return back();
        } else {
            Alert::error('Failed', 'Failed to delete');
            return back();
        }
    }
}
