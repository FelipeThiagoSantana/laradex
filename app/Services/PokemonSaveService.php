<?php
namespace App\Services;

use App\Models\Pokemon;
use App\Models\Type;
use App\Services\PokeApiService;

class PokemonSaveService
{
    protected PokeApiService $pokeApiService;

    public function __construct(PokeApiService $pokeApiService)
    {
        $this->pokeApiService = $pokeApiService;
    }

    public function import(string $name): Pokemon
    {
        $data = $this->pokeApiService->find($name);

        $pokemon = Pokemon::firstOrCreate([
            'name' => $data['name']
        ], [
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

        return $pokemon;
    }
}
