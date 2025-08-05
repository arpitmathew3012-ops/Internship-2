@extends('layouts.app')

@section('title', 'Add Movie')

@section('content')
<div class="container mt-4">
    <h2>Add New Movie</h2>

    <form action="{{ route('movies.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Movie Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="release_date" class="form-label">Release Date</label>
            <input type="date" class="form-control" id="release_date" name="release_date" required>
        </div>
        <button type="submit" class="btn btn-success">Save Movie</button>
    </form>
</div>
@endsection
