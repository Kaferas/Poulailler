<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/apps.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="{{asset("img/icon.png")}}" sizes="16x16">
    <title>PMIC APP</title>
    @livewireStyles
</head>
<body>
    <div class="template">

        <div class="navigation col-lg-12 col-md-12 col-sm-12">
            <div class="logo">
                <img src="{{asset('img/icon.png')}}" alt="" srcset="" height="50px">
                <span class="text text-light">PMIC</span>
            </div>
            <div class="left">
                <li @if($now=="finance") class="active" @endif><a href="{{route('acceuil')}}">Finance</a></li>
                <li  @if($now=="stocks") class="active" @endif><a href="{{route('stocks')}}">Stocks</a></li>
                <li  @if($now=="fabrication") class="active" @endif><a href="{{route('fabrication')}}">Fabrications</a></li>
                <li @if($now=="suivis") class="active" @endif ><a href="{{route('suivis')}}">Suivis Clients</a></li>
                <li @if($now=="suivis") class="active" @endif ><a href="{{route('suivis')}}">Utilisateur</a></li>
           </div>
           <div class="right">
            <li>Deconnexion</li>
           </div>
        </div>
        <div class="main jumbotron p-0">
            @yield("value")
        </div>
    </div>
    <script src="{{asset('js/jquery.min.js')}}"></script>
     @livewireScripts
</body>
</html>
