<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Value;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class ValueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Value::latest()->get();

        $title = 'Delete Data!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        
        return view('employees.pages.homes.values.index', [
            "menu" => "Values",
            "datas" => $datas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employees.pages.homes.values.create', [
            "menu" => "Create Value"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'initial' => 'required',
            'description' => 'required',
            'is_active' => '',
        ];

        $validateData = $request->validate($rules);

        $result = Value::create($validateData);

        if ($result) {
            Alert::success('Congrats', 'Successfully created');
            return to_route('values.index');
        } else {
            Alert::error('Failed', 'Failed to created');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Value $value)
    {
        return view('employees.pages.homes.values.detail', [
            "menu" => "Detail Values",
            "data" => $value
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Value $value)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Value $value)
    {
        $rules = [
            'name' => 'required',
            'initial' => 'required',
            'description' => 'required',
            'is_active' => '',
        ];

        $validateData = $request->validate($rules);

        $result = Value::where('id', $value->id)->update($validateData);

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
    public function destroy(Value $value)
    {

        $result = Value::destroy($value->id);

        if ($result) {
            Alert::success('Success', 'Successfully deleted');
            return back();
        } else {
            Alert::error('Failed', 'Failed to delete');
            return back();
        }
    }
}
