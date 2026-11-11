<?php

namespace App\Http\Controllers;

use App\Services\PokemonSaveService;
use App\Services\PokemonService;
use Illuminate\Http\Request;


class PokemonController extends Controller
{
    protected $pokemonService;


    public function __construct(PokemonService $pokemonService)
    {
        $this->pokemonService = $pokemonService;
    }

    public function index(Request $request, PokemonService $pokemonService)
    {
        $pokemons = $pokemonService->list(
            $request->get('search')
        );
        return view('pokemons.index', compact('pokemons'));
    }

    public function show($name)
    {
        $pokemon = $this->pokemonService->show($name);

        return view('pokemons.show', compact('pokemon'));
    }

    public function save(string $name, PokemonSaveService $pokemonSaveService)
    {
        $saved = $pokemonSaveService->import($name);

        if ($saved) {
            return back()->with('success', "Pokemon $name Capturado!");
        }

        return back()->with('success', "Pokemon $name Solto!");
    }
}
