<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Staff;

class StaffController extends Controller
{
    public function staff()
    {
        $staffs = Staff::all(); // fetch all staff
        return view('admin.staff', compact('staffs')); // pass to Blade
    }

    public function storeStaff(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:staffs,email',
            'phone' => 'required|string|max:20',
            'password' => 'required|string|min:6|confirmed', // confirm with password_confirmation
        ]);

        Staff::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->back()->with('success', 'Staff added successfully!');
    }

    public function listStaff()
    {
        $staffs = Staff::all();
        return view('admin.staff', compact('staffs'));
    }

    public function editStaff(Request $request)
    {
        $staff = Staff::findOrFail($request->id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:staffs,email,' . $staff->id,
            'phone' => 'required|string|max:20',
        ]);

        $staff->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        return redirect()->back()->with('success', 'Staff updated successfully!');
    }   

    public function deleteStaff($id)
    {
        $staff = Staff::findOrFail($id);
        $staff->delete();

        return redirect()->back()->with('success', 'Staff deleted successfully!');
    }

    public function showStaffProfile()
    {
         $staff = Auth::guard('staff')->user();
        return view('staff.profile', compact('staff'));
    }
}
