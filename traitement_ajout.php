<!doctype html>
<html lang="en">
  <head>
    <title>Index</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link href="style.css" rel="stylesheet">

</head>
<body>

<? include 'navbar.php'; ?>

<? 
$bdd = new PDO('mysql:host=localhost;dbname=projetbdd;charset=utf8;port=3306', 'root', 'root', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
$request = "INSERT INTO salariés (prenom, nom, adresse, CP, ville, date_de_naissance, sexe, anciennete, fichier) VALUES ( :prenom, :nom, :adresse, :CP, :ville, :date_de_naissance, :sexe, :anciennete, :fichier)";
$response = $bdd->prepare($request);

$photo = $_FILES['photo_salarie']; // recup du fichier
$tailledufichier = $photo['size'];
$pathinfodata = pathinfo($photo['name']); // retourne le chemin du fichier
$nomdufichier = $pathinfodata['filename']; // renvoit le nom du fichier
$extensiondufichier = $pathinfodata['extension']; // renvoit l'extension
$nouveaunomdufichier = $nomdufichier . "-" . uniqid() . "." . $extensiondufichier; // composition du nouveau nom de fichier

    if (!empty($_POST) && !empty($_FILES))
    {
    $response->execute([
        'prenom' => $_POST['prenom'],
        'nom' => $_POST['nom'],
        'adresse' => $_POST['adresse'],
        'CP' => $_POST['cp'],
        'ville' => $_POST['ville'],
        'date_de_naissance' => $_POST['date_de_naissance'],
        'sexe' => $_POST['sexe'],
        'anciennete' => $_POST['anciennete'],
        'fichier' => $nouveaunomdufichier,
        ]);

    move_uploaded_file($photo['tmp_name'],  __DIR__  . '/uploads/' . $nouveaunomdufichier ); ?>
        
    <p>
    <div class=bloc2>
    <h5><? echo "Vous avez ajouté l'utilisateur suivant à la base de données :"; ?></h5>
    <br/>

    <ul>  
    <li>Prenom : <?= $_POST['prenom'] ?></li><br/>
    <li>Nom : <?= $_POST['nom'] ?></li><br/>
    <li>Adresse : <?= $_POST['adresse'] ?></li><br/>
    <li>CP : <?= $_POST['cp'] ?></li><br/>
    <li>Ville : <?= $_POST['ville']; ?></li><br/>
    <? $str=strtotime($_POST['date_de_naissance']);
        $date=date('d-m-Y',$str);
    ?>
    <li>Date de naissance : <?= $date ?></li><br/>

    <?  $sexe= $_POST['sexe']; ?>
    <li>Sexe : 
    <? if ($sexe==1) {
        echo 'Homme';
        }
        else {
        echo 'Femme'; 
                    } 
    }
    else {
        echo "Un champ est manquant dans votre formulaire !";
    }
       ?>
    </li>

    <br/>
    <li>Ancienneté : <?= $_POST['anciennete'] ?></li><br/>
    <li>Photo: <img class="miniature" src="uploads/<?= $nouveaunomdufichier ?>"></img>

</ul>
<br/>
</div>
<br/>
<br/>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>