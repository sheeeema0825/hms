@extends('layouts.guest')

@section('title', 'Guest Dashboard')

@section('content')
<main class="max-w-7xl mx-auto px-4 py-8">

    <h2 class="text-2xl font-semibold text-white mb-6">
        Guest Dashboard
    </h2>

    <div class="grid md:grid-cols-2 gap-6">

        <!-- My Bookings -->
        <a href="/guest/bookings"
           class="group bg-gray-800 border border-gray-700 rounded-xl p-6
                  hover:bg-gray-750 hover:border-indigo-500
                  transition-all duration-300 shadow-lg">
            <div class="flex items-center justify-between mb-3">
                <h3 class="text-lg font-medium text-white">
                    My Bookings
                </h3>
                <span class="text-indigo-400 group-hover:translate-x-1 transition">
                    →
                </span>
            </div>
            <p class="text-sm text-gray-400">
                View your reservation details.
            </p>
        </a>

        <!-- Profile -->
        <a href="/guest/profile"
           class="group bg-gray-800 border border-gray-700 rounded-xl p-6
                  hover:bg-gray-750 hover:border-indigo-500
                  transition-all duration-300 shadow-lg">
            <div class="flex items-center justify-between mb-3">
                <h3 class="text-lg font-medium text-white">
                    Profile
                </h3>
                <span class="text-indigo-400 group-hover:translate-x-1 transition">
                    →
                </span>
            </div>
            <p class="text-sm text-gray-400">
                Manage your personal information.
            </p>
        </a>

    </div>

</main>
@endsection
