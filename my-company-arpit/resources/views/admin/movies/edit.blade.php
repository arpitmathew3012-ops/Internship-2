@extends('layouts.app')

@section('title', 'Edit Movie')

@section('content')
<div class="container mt-4">
    <h4>Edit Movie</h4>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('movies.update', $movie->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $movie->name) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Release Date</label>
            <input type="date" name="release_date" class="form-control" value="{{ old('release_date', \Carbon\Carbon::parse($movie->release_date)->format('Y-m-d')) }}">
        </div>

        <button type="submit" class="btn btn-primary">Update Movie</button>
        <a href="{{ route('movies') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
