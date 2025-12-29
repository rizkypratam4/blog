@props([
    "title" => null,
    "actions" => null
])


<div {{ $attributes->merge([ "class" => "bg-neutral-primary-soft block max-w-sm p-6 border border-default rounded-base shadow-xs"]) }}>
    @if ($title)
        <h5 class="mb-3 text-2xl font-semibold tracking-tight text-heading leading-8">{{ $title }}</h5>
    @endif


    <div class="text-body text-sm leading-relaxed">
        {{ $slot }}
    </div>

    @if ($actions)
        <div class="mt-6 flex justify-end">
            {{ $actions }}
        </div>
    @endif
</div>
