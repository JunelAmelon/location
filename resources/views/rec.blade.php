<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Locate Cars - recherche</title>
    <link rel="stylesheet" href= {{asset('css/style.css')}}>
    <link rel="stylesheet" href= {{asset('css/allCars.css')}}>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <script src="https://kit.fontawesome.com/3010b1eaf1.js" crossorigin="anonymous"></script>
</head>
<body>
    
    <!-- header  -->
    <header>
        <!-- menu responsive -->
        
        <div class="menu_toggle">
            <span></span>
        </div>

        <div class="logo">
            <p><span>* </span>CARS<span> *</span></p>
        </div>
        <ul class="menu">
            <li><a href="/">Acceuil</a></li>
            <li><a href="{{route('allCars')}}">Véhicules</a></li>
        </ul>
        
        @if(!auth()->user())
        <a href="{{route('inscription')}}" class="login_btn">LOGIN</a>

        @elseif(auth()->user()->admin)
            <a href="{{ route('deconnexion') }}" class="login_btn">LOGOUT</a>
            <a href="{{ route('dashboard') }}" class="login_btn">Dashboard</a>
        @else
            <a href="{{ route('deconnexion') }}" class="login_btn">LOGOUT</a>
            <a href="{{ route('myLocations') }}" class="login_btn">Mes Locations</a>
        @endif

    </header>

    <div class="navigation">
        <ul>
            <li>
                <a href="{{route('allCars')}}">
                    <span class="title" style="margin-left: 1.5cm;">Nos Voitures</span>
                </a>
            </li>

            <li>
                <form action="{{ route('search') }}" method="get">
                    <input type="text" name="query" placeholder="Rechercher...">
                    <input type="submit" value="">
                </form>                
                               
            </li>

        </ul>
        
    </div>
    <div class="main">
        <div class="recherche">
            <form action="{{ route('search') }}" method="get">
                {{-- @csrf --}}
                <input type="text" name="query" placeholder="Rechercher...">
                <input type="submit" value="">
            </form>
        </div>
        
        <div class="cardBox">
            @if(isset($results) && count($results) > 0)
                @foreach($results as $result)
                    <div class="card">
                        <div class="image">
                            <img style="width: 250px;" src="{{ asset($result->image) }}" alt="Voiture_type">    
                        </div>
                        <p class="carName">{{ $result->marque }}</p>
                        <div class="infosCars">
                            <i class="fas fa-charging-station"><span> {{ $result->marque }}</span></i>
                            <i class="fas fa-hockey-puck"><span> {{ $result->modele }}</span></i>
                            <i class="fas fa-user-friends"><span> {{ $result->couleur }}</span></i>
                            <p style="margin-top: 0.5cm;"><strong style="font-size: 20px;">{{ $result->prix_jour }} FCFA</strong>/jour</p>
                            <div style="display: flex; margin-top: 0.5cm; float: right; justify-items: center; justify-contennnt: center;">
                                <a class="louer" href="{{route('formulaireLocation', ['id' => $result->id])}}">LOUER</a>
                            </div>
                        </div>
                    </div>
                @endforeach
                @else
                <div>
                    <p style="font-size: 25px; text-align: center; color: #ea1f33">AUCUN RÉSULTAT</p>
                </div>
            @endif
        </div>
    </div>

    <script src="{{asset('js/menu_pswd.js')}}"></script>
    </body>
</html>
