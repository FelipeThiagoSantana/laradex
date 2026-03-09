<?php

namespace App\Services;

use App\DTO\PokemonDTO;
use App\DTO\PokemonListDTO;
use App\Models\Pokemon;
use Exception;
use Illuminate\Pagination\LengthAwarePaginator;

class PokemonService
{
    protected $pokeApiService;

    public function __construct(PokeApiService $pokeApiService)
    {
        $this->pokeApiService = $pokeApiService;
    }

    public function list(int $perPage = 16): LengthAwarePaginator
    {

        try {
            $page = request()->get('page', 1);
            $offset = ($page - 1) * $perPage;

            $data = $this->pokeApiService->listPokemons($perPage, $offset);

            $pokemons = collect($data['results'])->map(function ($pokemon) {
                $urlParts = explode('/', trim($pokemon['url'], '/'));
                $id = end($urlParts);

                return new PokemonListDTO(
                    id: $id,
                    name: $pokemon['name'],
                    image: "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/$id.png"
                );
            });

            return new LengthAwarePaginator(
                $pokemons,
                $data['count'],
                $perPage,
                $page, [
                    'path' => request()->url(),
                    'query' => request()->query(),
                ]
            );
        } catch (\Exception $exception) {
            throw new Exception('Erro ao listar pokemons');
        }
    }

    public function show($name)
    {
        try {
            $pokemon = $this->pokeApiService->find($name);

            $types = collect($pokemon['types'])->map(function ($type) {
                return $type['type']['name'];
            });
            $saved = Pokemon::where('name', $pokemon['name'])->exists();

            return new PokemonDTO(
                id: $pokemon['id'],
                name: $pokemon['name'],
                image: $pokemon['sprites']['front_default'],
                height: $pokemon['height'] / 10,
                weight: $pokemon['weight'] / 10,
                types: $types->toArray(),
                saved: $saved
            );
        } catch (
            Exception $exception
        ) {
            throw new Exception('Erro ao exibir pokemon');
        }

    }
}
