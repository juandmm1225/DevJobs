@php
    $classes = "underline text-sm text-gray-600 hover:text-gray-900"
@endphp

<div>
    <a {{ $attributes->merge(['class' => $classes])}} class="">
        {{$slot}}
        
    </a>
</div>