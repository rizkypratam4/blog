@props([
    'type' => 'info',
    'dismissible' => true,
])

@php
    $variants = [
        'info' => [
            'wrapper' => 'text-fg-info-strong bg-info-soft',
            'focus' => 'focus:ring-info-medium hover:bg-info-medium',
        ],
        'success' => [
            'wrapper' => 'text-fg-success-strong bg-success-soft',
            'focus' => 'focus:ring-success-medium hover:bg-success-medium',
        ],
        'warning' => [
            'wrapper' => 'text-fg-warning-strong bg-warning-soft',
            'focus' => 'focus:ring-warning-medium hover:bg-warning-medium',
        ],
        'danger' => [
            'wrapper' => 'text-fg-danger-strong bg-danger-soft',
            'focus' => 'focus:ring-danger-medium hover:bg-danger-medium',
        ],
    ];
    $variant = $variants[$type];
@endphp

<div {{ $attributes->merge(['class' => "flex sm:items-center p-4 mb-4 text-sm {$variant['wrapper']}"]) }} role="alert">
    <!-- Icon -->
    <svg class="w-4 h-4 shrink-0 mt-0.5 md:mt-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
        height="24" fill="none" viewBox="0 0 24 24">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M10 11h2v5m-2 0h4m-2.592-8.5h.01M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
    </svg>

    <!-- Content -->
    <div class="ms-2 leading-relaxed">
        {{ $slot }}
    </div>

    @if ($dismissible)
        <button type="button"
            class="ms-auto -mx-1.5 -my-1.5 rounded p-1.5  inline-flex items-center justify-center h-8 w-8 focus:ring-2 {{ $variant['focus'] }}"
            data-dismiss-target="#alert-3" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M6 18 17.94 6M18 18 6.06 6" />
            </svg>
        </button>
    @endif
</div>
