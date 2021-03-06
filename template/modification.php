<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <title>Inscription</title>
  </head>
  <body>
   <div class="container">
    <h1>Inscription</h1>
    
    
    <form method="POST">
  <div class="form-group">
    <label for="responsable">Nom du responsable</label>
    <input type="text" name="name" value="<?php echo $troupe->nom_responsable; ?>" class="form-control" id="responsable">
  </div>

  <div class="row">
  <div class="form-group col-md-6">
    <label for="email">Adresse e-mail</label>
    <input type="email" name="email" value="<?php echo $troupe->email; ?>"class="form-control" id="email" placeholder="name@example.com">
  </div>
     
   <div class="form-group col-md-6">
    <label for="telephone">Téléphone</label>
    <input type="text" name="phone" value="<?php echo $troupe->telephone; ?>"class="form-control" id="telephone">
  </div></div>
  <!--<div class="form-group">
    <label for="nombre-eleves">Nombre d'élèves</label>
    <input type="number" class="form-control" id="nombre-eleves">
  </div>-->     
      
    <div class="row">  
    <div class="form-group col-md-6">
    <label for="ville">Ville</label>
    <input type="text" name="city" value="<?php echo $troupe->ville; ?>" class="form-control" id="ville">
  </div>
  
      <div class="form-group col-md-6">
    <label for="pays">Pays</label>
    <input type="text" name="country" value="<?php echo $troupe->pays; ?>" class="form-control" id="pays">
        </div></div>
        
        
    <div class="row">  
    <div class="form-group col-md-6">
    <label for="jour-arrivee">Jour et heure d'arrivée</label>
    <input type="text" name="arrival_day" value="<?php echo $troupe->date_arrivee; ?>" class="form-control" id="jour-arrivee">
  </div>
  
      <div class="form-group col-md-6">
    <label for="lieu-arrivee">Lieu d'arrivée</label>
    <input type="text" name="arrival_point" value="<?php echo $troupe->lieu_arrivee; ?>" class="form-control" id="lieu-arrivee">
        </div></div> 
        
        <div class="row">  
    <div class="form-group col-md-6">
    <label for="jour-depart">Jour et heure de départ</label>
    <input type="text" name="departure_day" value="<?php echo $troupe->date_depart; ?>" class="form-control" id="jour-depart">
  </div>
  
      <div class="form-group col-md-6">
    <label for="lieu-depart">Lieu de départ</label>
    <input type="text" name="departure_point" value="<?php echo $troupe->lieu_depart; ?>" class="form-control" id="lieu-depart">
        </div></div> 
        
                          
          <div class="form-group">
    <label for="titre">Titre de la pièce</label>
    <input type="text" name="title" value="<?php echo $troupe->titre_spectacle; ?>" class="form-control" id="titre">
  </div>   

   <div class="form-group">
    <label for="resume">Résumé</label>
    <textarea class="form-control" name="synopsis" id="resume" rows="3"><?php echo $troupe->resume; ?></textarea>
  </div>                                                   
  
  <button type="submit" class="btn btn-primary">Modifier</button>
  
  </form>
      </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
  </body>
</html>