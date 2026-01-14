<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>RoomEase • Guest</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        /* BODY BACKGROUND */
        body {
            background-color: #1f2937;
        }

        /* SIDEBAR NAV */
        .nav-item {
            display: block;
            padding: 0.65rem 1rem;
            border-radius: 0.75rem;
            color: #cbd5f5;
            transition: all 0.25s ease;
        }

        .nav-item:hover {
            background: rgba(255,255,255,0.08);
            color: #ffffff;
            transform: translateX(4px);
        }

        .nav-item.active {
            background: rgba(255,255,255,0.12);
            color: #ffffff;
        }

        /* CARD — EXACT SAME AS ADMIN */
        .admin-card {
            background: rgba(255,255,255,0.05);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255,255,255,0.1);
            border-radius: 1rem;
            padding: 1.5rem;
            box-shadow: 0 8px 24px rgba(0,0,0,0.4);
        }

        .admin-card h1,
        .admin-card h2,
        .admin-card h3,
        .admin-card h4,
        .admin-card h5 {
            color: #ffffff;
            font-weight: 600;
        }

        .admin-card p,
        .admin-card span,
        .admin-card label,
        .admin-card td,
        .admin-card th {
            color: #d1d5db;
        }

        .admin-card input,
        .admin-card select,
        .admin-card textarea {
            background: rgba(255,255,255,0.08);
            border: 1px solid rgba(255,255,255,0.2);
            color: #ffffff;
        }

        .admin-card a {
            color: #a5b4fc;
        }
    </style>
</head>

<body class="min-h-screen flex font-sans text-white">

<!-- SIDEBAR -->
<aside class="w-64 bg-gray-900 border-r border-white/10 flex flex-col">

    <!-- LOGO -->
    <div class="px-6 py-6 border-b border-white/10">
        <h1 class="text-xl font-bold tracking-wide text-white">RoomEase</h1>
        <p class="text-xs text-gray-400 mt-1">Guest Panel</p>
    </div>

    <!-- NAVIGATION -->
    <nav class="flex-1 px-4 py-6 space-y-1 text-sm">
        <a href="/guest/dashboard" class="nav-item {{ request()->is('guest/dashboard') ? 'active' : '' }}">Dashboard</a>
        <a href="/guest/book-room" class="nav-item {{ request()->is('guest/book-room') ? 'active' : '' }}">Book a Room</a>
        <a href="/guest/bookings" class="nav-item {{ request()->is('guest/bookings') ? 'active' : '' }}">My Bookings</a>
        <a href="/guest/payments" class="nav-item {{ request()->is('guest/payments') ? 'active' : '' }}">Payments</a>
        <a href="/guest/profile" class="nav-item {{ request()->is('guest/profile') ? 'active' : '' }}">Profile</a>
        <a href="/guest/support" class="nav-item {{ request()->is('guest/support') ? 'active' : '' }}">Support</a>
    </nav>

    <!-- FOOTER -->
    <div class="px-4 py-4 border-t border-white/10">
        <form method="POST" action="/logout">
            @csrf
            <button
                type="submit"
                class="w-full py-2 rounded-lg text-sm hover:bg-red-500/80 transition font-medium text-white">
                ⏻ Logout
            </button>
        </form>

        <p class="mt-3 text-xs text-gray-500 text-center">
            🕷 Spidey Mode • RoomEase
        </p>
    </div>
</aside>

<!-- MAIN CONTENT -->
<div class="flex-1 flex flex-col">

    <!-- TOP BAR -->
    <header class="backdrop-blur-xl bg-white/5 border-b border-white/10 px-6 py-4 flex justify-between items-center">
        <h2 class="text-sm font-semibold tracking-wide text-white">
            @yield('title', 'Guest Dashboard')
        </h2>

        <div class="flex items-center gap-3">
            <span class="text-xs text-gray-400">Guest</span>
            <div class="w-8 h-8 rounded-full bg-gradient-to-br from-indigo-500 to-purple-600"></div>
        </div>
    </header>

    <!-- PAGE CONTENT (MATCHES ADMIN EXACTLY) -->
    <main class="p-6">
        <div class="admin-card">
            @yield('content')
        </div>
    </main>

</div>

</body>
</html>
