<?php

namespace App\Service;

use App\DTO\PokemonDTO;
use App\DTO\PokemonListDTO;
use App\Repositories\PokemonRepository;
use Exception;


class PokemonService
{
    protected $pokemonRepository;

    public function __construct(PokemonRepository $pokemonRepository)
    {
        $this->pokemonRepository = $pokemonRepository;
    }

    public function list()
    {
        try {


            $data = $this->pokemonRepository->getPokemons();
            // $image = $this->pokemonRepository->getPokemonImage($id);

            return collect($data['results'])->map(function ($pokemon) {


                $urlParts = explode('/', trim($pokemon['url'], '/'));
                $id = end($urlParts);

                return new PokemonListDTO(
                    id: $id,
                    name: $pokemon['name'],
                    image: $this->pokemonRepository->getPokemonImage($id)
                );
            });
        } catch (\Exception $exception) {
            throw new Exception('Erro ao listar pokemons');
        }
    }

    public function show($name)
    {
        return new PokemonDTO();
    }
}
