<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/apps.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('js/bootstrap.min.js')}}">
    <link rel="stylesheet" href="{{asset('js/jquery.min.js')}}">
    <title>Document</title>
    @livewireStyles
</head>
<body>
    <div class="template">

        <div class="navigation col-lg-12 col-md-12 col-sm-12">
            <div class="logo">
                <p>Btrade</p>
            </div>
            <div class="left">
                <li class="active"><a href="">Finance</a></li>
                <li><a href="">Stocks</a></li>
                <li><a href="">Fabrications</a></li>
                <li><a href="">Suivis Clients</a></li>
           </div>
           <div class="right">
            <li>Deconnexion</li>
           </div>
        </div>
        <div class="main jumbotron p-0">
            @yield("value")
        </div>
    </div>
    @livewireScripts
</body>
</html>
