<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <title>Inscription des familles</title>
  </head>
  <body>
  <?php get_header();?>
   <div class="container">
    <h1>Elèves</h1>
    
    
    <form method="POST" action="??">
      
  
        <div class="row">  
    <div class="form-group col">
    <label for="nom-famille">Nom</label>
    <input type="text" class="form-control" id="nom-eleve-1">
  </div>
  
      <div class="form-group col">
    <label for="prenom-famille">Prénom</label>
    <input type="text" class="form-control" id="prenom-eleve-1">
        </div>
        </div>
        
             <div class="row">  
    <div class="form-group col">
    <label for="adresse">Adresse</label>
    <input type="text" class="form-control" id="adresse">
  </div>
  
      <div class="form-group col">
    <label for="ville">Ville</label>
    <input type="text" class="form-control" id="ville">
        </div>
        </div>         
            
                            
             <div class="row">  
    <div class="form-group col">
    <label for="email">E-mail</label>
    <input type="text" class="form-control" id="email">
  </div>
  
      <div class="form-group col">
    <label for="telephone">Téléphone</label>
    <input type="text" class="form-control" id="telephone">
        </div>
        </div>
                            
               <div class="row">  
    <div class="form-group col">
    <label for="nombre">Nombre d'enfants que vous pouvez accueillir</label>
    <input type="text" class="form-control" id="nombre">
  </div>
  
<div class="form-check form-check-inline">
 
     <label for="type">Nombre de jeunes comédiens que vous pouvez accueillir</label>
  <input class="form-check-input" type="checkbox" id="garcon" value="garcon">
  <label class="form-check-label" for="inlineCheckbox1">Garçon</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" id="fille" value="fille">
  <label class="form-check-label" for="inlineCheckbox2">Fille</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" id="indifferent" value="indeffirent">
  <label class="form-check-label" for="inlineCheckbox3">Indifférent</label>
</div>
        </div>                                                                                                            

  <div class="row">
   <div class="form-group col">
    <label for="etablissement">Etablissement scolaire de votre enfant pour l'année scolaire 2017 - 2018</label>
    <input type="text" class="form-control" id="etablissement">
        </div> 
 </div>                         
                                                        
                                                                                    
                                                                                                                
                                                                                                                                                         
<div class="form-group">
    <label for="remarques">Allergie ou remarques éventuelles</label>
    <textarea class="form-control" id="remarques" rows="3"></textarea>
  </div>
      
      
  
  <button type="submit" class="btn btn-primary">Envoyer</button>
  
  </form>
      </div>
      
      
      <br>
      
      
      
      
      
      <?php get_footer();?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
  </body>
</html>