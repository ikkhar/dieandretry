<?php
require 'database.php';
$id = 0;
if (!empty($_GET['id'])) {
    $id = $_REQUEST['id'];
}
if (!empty($_POST)) {
    $id  = $_POST['id'];
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "DELETE FROM videogames  WHERE Title = ?";
    $q   = $pdo->prepare($sql);
    $q->execute(array(
        $id
    ));
    Database::disconnect();
    header("Location: table.php");
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
        <div class="container bg-dark text-white">
     <br/>
        <div class="span10 offset1">
     <br/>
        <div class="row">
     <br/>
          <h3>Supprimer un jeu:</h3>
          <p>
        </div>
          <p>
      <br/>
          <form class="form-horizontal" action="delete.php" method="post">
              <input type="hidden" name="id" value="<?php
echo $id;
?>"/>
                  Etes-vous certain de vouloir supprimer le jeu ?
      <br/>
        <div class="form-actions">
          <button type="submit" class="btn btn-success">oui</button>
          <a class="btn btn-danger" href="table.php">Non</a>
        </div>
          <p>
          </form>
          <p>
        </div>
          <p>
        </div>
          <p>
<!-- /container -->
  </body>
</html>