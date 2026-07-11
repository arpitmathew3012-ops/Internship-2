@extends('layouts.app')

@section('title', 'Games List')

@section('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
@endsection

@section('content')
<div class="container mt-4">
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Games List</h2>
        <a href="{{ route('games.create') }}" class="btn btn-primary">Add Game</a>
    </div>
    <table id="games-table" class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Name</th>
                <th>Genre</th>
                <th>Release Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($games as $game)
                <tr>
                    <td>{{ $game->id }}</td>
                    <td>
                        @if ($game->image)
                            <img src="{{ asset('storage/' . $game->image) }}" alt="Game Image" style="width: 60px; height: auto; border-radius: 4px;">
                        @else
                            <span class="text-muted">No Image</span>
                        @endif
                    </td>
                    <td>{{ $game->name }}</td>
                    <td>{{ $game->genre }}</td>
                    <td>{{ $game->release_date }}</td>
                    <td>
    <a href="{{ route('games.edit', $game->id) }}" class="btn btn-sm btn-warning">Edit</a>
    <form action="{{ route('games.destroy', $game->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this game?');" style="display:inline-block">
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

@section('scripts')
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function () {
        $('#games-table').DataTable();
    });
</script>
@endsection
