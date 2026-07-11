@extends('layouts.app')

@section('title', 'Edit Game')

@section('content')
<div class="container mt-4">
    <h4>Edit Game</h4>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('games.update', $game->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $game->name) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Genre</label>
            <input type="text" name="genre" class="form-control" value="{{ old('genre', $game->genre) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Release Date</label>
            <input type="date" name="release_date" class="form-control" value="{{ old('release_date', \Carbon\Carbon::parse($game->release_date)->format('Y-m-d')) }}">
        </div>

        @if ($game->image)
            <div class="mb-3">
                <label class="form-label d-block">Current Image</label>
                <img src="{{ asset('storage/' . $game->image) }}" width="120" class="rounded">
            </div>
        @endif

        <div class="mb-3">
            <label class="form-label">Replace Image (optional)</label>
            <input type="file" name="image" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Update Game</button>
        <a href="{{ route('games') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
