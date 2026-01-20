@extends('layouts.guest')

@section('content')
    <h1>Your Bookings</h1>
    <ul>
        @foreach ($bookings as $booking)
            <li>
                <h2>Room: {{ $booking->room->name }}</h2>
                <p>Check-in: {{ $booking->check_in }}</p>
                <p>Check-out: {{ $booking->check_out }}</p>
                <p>Status: {{ $booking->status }}</p>
            </li>
        @endforeach
    </ul>
@endsection
