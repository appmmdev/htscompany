<!-- resources/views/jsondata/create.blade.php -->

@extends('layouts.app')

@section('title', 'Add New Data')

@section('content')
    <div class="container mt-5">
        <h1>Add New Data</h1>

        <form action="{{ route('jsondata.store') }}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{ count($data) }}">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="position">Position</label>
                <input type="text" name="position" id="position" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="nationalid">National ID</label>
                <input type="text" name="nationalid" id="nationalid" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="reg_date">Registration Date</label>
                <input type="date" name="reg_date" id="reg_date" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Add</button>
        </form>
    </div>
@endsection
