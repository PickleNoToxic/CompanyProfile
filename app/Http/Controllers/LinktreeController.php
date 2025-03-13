<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Linktree;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class LinktreeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Linktree::with('company')->latest()->get();

        $title = 'Delete Data!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        
        return view('employees.pages.linktrees.index', [
            "menu" => "Linktree",
            "datas" => $datas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companies = Company::where('is_active', 1)->get();
        return view('employees.pages.linktrees.create', [
            "menu" => "Create Linktree",
            "companies" => $companies
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'title' => 'required',
            'description' => 'required',
            'photo' => 'image|file',
            'company_id' => 'required'
        ];

        $validateData = $request->validate($rules);

        if ($request->file('photo')) {
            $validateData['photo'] = $request->file('photo')->store('linktrees');
        } else {
            $validateData['photo'] = null;
        }

        $result = Linktree::create($validateData);

        if ($result) {
            Alert::success('Congrats', 'Successfully created');
            return to_route('linktrees.index');
        } else {
            Alert::error('Failed', 'Failed to created');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Linktree $linktree)
    {
        $companies = Company::get();
        return view('employees.pages.linktrees.detail', [
            "menu" => "Detail linktree",
            "data" => $linktree,
            "companies" => $companies,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Linktree $linktree)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Linktree $linktree)
    {
        $rules = [
            'title' => 'required',
            'description' => 'required',
            'photo' => 'image|file',
            'company_id' => 'required'
        ];

        $validateData = $request->validate($rules);

        if ($request->file('photo')) {
            if ($linktree->photo) {
                Storage::delete($linktree->photo);
            }

            $validateData['photo'] = $request->file('photo')->store('linktrees');
        } else {
            $validateData['photo'] =$linktree->photo;
        }

        $result = Linktree::where('id', $linktree->id)->update($validateData);

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
    public function destroy(Linktree $linktree)
    {
        if ($linktree->photo) {
            Storage::delete($linktree->photo);
        }

        $result = Linktree::destroy($linktree->id);

        if ($result) {
            Alert::success('Success', 'Successfully deleted');
            return back();
        } else {
            Alert::error('Failed', 'Failed to delete');
            return back();
        }
    }
}
