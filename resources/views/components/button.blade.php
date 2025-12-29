@props([
    'type' => 'submit',
    'variant' => 'primary',
])

@php
    $variants = [
        'primary' => 'text-white bg-blue-600 hover:bg-blue-700 focus:ring-brand-medium',
        'outline' => 'text-blue-600 bg-blue-100 hover:bg-blue-600 hover:text-white',
    ];
@endphp

<button
    type="{{ $type }}"
    {{ $attributes->merge([
        'class' => '
            box-border border border-transparent
            shadow-xs font-medium leading-4
            rounded-md text-xs px-3 py-1.5
            focus:outline-none focus:ring-2
            cursor-pointer
            ' . ($variants[$variant] ?? $variants['primary'])
    ]) }}
>
    {{ $slot }}
</button>
