<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class HeroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Hero::latest()->get();

        $title = 'Delete Data!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        
        return view('employees.pages.homes.heroes.index', [
            "menu" => "Hero Section",
            "datas" => $datas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employees.pages.homes.heroes.create', [
            "menu" => "Create Hero Section"
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
            'is_active' => '',
            'url' => 'required'
        ];

        $validateData = $request->validate($rules);
        $validateData['slug'] = Str::slug($request->name);

        if ($request->file('photo')) {
            $validateData['photo'] = $request->file('photo')->store('heroes');
        } else {
            $validateData['photo'] = null;
        }

        $result = Hero::create($validateData);

        if ($result) {
            Alert::success('Congrats', 'Successfully created');
            return to_route('heroes.index');
        } else {
            Alert::error('Failed', 'Failed to created');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Hero $hero)
    {
        return view('employees.pages.homes.heroes.detail', [
            "menu" => "Detail Hero Section",
            "data" => $hero
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hero $hero)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Hero $hero)
    {
        $rules = [
            'name' => 'required',
            'photo' => 'image|file',
            'is_active' => '',
            'url' => 'required'
        ];

        $validateData = $request->validate($rules);
        $validateData['slug'] = Str::slug($request->name);

        if ($request->file('photo')) {
            if ($hero->photo) {
                Storage::delete($hero->photo);
            }

            $validateData['photo'] = $request->file('photo')->store('heroes');
        } else {
            $validateData['photo'] =$hero->photo;
        }

        $result = Hero::where('id', $hero->id)->update($validateData);

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
    public function destroy(Hero $hero)
    {
        if ($hero->photo) {
            Storage::delete($hero->photo);
        }

        $result = Hero::destroy($hero->id);

        if ($result) {
            Alert::success('Success', 'Successfully deleted');
            return back();
        } else {
            Alert::error('Failed', 'Failed to delete');
            return back();
        }
    }
}
