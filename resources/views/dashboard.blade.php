<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord</title>
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

            <!-- ======================= Cards ================== -->
            <div class="cardBox">
                <div class="card">
                    <div>
                        <div class="numbers">{{$users}}</div>
                        <div class="cardName">Clients</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="people-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">{{$loc}}</div>
                        <div class="cardName">Locations</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="car-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">{{$sommeTotal}} FCFA</div>
                        <div class="cardName">Solde</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="cash-outline"></ion-icon>
                    </div>
                </div>
            </div>

            <!-- ================ Order Details List ================= -->
            <div class="clients">
                <div class="table">
                    <section class="table__header">
                        <h1>Clients</h1>
                        {{-- <div class="input-group">
                            <input type="search" placeholder="Search Data...">
                            <img src="images/search.png" alt="">
                        </div> --}}
                    </section>
                    <section class="table__body">
                        <table>
                            <thead>
                                <tr>
                                    <th> N° </th>
                                    <th> Nom & Prénom </th>
                                    <th> Voiture </th>
                                    <th> Prix </th>
                                    <th> Date de location </th>
                                    <th> Date de fin </th>
                                    <th> Statut </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($locations as $location)
                                    <tr>
                                        <td>{{ $location->id }}</td>
                                        <td>{{ $location->nomPrenom }}</td>
                                        <td><img src="{{ $location->image }}" alt="">{{ $location->marque }} {{ $location->modele }}</td>
                                        <td>{{ $location->cout_total }} F</td>
                                        <td>{{ $location->date_debut }}</td>
                                        <td>{{ $location->date_fin }}</td>
                                        @if( $location->statut == 0)
                                        <td>
                                            <p class="status cancelled">Loué</p>
                                        </td>
                                        @else
                                        <td>
                                            <p class="status delivered">Rendu</p>
                                        </td>
                                        @endif
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
