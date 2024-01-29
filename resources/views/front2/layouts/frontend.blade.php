<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="{{ asset('back/img/unu-kaltim.png') }}" type="image/x-icon"/>
        <title>Fiskep UNU Kaltim</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    </head>
    <body>

        @include('front2.includes.header')

        

        {{-- card start --}}
        <div class="container ">
            @yield('content')
        </div>
        {{-- card end --}}

        @include('front2.includes.footer')
        
        @include('front2.includes.js')
    </body>
</html>