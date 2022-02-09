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

<!-- This example requires Tailwind CSS v2.0+ -->
<div x-data="{ isOpen: false }" class="z-50 relative bg-white">
    <div class="flex justify-between items-center px-4 py-6 sm:px-6 md:justify-start md:space-x-10">
      <div>
        <a href="#" class="flex">
          <span class="sr-only">snapwin</span>
          <img class="h-8 w-auto sm:h-10" src="/snapgrey.png" alt="">
        </a>
      </div>
      <div class="hidden -mr-2 -my-2 md:hidden">
        <button x-on:click="isOpen = true" type="button" class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500" aria-expanded="false">
          <span class="sr-only">Open menu</span>
          <!-- Heroicon name: outline/menu -->
          <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
          </svg>
        </button>
      </div>
      <div class="hidden md:flex-1 md:flex md:items-center md:justify-between">
        <nav class="flex space-x-10">
          <span class="text-base font-semibold text-gray-500">
            For you and me, from <a class="text-gray-500 hover:text-gray-900" href="https://twitter.com/ishydo" target="_blank">@ishydo</a>
          </span>
        </nav>
        <div class="flex items-center md:ml-12">
          <a href="{{ route('login') }}" class="text-base font-semibold  text-gray-500 hover:text-gray-900">
            Sign in
          </a>
          <a href="{{ route('register') }}" class="ml-8 inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700">
            Sign up
          </a>
        </div>
      </div>
    </div>
  
    <div x-show="isOpen"
        x-transition:enter="duration-200 ease-out"
        x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="duration-200 ease-out"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
        class="absolute top-0 inset-x-0 p-2 transition transform origin-top-right md:hidden">
      <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 bg-white divide-y-2 divide-gray-50">
        <div class="pt-5 pb-6 px-5">
          <div class="flex items-center justify-between">
            <div>
              <a href="#">
                <img class="h-8 w-auto sm:h-10" src="/snapgrey.png" alt="snapwin">
              </a>
            </div>
            <div class="-mr-2">
              <button x-on:click="isOpen = false"  type="button" class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
                <span class="sr-only">Close menu</span>
                <!-- Heroicon name: outline/x -->
                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
              </button>
            </div>
          </div>
          <div class="mt-6">
            <nav class="grid gap-6">
              <a href="#" class="-m-3 p-3 flex items-center rounded-lg hover:bg-gray-50">
                <div class="flex-shrink-0 flex items-center justify-center h-10 w-10 rounded-md bg-indigo-500 text-white">
                  <!-- Heroicon name: outline/chart-bar -->
                  <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                  </svg>
                </div>
                <div class="ml-4 text-base font-medium text-gray-900">
                  Analytics
                </div>
              </a>
  
              <a href="#" class="-m-3 p-3 flex items-center rounded-lg hover:bg-gray-50">
                <div class="flex-shrink-0 flex items-center justify-center h-10 w-10 rounded-md bg-indigo-500 text-white">
                  <!-- Heroicon name: outline/cursor-click -->
                  <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122" />
                  </svg>
                </div>
                <div class="ml-4 text-base font-medium text-gray-900">
                  Engagement
                </div>
              </a>
  
              <a href="#" class="-m-3 p-3 flex items-center rounded-lg hover:bg-gray-50">
                <div class="flex-shrink-0 flex items-center justify-center h-10 w-10 rounded-md bg-indigo-500 text-white">
                  <!-- Heroicon name: outline/shield-check -->
                  <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                  </svg>
                </div>
                <div class="ml-4 text-base font-medium text-gray-900">
                  Security
                </div>
              </a>
  
              <a href="#" class="-m-3 p-3 flex items-center rounded-lg hover:bg-gray-50">
                <div class="flex-shrink-0 flex items-center justify-center h-10 w-10 rounded-md bg-indigo-500 text-white">
                  <!-- Heroicon name: outline/view-grid -->
                  <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                  </svg>
                </div>
                <div class="ml-4 text-base font-medium text-gray-900">
                  Integrations
                </div>
              </a>
  
              <a href="#" class="-m-3 p-3 flex items-center rounded-lg hover:bg-gray-50">
                <div class="flex-shrink-0 flex items-center justify-center h-10 w-10 rounded-md bg-indigo-500 text-white">
                  <!-- Heroicon name: outline/refresh -->
                  <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                  </svg>
                </div>
                <div class="ml-4 text-base font-medium text-gray-900">
                  Automations
                </div>
              </a>
  
              <a href="#" class="-m-3 p-3 flex items-center rounded-lg hover:bg-gray-50">
                <div class="flex-shrink-0 flex items-center justify-center h-10 w-10 rounded-md bg-indigo-500 text-white">
                  <!-- Heroicon name: outline/document-report -->
                  <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                  </svg>
                </div>
                <div class="ml-4 text-base font-medium text-gray-900">
                  Reports
                </div>
              </a>
            </nav>
          </div>
        </div>
        <div class="py-6 px-5">
          <div class="grid grid-cols-2 gap-4">
            <a href="#" class="text-base font-medium text-gray-900 hover:text-gray-700">
              Pricing
            </a>
  
            <a href="#" class="text-base font-medium text-gray-900 hover:text-gray-700">
              Docs
            </a>
  
            <a href="#" class="text-base font-medium text-gray-900 hover:text-gray-700">
              Enterprise
            </a>
  
            <a href="#" class="text-base font-medium text-gray-900 hover:text-gray-700">
              Help Center
            </a>
  
            <a href="#" class="text-base font-medium text-gray-900 hover:text-gray-700">
              Guides
            </a>
  
            <a href="#" class="text-base font-medium text-gray-900 hover:text-gray-700">
              Events
            </a>
  
            <a href="#" class="text-base font-medium text-gray-900 hover:text-gray-700">
              Security
            </a>
          </div>
          <div class="mt-6">
            <a href="{{ route('register') }}" class="w-full flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700">
              Sign up
            </a>
            <p class="mt-6 text-center text-base font-medium text-gray-500">
              Existing customer?
              <a href="{{ route('login') }}" class="text-indigo-600 hover:text-indigo-500">
                Sign in
              </a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
  

    <main class="z-0" id="app">
        {{ $slot }}
    </main>

    <section id="bottom-navigation" class="md:hidden block fixed inset-x-0 bottom-0 z-10 bg-white shadow">
        <div id="tabs" class="flex justify-between">
            <a href="#" class="w-full focus:text-teal-500 hover:text-teal-500 justify-center inline-block text-center pt-2 pb-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" class="inline-block mb-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7" />
                </svg>
                <span class="tab tab-home block text-xs">Discover</span>
            </a>
            <a href="#" class="w-full focus:text-teal-500 hover:text-teal-500 justify-center inline-block text-center pt-2 pb-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" class="inline-block mb-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span class="tab tab-kategori block text-xs">Activity</span>
            </a>
            <a href="#" class="w-full focus:text-teal-500 hover:text-teal-500 justify-center inline-block text-center pt-2 pb-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" class="inline-block mb-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z" />
                </svg>
                <span class="tab tab-explore block text-xs">Scan</span>
            </a>
            <a href="#" class="w-full focus:text-teal-500 hover:text-teal-500 justify-center inline-block text-center pt-2 pb-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" class="inline-block mb-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
                <span class="tab tab-account block text-xs">Account</span>
            </a>
        </div>
    </section>

  <footer class="hidden md:block bg-white">
    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 md:flex md:items-center md:justify-between lg:px-8">
      <div class="flex justify-center space-x-6 md:order-2">  
        <a href="https://twitter.com/ishydo" target="_blank" class="text-gray-400 hover:text-gray-500">
          <span class="sr-only">Twitter</span>
          <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
            <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
          </svg>
        </a>
      </div>
      <div class="mt-8 md:mt-0 md:order-1">
        <p class="text-center text-base text-gray-400">
          &copy; YourLaravelApp, All rights reserved. Built by <a href="https://raitone.com">raitone.com</a>. Version {{ config('app.version') }}
        </p>
      </div>
    </div>
  </footer>
  

</x-layouts.master>