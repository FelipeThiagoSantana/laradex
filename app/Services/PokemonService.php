<?php

namespace App\Services;

use App\DTO\PokemonDTO;
use App\DTO\PokemonListDTO;
use App\Repositories\PokemonRepository;
use App\Support\CollectionPaginator;
use Exception;
use Illuminate\Pagination\LengthAwarePaginator;


class PokemonService
{
    protected $pokemonRepository;

    public function __construct(PokemonRepository $pokemonRepository)
    {
        $this->pokemonRepository = $pokemonRepository;
    }

    public function list(int $perPage = 16): LengthAwarePaginator
    {

        try {
            $page = request()->get('page', 1);
            $offset = ($page - 1) * $perPage;

            $data = $this->pokemonRepository->getPokemons($perPage, $offset);

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
                    'query' => request()->query()
                ]
            );
        } catch (\Exception $exception) {
            throw new Exception('Erro ao listar pokemons');
        }
    }

    public function show($name)
    {
        $pokemon = $this->pokemonRepository->find($name);

        $types = collect($pokemon['types'])->map(function ($type) {
            return $type['type']['name'];
        });

        return new PokemonDTO(
            id: $pokemon['id'],
            name: $pokemon['name'],
            image: $pokemon['sprites']['front_default'],
            height: $pokemon['height'] /10,
            weight: $pokemon['weight'] /10,
            types: $types->toArray(),
        );
    }
}

