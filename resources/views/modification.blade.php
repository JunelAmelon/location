<!DOCTYPE html>
<html>
<head>
	<title>Modification Cars</title>
	<link rel="stylesheet" type="text/css" href="{{asset('css/crud.css')}}">
	<link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <script src="https://kit.fontawesome.com/3010b1eaf1.js" crossorigin="anonymous"></script>
	<meta  value="{{ $car->viewport }}" name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0">
</head>
<body>
	<div class="container">
		<div class="contact-box">
			<div class="left">
                <div>
                    <a href="{{route('myCars')}}"><ion-icon name="arrow-back-circle-outline" style="font-size: 40px; float:left;"></ion-icon></a>
                </div>
                <div class="image">
                    <img src="{{asset($car->image)}}" alt="Voiture_type">    
                </div>
                <p><b>{{$car->modele}}</b></p><br>
                    <div class="infosCars">
                        <i class="fas fa-charging-station"><span> {{$car->marque}}</span></i>
                        <i class="fas fa-hockey-puck"><span> {{$car->modele}}</span></i>
                        <i class="fas fa-user-friends"><span> {{$car->couleur}}</span></i>
                        <p style="margin-top: 0.5cm;"><strong style="font-size: 20px;">{{$car->prix_jour}}</strong>/jour</p>
                    </div>
            </div>
			<div class="right">
				<h2>Modifications</h2>
                <form action="{{route('update_car')}}" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="{{$car->id}}" >
                    @csrf
                    <input type="text"  value="{{ $car->marque }}" name="marque" class="field" placeholder="Marque" required>
                    <input type="text"  value="{{ $car->modele }}" name="modele" class="field" placeholder="Modèle" required>
                    <input type="text"  value="{{ $car->couleur }}" name="couleur" class="field" placeholder="Couleur" required>
                    <input type="number" min="1"  value="{{ $car->prix_jour }}" name="prix" class="field" placeholder="Prix par jour" required>
                    <input type="file" name="image" class="field" id="image">
                    <input class="btn" type="submit" value="Modifier">
                </form>
				
			</div>
		</div>
	</div>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>