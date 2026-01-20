@extends('layouts.staff')

@section('content')
    <h1>Staff Profile</h1>
    <p>Name: {{ $staff->name }}</p>
    <p>Email: {{ $staff->email }}</p>
    <p>Phone: {{ $staff->phone }}</p>
@endsection