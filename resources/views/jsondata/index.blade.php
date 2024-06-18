<!-- resources/views/jsondata/index.blade.php -->

@extends('layouts.app')

@section('title', 'Manage JSON Data')

@section('content')
    <div class="container mt-5">
        <h1>Manage Employee Data</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <h2>Employee Data</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Position</th>
                    <th>National ID</th>
                    <th>Registration Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $item['id'] }}</td>
                        <td>{{ $item['name'] }}</td>
                        <td>{{ $item['position'] }}</td>
                        <td>{{ $item['nationalid'] }}</td>
                        <td>{{ $item['reg_date'] }}</td>
                        <td>
                            <!-- Edit Form -->
                            <a href="{{ route('jsondata.edit', $item['id']) }}" class="btn btn-warning btn-sm">Edit</a>

                            <!-- Delete Form -->
                            <form action="{{ route('jsondata.destroy', $item['id']) }}" method="POST"
                                style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>

                            <!-- Details Link -->
                            <a href="{{ route('jsondata.show', $item['id']) }}" class="btn btn-info btn-sm">Details</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <a href="{{ route('jsondata.create') }}" class="btn btn-primary">Add New Data</a>
    </div>
@endsection
