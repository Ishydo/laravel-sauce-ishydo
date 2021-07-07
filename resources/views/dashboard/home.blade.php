<x-layouts.dashboard 
    :currentRoute="Route::currentRouteName()"
    :pageName="$company->name"
>
    <x-slot name="title">Dashboard - {{ $company->name }}</x-slot>

    <div>


  
<!-- This example requires Tailwind CSS v2.0+ -->
<div>
  
    <dl class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">
      
        <div class="relative bg-white pt-5 px-4 pb-12 sm:pt-6 sm:px-6 shadow rounded-lg overflow-hidden">
            <dt>
              <div class="absolute bg-indigo-500 rounded-md p-3">
                <!-- Heroicon name: outline/users -->
                <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z" />
                </svg>
              </div>
              <p class="ml-16 text-sm font-medium text-gray-500 truncate">Active QRCodes</p>
            </dt>
            <dd class="ml-16 pb-6 flex items-baseline sm:pb-7">
              <p class="text-2xl font-semibold text-gray-900">
                {{ $company->codes->count() }}
              </p>
              <div class="absolute bottom-0 inset-x-0 bg-gray-50 px-4 py-4 sm:px-6">
                <div class="text-sm">
                  <a href="{{ route('codes.index') }}" class="font-medium text-indigo-600 hover:text-indigo-500"> View all<span class="sr-only"> Total Subscribers stats</span></a>
                </div>
              </div>
            </dd>
          </div>

          <div class="relative bg-white pt-5 px-4 pb-12 sm:pt-6 sm:px-6 shadow rounded-lg overflow-hidden">
            <dt>
              <div class="absolute bg-indigo-500 rounded-md p-3">
                <!-- Heroicon name: outline/users -->
                <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z" />
                </svg>
              </div>
              <p class="ml-16 text-sm font-medium text-gray-500 truncate">Total scans</p>
            </dt>
            <dd class="ml-16 pb-6 flex items-baseline sm:pb-7">
              <p class="text-2xl font-semibold text-gray-900">
                {{ $company->scans->count() }}
              </p>
              <div class="absolute bottom-0 inset-x-0 bg-gray-50 px-4 py-4 sm:px-6">
                <div class="text-sm">
                  <a href="{{ route('scans.index') }}" class="font-medium text-indigo-600 hover:text-indigo-500"> View all<span class="sr-only"> Total Subscribers stats</span></a>
                </div>
              </div>
            </dd>
          </div>

          <div class="relative bg-white pt-5 px-4 pb-12 sm:pt-6 sm:px-6 shadow rounded-lg overflow-hidden">
            <dt>
              <div class="absolute bg-indigo-500 rounded-md p-3">
                <!-- Heroicon name: outline/users -->
                <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                </svg>
              </div>
              <p class="ml-16 text-sm font-medium text-gray-500 truncate">Total wins</p>
            </dt>
            <dd class="ml-16 pb-6 flex items-baseline sm:pb-7">
              <p class="text-2xl font-semibold text-gray-900">
                {{ $company->wins->count() }}
              </p>
              <div class="absolute bottom-0 inset-x-0 bg-gray-50 px-4 py-4 sm:px-6">
                <div class="text-sm">
                  <a href="{{ route('dashboard.manage') }}" class="font-medium text-indigo-600 hover:text-indigo-500"> View all<span class="sr-only"> Total Subscribers stats</span></a>
                </div>
              </div>
            </dd>
          </div>
  
  
    </dl>
  </div>
  


        @forelse ($codes as $code)
            <x-dashboard.q-r-code-detail :code="$code" />
        @empty

        <div>
            <div class="max-w-2xl mx-auto text-center py-16 px-4 sm:py-20 sm:px-6 lg:px-8">
                <h2 class="text-3xl font-extrabold sm:text-4xl">
                <span class="block">No QRCodes yet.</span>
                <span class="block">Start creating right now.</span>
                </h2>
                <p class="mt-4 text-lg leading-6 text-indigo-500">Creating your first snapwin qrcodes takes just a minute. Start now !</p>
                <a href="{{ route('codes.create') }}" class="mt-8 w-full inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-800 hover:bg-indigo-900 sm:w-auto">
                Create a snapwin QRCode
                </a>
            </div>
        </div>
    </div>

        @endforelse
</x-app-layout>
