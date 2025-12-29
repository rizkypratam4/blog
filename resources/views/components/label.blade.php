@props(['for' => null])

<label for="{{ $for }}" 
    {{ $attributes->merge(["class" => "block mb-2.5 text-sm font-medium text-heading"]) }}>
    {{ $slot }}
</label>