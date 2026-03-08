<?php

namespace App\Repositories;

use App\Models\Pokemon;
use Illuminate\Support\Facades\Http;

class PokemonRepository{

    public function findByName(string $name): ?Pokemon{
        return Pokemon::where('name', $name)->first();
    }

    public function create(array $data): Pokemon{
        return Pokemon::create($data);
    }

    public function delete(Pokemon $pokemon): void{
        $pokemon->types()->detach();
        $pokemon->delete();
    }

    public function toggleFavorite(Pokemon $pokemon): Pokemon
    {
        $pokemon->favorite = !$pokemon->favorite;
        $pokemon->save();
        return $pokemon;
    }

}
