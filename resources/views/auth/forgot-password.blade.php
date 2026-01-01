<x-layout>
    @if (session('status'))
        <x-alert>{{ session("status") }}</x-alert>
    @endif
    <x-card title="Lupa password?">
        <p class="mb-4 text-center">No.worries, we'll send you reset intructions</p>
        <form action="forgot-password" method="POST" class="mb-4">
            @csrf
            <x-label>Email</x-label>
            <x-input type='email' name="email" value="{{ old('email') }}"></x-input>
            @error('email')
                <x-alert type="danger">{{ $message }}</x-alert>
            @enderror
            <x-button class="mt-3">Reset password</x-button>
        </form>
    </x-card>
</x-layout>
