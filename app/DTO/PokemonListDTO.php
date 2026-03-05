<?php

namespace App\DTO;

class PokemonListDTO
{
    public function __construct(
        public int $id,
        public string $name,
        public string $image,
        public string $type,
    ) {}
}
