<x-layout>
    @if (session('status'))
        <x-alert>{{ session("status") }}</x-alert>
    @endif

    @if ($errors->any())
        <x-alert type="danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </x-alert>
    @endif

    <x-card title="Set new password">
        <p class="mb-4 text-center">Must be at least 8 character</p>
        <form action="/reset-password" method="POST" class="mb-4">
            @csrf
            <x-input type='hidden' name="token" value="{{ request('token') }}"/>
            <x-input type='hidden' name="email" value="{{ request('email') }}"/>
            <x-label>Password</x-label>
            <x-input type='password' name="password"/>
            <x-label>Confirm password</x-label>
            <x-input type='password' name="password_confirmation"/>
            <x-button class="mt-4">Reset password</x-button>
        </form>
    </x-card>
</x-layout>
