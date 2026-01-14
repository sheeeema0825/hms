<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Guest;

class GuestController extends Controller
{
    public function guest()
    {
        return view('admin.guests');
    }

    public function storeGuests(Request $request)
    {
        // Validate the input
        $request->validate([
            'name'        => 'required|string|max:255',
            'email'       => 'required|email|unique:guests,email',
            'phone'       => 'required|string|max:20',
            'national_id' => 'required|string|max:50',
            'address'     => 'required|string|max:500',
            'password'    => 'required|string|min:6',
        ]);

        // Create and save the guest
        Guest::create([
            'name'        => $request->name,
            'email'       => $request->email,
            'phone'       => $request->phone,
            'national_id' => $request->national_id,
            'address'     => $request->address,
            'password'    => Hash::make($request->password), // encrypt password
        ]);

        // Redirect back with success message
        return redirect()->back()->with('success', 'Guest added successfully!');
    }

    public function listGuests()
    {
        $guests = Guest::all();
        return view('admin.guests', compact('guests'));
    }
}
