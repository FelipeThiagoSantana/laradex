<?php

namespace App\Service;

use App\DTO\PokemonDTO;
use App\Repositories\PokemonRepository;


class PokemonService
{
    protected $pokemonRepository;

    public function __construct(PokemonRepository $pokemonRepository)
    {
        $this->pokemonRepository = $pokemonRepository;
    }

    public function list()
    {

        $data = $this->pokemonRepository->getPokemons();

        return $data['results'];
    }

    public function show($name)
    {
        return new PokemonDTO(
            id: $name['id'],
            name: $name['name'],
            image: $name['image'],
            height: $name['height'],
            weight: $name['weight'],
            types: $name['types'],
        );
    }
}
