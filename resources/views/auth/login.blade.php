<x-modal id="login-modal" title="Masuk ke Pojok Tech" size="md">
    {{-- Google Login --}}
    <x-button variant="outline" class="flex w-full items-center justify-center gap-2 leading-7">
        @include('components.icons.google')
        <p class="text-sm">Sign in with Google</p>
    </x-button>

    {{-- Divider --}}
    <div class="my-4 flex items-center">
        <div class="flex-grow border-t border-default"></div>
        <span class="mx-3 text-xs text-black">atau</span>
        <div class="flex-grow border-t border-default"></div>
    </div>
     @if ($errors->any())
        <x-alert type="danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </x-alert>
    @endif
    
    <form action="/login" method="POST" class="space-y-6">
        @csrf
        <div class="grid grid-cols-1 gap-4">
            <div>
                <x-label for="login">Username atau Email</x-label>
                <x-input id="login" type="text" name="login" placeholder="name@email.com" />
            </div>

            <div>
                <x-label for="password">Password</x-label>
                <x-input id="password" type="password" name="password" placeholder="Minimal 8 karakter" />
            </div>
        </div>

        <div class="flex items-center justify-between text-sm">
            <label class="flex items-center gap-2">
                <input type="checkbox" name="remember" class="rounded border-gray-300 text-primary focus:ring-primary cursor-pointer">
                <span>Ingat saya</span>
            </label>

            <a href="/forgot-password" class="text-primary hover:underline">
                Lupa password?
            </a>
        </div>

        <x-button class="w-full py-2.5 text-sm font-medium">
            Masuk
        </x-button>
    </form>

    <p class="mt-6 text-center text-sm text-gray-600">
        Belum punya akun?

        <button type="button" class="font-medium text-primary hover:underline cursor-pointer" data-modal-hide="login-modal"
            data-modal-show="register-modal">
            Daftar
        </button>
    </p>
</x-modal>
