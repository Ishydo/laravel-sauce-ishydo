<x-layouts.public>
  <x-slot name="title">YourLaravelApp - Features</x-slot>

  <!-- This example requires Tailwind CSS v2.0+ -->
  <div class="bg-white">
    <div class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:py-24 lg:px-8 lg:grid lg:grid-cols-3 lg:gap-x-8">
      <div>
        <h2 class="text-base font-semibold text-indigo-600 uppercase tracking-wide">Laravel sauce <a href="https://twitter.com/ishydo">@ishydo</a></h2>
        <p class="mt-2 text-3xl font-extrabold text-gray-900">{{ __('interface.welcome') }}</p>
        <p class="mt-4 text-lg text-gray-500">{{ __('interface.subline') }}</p>
      </div>
      <div class="mt-12 lg:mt-0 lg:col-span-2">
        <dl class="space-y-10 sm:space-y-0 sm:grid sm:grid-cols-2 sm:grid-rows-4 sm:grid-flow-col sm:gap-x-6 sm:gap-y-10 lg:gap-x-8">
          <div class="relative">
            <dt>
              <!-- Heroicon name: outline/check -->
              <svg class="absolute h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
              </svg>
              <p class="ml-9 text-lg leading-6 font-medium text-gray-900">Laravel {{ app()->version() }} // PHP8.1</p>
            </dt>
            <dd class="mt-2 ml-9 text-base text-gray-500">
              Some of the latest versions of PHP and Laravel for you to be up to date with the last stacks.
            </dd>
          </div>

          <div class="relative">
            <dt>
              <!-- Heroicon name: outline/check -->
              <svg class="absolute h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
              </svg>
              <p class="ml-9 text-lg leading-6 font-medium text-gray-900">Tailwind</p>
            </dt>
            <dd class="mt-2 ml-9 text-base text-gray-500">
              You can manage phone, email and chat conversations all from a single mailbox.
            </dd>
          </div>

          <div class="relative">
            <dt>
              <!-- Heroicon name: outline/check -->
              <svg class="absolute h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
              </svg>
              <p class="ml-9 text-lg leading-6 font-medium text-gray-900">Envoy setup</p>
            </dt>
            <dd class="mt-2 ml-9 text-base text-gray-500">
              You can manage phone, email and chat conversations all from a single mailbox.
            </dd>
          </div>

          <div class="relative">
            <dt>
              <!-- Heroicon name: outline/check -->
              <svg class="absolute h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
              </svg>
              <p class="ml-9 text-lg leading-6 font-medium text-gray-900">PWA ready</p>
            </dt>
            <dd class="mt-2 ml-9 text-base text-gray-500">
              You can manage phone, email and chat conversations all from a single mailbox.
            </dd>
          </div>

          <div class="relative">
            <dt>
              <!-- Heroicon name: outline/check -->
              <svg class="absolute h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
              </svg>
              <p class="ml-9 text-lg leading-6 font-medium text-gray-900">Gitlab CI</p>
            </dt>
            <dd class="mt-2 ml-9 text-base text-gray-500">
              Find what you need with advanced filters, bulk actions, and quick views.
            </dd>
          </div>

          <div class="relative">
            <dt>
              <!-- Heroicon name: outline/check -->
              <svg class="absolute h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
              </svg>
              <p class="ml-9 text-lg leading-6 font-medium text-gray-900">Laradock</p>
            </dt>
            <dd class="mt-2 ml-9 text-base text-gray-500">
              Find what you need with advanced filters, bulk actions, and quick views.
            </dd>
          </div>

          <div class="relative">
            <dt>
              <!-- Heroicon name: outline/check -->
              <svg class="absolute h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
              </svg>
              <p class="ml-9 text-lg leading-6 font-medium text-gray-900">ViteJS & VueJS</p>
            </dt>
            <dd class="mt-2 ml-9 text-base text-gray-500">
              Find what you need with advanced filters, bulk actions, and quick views.
            </dd>
          </div>

          <div class="relative">
            <dt>
              <!-- Heroicon name: outline/check -->
              <svg class="absolute h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
              </svg>
              <p class="ml-9 text-lg leading-6 font-medium text-gray-900">More coming soon</p>
            </dt>
            <dd class="mt-2 ml-9 text-base text-gray-500">
              This setup is still a draft and it will probably evolve soon.
            </dd>
          </div>
        </dl>
      </div>
    </div>
  </div>

</x-layouts.public>