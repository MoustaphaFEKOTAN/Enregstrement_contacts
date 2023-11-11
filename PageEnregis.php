<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Page Enregistrement</title>
    <link
    href="PageEnregis.css" rel="stylesheet"> 
    </head>
     <body>
     <?php 
     session_start() ;
require_once('functions.php');
$echec="";
$echecs="";
$email="";
    // Si on clique sur le boutton , alors : 
     if(isset($_POST['envoyer'])){ 
       if(isset($_POST['Nom']) && isset($_POST['Numéro'])) { 
          // Récupérer les valeurs saisie par l'utuliateur
          $Nom= $_POST['Nom'];
          $num= $_POST['Numéro'];
                // Vérifier si l'utilisateur existe déjà dans la table "inserercontacts"
        $sqlCheck = "SELECT * FROM `inserercontacts` WHERE `Numero`='$num'";
        $result = mysqli_query($con, $sqlCheck);    
        if (mysqli_num_rows($result) > 0) {
            // L'utilisateur existe déjà, afficher un message d'erreur
            $echec = "Ce Contact existe déjà ☹️  !";
        } else {
            // Insérer un nouvel utilisateur dans la table 
          // Requête SQL pour l'insertion des données
          $sql = "INSERT INTO `inserercontacts` ( `Nom`, `Numero`) VALUES ('$Nom', '$num')";
          // Exécution de la requête"
          if (mysqli_query($con, $sql)) {
            $succes= "Votre contact a été bien enrégistré(e) !";
          } else {
            $echecs="veuillez réesayer ! : " . mysqli_error($con);
          }
          }
      }
    }
     ?>
    
         <div class="infos">
         
         <form method ="post" action= "Listecontacts.php" >
         <?php 
         //Si la session exite et que l'utulisateur est bien connecté ,on la mets dans une variable pour l'afficher.
     if (isset($_SESSION['email'])) {
      $email = $_SESSION['email'];
      echo "<p class='messagebienvenue'> Bienvenue ' $email '!</p>";
    }?> 
          <button name="mescontacts" class="SEV"><h5 class="SE">Afficher Vos contacts</h5></button> 
          </form>
          <form method="Post"  action="">
            <H2 class="S">Enrégistrer un nouveau contact:</H2>
            <div class="E">
            <h4 class="t">Entrez le nom du contact:</h5>
      <input class="O" type="text" name="Nom"  placeholder="********" required="required"> 
      <h4 class="t">Entrez le numéro du contact:</h5>
      <input class="O" type="text" name="Numéro"  placeholder="********" required="required"> 
      <?php 
          if(isset($succes)){
   echo "<p class='succes'> ".$succes."</p>" ;
  }else{
  echo "<p class='echec'> ".$echec." </p>";
}
?>
<BR> <button name="envoyer"><h5 class="SE">Enrégistrer le contact</h5></button> 

</form>
   </div>
    </body>
    </html>
  