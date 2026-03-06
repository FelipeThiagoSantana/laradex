<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Http;

class PokemonRepository
{

    public function getPokemons()
    {
        $response = Http::get('https://pokeapi.co/api/v2/pokemon?limit=15');

        return $response->json();
    }

    public function find($name)
    {
        $response = Http::get("https://pokeapi.co/api/v2/pokemon/{$name}");

        return $response->json();
    }

    public function getPokemonImage($id)
    {
        return "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/{$id}.png";
    }
}
