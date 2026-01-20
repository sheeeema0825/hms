@extends('layouts.staff')

@section('title', 'Staff Dashboard')

@section('content')

<div class="max-w-7xl mx-auto px-6 py-10">

    <h2 class="text-2xl font-semibold mb-8 text-white">Staff Dashboard</h2>

    <div class="grid md:grid-cols-2 gap-6">

        <!-- BOOKINGS CARD -->
        <div
            class="bg-[#020617] border border-[#1e293b] rounded-xl p-6 shadow-lg hover:shadow-xl transition">

            <h3 class="text-lg font-semibold text-white mb-1">
                Bookings
            </h3>

            <p class="text-sm text-slate-400 mb-4">
                Manage check-ins and check-outs.
            </p>

            <a href="/staff/bookings"
               class="inline-flex items-center text-sm font-medium text-teal-400 hover:text-teal-300">
                Open →
            </a>
        </div>

        <!-- ROOM STATUS CARD -->
        <div
            class="bg-[#020617] border border-[#1e293b] rounded-xl p-6 shadow-lg hover:shadow-xl transition">

            <h3 class="text-lg font-semibold text-white mb-1">
                Room Status
            </h3>

            <p class="text-sm text-slate-400 mb-4">
                Update room availability.
            </p>

            <a href="/staff/rooms"
               class="inline-flex items-center text-sm font-medium text-teal-400 hover:text-teal-300">
                Open →
            </a>
        </div>

    </div>

</div>

@endsection
