<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GuestController extends Controller
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
        return view('app.guests.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:250',
            'number_of_guests' => 'required|int|min:1',
        ]);

        Guest::create([
            'user_id' => $request->user_id,
            'name' => $validatedData['name'],
            'number_of_guests' => $validatedData['number_of_guests'],
            'code' => $this->generateUniqueCode()
        ]);
    
        return response()->json(['message' => 'User created successfully!'], 200);
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    /**
     * Generate Unique Code for the guest
     */
    public function generateUniqueCode()
    {
        $letters = Str::upper(Str::random(2));
        $numbers = str_pad(rand(0, 999), 3, '0', STR_PAD_LEFT);
        $uniqueCode = $letters . $numbers;

        while (Guest::where('code', $uniqueCode)->exists()) {
            $uniqueCode = $this->generateUniqueCode();
        }

        return $uniqueCode;
    }
}
