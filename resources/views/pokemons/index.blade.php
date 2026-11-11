<x-layouts::app :title="__('Dashboard')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="pb-4 p-2">
            <label for="table-search" class="sr-only">Buscar</label>
            <div class="relative mt-1">
                <form method="GET" action="{{ route('pokemons.index') }}" class="max-w-md mx-auto">
                    <div class="pb-4 p-2">
                        <label for="table-search" class="sr-only">Buscar</label>
                        <div class="relative flex justify-center mt-1">
                            <input
                                type="text"
                                name="search"
                                value="{{ request('search') }}"
                                placeholder="Buscar "
                                class="border border-gray-300 dark:border-gray-600 rounded-lg py-3 ps-10 pe-4 block w-full bg-layer sm:text-sm text-foreground placeholder:text-muted-foreground-1 disabled:pointer-events-none focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                                role="combobox"
                                aria-expanded="false"
                                data-hs-combo-box-input="">
                            <button type="submit" class="ml-2 px-3 py-2 bg-blue-500 text-white cursor-pointer rounded">
                                Buscar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div
            class="relative h-full flex-1 overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700 p-4">
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach($pokemons as $pokemon)


                <div class="flex flex-col items-center justify-center w-full max-w-sm mx-auto">
                    <div class="w-full max-w-md px-8 py-4 mt-16 bg-white rounded-lg shadow-lg dark:bg-gray-800">
                        <div class="flex justify-center -mt-16 md:justify-end">
                            <img class="object-cover bg-gray-500 bg-center bg-cover w-30 h-30 border-2 border-blue-500 rounded-full dark:border-blue-400" alt="Testimonial avatar" src="{{$pokemon->image}}">
                        </div>
                        <h2 class="mt-2 text-xl flex items-center p-2 justify-center font-semibold text-gray-800 dark:text-white md:mt-0">{{ucfirst($pokemon->name)}}</h2>
                        <a href="{{ route('pokemons.show', $pokemon->name) }}">
                            <div class="flex flex-col w-full max-w-xs gap-y-5">
                                <button class="bg-white flex items-center text-gray-700 dark:text-gray-300 justify-center gap-x-3 text-sm sm:text-base  dark:bg-gray-900 dark:border-gray-700 dark:hover:bg-gray-800 rounded-lg hover:bg-gray-100 duration-300 transition-colors border px-8 py-2.5">
                                    <span>Ver Pokemon</span>
                                </button>
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="mt-6">
            {{$pokemons->links()}}
        </div>
    </div>


</x-layouts::app>