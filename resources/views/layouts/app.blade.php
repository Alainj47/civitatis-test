<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Civitatis</title>
    <meta name="author" content="@yield('meta_author', 'Civitatis')">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"/>
    <link type="text/css"  href="{{asset('css/main.css')}}" id="main" rel="stylesheet"/>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.js" integrity="sha256-DrT5NfxfbHvMHux31Lkhxg42LY6of8TaYyK50jnxRnM="  crossorigin="anonymous"></script>
    <link type="text/css"  href="{{asset('css/tabulator_bootstrap.min.css')}}" id="estiloGrilla" rel="stylesheet"/>
    <link type="text/css" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.2/dist/sweetalert2.min.css"rel="stylesheet"/>
</head>
<body class="">
    <div class="app-body">
        <main class="main">   
            <div class="text-center">
                <img src="{{asset('img/civitatis.png')}}" width="150px" alt="">                        
            </div>         
            <div class="col-xs-12">
                <div class="container">                    
                        @yield('content')                    
                </div>
            </div>
        </main>
    </div>
    
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>   
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.2/dist/sweetalert2.all.js"></script> 
    <script src="../../js/tabulador.js"></script>
    @yield('scripts')
</body>
</html>
