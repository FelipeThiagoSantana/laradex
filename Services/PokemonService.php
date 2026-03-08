<?php
namespace App\Services;

use App\Models\Pokemon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;


class PokemonService
{

    public function getApiPokemons($offset = 0, $limit = 15)
    {
        $response = Http::get("https://pokeapi.co/api/v2/pokemon/?offset=$offset&limit=$limit");
        return $response->json();
    }

    public function importPokemon($apiId, $user)
    {
        $data = Http::get("https://pokeapi.co/api/v2/pokemon/{$apiId}")->json();

        DB::transaction(function () use ($data, $apiId, $user) {
           $pokemon = Pokemon::updateOrCreate(
               ['api_id' => $data['id']]
           );
        });
    }

}
