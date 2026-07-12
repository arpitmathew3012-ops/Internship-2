@extends('layouts.app')
@section('title', 'Add Review')
@section('content')
<div class="container mt-4">
    <h4>Add Review</h4>
    <form action="{{ route('reviews.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Item</label>
            <select name="reviewable" class="form-select" required>
                <option value="">Select an item</option>
                <optgroup label="Games">
                    @foreach ($games as $game)
                        <option value="game_{{ $game->id }}">{{ $game->name }}</option>
                    @endforeach
                </optgroup>
                <optgroup label="Movies">
                    @foreach ($movies as $movie)
                        <option value="movie_{{ $movie->id }}">{{ $movie->name }}</option>
                    @endforeach
                </optgroup>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Rating (1-5)</label>
            <input type="number" name="rating" min="1" max="5" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Comment</label>
            <textarea name="comment" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Save Review</button>
        <a href="{{ route('reviews') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
