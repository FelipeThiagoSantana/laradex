<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pokemon;


class CaughtPokemonController extends Controller
{
    public function index(){
        $pokemons = Pokemon::with('types')->get();

        return view('pokemons.caught', compact('pokemons'));
    }
}
