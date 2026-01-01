<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body>
    <div class="min-h-full">
        @if (Route::is(['verification.notice', 'password.request', 'password.reset']))
            <main>
                <div class="min-h-screen flex items-center justify-center px-4 py-6 bg-white">
                    {{ $slot }}
                </div>
            </main>
        @else
            <x-navbar></x-navbar>
            @if (Route::is('posts'))
                <x-header>{{ $title ?? 'Blog' }}</x-header>
            @endif
            <main>
                <div class="mx-auto px-4 py-6 sm:px-6 lg:px-10 bg-white">
                    {{ $slot }}
                </div>
            </main>
        @endif
    </div>
    @include('sweetalert2::index')
    @include('auth.register')
    @include('auth.login')
    <script src="js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@4.0.1/dist/flowbite.min.js"></script>
</body>

</html>
