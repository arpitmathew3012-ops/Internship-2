@extends('layouts.app')

@section('title', 'Add Game')

@section('content')
<div class="container mt-4">
    <h2>Add New Game</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops! Something went wrong.</strong>
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('games.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Game Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="genre" class="form-label">Genre</label>
            <input type="text" class="form-control" id="genre" name="genre" required>
        </div>
        <div class="mb-3">
            <label for="release_date" class="form-label">Release Date</label>
            <input type="date" class="form-control" id="release_date" name="release_date" required>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Game Image</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>
        <button type="submit" class="btn btn-success">Save Game</button>
    </form>
</div>
@endsection
