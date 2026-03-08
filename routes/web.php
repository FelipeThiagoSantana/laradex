<?php

use App\Http\Controllers\CaughtPokemonController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PokemonController;

Route::redirect('/', '/login');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', [PokemonController::class, 'index'])->name('dashboard');

    Route::get('pokemons', [PokemonController::class, 'index'])->name('pokemons.index');
    Route::get('/pokemons/{name}', [PokemonController::class, 'show'])->name('pokemons.show');
    Route::post('/pokemons/save/{name}', [PokemonController::class, 'save'])->name('pokemons.save');
    Route::get('/caught-pokemons', [CaughtPokemonController::class, 'index'])->name('caught-pokemons.index');
});


require __DIR__ . '/settings.php';
