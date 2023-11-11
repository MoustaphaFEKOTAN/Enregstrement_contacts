<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Liste Contacts</title>
    <link href="Listecontacts.css" rel="stylesheet"> 
    <script>
        function confirmDelete() {
            return confirm("Êtes-vous sûr de vouloir supprimer ce contact ?");
        }
    </script>
   
     
  </head>
  <body id="content">
 
    <?php 
      session_start();
      require_once('functions.php');
      

      // Vérifier si l'utilisateur est connecté
      if (!isset($_SESSION['email'])) {
        header('Location: index.php'); // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
        exit();
      }

      // Effectuer la requête SQL pour récupérer les contacts
      $sql = "SELECT `Numero`, `Nom` FROM `inserercontacts`";
      $result = mysqli_query($con, $sql);

      // Vérifier si des contacts ont été trouvés
      if (mysqli_num_rows($result) > 0) {
        echo '<div id="content"  class="infos">';
        echo '<h2 class="S">Répertoire Téléphonique :</h2>';

        // Créer un tableau pour stocker les numéros et noms
        $contacts = array();

    /*   
    Parcourir les résultats de la requête
 Dans votre code, lorsque vous exécutez la requête et obtenez le résultat dans la variable $result,
 vous utilisez mysqli_fetch_assoc($result) pour extraire chaque ligne de ce résultat dans la variable
 $row.
 La fonction mysqli_fetch_assoc() renvoie la ligne suivante du résultat de la requête sous forme d'un
  tableau 
associatif où les noms des colonnes de la table sont utilisés comme clés du tableau, et les valeurs
correspondantes sont les valeurs de chaque colonne pour cette ligne spécifique.
Dans votre cas précis, les colonnes de la table "inserercontacts" sont "Numero" et "Nom".
 Ainsi, lorsque vous exécutez mysqli_fetch_assoc($result), la première ligne du résultat est extraite 
 et stockée dans $row. Vous pouvez ensuite accéder aux valeurs spécifiques de cette ligne en utilisant 
 les clés du tableau associatif.
Par exemple, $row['Numero'] récupérera la valeur de la colonne "Numero" pour cette ligne, et $row['Nom']
 récupérera la valeur de la colonne "Nom". Vous assignez ensuite ces valeurs aux variables $numero et 
 $nom respectivement pour une utilisation ultérieure, par exemple pour les afficher dans un tableau comme je l'ai montré précédemment.
Ainsi, mysqli_fetch_assoc() est utilisé pour parcourir les résultats de la 
requête ligne par ligne et extraire les valeurs de chaque ligne dans un tableau associatif, 
facilitant ainsi le traitement et l'utilisation des données récupérées à partir de la base de données.
        */
        
        while ($row = mysqli_fetch_assoc($result)) {
          $numero = $row['Numero'];
          $nom = $row['Nom'];

          // Ajouter le numéro et le nom au tableau
          $contacts[] = array('numero' => $numero, 'nom' => $nom);
        }

        // Afficher le tableau
        echo '<table class="tab">';
        echo '<tr><th class="color">Nom</th><th  class="color">Numero</th>  <th  class="color">Supprimer</th> <th  class="color">Modifier</th></tr>';
        
//On parcourt le tableau contacts avec la variable contact//
        foreach ($contacts as $contact) {
          echo '<tr >';
          echo '<td class="color">' . $contact['nom'] . '</td>';
          echo '<td  class="color">' . $contact['numero'] . '</td>';
          echo '<td class="actions">';

          echo '<a href="Supp.php?numero=' . $contact['numero'] . '"><img src="img/suppression.PNG" class="monimg1"  alt="imagecorbeille" onclick=" confirmDelete();"></a>';
         
          echo '<td class="actions">';
    
          echo '<a class="" href="Modif.php?numero=' . $contact['numero'] . '"><img src="img/modification.JPG" class="monimg2" alt="imagecrayon"></a>';
          echo '</td>';
          echo '</td>';
          echo '</tr>';
          
        
          
        }

        echo '</table>';
        echo '</div>';
      } else {
        echo '<p>Aucun contact trouvé.</p>';
      }
    ?>

    


    <form method="post" action="">
      <button class="D" name="bouton-deconnexion"><h5 class="SE">Déconnexion</h5></button>
    </form>

    <?php 
      if (isset($_POST['bouton-deconnexion'])) {
        session_destroy();
        header('Location: index.php'); // Rediriger vers la page de connexion après la déconnexion
        exit();
      }
    ?>
    <button  class="Theme" name="Mode_sombre" id="Mode" onclick="toggleDarkMode(); changertexte()">Dark-Mode</button>
   <script src="scripts/DarkMode.js"></script>
 
  </body>
</html>
