<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\CompanyGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class CompanyGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = CompanyGallery::with('company')->latest()->get();

        $title = 'Delete Data!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        
        return view('employees.pages.company-galleries.index', [
            "menu" => "Company Galleries",
            "datas" => $datas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companies = Company::where('is_active', 1)->get();
        return view('employees.pages.company-galleries.create', [
            "menu" => "Create Company Gallery",
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
            'company_id' => 'required',
            'photo' => 'image|file',
            'url' => 'file'
        ];

        $validateData = $request->validate($rules);

        if ($request->file('photo')) {
            $validateData['photo'] = $request->file('photo')->store('company-files');
        } else {
            $validateData['photo'] = null;
        }

        if ($request->file('url')) {
            $validateData['url'] = $request->file('url')->store('company-files');
        } else {
            $validateData['url'] = null;
        }

        $result = CompanyGallery::create($validateData);

        if ($result) {
            Alert::success('Congrats', 'Successfully created');
            return to_route('company-galleries.index');
        } else {
            Alert::error('Failed', 'Failed to created');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(CompanyGallery $companyGallery)
    {
        $companies = Company::get();
        return view('employees.pages.company-galleries.detail', [
            "menu" => "Detail company gallery",
            "data" => $companyGallery,
            "companies" => $companies,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CompanyGallery $companyGallery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CompanyGallery $companyGallery)
    {
        $rules = [
            'title' => 'required',
            'company_id' => 'required',
            'photo' => 'image|file',
            'url' => 'file'
        ];

        $validateData = $request->validate($rules);

        if ($request->file('photo')) {
            if ($companyGallery->photo) {
                Storage::delete($companyGallery->photo);
            }

            $validateData['photo'] = $request->file('photo')->store('company-files');
        } else {
            $validateData['photo'] =$companyGallery->photo;
        }

        if ($request->file('url')) {
            if ($companyGallery->url) {
                Storage::delete($companyGallery->url);
            }

            $validateData['url'] = $request->file('url')->store('company-files');
        } else {
            $validateData['url'] =$companyGallery->url;
        }

        $result = CompanyGallery::where('id', $companyGallery->id)->update($validateData);

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
    public function destroy(CompanyGallery $companyGallery)
    {
        if ($companyGallery->photo) {
            Storage::delete($companyGallery->photo);
        }
        if ($companyGallery->url) {
            Storage::delete($companyGallery->url);
        }

        $result = CompanyGallery::destroy($companyGallery->id);

        if ($result) {
            Alert::success('Success', 'Successfully deleted');
            return back();
        } else {
            Alert::error('Failed', 'Failed to delete');
            return back();
        }
    }
}
