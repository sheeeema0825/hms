@extends('layouts.guest')

@section('content')
    <h1>Available Rooms</h1>
    <ul>
        @foreach ($rooms as $room)
            <li>
                <h2>{{ $room->name }}</h2>
                <p>Price: ${{ $room->price }}</p>
                <a href="/guest/book-room">Book Now</a>
            </li>
        @endforeach
    </ul>
@endsection