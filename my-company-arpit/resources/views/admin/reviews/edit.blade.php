@extends('layouts.app')
@section('title', 'Edit Review')
@section('content')
<div class="container mt-4">
    <h4>Edit Review for {{ $review->reviewable->name ?? 'item' }}</h4>
    <form action="{{ route('reviews.update', $review->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Rating (1-5)</label>
            <input type="number" name="rating" min="1" max="5" class="form-control" value="{{ old('rating', $review->rating) }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Comment</label>
            <textarea name="comment" class="form-control">{{ old('comment', $review->comment) }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update Review</button>
        <a href="{{ route('reviews') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
