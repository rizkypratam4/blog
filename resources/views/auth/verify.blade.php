<x-layout>
    @if (session('success'))
            <x-alert>{{ session('success') }}</x-alert>
    @endif
    <x-card>
        <div class="flex justify-center mb-4">
            @include('components.icons.email-security')
        </div>
        Kami telah mengirimkan email verifikasi
        @if(auth()->check())
            <span class="font-medium">{{ auth()->user()->email }}</span>
        @endif
        
        Silahkan klik link di email tersebut untuk melanjutkan.

        <x-slot:actions>
            <form action="{{ route('verification.resend') }}" method="post">
                @csrf
                <x-button type="submit">
                    Kirim ulang email
                </x-button>
            </form>
        </x-slot:actions>
    </x-card>
</x-layout>
