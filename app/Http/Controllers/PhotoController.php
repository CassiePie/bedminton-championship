<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    protected $rules = [
        'game_id' => 'required|exists:games,id',
        'photo' => 'required|image|max:1024',
        'caption' => 'nullable|string|max:255',
    ];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $games = Game::all();

        $photos = Photo::with('game', 'user')
            ->when(request('game_id'), function ($query, $gameId) {
                return $query->where('game_id', $gameId);
            })
            ->where('user_id', auth()->user()->id)
            ->latest()
            ->paginate(20);

        return view('photos', compact('photos', 'games'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $games = Game::all();
        return view('components.photos.create', compact('games'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }
        
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'game_id' => 'required|exists:games,id',
        ]);

        $photo = new Photo;

        if ($request->file('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public');
            $photo->path = $photoPath;
        }

        $photo->user_id = Auth::id();
        $photo->game_id = $request->game_id;
        $photo->name = $request->input('title');
        $photo->caption = $request->input('caption');
        $photo->save();

        return redirect('/photos');
    }

    /**
     * Display the specified resource.
     */
    public function show(Photo $photo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Photo $photo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Photo $photo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Photo $photo)
    {
        if ($photo->user_id == Auth::id()) {
            Storage::disk('public')->delete($photo->path);
            $photo->delete();
        }
        
        return redirect('/photos');
    }
}
