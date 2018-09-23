<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>HowToWin</title>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        
        <link rel="stylesheet" href="{{ secure_asset('css/style.css') }}">
    </head>
    <body>
        @include('layouts.navbar')
            @if (session('message'))
                <div class="alert alert-danger text-center">
                    <p><strong>{{ session('message') }}</strong></p>
                </div>   
            @endif
            @if (session('information'))
                <div class="alert alert-success text-center">
                    <p><strong>{{ session('information') }}</strong></p>
                </div>   
            @endif            
        <div class="container">

            <div>
                @yield('content')
            </div>
        </div>
    </body>
</html>