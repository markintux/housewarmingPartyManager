<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $guests = Guest::where('user_id', Auth::getUser()->id)->get();
        return view('app.guests.index', compact('guests'));
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
    
        return response()->json(['message' => 'Guest created successfully!'], 200);
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
        $guest = Guest::findOrFail($id);
        return view('app.guests.edit', compact('guest'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:250',
            'number_of_guests' => 'required|int|min:1',
        ]);

        $guest = Guest::findOrFail($id);

        $guest->name = $validatedData['name'];
        $guest->number_of_guests = $validatedData['number_of_guests'];
        
        $guest->save();

        return response()->json(['message' => 'Guest updated successfully', 200]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $guest = Guest::findOrFail($id);
        $guest->delete();
        return redirect()->route('guests.index')->with('success', 'Guest deleted successfully.');
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

    /**
     * Show the guests that have at least one gift selected and the total number of guests
     */
    public function confirmedGuests()
    {
        $userId = Auth::id();

        $guests = Guest::where('user_id', $userId)
            ->whereHas('gifts', function($query) {
                $query->whereNotNull('guest_id');
            })
            ->with('gifts')
            ->get();

        $totalConfirmedGuests = $guests->sum('number_of_guests');

        $totalGifts = $guests->reduce(function ($carry, $guest) {
            return $carry + $guest->gifts->count();
        }, 0);

        return view('app.guests.confirmed', compact('guests', 'totalConfirmedGuests', 'totalGifts'));
    }

}
