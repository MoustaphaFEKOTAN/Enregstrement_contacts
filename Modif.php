<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Effectuer des modifications</title>
    <link href="Modif.css" rel="stylesheet"> 
  </head>
  <body>
<?php
// Modifier.php

session_start();
require_once('functions.php');

//Gere les erreurs qui sont cachés
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['email'])) {
    header('Location: index.php'); // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
    exit();
}

if (isset($_GET['numero'])) {
    $numero = $_GET['numero'];

    // Vous pouvez récupérer les détails du contact depuis la base de données en utilisant le numéro
    // Par exemple :
    $sql = "SELECT * FROM inserercontacts WHERE Numero = '$numero'";
    $result = mysqli_query($con, $sql);
    $contact = mysqli_fetch_assoc($result);

    if (isset($_POST['modifier'])) {
        // Traitez les modifications et mettez à jour le contact dans la base de données
        $nouveauNom = $_POST['nom'];
        $nouveauNumero = $_POST['numero'];

        $sql_update = "UPDATE inserercontacts SET Nom = '$nouveauNom', Numero = '$nouveauNumero' WHERE Numero = '$numero'";
        if (mysqli_query($con, $sql_update)) {
            // Rediriger vers la page de liste des contacts après la modification
            header('Location: Listecontacts.php');
            exit();
        } else {
            echo 'Erreur lors de la modification du contact : ' . mysqli_error($con);
        }
    }

    // Afficher le formulaire de modification avec les détails du contact
    echo ' <div class="infos">';
    echo '<form method="post" action="">';
    echo '<H3 class="S" >Nom </H3>: <input type="text" class="" name="nom" value="' . $contact['Nom'] . '"><br>';
    echo '<H3 class="S" >Numero </H3>: <input type="text" name="numero" value="' . $contact['Numero'] . '"><br>';
    echo '<br>   <button name="modifier"><h5 class="SE" >Modifier</h5></button> </br>';
    echo '</form>';
    echo '</div>';
}
 
?>
</body>
</html>