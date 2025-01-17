<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Company::latest()->get();

        $title = 'Delete Data!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        
        return view('employees.pages.homes.companies.index', [
            "menu" => "Companies",
            "datas" => $datas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employees.pages.homes.companies.create', [
            "menu" => "Create Company"
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
            'url' => 'required'
        ];

        $validateData = $request->validate($rules);

        if ($request->file('photo')) {
            $validateData['photo'] = $request->file('photo')->store('companies');
        } else {
            $validateData['photo'] = null;
        }

        $result = Company::create($validateData);

        if ($result) {
            Alert::success('Congrats', 'Successfully created');
            return to_route('companies.index');
        } else {
            Alert::error('Failed', 'Failed to created');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        return view('employees.pages.homes.companies.detail', [
            "menu" => "Detail companies",
            "data" => $company
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Company $company)
    {
        $rules = [
            'name' => 'required',
            'description' => 'required',
            'photo' => 'image|file',
            'is_active' => '',
            'url' => 'required'
        ];

        $validateData = $request->validate($rules);

        if ($request->file('photo')) {
            if ($company->photo) {
                Storage::delete($company->photo);
            }

            $validateData['photo'] = $request->file('photo')->store('companies');
        } else {
            $validateData['photo'] =$company->photo;
        }

        $result = Company::where('id', $company->id)->update($validateData);

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
    public function destroy(Company $company)
    {
        if ($company->photo) {
            Storage::delete($company->photo);
        }

        $result = Company::destroy($company->id);

        if ($result) {
            Alert::success('Success', 'Successfully deleted');
            return back();
        } else {
            Alert::error('Failed', 'Failed to delete');
            return back();
        }
    }
}
