<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href= {{asset('css/allCars.css')}}>
    <link rel="stylesheet" href= {{asset('css/formulaireLoc.css')}}>

    <title>Formulaire</title>
     
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <script src="https://kit.fontawesome.com/3010b1eaf1.js" crossorigin="anonymous"></script>

</head>
<body>
    <div class="container">

        <header>Formulaire</header>
        <form action="{{ route('location') }}" method="POST">
            @csrf
            <div class="form first" style="margin-bottom: 0.5cm;">
                <div class="family">
                    <span class="title">Détails sur la voiture</span>
                    <div class="card">
                        <div class="image">
                            <img style="width: 250px;" src="{{asset($car->image)}}" alt="Voiture_type"> 
                        </div>
                        <p class="title" style="text-align: center; color: #ea1f33;"><b>{{$car->marque}}</b> <b>{{$car->modele}}</b> à <b>{{$car->prix_jour}} FCFA/jour</b></p>
                    </div>
                </div> 
            </div>

            <div class="form second">
                <input type="hidden" name="id" value="{{$car->id}}" >
                <input type="hidden" name="prixjour" id="prixjour" value="{{$car->prix_jour}}" >

                <input type="radio" id="infos_loc" checked><b> Informations de location </b>                
                <div class="details ID"  style="display: block; margin-bottom: 1cm;">
                    <div class="fields">

                        <div class="input-field">
                            <label>Nombre de jours</label>
                            <input type="number" min="0" value="0" name='nbre_jour' id="nbre_jour" placeholder="Nombre de Jours de location" required>
                            @if(session()->has('jour'))
                                <p style="text-align: center; font-size:10px; color: #ea1f33;">{{session()->get('jour')}}</p>
                            @endif
                        </div>

                        <div class="input-field">
                            <label>Prix Total</label>
                            <input type="text" name="prix_Tot" id="prix_Tot" value="0" readonly placeholder="Prix Total" required>
                        </div>

                        <div class="input-field">
                            <label>Date actuelle</label>
                            <input type="date" name="date_deb" id="startDate" readonly placeholder="Date actuelle" required>
                        </div>

                        <div class="input-field">
                            <label>Date d'expiration</label>
                            <input type="date" name="date_fin" id="endDate" readonly placeholder="Date d'expiration" required>
                        </div>
                    </div>
                    <div class="submit">
                        <input type="submit" class="loc" value="LOUER">
                        <a href="{{route('allCars')}}" class="loc" style="text-decoration: none; margin-left: 1.5cm;">Retour</a>
                    </div>

                </div> 
            </div>
        </form>
    </div>
    <script src="{{asset('js/location_change.js')}}"></script>
</body>
</html>
 