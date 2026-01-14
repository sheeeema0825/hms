<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>RoomEase • Register</title>

  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 text-gray-900 min-h-screen flex items-center justify-center">

<!-- REGISTER CARD -->
<div class="w-full max-w-md bg-white border rounded-lg shadow-sm">

  <!-- HEADER -->
  <div class="border-b px-6 py-4 flex items-center gap-3">
    <div class="w-9 h-9 rounded-md bg-gray-800 text-white flex items-center justify-center font-semibold">
      R
    </div>
    <div>
      <h1 class="text-sm font-semibold leading-tight">RoomEase</h1>
      <p class="text-xs text-gray-500">Hotel Management System</p>
    </div>
  </div>

  <!-- FORM -->
  <form class="px-6 py-6 space-y-5" method="POST" action="/register">
    @csrf

    <!-- Name -->
    <div>
      <label class="block text-sm font-medium mb-1">Full Name</label>
      <input
        type="text"
        name="name"
        required
        class="w-full px-3 py-2 border rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-gray-800"
        placeholder="John Doe"
      />
    </div>

    <!-- Email -->
    <div>
      <label class="block text-sm font-medium mb-1">Email address</label>
      <input
        type="email"
        name="email"
        required
        class="w-full px-3 py-2 border rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-gray-800"
        placeholder="email@roomease.com"
      />
    </div>

    <!-- Phone -->
    <div>
      <label class="block text-sm font-medium mb-1">Phone Number</label>
      <input
        type="text"
        name="phone"
        required
        class="w-full px-3 py-2 border rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-gray-800"
        placeholder="+94 7X XXX XXXX"
      />
    </div>

    <!-- National ID -->
    <div>
      <label class="block text-sm font-medium mb-1">National ID</label>
      <input
        type="text"
        name="national_id"
        required
        class="w-full px-3 py-2 border rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-gray-800"
        placeholder="XXXXXXXXXV"
      />
    </div>

    <!-- Address -->
    <div>
      <label class="block text-sm font-medium mb-1">Address</label>
      <textarea
        name="address"
        rows="2"
        required
        class="w-full px-3 py-2 border rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-gray-800"
        placeholder="Permanent address"
      ></textarea>
    </div>

    <!-- Password -->
    <div>
      <label class="block text-sm font-medium mb-1">Password</label>
      <input
        type="password"
        name="password"
        required
        class="w-full px-3 py-2 border rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-gray-800"
        placeholder="••••••••"
      />
    </div>

    <div>
      <label class="block text-sm font-medium mb-1">Confirm Password</label>
      <input
        type="password"
        name="password_confirmation"
        required
        class="w-full px-3 py-2 border rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-gray-800"
        placeholder="••••••••"
      />
    </div>

    <!-- Submit -->
    <button
      type="submit"
      class="w-full py-2.5 rounded-md bg-gray-900 text-white text-sm font-medium hover:bg-gray-800 transition"
    >
      Register
    </button>

  </form>

  <!-- FOOTER -->
  <div class="border-t px-6 py-3 text-xs text-gray-500 text-center">
    Authorized registration only
  </div>

</div>

</body>
</html>
