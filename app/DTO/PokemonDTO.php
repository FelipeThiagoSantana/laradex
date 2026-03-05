<?php

namespace App\DTO;

class PokemonDTO
{
    public function __construct(
        public int $id,
        public string $name,
        public string $image,
        public int $height,
        public int $weight,
        public array $types,
    ) {}
}
