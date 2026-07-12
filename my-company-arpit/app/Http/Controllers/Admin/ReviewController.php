<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Models\Game;
use App\Models\Movie;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::with('reviewable')->get();
        return view('admin.reviews.index', compact('reviews'));
    }

    public function create()
    {
        $games = Game::all();
        $movies = Movie::all();
        return view('admin.reviews.create', compact('games', 'movies'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'reviewable' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string',
        ]);

        [$type, $id] = explode('_', $validated['reviewable']);
        $modelClass = $type === 'game' ? Game::class : Movie::class;
        $item = $modelClass::findOrFail($id);

        Review::create([
            'reviewable_id' => $item->id,
            'reviewable_type' => $modelClass,
            'rating' => $validated['rating'],
            'comment' => $validated['comment'] ?? null,
        ]);

        return redirect()->route('reviews')->with('success', 'Review added successfully.');
    }

    public function edit(Review $review)
    {
        return view('admin.reviews.edit', compact('review'));
    }

    public function update(Request $request, Review $review)
    {
        $validated = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string',
        ]);

        $review->update($validated);

        return redirect()->route('reviews')->with('success', 'Review updated successfully.');
    }

    public function destroy(Review $review)
    {
        $review->delete();
        return redirect()->route('reviews')->with('success', 'Review deleted successfully.');
    }
}
