<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <div class="absolute w-full mx-auto sm:px-8 lg:px-8" style="margin: auto">
                @if (session('success'))
                <div class="text-black px-6 py-4 border-0 rounded relative mb-4 bg-green-200 bg-opacity-50" id="success">
                    <span class="text-xl inline-block mr-5 align-middle">
                        <i class="fas fa-bell"></i>
                    </span>
                    <span class="inline-block align-middle mr-8">
                        <b class="capitalize">{{ session('success') }} </b> 
                    </span>
                    <button class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-4 mr-6 outline-none focus:outline-none">
                        <span onclick="document.querySelector('#success').style.display = 'none'">×</span>
                    </button>
                </div>
                @endif
                @if (session('error'))
                <div class="text-black px-6 py-4 border-0 rounded relative mb-4 bg-pink-200 bg-opacity-50" id="error">
                    <span class="text-xl inline-block mr-5 align-middle">
                        <i class="fas fa-bell"></i>
                    </span>
                    <span class="inline-block align-middle mr-8">
                        <b class="capitalize">{{ session('error') }} </b> 
                    </span>
                    <button class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-4 mr-6 outline-none focus:outline-none">
                        <span onclick="document.querySelector('#error').style.display = 'none'">×</span>
                    </button>
                </div>
                @endif
            </div>
            <!-- Page Heading -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>

            <!-- Page Content -->
            <main>
                {{ $slot }}
                {{-- <div id="app"></div> --}}
            </main>
        </div>
    </body>
</html>
