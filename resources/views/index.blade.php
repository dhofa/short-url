<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Short Links laravel 8</title>
     
        {{-- Add livewire styles --}}
        @livewireStyles

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
       

        <style>
            body {
                font-family: 'Nunito', sans-serif;
                background-color: #f2f6fc;
            }
        </style>
    </head>
    <body>
        @livewire('short-link')
        @livewireScripts
    </body>
</html>
