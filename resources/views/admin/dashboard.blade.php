@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('content')
<h2 class="text-2xl font-semibold mb-6">Admin Dashboard</h2>

<main class="max-w-7xl mx-auto px-2 md:px-0">

    <div class="grid md:grid-cols-3 gap-6">

        <!-- Manage Users Card -->
        <div class="admin-card hover:scale-105 transition transform cursor-pointer">
            <h3 class="text-xl font-medium mb-2">Manage Users</h3>
            <p class="text-gray-300 mb-4">Add or manage staff and guest accounts.</p>
            <a href="/admin/users" class="text-indigo-400 font-semibold hover:underline">
                Go →
            </a>
        </div>

        <!-- Rooms Card -->
        <div class="admin-card hover:scale-105 transition transform cursor-pointer">
            <h3 class="text-xl font-medium mb-2">Rooms</h3>
            <p class="text-gray-300 mb-4">Create and manage rooms.</p>
            <a href="/admin/rooms" class="text-indigo-400 font-semibold hover:underline">
                Go →
            </a>
        </div>

        <!-- Bookings Card -->
        <div class="admin-card hover:scale-105 transition transform cursor-pointer">
            <h3 class="text-xl font-medium mb-2">Bookings</h3>
            <p class="text-gray-300 mb-4">View and manage room bookings.</p>
            <a href="/admin/bookings" class="text-indigo-400 font-semibold hover:underline">
                Go →
            </a>
        </div>

        <!-- Payments Card -->
        <div class="admin-card hover:scale-105 transition transform cursor-pointer">
            <h3 class="text-xl font-medium mb-2">Payments</h3>
            <p class="text-gray-300 mb-4">Track payment records.</p>
            <a href="/admin/payments" class="text-indigo-400 font-semibold hover:underline">
                Go →
            </a>
        </div>

    </div>

</main>
@endsection
