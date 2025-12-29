@props([
    'type' => 'text',
    'id' => null,
    'name' => null,
    'value' => '',
])

<input type="{{ $type }}" id="{{ $id ?? $name }}" name="{{ $name }}" value="{{ old($name, $value) }}"
    {{ $attributes->merge([
        'class' => "bg-neutral-secondary-medium border border-default-medium 
                    text-heading text-sm rounded-md focus:ring-brand focus:border-brand block w-full 
                    px-3 py-2.5 shadow-xs placeholder:text-body",
    ]) }}
required />
