@props([
'sidebar' => false,
])

@if($sidebar)
<flux:sidebar.brand name="Laradex" {{ $attributes }}>
    <x-slot name="logo" class="flex aspect-square size-8 items-center justify-center rounded-md bg-accent-content text-accent-foreground">
        <img src="{{ asset('images/logo.jpg') }}" alt="Logo Laradex" class="size-6 object-contain" />
    </x-slot>
</flux:sidebar.brand>
@else
<flux:brand name="Laradex" {{ $attributes }}>
    <x-slot name="logo" class="flex aspect-square size-8 items-center justify-center rounded-md bg-accent-content text-accent-foreground">
        <img src="{{ asset('images/logo.jpg') }}" alt="Logo Laradex" class="size-6 object-contain" />
    </x-slot>
</flux:brand>
@endif