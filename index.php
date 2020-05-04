<!doctype html>
<html lang="en">
  <head>
    <title>Index</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">
  </head>
  <body>

  <? include 'navbar.php';
?> 
  <? 
$bdd = new PDO('mysql:host=localhost;dbname=projetbdd;charset=utf8;port=3306', 'root', 'root', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
$request = "SELECT * FROM salariés";
$response = $bdd->query($request);
$salaries = $response->fetchAll(PDO::FETCH_ASSOC); ?>

<div class=bloc1>
<h5>Liste des salariés présents en base de données</h5>

<? foreach ($salaries as $salarie) : ?>
  <div class=bloc2>
  <strong><? echo "Nom : " . $salarie['nom']; ?> </strong> 
  <br/>
  <strong><? echo "Prénom : " . $salarie['prenom']; ?> </strong> <br/>
<? echo "Adresse : " . $salarie['adresse']; ?>
<br/><? echo "Code postale : " . $salarie['CP']; ?>
<br/><? echo "Ville : " . $salarie['ville']; ?>
<? $str=strtotime($salarie['date_de_naissance']); 
$date=date('d-m-Y',$str) ?>
<br/><? echo "Date de naissance : " . $date; ?>
<br/><? if ($salarie['sexe']==0) :
echo "Sexe : Femme";
else :
echo "Sexe : Homme";
endif ?>
<br/>
<? echo "Ancienneté : " . $salarie['anciennete'] . " an(s)"; ?>
<br/><br/>
<button type="button" class="button">
<a href="update.php?id=<?=$salarie['ID']?>">Modifier</a>
</button>
<button type="button" class="button">
<a href="delete.php?id=<?=$salarie['ID']?>">Supprimer</a>
</button>

<br/><br/>
</div> 
<? endforeach; ?>
</div>


      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>