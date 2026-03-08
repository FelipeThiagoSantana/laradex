<x-layouts::app :title="$pokemon->name">
    <div class="flex h-full items-center justify-center  flex-1 flex-col gap-4 rounded-xl">
        <div class="flex flex-col items-center justify-center position-center w-full max-w-sm mx-auto">

            <div class="w-full max-w-sm overflow-hidden bg-white rounded-lg shadow-lg dark:bg-gray-800">
                <div class="flex justify-center md:justify-center">
                    <img class="object-cover flex justify-center object-center w-45 h-45  " src="{{$pokemon->image}}"
                         alt="avatar">
                </div>
                <h1 class="text-xl font-semibold p-4 justify-center text-center text-gray-800 dark:text-white">{{ucfirst($pokemon->name)}}</h1>

                <div class="flex items-center justify-center px-6 py-3 bg-gray-900">
                    @foreach($pokemon->types as $type)
                        <i class="fa-solid {{pokemonTypeIcon($type)}}"></i>
                        <h1 class="mx-3 text-lg font-semibold text-white">{{$type}}</h1>
                    @endforeach

                </div>

                <div class="px-6 py-4">
                    <div class="flex items-center mt-4 text-gray-700 dark:text-gray-200">
                        <i class="fa-solid fa-ruler-vertical"></i>
                        <span>Tamnho:</span>
                        <h1 class="px-2 text-sm">{{$pokemon->height}}/m</h1>
                    </div>

                    <div class="flex items-center mt-4 text-gray-700 dark:text-gray-200">
                        <i class="fa-solid fa-weight-scale"></i>
                        <span>Peso:</span>
                        <h1 class="px-2 text-sm">{{$pokemon->weight}}/Kg</h1>
                    </div>
                    <form action="{{ route('pokemons.save', $pokemon->name) }}" method="POST">
                        @csrf

                        <button
                            type="submit"
                            class="flex justify-end text-lg font-medium text-blue-600 dark:text-blue-300"
                            title="Salvar {{ $pokemon->name }}"
                        >
                            @if($pokemon->saved)
                                <i class="fa-solid fa-bookmark text-yellow-500"></i>
                            @else
                                <i class="fa-regular fa-bookmark"></i>
                            @endif
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-layouts::app>
