<!DOCTYPE html>
<html lang="en">
    <head>
        <script>window.Laravel = { csrfToken: '{{ csrf_token() }}' }</script>
        <meta name="_token" content="{{ csrf_token() }}"/>
        <link rel="stylesheet" href="/css/app.css">
        <title>Laravel 5.3 with Vuejs</title>
    </head>
    <body>
        <div class="container">
            <contacts></contacts>
        </div>
        {{-- <script src="https://unpkg.com/vue/dist/vue.js"></script> --}}
        <script src="/js/spa.js"></script>
    </body>
</html>