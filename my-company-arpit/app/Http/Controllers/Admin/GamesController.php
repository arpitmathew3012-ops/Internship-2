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
