<x-layouts.master>
    <x-slot name="title">{{ $title ?? '' }}</x-slot>
    <x-slot name="styles">
        <!-- Additional public styles -->
        {{ $styles ?? '' }}
    </x-slot>
    <x-slot name="bundles">
        <!-- Additional public bundle -->
        {{ $bundles ?? '' }}
    </x-slot>

    <main class="z-0" id="app">
        {{ $slot }}
    </main>

</x-layouts.master>