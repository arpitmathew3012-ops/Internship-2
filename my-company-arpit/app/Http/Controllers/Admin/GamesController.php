<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Game;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class GamesController extends Controller
{
    public function index()
    {
        $games = Game::all();
        return view('admin.games.index', compact('games'));
    }

    public function create()
    {
        return view('admin.games.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
            'release_date' => 'required|date',
            'image' => 'nullable',
        ]);

        try {

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                Log::info($file);
                $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('games', $filename, 'public');
                $validated['image'] = $path;
            }

            Game::create($validated);

            return redirect()->route('games')->with('success', 'Game added successfully.');
        } catch (\Throwable $th) {
            Log::error('Game Store Error: ' . $th->getMessage());
            return redirect()->back()->with('error', 'Something went wrong. Please try again.')->withInput();
        }
    }

    public function edit(Game $game)
    {
        return view('admin.games.edit', compact('game'));
    }

    public function update(Request $request, Game $game)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
            'release_date' => 'required|date',
            'image' => 'nullable',
        ]);

        try {
            if ($request->hasFile('image')) {
                if ($game->image && Storage::disk('public')->exists($game->image)) {
                    Storage::disk('public')->delete($game->image);
                }
                $file = $request->file('image');
                $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $validated['image'] = $file->storeAs('games', $filename, 'public');
            }

            $game->update($validated);

            return redirect()->route('games')->with('success', 'Game updated successfully.');
        } catch (\Throwable $th) {
            Log::error('Game Update Error: ' . $th->getMessage());
            return redirect()->back()->with('error', 'Something went wrong. Please try again.')->withInput();
        }
    }

    public function destroy(Game $game)
    {
        if ($game->image && Storage::disk('public')->exists($game->image)) {
            Storage::disk('public')->delete($game->image);
        }

        $game->delete();

        return redirect()->route('games.index')->with('success', 'Game deleted successfully.');
    }
}
