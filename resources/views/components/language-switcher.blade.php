<div class="flex justify-center font-sans">
    @foreach($available_locales as $locale_name => $available_locale)
        @if($available_locale === $current_locale)
            <span class="ml-1 mr-1 text-gray-400">{{ strtoupper($available_locale) }}</span>
        @else
            <a class="underline ml-1 mr-1" href="/language/{{ $available_locale }}">
                <span>{{ strtoupper($available_locale) }}</span>
            </a>
        @endif
    @endforeach
</div>