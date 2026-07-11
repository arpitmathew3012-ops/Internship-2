<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index(Request $request)
    {
        $query = Movie::query();

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $movies = $query->get();

        return view('admin.movies.index', compact('movies'));
    }

    public function create()
    {
        return view('admin.movies.create');
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'release_date' => 'required|date',
            ]);

            Movie::create($validated);
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }

        return redirect()->route('movies')->with('success', 'Movie added successfully.');
    }

    public function edit(Movie $movie)
    {
        return view('admin.movies.edit', compact('movie'));
    }

    public function update(Request $request, Movie $movie)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'release_date' => 'required|date',
            ]);

            $movie->update($validated);

            return redirect()->route('movies')->with('success', 'Movie updated successfully.');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Something went wrong. Please try again.')->withInput();
        }
    }

    public function destroy(Movie $movie)
    {
        $movie->delete();
        return redirect()->route('movies')->with('success', 'Movie deleted successfully.');
    }
}
