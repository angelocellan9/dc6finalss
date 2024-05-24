<?php

namespace App\Http\Controllers;
use App\Models\Player;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PlayerController extends Controller
{
    public function index() {
        $player = Player::orderBy('id')->get();
        return Inertia::render('Players', ['player' => $player]);
    }

    public function show(Player $player) {
        return inertia('View', ['player' => $player]);
    }

    public function create()
    {
        return inertia("Create");
    }
    

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'connum' => 'required',
            'address' => 'required',
            'birthdate' => 'required',
            'jerseyno' => 'required'

        ]);

        Player::create($request->all());

        return redirect('/players');
    }

    public function update(Request $request, Player $player) {
        $fields = $request->validate([
            'name' => 'required',
            'connum' => 'required',
            'address' => 'required',
            'birthdate' => 'required',
            'jerseyno' => 'required'

        ]);

        $player->update($fields);

        return redirect('/players');
    }

    public function destroy(Player $player){
        $player->delete();
        return redirect('/players');
    }
}
