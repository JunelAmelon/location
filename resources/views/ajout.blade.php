<!DOCTYPE html>
<html>
<head>
	<title>Ajouter</title>
	<link rel="stylesheet" type="text/css" href="{{asset('css/crud.css')}}">
	<link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0">
</head>
<body>
	<div class="container">
		<div class="contact-box">
			<div class="left">
                <div>
                    <a href="{{route('myCars')}}"><ion-icon name="arrow-back-circle-outline" style="font-size: 40px; float:left;"></ion-icon></a>
                </div>
                <div class="image">
                    <img src="images/img1.png" alt="Voiture_type">    
                </div>
            </div>
			<div class="right">
				<h2>Ajout de Véhicules</h2>
                <form action="{{ route('create_car') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="marque" class="field" placeholder="Marque" required >
                    <input type="text" name="modele" class="field" placeholder="Modèle" required >
                    <input type="text" name="couleur" class="field" placeholder="Couleur" required >
                    <input type="number" min="0" name="prix" class="field" placeholder="Prix par jour" required >
                    <input type="file" name="image" class="field" id="image" required >
                    <input class="btn" type="submit" value="Ajouter">
                </form>
				
			</div>
		</div>
	</div>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>