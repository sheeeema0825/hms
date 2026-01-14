<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Guest;

class LoginController extends Controller
{

    public function showGuestRegistrationForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:guests,email',
            'phone' => 'required|string|max:15',
            'national_id' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $guest = Guest::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'national_id' => $request['national_id'],
            'address' => $request['address'],
            'password' => Hash::make($request['password']),
        ]);

        $request->session()->put('guest_id', $guest->id);

        return redirect()->route('guest.dashboard');
    }

    public function guest()
    {
        return view('guest.dashboard');
    }


    public function showLoginForm()
    {
        return view('login');
    }

    public function adminDashboard()
{
    return view('admin.dashboard');
}


   

   public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    // 1️⃣ Try Admin
    if (User::where('email', $credentials['email'])->exists()) {
        if (Auth::guard('web')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard');
        }
    }

    // 2️⃣ Try Staff
    // if (Staff::where('email', $credentials['email'])->exists()) {
    //     if (Auth::guard('staff')->attempt($credentials)) {
    //         $request->session()->regenerate();
    //         return redirect()->route('staff.dashboard');
    //     }
    // }

    // 3️⃣ Try Guest
    if (Guest::where('email', $credentials['email'])->exists()) {
        if (Auth::guard('guest')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('guest.dashboard');
        }
    }

    return back()->withErrors([
        'email' => 'Invalid credentials',
    ]);
}
    public function guestDashboard()
    {
        return view('guest.dashboard');
    }
    public function guestLogout(Request $request)
    {
        Auth::guard('guest')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/guest/login');
    }
}