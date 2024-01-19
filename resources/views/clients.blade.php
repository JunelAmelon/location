<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ALL CLIENTS</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href={{asset('css/dashboard.css')}}>
</head>

<body>
    
    <!-- =============== Navigation ================ -->
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="{{route('dashboard')}}">
                        <span class="icon">
                            <ion-icon name="cloudy-outline"></ion-icon>
                        </span>
                        <span class="title">Tableau de bord</span>
                    </a>
                </li>

                <li>
                    <a href="{{route('acceuil')}}">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Acceuil</span>
                    </a>
                </li>

                <li>
                    <a href="{{route('clientele')}}">
                        <span class="icon">
                            <ion-icon name="people-outline"></ion-icon>
                        </span>
                        <span class="title">Clients</span>
                    </a>
                </li>

                <li>
                    <a href="{{route('myCars')}}">
                        <span class="icon">
                            <ion-icon name="car-outline"></ion-icon>
                        </span>
                        <span class="title">Véhicules</span>
                    </a>
                </li>

                <li>
                    <a href="{{route('locations')}}">
                        <span class="icon">
                            <ion-icon name="ellipsis-vertical-outline"></ion-icon>
                        </span>
                        <span class="title">Historique des locations</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('deconnexion') }}">
                        <span class="icon">
                            <ion-icon name="exit-outline"></ion-icon>
                        </span>
                        <span class="title">Déconnexion</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- ========================= Main ==================== -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>
            </div>
            <!-- ================ Order Details List ================= -->
            <div class="clients">
                <div class="table">
                    <section class="table__header">
                        <h1>Clients</h1>
                    </section>
                    <section class="table__body">
                        <table>
                            <thead>
                                <tr>
                                    <th> N° </th>
                                    <th> Nom & Prénom </th>
                                    <th> Email </th>
                                    <th> Adresse </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($clients as $client)
                                    <tr>
                                        <td> {{ $client->id }} </td>
                                        <td> {{$client->nomPrenom}}</td>
                                        <td><span><ion-icon name="mail-outline" style="color:blue;"></ion-icon></span>{{$client->email}} </td>
                                        <td><span><ion-icon name="location-outline" style="color:blue;"></ion-icon></span> {{$client->adresse}} </td>
                                    </tr>
                                @endforeach
                                
                            </tbody>
                        </table>
                    </section>
                </div>
            </div>
        </div>
    </div>

    <!-- =========== Scripts =========  -->

    <script>
        // add hovered class to selected list item
        let list = document.querySelectorAll(".navigation li");

        function activeLink() {
        list.forEach((item) => {
            item.classList.remove("hovered");
        });
        this.classList.add("hovered");
        }

        list.forEach((item) => item.addEventListener("mouseover", activeLink));

        // Menu Toggle
        let toggle = document.querySelector(".toggle");
        let navigation = document.querySelector(".navigation");
        let main = document.querySelector(".main");

        toggle.onclick = function () {
        navigation.classList.toggle("active");
        main.classList.toggle("active");
        };
    </script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>