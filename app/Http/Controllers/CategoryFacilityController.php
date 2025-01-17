<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryFacilityRequest;
use App\Http\Requests\UpdateCategoryFacilityRequest;
use App\Models\CategoryFacility;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryFacilityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = CategoryFacility::latest()->get();

        $title = 'Delete Data!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        
        return view('employees.pages.facility-categories.index', [
            "menu" => "Facility Categories",
            "datas" => $datas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employees.pages.facility-categories.create', [
            "menu" => "Create Facility Category"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'is_active' => '',
        ];

        $validateData = $request->validate($rules);

        $result = CategoryFacility::create($validateData);

        if ($result) {
            Alert::success('Congrats', 'Successfully created');
            return to_route('categories.index');
        } else {
            Alert::error('Failed', 'Failed to created');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(CategoryFacility $category)
    {
        return view('employees.pages.facility-categories.detail', [
            "menu" => "Detail Facility Category",
            "data" => $category
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CategoryFacility $categoryFacility)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CategoryFacility $category)
    {
        $rules = [
            'name' => 'required',
            'is_active' => '',
        ];

        $validateData = $request->validate($rules);


        $result = CategoryFacility::where('id', $category->id)->update($validateData);

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
    public function destroy(CategoryFacility $category)
    {
        $result = CategoryFacility::destroy($category->id);

        if ($result) {
            Alert::success('Success', 'Successfully deleted');
            return back();
        } else {
            Alert::error('Failed', 'Failed to delete');
            return back();
        }
    }
}
