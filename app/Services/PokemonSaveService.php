<?php
namespace App\Services;

use App\Models\Pokemon;
use App\Models\Type;
use App\Repositories\PokemonRepository;
use App\Services\PokeApiService;

class PokemonSaveService
{
    protected PokeApiService $pokeApiService;
    protected PokemonRepository $pokemonRepository;

    public function __construct(PokeApiService $pokeApiService , PokemonRepository $pokemonRepository)
    {
        $this->pokeApiService = $pokeApiService;
        $this->pokemonRepository = $pokemonRepository;


    }

    public function import(string $name): bool
    {
        $pokemon = $this->pokemonRepository->findByName($name);
        //Valida se o Pokemon está no DB
        if($pokemon){
            $this->pokemonRepository->delete($pokemon);
            return false;
        }
        //Faz busca na API
        $data = $this->pokeApiService->find($name);

       $pokemon = $this->pokemonRepository->create([
            'api_id' => $data['id'],
            'name' => $data['name'],
            'height' => $data['height'],
            'weight' => $data['weight'],
            'image' => $data['sprites']['front_default']
        ]);

        $types = collect($data['types'])->map(function ($type) {
            return $type['type']['name'];
        });

        $typeIds = $types
            ->map(fn($typeName) => Type::firstOrCreate(['name' => $typeName])->id)
            ->toArray();

        $pokemon->types()->sync($typeIds);

        return true;
    }
}
