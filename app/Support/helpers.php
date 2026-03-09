<?php
function pokemonTypeIcon($type)
{
    return[
        'normal' => 'fa-minus',
        'fire' => 'fa-fire',
        'water' => 'fa-water',
        'electric' => 'fa-bolt',
        'grass' => 'fa-leaf',
        'ice' => 'fa-snowflake',
        'fighting' => 'fa-hand-fist',
        'poison' => 'fa-skull-crossbones',
        'ground' => 'fa-globe',
        'flying' => 'fa-dove',
        'psychic' => 'fa-brain',
        'bug' => 'fa-bug',
        'rock' => 'fa-mountain',
        'ghost' => 'fa-ghost',
        'dragon' => 'fa-dragon',
        'dark' => 'fa-moon',
        'steel' => 'fa-shield-halved',
        'fairy' => 'fa-wand-magic-sparkles',

    ][$type] ?? 'fa-circle';
}
