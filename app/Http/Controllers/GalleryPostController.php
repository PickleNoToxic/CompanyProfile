<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateGalleryPostRequest;
use App\Models\GalleryPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class GalleryPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'post_id' => 'required',
            'photo' => 'required|image|file'
        ];

        $validateData = $request->validate($rules);

        if ($request->file('photo')) {
            $validateData['photo'] = $request->file('photo')->store('post-galleries');
        }

        $result = GalleryPost::create($validateData);

        if ($result) {
            Alert::success('Congrats', 'Successfully created');
            return redirect()->back();
        } else {
            Alert::error('Failed', 'Failed to created');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(GalleryPost $galleryPost)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GalleryPost $galleryPost)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGalleryPostRequest $request, GalleryPost $galleryPost)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GalleryPost $post_gallery)
    {
        if ($post_gallery->photo) {
            Storage::delete($post_gallery->photo);
        }

        $result = GalleryPost::destroy($post_gallery->id);

        if ($result) {
            Alert::success('Success', 'Successfully deleted');
            return back();
        } else {
            Alert::error('Failed', 'Failed to delete');
            return back();
        }
    }
}
