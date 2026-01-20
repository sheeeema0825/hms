@extends('layouts.admin')

@section('title', 'Manage Rooms')

@section('content')
<h2 class="text-2xl font-semibold mb-6">Manage Rooms</h2>

<p class="text-gray-300 mb-4">Here you can manage all room details.</p>

<!-- ADD ROOM BUTTON -->
<button onclick="openAddModal()"
    class="px-4 py-2 bg-teal-700 text-white rounded-md mb-4">
    + Add Room
</button>

<!-- ADD ROOM MODAL -->
<div id="addRoomModal" class="modal hidden">
    <div class="modal-content">
        <h3>Add Room</h3>
        <span class="close" onclick="closeAddModal()">&times;</span>

        <form action="/admin/rooms" method="POST">
            @csrf
            <input name="room_number" placeholder="Room Number" class="input" required>
            <input name="room_type" placeholder="Room Type" class="input" required>
            <input name="capacity" type="number" placeholder="Capacity" class="input" required>
            <input name="base_price" type="number" placeholder="Base Price" class="input" required>
            <select name="status" class="input" required>
                <option value="">Select Status</option>
                <option value="available">Available</option>
                <option value="occupied">Occupied</option>
                <option value="maintenance">Maintenance</option>
            </select>

            <div class="text-right">
                <button type="button" class="btn-gray" onclick="closeAddModal()">Cancel</button>
                <button type="submit" class="btn-primary">Save</button>
            </div>
        </form>
    </div>
</div>

<!-- EDIT ROOM MODAL -->
<div id="editRoomModal" class="modal hidden">
    <div class="modal-content">
        <h3>Edit Room</h3>
        <span class="close" onclick="closeEditModal()">&times;</span>

        <form id="editRoomForm" method="POST">
            @csrf
            <input type="hidden" name="id" id="edit_id">
            <input name="room_number" id="edit_room_number" class="input" required>
            <input name="room_type" id="edit_room_type" class="input" required>
            <input name="capacity" id="edit_capacity" type="number" class="input" required>
            <input name="base_price" id="edit_base_price" type="number" class="input" required>
            <select name="status" id="edit_status" class="input" required>
                <option value="">Select Status</option>
                <option value="available">Available</option>
                <option value="occupied">Occupied</option>
                <option value="maintenance">Maintenance</option>
            </select>

            <div class="text-right">
                <button type="button" class="btn-gray" onclick="closeEditModal()">Cancel</button>
                <button type="submit" class="btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>

<!-- ROOMS TABLE -->
<table class="w-full text-left border-collapse bg-gray-900 text-white mt-4">
    <thead>
        <tr class="border-b border-gray-700">
            <th class="px-4 py-2">Room Number</th>
            <th>Type</th>
            <th>Capacity</th>
            <th>Base Price</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse($rooms as $room)
        <tr class="border-b border-gray-700">
            <td class="px-4 py-2">{{ $room->room_number }}</td>
            <td>{{ $room->room_type }}</td>
            <td>{{ $room->capacity }}</td>
            <td>{{ $room->base_price }}</td>
            <td>{{ $room->status }}</td>
            <td>
                <button onclick="openEditModal(
                    {{ $room->id }},
                    '{{ $room->room_number }}',
                    '{{ $room->room_type }}',
                    {{ $room->capacity }},
                    {{ $room->base_price }},
                    '{{ $room->status }}'
                )" class="px-2 py-1 bg-blue-600 rounded-md mr-2">Edit</button>

                <form action="/admin/rooms/{{ $room->id }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Delete this room?')"
                        class="px-2 py-1 bg-red-600 rounded-md">Delete</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="6" class="text-center py-4 text-gray-400">No rooms found</td>
        </tr>
        @endforelse
    </tbody>
</table>

<!-- STYLES -->
<style>
.modal {
    position: fixed;
    top: 0; left: 0; width: 100%; height: 100%;
    background: rgba(0,0,0,0.55);
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 50;
}
.modal-content {
    background: #1f2937;
    padding: 20px;
    border-radius: 8px;
    width: 400px;
    position: relative;
}
.close {
    position: absolute;
    top: 10px;
    right: 14px;
    font-size: 22px;
    cursor: pointer;
}
.input {
    width: 100%;
    padding: 8px;
    margin-bottom: 10px;
    background: #111827;
    border: 1px solid #374151;
    color: white;
    border-radius: 4px;
}
.btn-primary {
    background: #0f766e;
    color: white;
    border: none;
    padding: 8px 14px;
    border-radius: 4px;
}
.btn-gray {
    background: #475569;
    color: white;
    border: none;
    padding: 8px 14px;
    border-radius: 4px;
    margin-right: 6px;
}
.hidden { display: none; }
</style>

<!-- SCRIPTS -->
<script>
function openAddModal() {
    document.getElementById('addRoomModal').classList.remove('hidden');
}
function closeAddModal() {
    document.getElementById('addRoomModal').classList.add('hidden');
}

function openEditModal(id, number, type, capacity, price, status) {
    document.getElementById('editRoomModal').classList.remove('hidden');
    document.getElementById('edit_id').value = id;
    document.getElementById('edit_room_number').value = number;
    document.getElementById('edit_room_type').value = type;
    document.getElementById('edit_capacity').value = capacity;
    document.getElementById('edit_base_price').value = price;
    document.getElementById('edit_status').value = status;

    document.getElementById('editRoomForm').action = '/admin/rooms/edit'; // POST edit endpoint
}
function closeEditModal() {
    document.getElementById('editRoomModal').classList.add('hidden');
}
</script>

@endsection
