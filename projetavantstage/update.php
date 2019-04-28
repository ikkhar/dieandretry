<?php
require 'database.php';
$id = null;
if (!empty($_GET['id'])) {
    $id = $_REQUEST['id'];
}
if (null == $id) {
    header("Location: table.php");
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST)) {
    
    // On assigne nos valeurs 
    $Title           = $_POST['Title'];
    $publishers      = $_POST['publishers'];
    $platform        = $_POST['platform'];
    $genres          = $_POST['genres'];
    $gamesgenres     = $_POST['gamesgenres'];
    $developers      = $_POST['developers'];
    $comment         = $_POST['comment'];
    
    // On verifie que les champs sont remplis 
    $valid          = true;
    if (empty($Title)) {
        $nameError = '';
        $valid     = false;
    }
    if (empty($publishers)) {
        $firstnameError = '';
        $valid          = false;
    }
    
    if (empty($platform)) {
        $ageError = '';
        $valid    = false;
    }
    if (empty($genres)) {
        $telError = '';
        $valid    = false;
    }
    if (!isset($developers)) {
        $paysError = '';
        $valid     = false;
    }
    if (empty($comment)) {
        $commentError = '';
        $valid        = false;
    }
    
    // mise à jour des donnés 
    if ($valid) {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE videogames SET Title = ?,publishers = ?,platform = ?,genres = ?, gamesgenres = ?, developers = ?, constructor = ? WHERE id = ?";
        $q   = $pdo->prepare($sql);
        $q->execute(array(
            $Title,
            $publishers,
            $platform,
            $genres,
            $gamesgenres,
            $developers,
            $constructor,
            
            
        ));
        Database::disconnect();
        header("Location: index.php");
    }
} else {
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM videogames where Title = ?";
    $q   = $pdo->prepare($sql);
    $q->execute(array(
        $id
    ));
    $data      = $q->fetch(PDO::FETCH_ASSOC);
    $Title      = $data['Title'];
    $publishers = $data['publishers'];
    $platform       = $data['platform'];
    $genres       = $data['genreG'];
    $gamesgenres     = $data['genre'];
    $developers      = $data['dev'];
    $constructor   = $data['constructor'];
    
    Database::disconnect();
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Crud-Update</title>
            <link href="css/bootstrap.min.css" rel="stylesheet">
        <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-wp-preserve="%3Cscript%20src%3D%22js%2Fbootstrap.js%22%3E%3C%2Fscript%3E" data-mce-resize="false" data-mce-placeholder="1" class="mce-object" width="20" height="20" alt="<script>" title="<script>" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
    </head>
    <body class="bg-dark text-white">
      <br/>
         <div class="container">
      <br/>
         <div class="row">
      <br/>
            <h3>Modifier un jeu</h3>
            <p>
         </div>
            <p>
      
            <form method="post" action="update.php?id=<?php
echo $id;
?>">
      
         <div class="control-group <?php
echo !empty($nameError) ? 'error' : '';
?>">
            <label class="control-label">Titre:</label>
      <br/>
         <div class="controls">
            <input name="name" type="text"  placeholder="Titre" value="<?php
echo !empty($Title) ? $Title : '';
?>">
                <?php
if (!empty($nameError)):
?>
           <span class="help-inline"><?php
    echo $nameError;
?></span>
                <?php
endif;
?>
        </div>
            <p>
         </div>
            <p>
      
         <div class="control-group<?php
echo !empty($firstnameError) ? 'error' : '';
?>">
            <label class="control-label">Publishers:</label>
      <br/>
         <div class="controls">
            <input type="text" placeholder="Publishers" name="publishers" value="<?php
echo !empty($publishers) ? $publishers : '';
?>">
                <?php
if (!empty($firstnameError)):
?>
           <span class="help-inline"><?php
    echo $firstnameError;
?></span>
                <?php
endif;
?>
        </div>
            <p>
         </div>
            <p>
      
         <div class="control-group<?php
echo !empty($ageError) ? 'error' : '';
?>">
            <label class="control-label">Platform:</label>

      <br/>
         <div class="controls">
            <input type="text" placeholder="Platform" name="platform" value="<?php
echo !empty($platform) ? $platform : '';
?>">
                <?php
if (!empty($ageError)):
?>
           <span class="help-inline"><?php
    echo $ageError;
?></span>
                <?php
endif;
?>
        </div>
            <p>
         </div>
            <p>
      
         
            <p>
      
         <div class="control-group <?php
echo !empty($telError) ? 'error' : '';
?>">
            <label class="control-label">Genre:</label>
      <br/>
         <div class="controls">
            <input name="genres" type="text" placeholder="Genre" value="<?php
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
            <p>
                <div class="control-group<?php
echo !empty($ageError) ? 'error' : '';
?>">
            <label class="control-label">GamesGenres:</label>

      <br/>
         <div class="controls">
            <input type="text"  placeholder="GameGenres" name="gamesgenres" value="<?php
echo !empty($gamesgenres) ? $gamesgenres : '';
?>">
                <?php
if (!empty($ageError)):
?>
           <span class="help-inline"><?php
    echo $ageError;
?></span>
                <?php
endif;
?>
<div class="control-group<?php
echo !empty($ageError) ? 'error' : '';
?>">
            <label class="control-label">Developers:</label>

      <br/>
         <div class="controls">
            <input type="text" placeholder="Developers" name="developers" value="<?php
echo !empty($developers) ? $developers : '';
?>">
                <?php
if (!empty($ageError)):
?>
           <span class="help-inline"><?php
    echo $ageError;
?></span>
                <?php
endif;
?>
<div class="control-group<?php
echo !empty($ageError) ? 'error' : '';
?>">
            <label class="control-label">Constructor:</label>

      <br/>
         <div class="controls">
            <input type="text" placeholder="Constructor" name="constructor" value="<?php
echo !empty($constructor) ? $constructor : '';
?>">
                <?php
if (!empty($ageError)):
?>
           <span class="help-inline"><?php
    echo $ageError;
?></span>
                <?php
endif;
?>
      <br/>
         
        </div>
            <p>
         </div>
            <p>
      <br/>
         <div class="form-actions">
            <input type="submit" class="btn btn-primary" name="submit" value="submit">
            <a class="btn btn-success" href="table.php">Retour</a>
         </div>
            <p>
            </form>
            <p>
         </div>
            <p>


    </body>
</html>