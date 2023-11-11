<?php 
//Nous allons démarrer la session avant toute chose
session_start() ;
     //Connexion a la base de données
     $nom_serveur = "localhost";
     $utilisateur = "root";
     $mot_de_passe ="";
     $nom_base_donnees ="enregistrement_contacts" ;
     $con = mysqli_connect($nom_serveur , $utilisateur ,$mot_de_passe , $nom_base_donnees);
     $erreur ="";
    // Si on clique sur le boutton , alors :
if(isset($_POST['boutton-valider'])){ 
  //Nous allons verifiér les informations du formulaire
  //On verifie ici si l'utilisateur a rentré des informations
  if(isset($_POST['email']) && isset($_POST['mdp'])) { 
    //Nous allons mettres l'email et le mot de passe dans des variables
    $email = $_POST['email'] ;
    $mdp = $_POST['mdp'] ;
    $erreur = "" ;
     //requete pour selectionner  l'utilisateur qui a pour email et mot de passe les identifiants qui ont été entrées
      $req = mysqli_query($con , "SELECT * FROM connexions WHERE email = '$email' AND motdepasse ='$mdp' ") ;
      $num_ligne = mysqli_num_rows($req) ;//Compter le nombre de ligne ayant rapport a la requette SQL
      //Si le nombre de ligne est > 0 , on sera redirigé vers la page bliste contact
      if($num_ligne > 0){
        //On sauvegarde la valeure de l'email saisie par l'utulisateur
        $_SESSION['email'] = $email;
        header("Location:pageEnregis.php") ;
        //si non
      }else {
      $erreur = "L'adrese e-mail ou le mot de passe est incorrect!";
      }
  }
}
  ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Connexion</title>
    <link
    href="index.css" rel="stylesheet">  
    </head>
     <body>
         <div class="infos">
<h3 class="S">Se connecter</h3>
<?php 
// si la variable $erreur existe , on affiche son contenu ;
       if(isset($erreur)){
           echo "<p class='Erreur'> ".$erreur."</p>" ;
       }
       ?>
       <form method ="post" action= "" > 
<div class="E">
                        <label  class="t">E-mail:</label>
            <input class="O" type="text" name="email" required="required"> 
             </div>
                  <div class="M">
                <label class="te">Mot de Passe:</label> 
           <input class="O" type="text" name="mdp" required="required">
        <br>   <button name="boutton-valider"><h5 class="SE" >Se Connecter</h5></button> </br>
</form>
<h4> <a href="Inscription.php">Vous n'avez pas de compte? Inscivez-vous</h4> </a>
</div>

    </body>
    </html>
 