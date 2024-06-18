<!-- resources/views/jsondata/edit.blade.php -->

@extends('layouts.app')

@section('title', 'Edit Data')

@section('content')
    <div class="container mt-5">
        <h1>Edit Data</h1>

        <form action="{{ route('jsondata.update', $data['id']) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $data['name'] }}" required>
            </div>
            <div class="form-group">
                <label for="position">Position</label>
                <input type="text" name="position" id="position" class="form-control" value="{{ $data['position'] }}"
                    required>
            </div>
            <div class="form-group">
                <label for="nationalid">National ID</label>
                <input type="text" name="nationalid" id="nationalid" class="form-control"
                    value="{{ $data['nationalid'] }}" required>
            </div>
            <div class="form-group">
                <label for="reg_date">Registration Date</label>
                <input type="date" name="reg_date" id="reg_date" class="form-control" value="{{ $data['reg_date'] }}"
                    required>
            </div>
            <button type="submit" class="btn btn-warning">Update</button>
        </form>
    </div>
@endsection
