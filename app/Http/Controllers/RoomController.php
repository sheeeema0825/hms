<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;

class RoomController extends Controller
{
    

    public function rooms()
    {
        $rooms = Room::all();
        return view('admin.rooms', compact('rooms'));
    }

    public function staffRooms()
    {
        $rooms = Room::all();
        return view('staff.rooms', compact('rooms'));
    }

    public function updateRoomStatus(Request $request)
    {
        $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'status' => 'required|string|in:available,occupied,maintenance',
        ]);

        $room = Room::findOrFail($request->room_id);
        $room->status = $request->status;
        $room->save();

        return redirect()->back()->with('success', 'Room status updated successfully!');
    }

    public function storeRoom(Request $request)
    {
        $request->validate([
            'room_number' => 'required|string|max:10|unique:rooms,room_number',
            'room_type' => 'required|string|max:50',
            'capacity' => 'required|integer|min:1',
            'base_price' => 'required|numeric|min:0',
            'status' => 'required|string|in:available,occupied,maintenance',
        ]);

        Room::create([
            'room_number' => $request->room_number,
            'room_type' => $request->room_type,
            'capacity' => $request->capacity,
            'base_price' => $request->base_price,
            'status' => $request->status,
        ]);

        return redirect()->back()->with('success', 'Room added successfully!');
    }

    public function editRoom(Request $request)
    {
        $room = Room::findOrFail($request->id);

        $request->validate([
            'room_number' => 'required|string|max:10|unique:rooms,room_number,' . $room->id,
            'room_type' => 'required|string|max:50',
            'capacity' => 'required|integer|min:1',
            'base_price' => 'required|numeric|min:0',
            'status' => 'required|string|in:available,occupied,maintenance',
        ]);

        $room->update([
            'room_number' => $request->room_number,
            'room_type' => $request->room_type,
            'capacity' => $request->capacity,
            'base_price' => $request->base_price,
            'status' => $request->status,
        ]);

        return redirect()->back()->with('success', 'Room updated successfully!');
    }
}
