@extends('layouts.admin')

@section('title', 'Manage Guests')

@section('content')

<h2 style="font-size:24px;margin-bottom:20px;">Manage Guests</h2>

<button onclick="openModal()"
    style="padding:10px 16px;background:#0f766e;color:white;border:none;border-radius:6px;cursor:pointer;">
    + Add Guest
</button>

<!-- ADD MODAL -->
<div id="guestModal"
    style="display:none;position:fixed;top:0;left:0;width:100%;height:100%;background:rgba(0,0,0,.55);z-index:50;">

    <div
        style="background:#020617;width:420px;padding:20px;border-radius:8px;margin:120px auto;color:white;position:relative;">

        <h3>Add Guest</h3>

        <span onclick="closeModal()"
            style="position:absolute;top:10px;right:14px;font-size:22px;cursor:pointer;">&times;</span>

        <form action="{{ route('guests.store') }}" method="POST">
            @csrf

            <input name="name" placeholder="Name" required class="input">
            <input name="email" type="email" placeholder="Email" required class="input">
            <input name="phone" placeholder="Phone" required class="input">
            <input name="national_id" placeholder="National ID" required class="input">
            <textarea name="address" placeholder="Address" class="input"></textarea>

            <input type="password" name="password" placeholder="Password" required class="input">
            <input type="password" name="password_confirmation" placeholder="Confirm Password" required class="input">

            <div style="text-align:right;">
                <button type="button" onclick="closeModal()" class="btn-gray">Cancel</button>
                <button type="submit" class="btn-primary">Save</button>
            </div>
        </form>
    </div>
</div>


<!-- EDIT MODAL -->
<div id="editGuestModal"
    style="display:none;position:fixed;top:0;left:0;width:100%;height:100%;background:rgba(0,0,0,.55);z-index:60;">

    <div
        style="background:#020617;width:420px;padding:20px;border-radius:8px;margin:120px auto;color:white;position:relative;">

        <h3>Edit Guest</h3>

        <span onclick="closeEditModal()"
            style="position:absolute;top:10px;right:14px;font-size:22px;cursor:pointer;">&times;</span>

<form id="editGuestForm" method="POST">
    @csrf
    @method('PUT')


            

            <input name="name" id="edit_name" class="input" required>
            <input name="email" id="edit_email" type="email" class="input" required>
            <input name="phone" id="edit_phone" class="input" required>
            <input name="national_id" id="edit_national_id" class="input" required>
            <textarea name="address" id="edit_address" class="input"></textarea>

            <div style="text-align:right;">
                <button type="button" onclick="closeEditModal()" class="btn-gray">Cancel</button>
                <button type="submit" class="btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>


<!-- TABLE -->
<table style="width:100%;margin-top:25px;border-collapse:collapse;background:#020617;">
    <thead>
        <tr style="color:#e5e7eb;border-bottom:1px solid #334155;">
            <th style="padding:12px;">Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>NIC</th>
            <th>Address</th>
            <th>Actions</th>
        </tr>
    </thead>

    <tbody>
        @forelse($guests as $guest)
        <tr style="border-bottom:1px solid #1e293b;color:#cbd5f5;">
            <td style="padding:12px;">{{ $guest->name }}</td>
            <td>{{ $guest->email }}</td>
            <td>{{ $guest->phone }}</td>
            <td>{{ $guest->national_id }}</td>
            <td>{{ $guest->address }}</td>

            <td>
                <!-- EDIT -->
                <button
    onclick="openEditModal(
        {{ $guest->id }},
        '{{ $guest->name }}',
        '{{ $guest->email }}',
        '{{ $guest->phone }}',
        '{{ $guest->national_id }}',
        '{{ $guest->address }}'
    )"
    style="padding:6px 10px;background:#2563eb;color:white;border-radius:4px;border:none;cursor:pointer;margin-right:4px;">
    Edit
</button>


                <!-- DELETE -->
                <form action="{{ route('guests.destroy', $guest) }}"
                    method="POST" style="display:inline;">
                    @method('DELETE')
                    @csrf

                    <button type="submit"
                        onclick="return confirm('Delete this guest?')"
                        style="padding:6px 10px;background:#dc2626;color:white;border:none;border-radius:4px;">
                        Delete
                    </button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="6" style="padding:20px;text-align:center;color:#94a3b8;">
                No guests found
            </td>
        </tr>
        @endforelse
    </tbody>
</table>

<!-- BASIC STYLES -->
<style>
    .input {
        width: 100%;
        padding: 8px;
        margin-bottom: 10px;
        background: #0f172a;
        border: 1px solid #1e293b;
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
</style>

<script>
    function openModal() {
        document.getElementById('guestModal').style.display = 'block';
    }

    function closeModal() {
        document.getElementById('guestModal').style.display = 'none';
    }
</script>


<script>
    function openEditModal(id, name, email, phone, national_id, address) {
        document.getElementById('editGuestModal').style.display = 'block';

        document.getElementById('edit_name').value = name;
        document.getElementById('edit_email').value = email;
        document.getElementById('edit_phone').value = phone;
        document.getElementById('edit_national_id').value = national_id;
        document.getElementById('edit_address').value = address;

        document.getElementById('editGuestForm').action = `/admin/guests/${id}`;
    }

    function closeEditModal() {
        document.getElementById('editGuestModal').style.display = 'none';
    }
</script>


@endsection