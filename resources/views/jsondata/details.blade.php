<!-- resources/views/jsondata/details.blade.php -->

@extends('layouts.app')

@section('title', 'Employee ID Card')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">Employee ID Card</h1>

        <div class="card mx-auto" style="max-width: 400px;">
            <div class="card-header bg-primary text-white">
                Employee Details
            </div>
            <div class="card-body">
                <div class="text-center mb-3">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQKmWxy86X6nLtMxi8d5AiIl_2Ovjju3fEytQ&s"
                        alt="Employee Photo" class="img-fluid rounded-circle"
                        style="width: 150px; height: 150px; object-fit: cover;">
                </div>
                <h5 class="card-title text-center">{{ $item['name'] }}</h5>
                <p class="card-text"><strong>Position:</strong> {{ $item['position'] }}</p>
                <p class="card-text"><strong>National ID:</strong> {{ $item['nationalid'] }}</p>
                <p class="card-text"><strong>Registration Date:</strong> {{ $item['reg_date'] }}</p>
            </div>
        </div>

        <div class="mt-3 text-center">
            <a href="{{ route('jsondata.index') }}" class="btn btn-primary">Back to List</a>
        </div>
    </div>
@endsection
