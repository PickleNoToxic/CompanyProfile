<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePartnerRequest;
use App\Http\Requests\UpdatePartnerRequest;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Partner::latest()->get();

        $title = 'Delete Data!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        
        return view('employees.pages.partners.index', [
            "menu" => "Our Partners",
            "datas" => $datas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employees.pages.partners.create', [
            "menu" => "Create Partner"
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
            $validateData['photo'] = $request->file('photo')->store('partners');
        } else {
            $validateData['photo'] = null;
        }

        $result = Partner::create($validateData);

        if ($result) {
            Alert::success('Congrats', 'Successfully created');
            return to_route('partners.index');
        } else {
            Alert::error('Failed', 'Failed to created');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Partner $partner)
    {
        return view('employees.pages.partners.detail', [
            "menu" => "Detail Partner",
            "data" => $partner
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Partner $partner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Partner $partner)
    {
        $rules = [
            'name' => 'required',
            'photo' => 'image|file',
            'is_active' => '',
        ];

        $validateData = $request->validate($rules);

        if ($request->file('photo')) {
            if ($partner->photo) {
                Storage::delete($partner->photo);
            }

            $validateData['photo'] = $request->file('photo')->store('partners');
        } else {
            $validateData['photo'] =$partner->photo;
        }

        $result = Partner::where('id', $partner->id)->update($validateData);

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
    public function destroy(Partner $partner)
    {
        if ($partner->photo) {
            Storage::delete($partner->photo);
        }

        $result = Partner::destroy($partner->id);

        if ($result) {
            Alert::success('Success', 'Successfully deleted');
            return back();
        } else {
            Alert::error('Failed', 'Failed to delete');
            return back();
        }
    }
}
