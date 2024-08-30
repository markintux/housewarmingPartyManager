<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $images = Image::where('user_id', Auth::getUser()->id)->get();
        return view('app.images.index', compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('app.images.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $image = new Image();
        $image->user_id = Auth::id();

        if($request->hasFile('image')) {
            $imageName = time().'_'.$request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('images', $imageName, 'public');
            $image->image = $path;
        }

        $image->save();

        return response()->json(['message' => 'Image registered successfully!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $image = Image::findOrFail($id);
        return view('app.images.edit', compact('image'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $image = Image::findOrFail($id);

        $validatedData = $request->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
        ]);

        if($request->hasFile('image')){
            
            if ($image->image && Storage::exists('public/' . $image->image)) {
                Storage::delete('public/' . $image->image);
            }

            $imageName = time().'_'.$request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('images', $imageName, 'public');
            $image->image = $path;

        }

        $image->save();

        return response()->json(['message' => 'Gift updated successfully!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $image = Image::findOrFail($id);

        $imagePath = 'public/' . $image->gift_image;

        if ($image->gift_image && Storage::exists($imagePath)) {
            Storage::delete($imagePath);
        }

        $image->delete();

        return redirect()->route('images.index')->with('success', 'Image deleted successfully.');
    }
}
