@extends('layouts.guest')

@section('content')
    <h1>Your Profile</h1>
    <p>Name: {{ $guest->name }}</p>
    <p>Email: {{ $guest->email }}</p>
    <p>Phone: {{ $guest->phone }}</p>
    <p>Address: {{ $guest->address }}</p>
@endsection