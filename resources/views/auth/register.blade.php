<x-modal
    id="register-modal"
    title="Sign Up to PojokTech"
    size="md">
    <x-button variant="outline" class="w-full flex items-center justify-center gap-2 leading-7">
        @include('components.icons.google')
        <p class="text-sm">Sign up with Google</p>
    </x-button>

    <div class="flex items-center my-6">
        <div class="flex-grow border-t border-default"></div>
        <span class="mx-3 text-xs text-black">atau</span>
        <div class="flex-grow border-t border-default"></div>
    </div>

    <form action="/register" method="POST" class="space-y-6">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <x-label for="name">Nama Lengkap</x-label>
                <x-input id="name" name="name" placeholder="Contoh: Rizky Pratama"/>
                @error('name')
                    <p class="text-danger text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <x-label for="username">Username</x-label>
                <x-input id="username" name="username" placeholder="contoh: rizkprtama" />
                @error('username')
                    <p class="text-danger text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="md:col-span-2">
                <x-label for="email">Email</x-label>
                <x-input id="email" type="email" name="email" placeholder="name@email.com" />
                @error('email')
                    <p class="text-danger text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <x-label for="password">Password</x-label>
                <x-input id="password" type="password" name="password" placeholder="Minimal 8 karakter"/>
                @error('password')
                    <p class="text-danger text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <x-label for="password_confirmation">Konfirmasi Password</x-label>
                <x-input id="password_confirmation" type="password" name="password_confirmation" placeholder="Ulangi Password" />
            </div>
        </div>

        <x-button class="w-full py-2.5 text-sm font-medium">
            Buat Akun
        </x-button>
        
        <p class="text-xs text-center text-black">
            Dengan mendaftar, Anda menyetujui
            <a href="#" class="text-primary hover:underline">Syarat & Ketentuan</a>
            dan
            <a href="#" class="text-primary hover:underline">Kebijakan Privasi</a>.
        </p>
    </form>
</x-modal>
