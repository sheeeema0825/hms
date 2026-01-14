<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>RoomEase • Staff Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 text-gray-900">

@include('partials.header')

<main class="max-w-7xl mx-auto px-6 py-10">

  <h2 class="text-2xl font-semibold mb-6">Staff Dashboard</h2>

  <div class="grid md:grid-cols-2 gap-6">
    <div class="bg-white border rounded-lg p-6">
      <h3 class="font-medium mb-1">Bookings</h3>
      <p class="text-sm text-gray-600 mb-3">Manage check-ins and check-outs.</p>
      <a href="/staff/bookings" class="text-sm font-medium hover:underline">
        Open →
      </a>
    </div>

    <div class="bg-white border rounded-lg p-6">
      <h3 class="font-medium mb-1">Room Status</h3>
      <p class="text-sm text-gray-600 mb-3">Update room availability.</p>
      <a href="/staff/rooms" class="text-sm font-medium hover:underline">
        Open →
      </a>
    </div>
  </div>

</main>

</body>
</html>
