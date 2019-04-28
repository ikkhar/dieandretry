<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Crud</title>
            <link href="css/bootstrap.min.css" rel="stylesheet">
        <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-wp-preserve="%3Cscript%20src%3D%22js%2Fbootstrap.js%22%3E%3C%2Fscript%3E" data-mce-resize="false" data-mce-placeholder="1" class="mce-object" width="20" height="20" alt="<script>" title="<script>" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
        
    </head>

<body class="bg-dark">


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST)) {
    $videogamesError = null;
    $Title           = htmlentities(trim($_POST['Title']));
    $valid           = true;
    if (empty($Title)) {
        $videogamesError = '';
        $valid           = false;
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST)) {
    $publishersError = null;
    $publishers      = htmlentities(trim($_POST['publishers']));
    $valid           = true;
    if (empty($publishers)) {
        $publishersError = '';
        $valid           = false;
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST)) {
    $publishersError = null;
    $platform        = htmlentities(trim($_POST['platform']));
    $valid           = true;
    if (empty($platform)) {
        $publishersError = '';
        $valid           = false;
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST)) {
    $publishersError = null;
    $genres          = htmlentities(trim($_POST['genres']));
    $valid           = true;
    if (empty($genres)) {
        $publishersError = '';
        $valid           = false;
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST)) {
    $publishersError = null;
    $gamesgenres     = htmlentities(trim($_POST['gamesgenres']));
    $valid           = true;
    if (empty($gamesgenres)) {
        $publishersError = '';
        $valid           = false;
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST)) {
    $publishersError = null;
    $developers      = htmlentities(trim($_POST['developers']));
    $valid           = true;
    if (empty($developers)) {
        $publishersError = '';
        $valid           = false;
    }
}

?>

<?php
require 'database.php';
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST)) {
    // je recupère mes valeurs 
    $Title       = htmlentities(trim($_POST['Title']));
    $publishers  = htmlentities(trim($_POST['publishers']));
    $platform    = htmlentities(trim($_POST['platform']));
    $genres      = htmlentities(trim($_POST['genres']));
    $gamesgenres = htmlentities(trim($_POST['gamesgenres']));
    $developers  = htmlentities(trim($_POST['developers']));
    
    // si les données sont présentes et bonnes, on se connecte à la base 
    if ($valid) {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO videogames (Title) values(?)";
        $q   = $pdo->prepare($sql);
        $q->execute(array(
            $Title
        ));
        $sql1 = "INSERT INTO publishers (name) values(?)";
        $q1   = $pdo->prepare($sql1);
        $q1->execute(array(
            $publishers
        ));
        $sql2 = "INSERT INTO platform (name) values(?)";
        $q2   = $pdo->prepare($sql2);
        $q2->execute(array(
            $platform
        ));
        $sql3 = "INSERT INTO genres (name) values(?)";
        $q3   = $pdo->prepare($sql3);
        $q3->execute(array(
            $genres
        ));
        $sql4 = "INSERT INTO gamesgenres (idGenre) values(?)";
        $q4   = $pdo->prepare($sql4);
        $q4->execute(array(
            $gamesgenres
        ));
        $sql5 = "INSERT INTO developers (name) values(?)";
        $q5   = $pdo->prepare($sql5);
        $q5->execute(array(
            $developers
        ));
        
        Database::disconnect();
        header("Location: table.php");
    }
}
?>

        <br/>
    <div class="container bg-dark text-white">

        <br/>
    <div class="row">

        <br/>
        <h3>Ajouter un jeu</h3>
        <p>
    </div>
        <p>
        

        <form method="post" action="add.php">
        <br/>
    <div class="control-group <?php
echo !empty($videogamesError) ? 'error' : '';
?>">
        <label class="control-label">Titre</label>
        <br/>
    <div class="controls">
        <input name="Title" type="text"  placeholder="Titre" value="<?php
echo !empty($Title) ? $Title : '';
?>">
              
    </div>
        <p>
    </div>
        
    <div class="control-group<?php
echo !empty($publishersError) ? 'error' : '';
?>">
        <label class="control-label">Publishers</label>
        <br/>
    <div class="controls">
        <input type="text" name="publishers" placeholder="Publisher" value="<?php
echo !empty($publishers) ? $publishers : '';
?>">
              <?php
if (!empty($publishersError)):
?>
             <span class="help-inline"><?php
    echo $publishersError;
?></span>
              <?php
endif;
?>
   </div>
        <p>

    </div>
        
    <div class="control-group<?php
echo !empty($platformError) ? 'error' : '';
?>">
        <label class="control-label">Platform</label>
        <br/>
    <div class="controls">
        <input type="text" name="platform" placeholder="Platform" value="<?php
echo !empty($platform) ? $platform : '';
?>">
             <?php
if (!empty($platformError)):
?>
            <span class="help-inline"><?php
    echo $platformError;
?></span>
             <?php
endif;
?>
   </div>
        <p>
    </div>
        
    <div class="control-group <?php
echo !empty($genresError) ? 'error' : '';
?>">
        <label class="control-label">Genres</label>
        <br/>
    <div class="controls">
        <input name="genres" type="text" placeholder="Genres" value="<?php
echo !empty($genres) ? $genres : '';
?>">
              <?php
if (!empty($telError)):
?>
             <span class="help-inline"><?php
    echo $telError;
?></span>
              <?php
endif;
?>
   </div>
        <p>
    </div>
        
    <div class="control-group <?php
echo !empty($gameGenreError) ? 'error' : '';
?>">
        <label class="control-label">Game Genre</label>
        <br/>
    <div class="controls">
        <input name="gamesgenres" type="text" placeholder="Game Genre" value="<?php
echo !empty($gamesgenres) ? $gamesgenres : '';
?>">
              <?php
if (!empty($gameGenreError)):
?>
             <span class="help-inline"><?php
    echo $gameGenreError;
?></span>
              <?php
endif;
?>
   
    </div>
        <p>
    </div>
        
    <div class="control-group<?php
echo !empty($developerError) ? 'error' : '';
?>">
        <label class="control-label">Developer</label>
        <br/>
    <div class="controls">
        <input type="text" name="developers" placeholder="Developer" value="<?php
echo !empty($developers) ? $developers : '';
?>">
              <?php
if (!empty($developerError)):
?>
             <span class="help-inline"><?php
    echo $developerError;
?></span>
              <?php
endif;
?>
   </div>
        <p>
    </div>
        
    
        
    
    <div class="form-actions">
        <input type="submit" class="btn btn-success" name="submit" value="submit">
        <a class="btn btn-primary" href="table.php">Retour</a>
    </div>
        <p>
    </form>
        <p>
    </div>
        <p>
 </body>
</html>