@extends('layouts.app')
@section('title', 'Reviews List')
@section('content')
<div class="container mt-4">
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Reviews List</h2>
        <a href="{{ route('reviews.create') }}" class="btn btn-primary">Add Review</a>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th><th>Item</th><th>Rating</th><th>Comment</th><th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reviews as $review)
            <tr>
                <td>{{ $review->id }}</td>
                <td>{{ $review->reviewable->name ?? 'Deleted item' }}</td>
                <td>{{ $review->rating }} / 5</td>
                <td>{{ $review->comment }}</td>
                <td>
                    <a href="{{ route('reviews.edit', $review->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('reviews.destroy', $review->id) }}" method="POST" onsubmit="return confirm('Delete this review?');" style="display:inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
