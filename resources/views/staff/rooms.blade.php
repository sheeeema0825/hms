@extends('layouts.staff')
@section('title', 'Rooms')

@section('content')
<div class="max-w-7xl mx-auto px-6 py-8">

    <h2 class="text-2xl font-semibold mb-6">Rooms</h2>

    <div class="overflow-x-auto bg-gray-900 rounded-xl border border-gray-700">
        <table class="w-full text-sm">
            <thead class="bg-gray-800 text-gray-300">
                <tr>
                    <th class="px-4 py-3 text-left">Room</th>
                    <th class="px-4 py-3 text-left">Type</th>
                    <th class="px-4 py-3 text-left">Capacity</th>
                    <th class="px-4 py-3 text-left">Status</th>
                    <th class="px-4 py-3 text-left">Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($rooms as $room)
                    <tr class="border-t border-gray-700">
                        <td class="px-4 py-3">{{ $room->room_number }}</td>
                        <td class="px-4 py-3">{{ $room->room_type }}</td>
                        <td class="px-4 py-3">{{ $room->capacity }}</td>

                        <td class="px-4 py-3">
                            <span class="px-3 py-1 rounded-full text-xs
                                @if($room->status == 'available') bg-green-600
                                @elseif($room->status == 'occupied') bg-red-600
                                @elseif($room->status == 'cleaning') bg-yellow-600 text-black
                                @else bg-gray-600
                                @endif
                            ">
                                {{ ucfirst($room->status) }}
                            </span>
                        </td>

                        <td class="px-4 py-3">
                            <form method="POST" action="/staff/rooms/status" class="flex gap-2">
                                @csrf
                                <input type="hidden" name="room_id" value="{{ $room->id }}">

                                <select name="status"
                                    class="bg-gray-800 border border-gray-600 rounded px-2 py-1 text-sm">
                                    <option value="available" {{ $room->status=='available' ? 'selected' : '' }}>
                                        Available
                                    </option>
                                    <option value="occupied" {{ $room->status=='occupied' ? 'selected' : '' }}>
                                        Occupied
                                    </option>
                                    <option value="cleaning" {{ $room->status=='cleaning' ? 'selected' : '' }}>
                                        Cleaning
                                    </option>
                                </select>

                                <button class="text-indigo-400 hover:underline text-sm">
                                    Update
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>

</div>
@endsection
