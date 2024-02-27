<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans">









    <div class="flex h-screen overflow-hidden">


        <div class="relative flex flex-1 flex-col overflow-y-auto overflow-x-hidden">
            <!-- Text Header -->
            <header class="w-full  mx-auto">
                <!-- Topic Nav -->
                @include('layouts.navigation')
            </header>


            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </div>

    <!-- Page Content
    <div class="container bg-blue-900 mx-auto py-6">
        {{ $slot }}
    </div> -->

    <footer class="w-full border-t bg-white pb-12">
        <div class="w-full container mx-auto flex flex-col items-center">
            <div class="uppercase py-6">&copy; myblog.com</div>
        </div>
    </footer>
</body>

</html>