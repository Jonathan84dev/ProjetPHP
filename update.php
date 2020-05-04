<!doctype html>
<html lang="en">
  <head>
    <title>Modifier un salarié</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>

  <?php
$bdd = new PDO('mysql:host=localhost;dbname=projetbdd;charset=utf8;port=3306', 'root', 'root');
$salarieID=$_GET ['id'];
$request = "SELECT * FROM salariés WHERE ID = $salarieID";
$response = $bdd->query($request);
$salarie = $response->fetch(PDO::FETCH_ASSOC);
?>


<? include 'navbar.php';
?> 
  <div class=bloc1>
  <h5>Formulaire de modification d'un salarié :</h5>
  <div class=bloc2>

<form action="traitement_update.php" method="post" enctype="multipart/form-data">
<input type="hidden" id="id" name="id" value='<?= $salarieID ?>'>

  <label for="fname">Prenom</label><br>
  <input type="text" id="prenom" name="prenom" value="<?= $salarie['prenom']?>"><br><br>

  <label for="lname">Nom</label><br>
  <input type="text" id="nom" name="nom" value="<?= $salarie['nom']?>"><br><br>

  <label for="fname">Adresse</label><br>
  <input type="text" id="adresse" name="adresse" value="<?= $salarie['adresse']?>" minlength="5"><br><br>

  <label for="fname">Code postal</label><br>
  <input type="number" id="CP" name="cp" value="<?= $salarie['CP']?>"><br><br>

  <label for="fname">Ville</label><br>
  <input type="text" id="Ville" name="ville" value="<?= $salarie['ville']?>"><br><br>

  <? $str=strtotime($salarie['date_de_naissance']); 
    $date=date('Y-m-d',$str) ?>
  <label for="fname">Date de naissance</label><br>
  <input type="date" id="date_de_naissance" name="date_de_naissance" value="<?= $date ?>"><br><br>

  <label for="fname">Sexe</label><br>
  <select name="sexe">
    <option value="1" <? if ($salarie['sexe']==1) : 
    echo "selected";
    else : ""; 
    endif ?>>Homme</option>
    <option value="0" <? if ($salarie['sexe']==0) : 
    echo "selected";
    else : ""; 
    endif ?>>Femme</option>
  </select><br/><br/>

  <label for="fname">Ancienneté</label><br>
  <input type="number" id="anciennete" name="anciennete" value="<?= $salarie['anciennete']?>" min=0 max=60><br><br>

  <label for="fname">Photo du salarié</label><br>
  <input type="file" name="photo"><br>

  <br/>
  <input type="submit" value="Modifier !">
</form> 
    </div>
    </div>




      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>