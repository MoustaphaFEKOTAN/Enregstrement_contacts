<?php 
session_start();
require_once('functions.php');

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['email'])) {
    header('Location: index.php'); // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
    exit();
}

if (isset($_GET['numero'])) {
    $numero = $_GET['numero'];

    // Effectuer la requête SQL pour supprimer le contact
    $sql = "DELETE FROM inserercontacts WHERE Numero = '$numero'";
    if (mysqli_query($con, $sql)) {
        // Rediriger vers la page de liste des contacts après la suppression
        header('Location: Listecontacts.php');
        exit();
    } else {
        echo 'Erreur lors de la suppression du contact : ' . mysqli_error($con);
    }
}
?>




  

