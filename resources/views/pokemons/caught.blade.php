<x-layouts::app :title="__('Dashboard')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="p-4 bg-white dark:bg-gray-800  shadow rounded-lg">
                <div class="text-3xl dark:text-gray-100  text-center font-bold m-2">{{ $total }}</div>
                <div class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                   <h1 class="text-end">Pokemons Capturados</h1>
                </div>
            </div>
            <div class="p-4 bg-white dark:bg-gray-800  shadow rounded-lg">
                <div class="text-3xl dark:text-gray-100  text-center font-bold m-2">{{ $pokefavorites }}</div>
                <div class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                    <h1 class="text-end">Pokemons Favoritos</h1>
                </div>
            </div>

            <div class="p-4 bg-white dark:bg-gray-800  shadow rounded-lg">
                <div class="text-3xl dark:text-gray-100  text-center font-bold m-2">{{ $types }}</div>
                <div class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                    <h1 class="text-end">Tipos de Pokemons</h1>
                </div>
            </div>

        </div>
        <div
            class="relative h-full flex-1 overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700 p-4">
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

                @foreach($pokemons as $pokemon)

                    <div class="flex flex-col items-center justify-center w-full max-w-sm mx-auto">

                        <div class="w-full max-w-md px-8 py-4 mt-16 bg-white rounded-lg shadow-lg dark:bg-gray-800">
                            <div class="flex justify-center -mt-16 md:justify-end">

                                <img
                                    class="object-cover bg-gray-500 bg-center bg-cover w-30 h-30 border-2 border-blue-500 rounded-full dark:border-blue-400"
                                    alt="Testimonial avatar" src="{{$pokemon->sprite}}">
                            </div>
                            <form action="{{ route('pokemons.favorite', $pokemon->name) }}" method="POST">
                                @csrf

                                <button type="submit">
                                    @if($pokemon->favorite)
                                        <i class="fa-solid fa-star text-yellow-600"
                                           title="Remover Pokomon favorito"></i>
                                    @else
                                        <i class="fa-regular fa-star" title="Favoritar {{$pokemon->name}}"></i>
                                    @endif
                                </button>
                            </form>
                            <h2 class="mt-2 text-xl flex items-center p-2 justify-center font-semibold text-gray-800 dark:text-white md:mt-0">{{ucfirst($pokemon->name)}}</h2>
                            <a href="{{ route('pokemons.show', $pokemon->name) }}">
                                <div class="flex flex-col w-full max-w-xs gap-y-5">
                                    <button
                                        class="bg-white flex items-center text-gray-700 dark:text-gray-300 justify-center gap-x-3 text-sm sm:text-base  dark:bg-gray-900 dark:border-gray-700 dark:hover:bg-gray-800 rounded-lg hover:bg-gray-100 duration-300 transition-colors border px-8 py-2.5">
                                        <span>Ver Pokemon</span>
                                    </button>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        {{--        <div class="mt-6">--}}
        {{--            {{$pokemons->links()}}--}}
        {{--        </div>--}}
    </div>


</x-layouts::app>
