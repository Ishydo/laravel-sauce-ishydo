<x-layouts.master>
    <x-slot name="title">{{ $title }}</x-slot>
    <x-slot name="styles">
        <!-- Additional dashboard styles -->
        {{ $styles ?? '' }}
    </x-slot>
    <x-slot name="bundles">
        <!-- Additional dashboard bundle -->
        {{ $bundles ?? '' }}
    </x-slot>
    
    <main id="app" x-data="{ isOpen: false }">
    
<!-- This example requires Tailwind CSS v2.0+ -->
<div class="h-screen flex overflow-hidden bg-white">
    
    <!-- Off-canvas menu for mobile, show/hide based on off-canvas menu state. -->
    <div  x-show="isOpen"
          class="fixed inset-0 flex z-40 md:hidden" 
          role="dialog" 
          aria-modal="true">
      <div 
        x-show="isOpen"
        x-transition:enter="transition-opacity ease-linear duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition-opacity ease-linear duration-300"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 bg-gray-600 bg-opacity-75" 
        aria-hidden="true"></div>
      <div
        x-show="isOpen"
        x-transition:enter="transition ease-in-out duration-300 transform"
        x-transition:enter-start="-translate-x-full"
        x-transition:enter-end="translate-x-0"
        x-transition:leave="transition ease-in-out duration-300 transform"
        x-transition:leave-start="translate-x-0"
        x-transition:leave-end="-translate-x-full"
        class="relative flex-1 flex flex-col max-w-xs w-full bg-white">
        <div 
          x-show="isOpen"
          x-transition:enter="ease-in-out duration-300"
          x-transition:enter-start="opacity-0"
          x-transition:enter-end="opacity-100"
          x-transition:leave="ease-in-out duration-300"
          x-transition:leave-start="opacity-100"
          x-transition:leave-end="opacity-0"
          x-on:click="isOpen = !isOpen"
          class="absolute top-0 right-0 -mr-12 pt-2">
          <button id="close-menu" class="ml-1 flex items-center justify-center h-10 w-10 rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
            <span class="sr-only">Close sidebar</span>
            <!-- Heroicon name: outline/x -->
            <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
  
        <div class="flex-1 h-0 pt-5 pb-4 overflow-y-auto">
          <div class="flex-shrink-0 flex items-center px-4">
            <span class="text-gray font-bold text-2xl">{{ config('app.name') }}</span>
          </div>
          <nav class="mt-5 px-2 space-y-1">

            @foreach ($menuItems as $key => $item)

              <a href="{{ $item['href'] }}" class="@if($item['isCurrent']) bg-gray-100 text-gray-900 @else text-gray-600 hover:bg-gray-50 @endif hover:text-gray-900 group flex items-center px-2 py-2 text-base font-medium rounded-md">
                <svg class="@if($item['isCurrent']) text-gray-500 @else text-gray-400 group-hover:text-gray-500 @endif mr-4 flex-shrink-0 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $item['icon'] }}" />
                </svg>
                {{ $key }}
              </a>

            @endforeach

            <div class="pt-10">
              <p class="px-3 text-xs font-semibold text-gray-500 uppercase tracking-wider" id="communities-headline">
                More about snapwin
              </p>
              <div class="mt-3 space-y-2" aria-labelledby="communities-headline">
                @foreach ($moreLinks as $link => $item)
                  <a href="#" class="group flex items-center px-3 py-2 text-sm font-medium text-gray-600 rounded-md hover:text-gray-900 hover:bg-gray-50">
                    <span class="truncate">
                        {{ $link }}
                    </span>
                  </a>
                @endforeach
              </div>
            </div>

          </nav>
        </div>
        <div class="flex-shrink-0 flex border-t border-gray-200 p-4">
          <a href="#" class="flex-shrink-0 group block">
            <div class="flex items-center">
              <div>
                <img class="inline-block h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
              </div>
              <div class="ml-3">
                <p class="text-base font-medium text-gray-700 group-hover:text-gray-900">
                  {{ auth()->user()->name }}
                </p>
                <p class="text-sm font-medium text-gray-500 group-hover:text-gray-700">
                  View profile
                </p>
              </div>
            </div>
          </a>
        </div>
      </div>
  
      <div class="flex-shrink-0 w-14">
        <!-- Force sidebar to shrink to fit close icon -->
      </div>
    </div>
  
    <!-- Static sidebar for desktop -->
    <div class="hidden md:flex md:flex-shrink-0">
      <div class="flex flex-col w-64">
        <!-- Sidebar component, swap this element with another sidebar if you like -->
        <div class="flex flex-col h-0 flex-1 border-r border-gray-200 bg-white">
          <div class="flex-1 flex flex-col pt-5 pb-4 overflow-y-auto">
            <div class="flex items-center flex-shrink-0 px-4">
            <span class="text-gray font-bold text-2xl">{{ config('app.name') }}</span>
            </div>
            <nav class="mt-5 flex-1 px-2 bg-white space-y-1">

              @foreach ($menuItems as $key => $item)

                <a href="{{ $item['href'] }}" class="@if($item['isCurrent']) bg-gray-100 text-gray-900 @else text-gray-600 hover:bg-gray-50 hover:text-gray-900 @endif group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                  <svg class="@if($item['isCurrent']) text-gray-500 @else text-gray-400 group-hover:text-gray-500 @endif mr-3 flex-shrink-0 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $item['icon'] }}" />
                  </svg>
                  {{ $key }}
                </a>

              @endforeach

              <div class="pt-10">
                <p class="px-3 text-xs font-semibold text-gray-500 uppercase tracking-wider" id="communities-headline">
                  More about snapwin
                </p>
                <div class="mt-3 space-y-2" aria-labelledby="communities-headline">
                  @foreach ($moreLinks as $link => $item)
                    <a href="#" class="group flex items-center px-3 py-2 text-sm font-medium text-gray-600 rounded-md hover:text-gray-900 hover:bg-gray-50">
                      <span class="truncate">
                          {{ $link }}
                      </span>
                    </a>
                  @endforeach
                </div>
              </div>

            </nav>
          </div>
          <div class="flex-shrink-0 flex border-t border-gray-200 p-4">
            <a href="#" class="flex-shrink-0 w-full group block">
              <div class="flex items-center">
                <div class="ml-3">
                  <p class="text-sm font-medium text-gray-700 group-hover:text-gray-900">
                    {{ auth()->user()->name }}
                  </p>
                  <form method="post" action="{{ route('logout') }}">
                    @csrf
                    <button class="text-xs font-medium text-gray-500 group-hover:text-gray-700">Logout</button>
                  </form>
                </div>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>
    <div class="flex flex-col w-0 flex-1 overflow-hidden">
      <div class="md:hidden pl-1 pt-1 sm:pl-3 sm:pt-3">
        <button x-on:click="isOpen = !isOpen" class="-ml-0.5 -mt-0.5 h-12 w-12 inline-flex items-center justify-center rounded-md text-gray-500 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
          <span class="sr-only">Open sidebar</span>
          <!-- Heroicon name: outline/menu -->
          <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
          </svg>
        </button>
      </div>
      
      <main class="flex-1 relative z-0 overflow-y-auto focus:outline-none">
        <div class="py-6">
          <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">

            <div class="border-b border-gray-200 py-4 sm:flex sm:items-center sm:justify-between">
              <div class="flex-1 min-w-0">
                <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">
                  <h1 class="text-2xl font-semibold text-gray-900">{{ $pageName }}</h1>
                </h1>
              </div>
              <div class="mt-4 flex sm:mt-0 sm:ml-4">
                {{ $actions ?? '' }}
              </div>
            </div>
          </div>
          <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
            <div class="py-4">
                {{ $slot }}
            </div>
          </div>
        </div>
      </main>

    </div>
  </div>
  
</main>
    
</x-layouts.master>