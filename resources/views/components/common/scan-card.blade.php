<div x-data="{ detailOpen: false}">
  
  <div class="z-0 relative rounded-lg border border-gray-300 bg-white px-3 py-2 shadow-sm flex items-center space-x-3 my-2">
    <div class="flex-shrink-0">
      @if ($scan->isWin())
        <div class="h-10 w-10 rounded-full bg-green-500 text-white flex justify-center items-center">
          <small>Win</small>
        </div>
      @else
        <div class="h-10 w-10 rounded-full bg-red-400 text-white flex justify-center items-center">
          <small>Lose</small>
        </div>
      @endif
    </div>
    <div class="flex-1 min-w-0">
      <a x-on:click="detailOpen = !detailOpen" class="focus:outline-none">
        <span class="absolute inset-0" aria-hidden="true"></span>
        <p class="text-sm font-medium text-gray-900">
          Scanned {{ $scan->created_at->diffForHumans() }}
        </p>
        <p>
          <span class="flex-shrink-0 inline-flex items-center px-2 py-0.5 text-gray-800 text-xs font-medium bg-gray-200 rounded-full">
            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z" />
            </svg>
            {{ $scan->code->name }}
          </span>
          <span class="flex-shrink-0 inline-flex items-center px-2 py-0.5 text-gray-800 text-xs font-medium bg-gray-200 rounded-full">
            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
            </svg>
            {{ $scan->created_at->diffForHumans() }}
          </span>
          <span class="flex-shrink-0 inline-flex items-center px-2 py-0.5 text-gray-800 text-xs font-medium bg-gray-200 rounded-full">
            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14" />
            </svg>
            {{ $scan->state->code }}
          </span>
        </p>
      </a>
    </div>
  </div>



@if($hasDetails)
  <div x-show="detailOpen" class="z-50 fixed inset-0 overflow-hidden" aria-labelledby="slide-over-title" role="dialog" aria-modal="true">
    <div class="absolute inset-0 overflow-hidden">

      <div x-show="detailOpen" 
        x-on:click="detailOpen = false" 
        x-transition:enter="ease-in-out duration-500"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="ease-in-out duration-500"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="absolute inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

      <div class="fixed inset-y-0 right-0 pl-10 max-w-full flex">

        <div x-show="detailOpen" 
            x-transition:enter="transform transition ease-in-out duration-500 sm:duration-700"
            x-transition:enter-start="translate-x-full"
            x-transition:enter-end="translate-x-0"
            x-transition:leave="transform transition ease-in-out duration-500 sm:duration-700"
            x-transition:leave-start="translate-x-0"
            x-transition:leave-end="translate-x-full"
            class="w-screen max-w-md">

          <div class="h-full flex flex-col py-6 bg-white shadow-xl overflow-y-scroll">
            <div class="px-4 sm:px-6">
              <div class="flex items-start justify-between">
                <h2 class="text-lg font-medium text-gray-900" id="slide-over-title">
                  Scan details
                </h2>
                <div class="ml-3 h-7 flex items-center">
                  <button x-on:click="detailOpen = false" class="bg-white rounded-md text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    <span class="sr-only">Close panel</span>
                    <!-- Heroicon name: outline/x -->
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                  </button>
                </div>
              </div>
            </div>
            <div class="mt-6 relative flex-1 px-4 sm:px-6">
              <!-- Replace with your content -->
              <div class="absolute inset-0 px-4 sm:px-6">

                <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
                  <div class="sm:col-span-2">
                    <dt class="text-sm font-medium text-gray-500">
                      QRCode
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900">
                      {{ $scan->code->name }}
                    </dd>
                  </div>
                  <div class="sm:col-span-2">
                    <dt class="text-sm font-medium text-gray-500">
                      Reason
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900">
                      {{ $scan->state->description }} ({{ $scan->state->code }})
                    </dd>
                  </div>
                  <div class="sm:col-span-2">
                    <dt class="text-sm font-medium text-gray-500">
                      Scan date
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900">
                      <strong>
                        {{ $scan->created_at->diffForHumans() }}
                      </strong>
                      ({{ $scan->created_at }})
                    </dd>
                  </div>
                  <div class="sm:col-span-2">
                    <dt class="text-sm font-medium text-gray-500">
                      IP Address
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900">
                        {{ $scan->ip }}
                    </dd>
                  </div>
                </dl>
              </div>
          
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endif





</div>
