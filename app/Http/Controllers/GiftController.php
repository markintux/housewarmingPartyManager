<?php

namespace App\Http\Controllers;

use App\Models\Gift;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class GiftController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gifts = Gift::where('user_id', Auth::getUser()->id)->get();
        return view('app.gifts.index', compact('gifts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('app.gifts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'gift' => 'required|string|max:250',
            'gift_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $gift = new Gift();
        $gift->gift = $validatedData['gift'];
        $gift->user_id = Auth::id();

        if ($request->hasFile('gift_image')) {
            $imageName = time().'_'.$request->file('gift_image')->getClientOriginalName();
            $path = $request->file('gift_image')->storeAs('gifts', $imageName, 'public');
            $gift->gift_image = $path;
        }

        $gift->save();

        return response()->json(['message' => 'Gift registered successfully!']);
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
        $gift = Gift::findOrFail($id);
        return view('app.gifts.edit', compact('gift'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $gift = Gift::findOrFail($id);

        $validatedData = $request->validate([
            'gift' => 'required|string|max:250',
            'gift_image' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
        ]);

        $gift->gift = $validatedData['gift'];

        if ($request->hasFile('gift_image')) {
            
            if ($gift->gift_image && Storage::exists('public/' . $gift->gift_image)) {
                Storage::delete('public/' . $gift->gift_image);
            }

            $imageName = time().'_'.$request->file('gift_image')->getClientOriginalName();
            $path = $request->file('gift_image')->storeAs('gifts', $imageName, 'public');
            $gift->gift_image = $path;

        }

        $gift->save();

        return response()->json(['message' => 'Gift updated successfully!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $gift = Gift::findOrFail($id);

        $imagePath = 'public/' . $gift->gift_image;

        if ($gift->gift_image && Storage::exists($imagePath)) {
            Storage::delete($imagePath);
        }

        $gift->delete();

        return redirect()->route('gifts.index')->with('success', 'Gift deleted successfully.');
    }
}
