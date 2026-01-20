<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Guest;
use App\Models\Room;

class GuestController extends Controller
{
   

    public function store(Request $request)
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

    public function index()
    {
        $guests = Guest::all();
        return view('admin.guests', compact('guests'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'guest_id'    => 'required|exists:guests,id',
            'name'        => 'required|string|max:255',
            'email'       => 'required|email|unique:guests,email,' . $request->guest_id,
            'phone'       => 'required|string|max:20',
            'national_id' => 'required|string|max:50',
            'address'     => 'required|string|max:500',
        ]);

        $guest = Guest::findOrFail($request->guest_id);
        $guest->name        = $request->name;
        $guest->email       = $request->email;
        $guest->phone       = $request->phone;
        $guest->national_id = $request->national_id;
        $guest->address     = $request->address;
        $guest->save();

        return redirect()->back()->with('success', 'Guest details updated successfully!');
    }

    public function delete(Request $request)
    {
        $request->validate([
            'guest_id' => 'required|exists:guests,id',
        ]);

        $guest = Guest::findOrFail($request->guest_id);
        $guest->delete();

        return redirect()->back()->with('success', 'Guest deleted successfully!');
    }

    public function viewProfile(Request $request)
    {
        $guestId = $request->session()->get('guest_id');
        $guest = Guest::findOrFail($guestId);
        return view('guest.profile', compact('guest'));
    }
    public function bookings()
    {
        return view('guest.bookings');
    }
    public function payments()
    {
        return view('guest.payments');
    }
    public function guestRooms()
    {
        $rooms = Room::where('status', 'available')->get();
        return view('guest.rooms', compact('rooms'));
    }
}
