<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class PokeApiService
{
    private string $baseUrl = 'https://pokeapi.co/api/v2/';

    public function listPokemons(int $limit = 16, int $offset = 0): array
    {
        return Http::get("{$this->baseUrl}pokemon", [
            'limit' => $limit,
            'offset' => $offset,
        ])->json();
    }

    public function find($name)
    {
        return Http::get("{$this->baseUrl}pokemon/{$name}")->json();
    }

    public function getPokemon(mixed $url)
    {
        return Http::get($url)->json();
    }
}
