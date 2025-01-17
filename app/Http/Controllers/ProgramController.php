<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Program::latest()->get();

        $title = 'Delete Data!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        
        return view('employees.pages.programs.index', [
            "menu" => "Programs",
            "datas" => $datas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employees.pages.programs.create', [
            "menu" => "Create Program"
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
            'is_best' => ''
        ];

        $validateData = $request->validate($rules);
        $validateData['slug'] = Str::slug($request->name);

        if ($request->file('photo')) {
            $validateData['photo'] = $request->file('photo')->store('programs');
        } else {
            $validateData['photo'] = null;
        }

        $result = Program::create($validateData);

        if ($result) {
            Alert::success('Congrats', 'Successfully created');
            return to_route('programs.index');
        } else {
            Alert::error('Failed', 'Failed to created');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Program $program)
    {
        return view('employees.pages.programs.detail', [
            "menu" => "Detail Program",
            "data" => $program
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Program $program)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Program $program)
    {
        $rules = [
            'name' => 'required',
            'description' => 'required',
            'photo' => 'image|file',
            'is_active' => '',
            'is_best' => ''
        ];

        $validateData = $request->validate($rules);
        $validateData['slug'] = Str::slug($request->name);

        if ($request->file('photo')) {
            if ($program->photo) {
                Storage::delete($program->photo);
            }

            $validateData['photo'] = $request->file('photo')->store('programs');
        } else {
            $validateData['photo'] =$program->photo;
        }

        $result = Program::where('id', $program->id)->update($validateData);

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
    public function destroy(Program $program)
    {
        if ($program->photo) {
            Storage::delete($program->photo);
        }

        $result = Program::destroy($program->id);

        if ($result) {
            Alert::success('Success', 'Successfully deleted');
            return back();
        } else {
            Alert::error('Failed', 'Failed to delete');
            return back();
        }
    }
}
