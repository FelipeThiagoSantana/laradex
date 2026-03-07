<x-layouts::app :title="__('Dashboard')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="grid auto-rows-min gap-4 md:grid-cols-3">
            <div
                class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <x-placeholder-pattern
                    class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20"/>
            </div>
            <div
                class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <x-placeholder-pattern
                    class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20"/>
            </div>
            <div
                class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <x-placeholder-pattern
                    class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20"/>
            </div>
        </div>
        <div
            class="relative h-full flex-1 overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700 p-4">
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach($pokemons as $pokemon)
                    <a href="{{ route('pokemons.show', $pokemon->name) }}">
                        <div
                            class="flex flex-col items-center justify-center p-4 bg-white dark:bg-gray-700 hover:bg-zinc-800/5 rounded-lg shadow ">
                            <img class="scale-150" src="{{ $pokemon->image }}" alt="{{ $pokemon->name }}">
                            <h2 class="text-lg font-semibold mt-2"> {{ ucfirst($pokemon->name)}}</h2>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>


</x-layouts::app>
