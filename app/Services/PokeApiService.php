<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class PokeApiService{
    private string $baseUrl = 'https://pokeapi.co/api/v2/';

    public function listPokemons(int $limit = 50){
        return Http::get("{$this->baseUrl}/pokemon?limit={$limit}")->json();
    }

    public function find($name)
    {
        $response = Http::get("https://pokeapi.co/api/v2/pokemon/{$name}");

        return $response->json();
    }

    public function getPokemon(mixed $url)
    {
        return Http::get($url)->json();
    }


}
