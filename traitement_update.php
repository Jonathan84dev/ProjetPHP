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

  <? 
$bdd = new PDO('mysql:host=localhost;dbname=projetbdd;charset=utf8;port=3306', 'root', 'root');
$request = "UPDATE salariés SET prenom = :prenom, nom = :nom, adresse = :adresse, CP = :cp, ville = :ville, date_de_naissance = :date_de_naissance, sexe = :sexe, anciennete = :anciennete WHERE ID = :id";
$response = $bdd->prepare($request);
$response->execute([
    'id' => $_POST['id'],
    'prenom' => $_POST['prenom'],
    'nom' => $_POST['nom'],
    'adresse' => $_POST['adresse'],
    'cp' => $_POST['cp'],
    'ville' => $_POST['ville'],
    'date_de_naissance' => $_POST['date_de_naissance'],
    'sexe' => $_POST['sexe'],
    'anciennete' => $_POST['anciennete'],
]); ?>

<? include 'navbar.php';

header('Location: index.php'); ?>

?> 
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>