<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use App\Services\PokemonSaveService;

class CaughtPokemonController extends Controller
{
    public function index(PokemonSaveService $pokemonSaveService)
    {

        $total = $pokemonSaveService->countImport();
        $pokefavorites = $pokemonSaveService->countFavorite();
        $types = $pokemonSaveService->countTypes();

        $pokemons = Pokemon::with('types')->get();

        return view('pokemons.caught', compact('pokemons', 'total', 'pokefavorites', 'types'));
    }

    public function favorite(string $name, PokemonSaveService $pokemonSaveService)
    {
        $favorite = $pokemonSaveService->toggleFavorite($name);

        if ($favorite) {
            return back()->with('success', 'Pokemon adicionado aos favoritos!');
        }

        return back()->with('success', 'Pokemon removido dos favoritos!');
    }
}
