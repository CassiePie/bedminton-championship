<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Gate;
use App\Models\Player;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    protected $rules = [
        'name' => 'required|string|max:255',
        'country' => 'required|string|max:255',
        'concept' => 'required|string|in:singles,doubles,mixed doubles',
    ];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $players = Player::all();
        return view('players', compact('players'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate($this->rules);

        $player = new Player;
        $player->name = $validatedData['name'];
        $player->country = $validatedData['country'];
        $player->concept = $validatedData['concept'];
        $player->user_id = auth()->id();
        $player->save();

        return redirect('/players');
    }

    /**
     * Display the specified resource.
     */
    public function show(Player $player)
    {
        $editingPlayerId = null;
        return view('players.show', compact('player', 'editingPlayerId'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $playerId = $request->input('playerId');
        $editingPlayerId = $playerId;
        $players = Player::all();
        $player = Player::find($playerId);
        return view('components.players.edit', compact('players', 'editingPlayerId', 'player'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Player $player)
    {
        if (Gate::denies('update-player', $player)) {
            abort(403, 'Unauthorized');
        }
        
        $validatedData = $request->validate($this->rules);

        $player->name = $validatedData['name'];
        $player->country = $validatedData['country'];
        $player->concept = $validatedData['concept'];
        $player->user_id = auth()->id();
        $player->save();

        return redirect('/players');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Player $player)
    {
        $player->delete();
        return redirect('/players');
    }
}
