<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <title>Inscription des comédiens</title>
  </head>
  <body>
   <div class="container">
    <h1>Comédiens</h1>
    
    <?php $comedien=$comedien[0];?>
    <form method="POST">
    
      <div class="row">  
        <div class="form-group col">
          <label for="nom-eleve-1">Nom</label>
          <input type="text" value="<?php echo $comedien->nom; ?>" name="lastname" class="form-control" id="nom-eleve-1">
        </div>
  
        <div class="form-group col">
          <label for="prenom-eleve-1">Prénom</label>
          <input type="text" value="<?php echo $comedien->prenom; ?>" name="firstname" class="form-control" id="prenom-eleve-1">
        </div>
      </div>     
    
      <div class="row">

        <div class="form-group col">
          <label for="date-naissance">Date de naissance</label>
          <input type="text" value="<?php echo $comedien->date_naissance; ?>" name="birthday" class="form-control" id="date-naissance">
        </div>  

        <div class="form-group col">
          <label for="taille_t_shirt">Taille T-shirt</label>
          <select name="size" class="form-control" id="taille_t_shirt">
            <option value="S" <?php if($comedien->taille_t_shirt=="S") echo 'selected'; ?>>S</option>
            <option value="M" <?php if($comedien->taille_t_shirt=="M") echo 'selected'; ?>>M</option>
            <option value="L" <?php if($comedien->taille_t_shirt=="L") echo 'selected'; ?>>L</option>
            <option value="XL" <?php if($comedien->taille_t_shirt=="XL") echo 'selected'; ?>>XL</option>
            <option value="XXL" <?php if($comedien->taille_t_shirt=="XXL") echo 'selected'; ?>>XXL</option>
          </select>
        </div>

        <div class="form-check form-check-inline">
          <input name="gender" <?php if($comedien->sexe=="h") echo 'checked'; ?> class="form-check-input" type="radio"  id="sexe1" value="homme">
          <label class="form-check-label" for="sexe1">Homme</label>
        </div>
        <div class="form-check form-check-inline">
          <input name="gender" <?php if($comedien->sexe=="f") echo 'checked'; ?> class="form-check-input" type="radio" id="sexe2" value="femme"> 
          <label class="form-check-label" for="sexe2">Femme</label>
        </div>

      </div>  

      <div class="form-group">
        <label for="remarque-eleve-1">Allergies ou remarques éventuelles</label>
        <textarea name="remarks" class="form-control" id="remarque-eleve-1" rows="2"><?php echo $comedien->allergie_remarque; ?></textarea>
      </div>

      <div class="form-group">
        <input type="checkbox" name="grafikart" id="arts"><!-- ^^ -->
        <label for="arts">Arts graphiques</label>
        <input type="checkbox" name="choreography" id="choregraphie">
        <label for="choregraphie">Chorégraphie</label>
        <input type="checkbox" name="mask" id="masques">
        <label for="masques">Masques</label>
        <input type="checkbox" name="mime" id="mime">
        <label for="mime">Mime et improvistation</label>
        <input type="checkbox" name="costume" id="costumes">
        <label for="costumes">Costumes</label>
      </div>
  
  <button type="submit" name="submit" class="btn btn-primary">Modifier</button>
  
  </form>
      </div>
      
      
      <br>
      
      
      
      
      

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
  </body>
</html>