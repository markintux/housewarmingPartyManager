<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('site.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('site.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:150',
            'email' => 'required|string|email|max:150|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
            'code' => $this->generateUniqueCode()
        ]);
    
        return response()->json(['message' => 'User created successfully!'], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('app.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:150',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user = User::findOrFail($user->id);

        $user->name = $validatedData['name'];
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->title = $request->title;
        $user->message = $request->message;

        if (!empty($validatedData['password'])) {
            $user->password = bcrypt($validatedData['password']);
        }

        $user->save();

        return response()->json(['message' => 'User updated successfully', 200]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }

    /**
     * Make login
     */
    public function login(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        try {
            if (Auth::attempt($credentials)) {
                return response()->json(['message' => 'Login successful!', 'redirectUrl' => '/home'], 200);
            } else {
                return response()->json(['errors' => ['email' => ['Invalid credentials!']]], 422);
            }
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        }
    }

    /**
     * Make logout
     */
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }

    /**
     * Generate Unique Code for the user
     */
    public function generateUniqueCode()
    {
        $letters = Str::upper(Str::random(2));
        $numbers = str_pad(rand(0, 999), 3, '0', STR_PAD_LEFT);
        $uniqueCode = $letters . $numbers;

        while (User::where('code', $uniqueCode)->exists()) {
            $uniqueCode = $this->generateUniqueCode();
        }

        return $uniqueCode;
    }

}