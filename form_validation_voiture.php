
<?php
require_once 'config/pdo.php';


if($_SERVER['REQUEST_METHOD']=='POST') {

    $query = $pdo ->query('insert into voitures (immatriculation,marque,annee,modele,km,type_motorisation,etat) 
    values (
    "'.$_POST['immatriculation'].'",
    "'.$_POST['marque'].'",
    '.$_POST['annee'].',
    "'.$_POST['modele'].'",
    '.$_POST['km'].',
    "'.$_POST['motorisation'].'",
    "'.$_POST['etat'].'"
    )
    ');

    header('location:index.php');
    
} else {
    echo 'pas accessible';
}

?>