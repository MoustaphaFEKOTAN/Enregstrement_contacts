<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Page Inscription</title>
    <link
    href="Inscription.css" rel="stylesheet"> 
    </head>
     <body>
     <?php 
require_once('functions.php');
$echec="";
$echecs="";
    // Si on clique sur le boutton , alors : 
     if(isset($_POST['envoyer'])){ 
       if(isset($_POST['email']) && isset($_POST['mdp'])) { 
          // Récupérer les valeurs saisie par l'utuliateur
          $email = $_POST['email'];
                // Vérifier si l'utilisateur existe déjà dans la table "connexions"
        $sqlCheck = "SELECT * FROM `connexions` WHERE `email`='$email'";
        $result = mysqli_query($con, $sqlCheck);    $mdp = $_POST['mdp'];


        if (mysqli_num_rows($result) > 0) {
            // L'utilisateur existe déjà, afficher un message d'erreur
            $echec = "Cet utilisateur existe déjà ☹️, changez l'e-mail et réessayer  !";
        } else {
            // Insérer un nouvel utilisateur dans la table "connexions"
          // Requête SQL pour l'insertion des données
          $mdp = $_POST['mdp'];
          $nom = $_POST['Nom'];
          $prenom = $_POST['Prenom'];
          $sql = "INSERT INTO `connexions` ( `email`, `motdepasse`) VALUES ('$email', '$mdp')";
          // Exécution de la requête"
          if (mysqli_query($con, $sql)) {
            $succes= "Inscription réussie , cliquez-ici pour vous connecter 👇 !";
          } else {
            $echecs="veuillez réesayer ! : " . mysqli_error($con);
          }
          }
      }
    }
     ?>

     <form method ="post" action= "" > 
         <div class="infos">
            <H2>Inscrivez-Vous!</H2>
            <div class="E">
            <h5 class="t">Nom:</h5>
            <input class="O" type="text" name="Nom"> 
            </div>
            <div class="M">
             <h5 class="te">Prénom:</h5> 
             <input class="O" type="text" name="Prenom">
             <h5 class="t">E-mail:</h5>
            <input class="O" type="text" name="email" required> 
            <h5 class="t">Mot de passe:</h5>
            <input class="O" type="text" name="mdp" required> 
            </div>
            <BR> <button name="envoyer"><h5 class="SE">S'inscrire</h5></button>  </BR>
            </form>
            <?php 
// si la variable $erreur existe , on affiche son contenu ;
       if(isset($succes)){
           echo "<p class='succes'> ".$succes."</p>" ;
       }else{
        echo "<p class='echec'> ".$echec."</p>" ;
       }
       ?>
            <h4> <a href="index.php">Vous avez déja un compte? Connectez-vous</h4>
            </a>
            
    </body>
    </html>