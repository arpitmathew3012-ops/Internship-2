@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container mt-4">
    <div class="alert alert-success">
        Welcome, {{ Auth::user()->name }}!
    </div>

    <div class="card">
        <div class="card-header">
            <h5>Dashboard</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <div class="card-body"
                        onclick="window.location='{{ URL::route('games') }}'"
                        style="cursor: pointer; background-color: #4CAF50; color: white; padding: 16px; border-radius: 8px;">
                        <div>Games</div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card-body"
                        onclick="window.location='{{ URL::route('games') }}'"
                        style="cursor: pointer; background-color: #4cafaf; color: white; padding: 16px; border-radius: 8px;">
                        <div>Movies</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
