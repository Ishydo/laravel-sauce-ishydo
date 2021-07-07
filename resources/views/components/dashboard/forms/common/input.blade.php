@if ($label)
    <label for="{{ $name }}" class="block text-sm font-bold text-gray-700 mb-2 sm:mt-px sm:pt-2">{{ $label }}</label>
@endif
<input  type="{{ $type }}" 
        name="{{ $name }}" 
        {{ $attributes->merge(['class' => 'flex-1 block w-full focus:ring-indigo-500 focus:border-indigo-500 min-w-0 sm:text-sm border-gray-300']) }}
        @if ($value) value="{{ $value }}" @endif >    
