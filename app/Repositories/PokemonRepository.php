<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Http;

class PokemonRepository
{

    public function getPokemons(int $limit, int $offset)
    {
       return Http::get('https://pokeapi.co/api/v2/pokemon',[
        'limit' => $limit,
        'offset' => $offset])->json();

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
