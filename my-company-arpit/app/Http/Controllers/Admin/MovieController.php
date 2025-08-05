<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::all(); // Or paginate if needed
        return view('admin.movies.index', compact('movies'));
    }

    public function create()
    {
        return view('admin.movies.create'); // You can create the form Blade next
    }

    public function store(Request $request)
    {
        try {
            //code...
        
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'release_date' => 'required|date',
            ]);

            // Create and save the new game
            Movie::create($validated);
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
        // Redirect back to the games list with a success message
        return redirect()->route('movies')->with('success', 'Movie added successfully.');
    } 
}
