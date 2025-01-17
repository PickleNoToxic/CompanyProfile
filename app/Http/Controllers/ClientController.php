<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class ClientController extends Controller
{
    public function index()
    {
        $datas = Client::latest()->get();

        $title = 'Delete Data!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        
        return view('employees.pages.homes.clients.index', [
            "menu" => "Our Clients",
            "datas" => $datas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employees.pages.homes.clients.create', [
            "menu" => "Create Client"
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
            $validateData['photo'] = $request->file('photo')->store('clients');
        } else {
            $validateData['photo'] = null;
        }

        $result = Client::create($validateData);

        if ($result) {
            Alert::success('Congrats', 'Successfully created');
            return to_route('clients.index');
        } else {
            Alert::error('Failed', 'Failed to created');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        return view('employees.pages.homes.clients.detail', [
            "menu" => "Detail Client",
            "data" => $client
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        $rules = [
            'name' => 'required',
            'photo' => 'image|file',
            'is_active' => '',
        ];

        $validateData = $request->validate($rules);

        if ($request->file('photo')) {
            if ($client->photo) {
                Storage::delete($client->photo);
            }

            $validateData['photo'] = $request->file('photo')->store('clients');
        } else {
            $validateData['photo'] =$client->photo;
        }

        $result = Client::where('id', $client->id)->update($validateData);

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
    public function destroy(Client $client)
    {
        if ($client->photo) {
            Storage::delete($client->photo);
        }

        $result = Client::destroy($client->id);

        if ($result) {
            Alert::success('Success', 'Successfully deleted');
            return back();
        } else {
            Alert::error('Failed', 'Failed to delete');
            return back();
        }
    }
}
