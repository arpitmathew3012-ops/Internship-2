@extends('layouts.app')

@section('title', 'Movies List')

@section('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
@endsection

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Movies List</h2>
        <a href="{{ route('movies.create') }}" class="btn btn-primary">Add Movie</a>
    </div>
    <table id="movies-table" class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Release Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($movies as $movie)
                <tr>
                    <td>{{ $movie->id }}</td>
                    <td>{{ $movie->name }}</td>
                    <td>{{ $movie->release_date }}</td>
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
        $('#movies-table').DataTable();
    });
</script>
@endsection