<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Locate Cars</title>

    <link rel="stylesheet" href= "{{asset('css/style.css')}}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
            <p><span></span>CARS<span></span></p>
        </div>
        <ul class="menu">
            <li><a href="/">Acceuil</a></li>
            <li><a href="{{route('allCars')}}">Véhicules</a></li>
            <li><a href="#services">A propos</a></li>
            <li><a href="#contact">Contact</a></li>
        </ul>
        {{-- @if(session()->has('user_id'))
            <a href="">{{ session()->get('email') }}</a>
            @else --}}
            @if(!auth()->user())
                <a href="{{route('inscription')}}" class="login_btn">LOGIN</a>

            @elseif(auth()->user()->admin)
                <a href="{{ route('myLocations') }}" class="login_btn">Mes Locations</a>
                <a href="{{ route('dashboard') }}" class="login_btn">Dashboard</a>
                <a href="{{ route('deconnexion') }}" class="login_btn">LOGOUT</a>

            @else
                <a href="{{ route('deconnexion') }}" class="login_btn">LOGOUT</a>
                <a href="{{ route('myLocations') }}" class="login_btn">Mes Locations</a>
            @endif

        {{-- @endif --}}
        
        {{-- <button class="login_btn" id="login_btn">LOGIN</button> --}}
    </header>
    <!-- section Acceuil -->
     
    <section id="home">
        <div class="left">
            <h1>Louer <span>Vos Voitures</span> Chez nous à des prix imbattables</h1>
            <p>La location de véhicules est une solution pratique 
                et abordable pour les voyageurs, les familles en vacances, 
                les voyageurs d'affaires et les personnes ayant besoin d'un véhicule pour une courte période. 
                En offrant une gamme de véhicules de qualité à des tarifs compétitifs, nous sommes en mesure de répondre à une variété de besoins en matière de déplacements.</p>
            <a href="{{route('allCars')}}">LOUER MAINTENANT</a>
        </div>
        <div class="right">
            <img src="images/img1.png">
        </div>
    </section>




    <!-- section vehicule -->

    <section id="cars">
        <h1 class="section_title" style="margin-top: 5cm;">Nos vehicules</h1>
        <div class="images">
            <ul>
                @foreach($cars as $car)
                    <li class="car" >
                        <div>
                            <img src="{{ asset($car->image) }}" alt="">
                        </div>
                        <span>{{$car->marque}}</span>
                        <span class="prix">{{$car->prix_jour}} FCFA</span>
                            <a href="{{route('formulaireLocation', ['id'=> $car->id])}}">LOUER MAINTENANT</a>
                            {{-- <a href="{{route('formulaireLocation')}}">LOUER MAINTENANT</a> --}}
                    </li>
                @endforeach
            </ul>
            <div class="voirplus">
                <a href="{{route('allCars')}}">VOIR +</a>
            </div>
            
        </div>
    </section>

    <!-- section services -->

    <section id="services">
        <h1 class="section_title">A propos de nous</h1>
        <div class="list_services">
            <div class="service">
                <i class="fa-solid fa-car"></i>
                <h3>Notre flotte de véhicules </h3>
                <p>Notre société de location de véhicules propose une large gamme de véhicules pour répondre à 
                    tous vos besoins en matière de déplacement. 
                    Nous avons des voitures compactes et économiques pour les trajets courts 
                    en ville, des SUV pour les voyages en famille ou pour les déplacements 
                    sur des terrains plus accidentés, et des fourgonnettes pour les groupes 
                    plus importants ou pour le transport de marchandises.
                </p>
            </div>
            <div class="service">
                <i class="fa-solid fa-tags"></i>
                <h3>Tarifs et réservations</h3>
                <p>Nous offrons des tarifs compétitifs pour nos véhicules de location, et nous avons une variété d'options de réservation pour répondre à vos besoins. Vous pouvez réserver en ligne, par téléphone ou en personne dans l'un de nos nombreux emplacements. </p>
            </div>
            <div class="service">
                <i class="fa-solid fa-car"></i>
                <h3>Location</h3>
                <p>La location de véhicules est une option pratique et abordable pour ceux 
                    qui ont besoin d'un véhicule pour une courte période. 
                    Avec notre flotte de véhicules de qualité, nos tarifs compétitifs et nos 
                    politiques de location simples et claires, nous sommes là pour vous aider 
                    à vous déplacer en toute tranquillité. Contactez-nous aujourd'hui pour 
                    réserver votre prochain véhicule de location.
                </p>
            </div>
        </div>
    </section>
    

    <!-- section contact -->

    <section id="contact">
        <h1 class="section_title">Contactez-nous</h1>
        <div class="localisation_contact_div">
            <div class="localisation">
                <h3>Notre Adresse (Abomey - Calavi, BÉNIN)</h3>

                <div class="carousel">

                    <ul class="carousel-list">
                      <li>
                        <img src="images/ToyotaCfao1.png" alt="Vehicle 1">
                      </li>
                      <li>
                        <img src="images/Toyotacfao2.png" alt="Vehicle 2">
                      </li>
                      <li>
                        <img src="images/volkswagen.png" alt="Vehicle 3">
                      </li>
                      <li>
                        <img src="images/tesla.jpg" alt="Vehicle 4">
                      </li>
                    </ul>

                    <button class="carousel-prev"><i class="fas fa-chevron-left"></i></button>
                    <button class="carousel-next"><i class="fas fa-chevron-right"></i></button>
                </div>
                  
            </div>

            <div class="form_contact">
                <h3>Contactez-nous</h3>
                {{-- <form action="#">
                    <input type="text"placeholder="Nom">
                    <input type="email"placeholder="Adresse Mail">
                    <input type="text"placeholder="Objet">
                    <textarea name="" id="" cols="30" rows="10" placeholder="Message"></textarea>
                    <input type="submit" value="Envoyer">
                </form> --}}
                <div>
                    <p style="font-size: 20px; color:crimson;">Téléphone :<br> +229 955 311 36 </p><br>
                    <p style="font-size: 20px; color:crimson;">E-mail :<br> stephanegnacadja@gmail.com</p><br>
                </div>
            </div>
        </div>
    </section>
 

    <footer>
        <p style="text-align: center">Copyright 2023 </p>
    </footer>

    <script>
        //menu responsive code JS

        var menu_toggle = document.querySelector('.menu_toggle');
        var menu = document.querySelector('.menu');
        var menu_toggle_span = document.querySelector('.menu_toggle span');

        menu_toggle.onclick = function(){
            menu_toggle.classList.toggle('active');
            menu_toggle_span.classList.toggle('active');
            menu.classList.toggle('responsive') ;
        }

        $(document).ready(function() {
        var $carouselList = $('.carousel-list');
        var $carouselPrev = $('.carousel-prev');
        var $carouselNext = $('.carousel-next');
        
        // Ajout d'une fonction pour passer à la prochaine image
        function nextImage() {
            $carouselList.animate({
            left: '-=33.33%'
            }, 500, function() {
            $carouselList.children().first().appendTo($carouselList);
            $carouselList.css('left', '');
            });
        }
        
        // Ajout d'un interval pour déclencher la fonction nextImage toutes les 2 secondes
        var carouselInterval = setInterval(nextImage, 2000);

        $carouselNext.on('click', function() {
            clearInterval(carouselInterval); // Efface l'intervalle lorsqu'on clique sur le bouton Next
            nextImage();
            carouselInterval = setInterval(nextImage, 2000); // Réinitialise l'intervalle
        });

        $carouselPrev.on('click', function() {
            clearInterval(carouselInterval); // Efface l'intervalle lorsqu'on clique sur le bouton Prev
            $carouselList.animate({
            left: '+=33.33%'
            }, 500, function() {
            $carouselList.children().last().prependTo($carouselList);
            $carouselList.css('left', '');
            });
            carouselInterval = setInterval(nextImage, 2000); // Réinitialise l'intervalle
        });
        });


    </script>
    </body>
</html>
