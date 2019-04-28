<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>dieandretry</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
    
    <link rel="stylesheet" type="text/css" href="style.css">
    <script type="text/javascript" src="script.js"></script>
  </head>
  <body>


    <?php
include "database.php";
?>





    <header id="top" class="container-fluid">
      <div class="row justify-content-center justify-content-sm-between align-items-center p-4 pt-2">
        <div id="logo" class="justify-item-sm-center">
          <img src="Sanstitre.png"class="img-fluid d-flex" alt="Responsive image">
        </div>
        <div id="titre">
          <h1 >DIE AND RETRY</h1>
        </div>
      </div>
    </header>
    <nav id="nav">
      <a href="index.php">Retour au site</a>
    </nav>
    <section id="section">
      

        <div class="row">
                <a href="add.php" class="btn btn-success">Ajouter un Jeu</a>
        <div class="table-responsive">
      <table class="table table-bordered text-white">
      <table class="table table-bordered text-white">
        <div class="form-actions">
           <a class="btn btn-success" href="table.php">Back</a>
       </div>

      
      
      <thead>
        <th>Videogames</th>
        
        <th class="petit">Publishers</th>
        
        <th class="petit">Platform</th>
        
        <th class="petit">Genres</th>
        
        <th class="petit">Games Genres</th>
        
        <th class="petit">Developers</th>
        
        
        
        <th>Voir</th>
        
        <th>MAJ</th>
        
        <th>Supprimer</th>
        
      </thead>
        <p>
      <br/>
      <tbody>

        <?php $search = null; 
   if (!empty($_POST['search'])) { 
    $search = $_POST['search']; 
    } 
   if ($search==null) { 
    header("location:index.php");
    } 
   else { //on lance la connection et la requete 

    $pdo = Database::connect(); //on se connecte à la base
    $sql = 'SELECT title, publishers.name as publishers, platform.name as platform, genres.name as genreG, gamesgenres.idGenre as genre, developers.name as dev ,constructor.name as constr, numero FROM videogames LEFT OUTER JOIN publishers ON publishers.id=videogames.idPublisher LEFT OUTER JOIN platform ON platform.id = videogames.idPlatform LEFT OUTER JOIN gamesgenres ON gamesgenres.idVideoGame = videogames.id LEFT OUTER JOIN genres ON genres.id= gamesgenres.idGenre LEFT OUTER JOIN developers ON developers.id = videogames.idDeveloper LEFT OUTER JOIN constructor ON constructor.id = platform.idConstructor WHERE title LIKE "%'.$search.'%"'; //on formule notre requete
    foreach ($pdo->query($sql) as $row)
    { 

    //on cree les lignes du tableau avec chaque valeur retournée
    echo '<tr>';
    echo '<td>' . $row['title'] . '</td>';
    echo '<td class="petit">' . $row['publishers'] . '</td>';
    echo '<td class="petit">' . $row['platform'] . '</td>';
    echo '<td class="petit">' . $row['genreG'] . '</td>';
    echo '<td class="petit">' . $row['genre'] . '</td>';
    echo '<td class="petit">' . $row['dev'] . '</td>';
    
    echo '<td>';
    echo '<a class="btn btn-primary" href="edit.php?id=' . $row['title'] . '">Voir</a>';
    // un autre td pour le bouton d'edition
    echo '</td>';
    echo '<td>';
    echo '<a class="btn btn-success" href="update.php?id=' . $row['title'] . '">MAJ</a>';
    // un autre td pour le bouton d'update
    echo '</td>';
    echo '<td>';
    echo '<a class="btn btn-danger" href="delete.php?id=' . $row['title'] . ' ">Supprimer</a>';
    // un autre td pour le bouton de suppression
    echo '</td>';
    echo '</tr>';
}
}
Database::disconnect();
//on se deconnecte de la base
?>  

    </tbody>
    

    </table>
    

    


   
 
    </section>
    <footer id="bottom">
        <p class="mb-0">© P.Guillec</p>
    </footer>
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/js/bootstrap.min.js"></script>
  </body>
</html>


