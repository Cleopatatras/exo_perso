<?php

//vérifie si le fichier php_ini est chargé
// $inipath = php_ini_loaded_file();

// if ($inipath) {
//     echo 'php.ini chargé : ' . $inipath;
// } else {
//     echo 'Aucun fichier php.ini n\'a été chargé';
// }

//teste la connexion avec la BDD :

//try{$pdo = new PDO("mysql:host=mysql-annec25.alwaysdata.net;dbname=annec25_bootcamp;port=3306",'annec25_php','test12345678ZZ'); } catch(PDOexception $e){die ($e -> getMessage());}

// connexion avec bdd distante
//$pdo = new PDO("mysql:host=mysql-annec25.alwaysdata.net;dbname=annec25_bootcamp;port=3306",'annec25_php','test12345678ZZ'); 
//$pdo = new PDO("mysql:host=mysql-annec25.alwaysdata.net;dbname=;port=3306", 'user', 'mdp');

//récup avec la BDD locale

require_once 'config/pdo.php';

//$pdo = new PDO("mysql:host=localhost;dbname=voitures;port=3306", 'root', '');


$query=$pdo->query('select * from voitures');

$voitures=$query ->fetchAll(PDO::FETCH_ASSOC);
//var_dump($voitures);




//récup sans BDD
$voitures_no_bdd = [
    'AA-000-AA' => [
        'marque' => 'peugeot',
        'annee' => 2011,
        'modele' => 208,
        'km' => 150000,
        'type_motorisation' => 'essence',
        'etat' => 'médiocre',
    ],

    'AB-000-AB' => [
        'marque' => 'peugeot',
        'annee' => 2015,
        'modele' => 3008,
        'km' => 124000,
        'type_motorisation' => 'diesel',
        'etat' => 'bon',
    ],

    'AC-000-AC' => [
        'marque' => 'citroen',
        'annee' => 2020,
        'modele' => 'C4',
        'km' => 12000,
        'type_motorisation' => 'electrique',
        'etat' => 'très bien',
    ],

    'AD-000-AD' => [
        'marque' => 'citroen',
        'annee' => 2011,
        'modele' => 'DS3',
        'km' => 52000,
        'type_motorisation' => 'essence',
        'etat' => 'bon',
    ],
];

require_once 'template/head.php'; 
?>

<body>
<?php require_once 'template/header.php'; ?>

<h1>Bienvenue sur ce site d'exo personnel</h1>
    <main>
        <div class="container">
            <div class="dflex">
                <?php foreach ($voitures as $key => $voiture) {
                 ?>
                <div class="card style="width: 18rem;">
                    <div class="card-header">
                        <?php echo $voiture['immatriculation'] ?>
                    </div>

                    <div class="card-body">
                        <h5 class="card-title"><?php echo $voiture['marque']." ".$voiture['modele'] ?></h5>
                        <img src="<?php echo $voiture['image'] ?>" width=10% alt="">
                        <p class="card-text"><?php  ?></p>
                        <p class="card-text">année : <?php echo $voiture['annee'] ?></p>
                        <p class="card-text"><?php echo $voiture['km'] ?> km</p>
                        <p class="card-text">Motorisation : <?php echo $voiture['type_motorisation'] ?></p>
                        <p class="card-text">Etat : <?php echo $voiture['etat'] ?></p>
                        <a href="voiture.php?voiture_id=<?php echo $voiture['id_immatriculation']?>" class="btn btn-primary">voir en détail</a>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>

    </main>

   <?php
   require 'template/footer.php';
   ?>
