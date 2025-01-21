<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Work;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class WorkController extends Controller
{
    public function index()
    {
        $datas = Work::latest()->get();

        $title = 'Delete Data!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        
        return view('employees.pages.homes.works.index', [
            "menu" => "Our Works",
            "datas" => $datas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employees.pages.homes.works.create', [
            "menu" => "Create Work"
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
            $validateData['photo'] = $request->file('photo')->store('works');
        } else {
            $validateData['photo'] = null;
        }

        $result = work::create($validateData);

        if ($result) {
            Alert::success('Congrats', 'Successfully created');
            return to_route('works.index');
        } else {
            Alert::error('Failed', 'Failed to created');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Work $work)
    {
        return view('employees.pages.homes.works.detail', [
            "menu" => "Detail Work",
            "data" => $work
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Work $work)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, work $work)
    {
        $rules = [
            'name' => 'required',
            'photo' => 'image|file',
            'is_active' => '',
        ];

        $validateData = $request->validate($rules);

        if ($request->file('photo')) {
            if ($work->photo) {
                Storage::delete($work->photo);
            }

            $validateData['photo'] = $request->file('photo')->store('works');
        } else {
            $validateData['photo'] =$work->photo;
        }

        $result = Work::where('id', $work->id)->update($validateData);

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
    public function destroy(Work $work)
    {
        if ($work->photo) {
            Storage::delete($work->photo);
        }

        $result = work::destroy($work->id);

        if ($result) {
            Alert::success('Success', 'Successfully deleted');
            return back();
        } else {
            Alert::error('Failed', 'Failed to delete');
            return back();
        }
    }
}
