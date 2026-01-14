<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>RoomEase • System Home</title>

  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 text-gray-900">

<!-- HEADER -->
<header class="bg-white border-b">
  <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
    <div class="flex items-center gap-3">
      <div class="w-9 h-9 rounded-md bg-gray-800 text-white flex items-center justify-center font-semibold">
        R
      </div>
      <div>
        <h1 class="text-sm font-semibold leading-tight">RoomEase</h1>
        <p class="text-xs text-gray-500">Hotel Management System</p>
      </div>
    </div>

    <nav class="flex items-center gap-6 text-sm text-gray-600">
      <a href="#overview" class="hover:text-gray-900">Overview</a>
      <a href="#modules" class="hover:text-gray-900">Modules</a>
      <a href="#access" class="hover:text-gray-900">Access</a>
      <a href="/register" class="px-4 py-2 rounded-md bg-gray-900 text-white hover:bg-gray-800">
        Register
      </a>
    </nav>
  </div>
</header>

<!-- MAIN -->
<main class="max-w-7xl mx-auto px-6 py-16 space-y-16">

  <!-- OVERVIEW -->
  <section id="overview">
    <h2 class="text-2xl font-semibold mb-3">System Overview</h2>
    <p class="text-sm text-gray-600 max-w-3xl">
      RoomEase is a centralized hotel management system designed to manage
      room availability, reservations, and staff operations in a structured
      and secure environment.
    </p>
  </section>

  <!-- MODULES -->
  <section id="modules">
    <h3 class="text-xl font-semibold mb-6">Core Modules</h3>

    <div class="grid md:grid-cols-3 gap-6">
      <div class="bg-white border rounded-lg p-6">
        <h4 class="font-medium mb-1">Room Management</h4>
        <p class="text-sm text-gray-600">
          Maintain room records, availability, and maintenance status.
        </p>
      </div>

      <div class="bg-white border rounded-lg p-6">
        <h4 class="font-medium mb-1">Booking Management</h4>
        <p class="text-sm text-gray-600">
          Handle reservations, check-ins, and check-outs efficiently.
        </p>
      </div>

      <div class="bg-white border rounded-lg p-6">
        <h4 class="font-medium mb-1">Staff Management</h4>
        <p class="text-sm text-gray-600">
          Control staff accounts, roles, and operational access.
        </p>
      </div>
    </div>
  </section>

  <!-- ACCESS -->
  <section id="access">
    <h3 class="text-xl font-semibold mb-4">System Access</h3>

    <div class="bg-white border rounded-lg p-6 max-w-3xl">
      <p class="text-sm text-gray-600 mb-4">
        Access to RoomEase is restricted to authorized personnel only.
        Please use your assigned credentials to log in.
      </p>

      <a href="/login"
         class="inline-block px-5 py-2 rounded-md bg-gray-900 text-white text-sm hover:bg-gray-800">
        Proceed to Login
      </a>
    </div>
  </section>

</main>

<!-- FOOTER -->
<footer class="bg-white border-t">
  <div class="max-w-7xl mx-auto px-6 py-4 text-xs text-gray-500 flex justify-between">
    <span>© <span id="year"></span> RoomEase</span>
    <span>Internal System</span>
  </div>
</footer>

<script>
  document.getElementById('year').textContent = new Date().getFullYear();
</script>

</body>
</html>
