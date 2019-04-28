<?php
include "php.php";
require('database.php');
//on appelle notre fichier de config 
$id = null;
if (!empty($_GET['id'])) {
    $id = $_REQUEST['id'];
}
if (null == $id) {
    header("location:table.php");
} else { //on lance la connection et la requete 
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION) . $sql = "SELECT * FROM videogames where Title =?";
    $q = $pdo->prepare($sql);
    $q->execute(array(
        $id
    ));
    $data = $q->fetch(PDO::FETCH_ASSOC);
    Database::disconnect();
}
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
            <link href="css/bootstrap.min.css" rel="stylesheet">
        <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-wp-preserve="%3Cscript%20src%3D%22js%2Fbootstrap.min.js%22%3E%3C%2Fscript%3E" data-mce-resize="false" data-mce-placeholder="1" class="mce-object" width="20" height="20" alt="<script>" title="<script>" />
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
    </head>

    <body class="bg-dark text-white">
    <br/>
       <div class="container">
    <br/>
       <div class="span10 offset1">
    <br/>
       <div class="row">
    <br/>
           <h3>Fiche du jeu</h3>
           <p>
       </div>
           <p>
    <br/>
       <div class="form-horizontal" >
    <br/>
       <div class="control-group">
           <label class="control-label">Titre</label>
    <br/>
       <div class="controls">
           <label class="checkbox">
                <?php
echo $data['Title'];
?>
          </label>
       </div>
           <p>

       </div>
           <p>
    <br/>
       <div class="control-group">
           <label class="control-label">Publisher</label>
    <br/>
       <div class="controls">
           <label class="checkbox">
                <?php
echo $data['publishers'];
?>
          </label>
       </div>
           <p>
       </div>
           <p>
    <br/>
       <div class="control-group">
           <label class="control-label">Platform</label>
    <br/>
       <div class="controls">
           <label class="checkbox">
                 <?php
echo $data['platform'];
?>
          </label>
       </div>
           <p>
       </div>
           <p>
    <br/>
       <div class="control-group">
           <label class="control-label">Genres</label>
    <br/>
       <div class="controls">
           <label class="checkbox">
                <?php
echo $data['genreG'];
?>
          </label>
       </div>
           <p>

       </div>
           <p>
    <br/>
       <div class="control-group">
           <label class="control-label">Game Genre</label>
    <br/>
       <div class="controls">
           <label class="checkbox">
                <?php
echo $data['genre'];
?>
          </label>
       </div>
           <p>
       </div>
           <p>
    <br/>
       <div class="control-group">
           <label class="control-label">Developer</label>
    <br/>
       <div class="controls">
           <label class="checkbox">
                <?php
echo $data['dev'];
?>
          </label>
       </div>
           <p>
       </div>
           <p>
    <br/>
       
       </div>
           <p>
    <br/>
       <div class="form-actions">
           <a class="btn btn-success" href="table.php">Back</a>
       </div>
           <p>
       </div>
           <p>
       </div>
           <p>
       </div>
           <p>
<!-- /container -->
    </body>
</html>