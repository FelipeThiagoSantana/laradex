<?php

namespace App\Http\Controllers;

use App\Service\PokemonService;
use Illuminate\Http\Request;

class PokemonController extends Controller
{
    protected $pokemonService;

    public function __construct(PokemonService $pokemonService)
    {
        $this->pokemonService = $pokemonService;
    }

    public function index()
    {
        $pokemons = $this->pokemonService->list();

        return view('pokemons.index', compact('pokemons'));
    }

    public function show($name)
    {
        $pokemons = $this->pokemonService->show($name);

        return view('pokemons.show', compact('pokemons'));
    }
}
