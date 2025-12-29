@props(['active' => false])

<a {{ $attributes }} aria-current="page"
    class="{{ $active ? 'text-blue-600' : 
    'text-black hover:bg-white/5 hover:text-blue-600' }} rounded-md px-3 py-2 text-sm font-medium 
    text-black hover:bg-white/5 hover:text-blue-600" aria-current="{{ $active ? 'page' : false }}">
    {{ $slot }}
</a>