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
include "php.php";
// $host="localhost";
// $user="root";
// $password="";
// $db="videogames";

// mysql_connect($host,$user,$password);
// mysql_select_db($db);
if(isset($_POST['username'])){
    $uname=$_POST['username'];
    $password=$_POST['password'];

    $sql="SELECT * FROM admin WHERE utilisateurs='".$uname."' AND passwords='".$password."' limit 1";

    $result=mysql_query($sql);

    if(mysql_num_rows($result)==1){
    echo "welcome ".$uname." !";
    exit();
    }
    else{
      echo "Non,non,non,non,non!!!!!!";
    }
}

?>




      <header id="top" class="container-fluid">
      <div id="topvide"></div>
      </header>
    <nav id="nav">
      <a href="">Retour au site</a>
    </nav>
      <section>
      <div id="middle">
      <div class="container h-100">
    <div class="d-flex justify-content-center h-100">
      <div class="user_card">
        <div class="d-flex justify-content-center">
          <div class="brand_logo_container">
            <img src="Sanstitre.png" class="brand_logo" alt="Logo">
          </div>
        </div>
        <div class="d-flex justify-content-center form_container">
          <form method="POST" action="table.php">
            <div class="input-group mb-3">
              <div class="input-group-append">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
              </div>
              <input type="text" name="username" class="form-control input_user" value="" placeholder="username">
            </div>
            <div class="input-group mb-2">
              <div class="input-group-append">
                <span class="input-group-text"><i class="fas fa-key"></i></span>
              </div>
              <input type="password" name="password" class="form-control input_pass" value="" placeholder="password">
            </div>
            
          
        </div>
        <div class="d-flex justify-content-center mt-3 login_container">
          <button type="submit" name="submit" class="btn login_btn">Login</button>
        </div>
        </form>
        
      </div>
    </div>
  </div>
      </div>    
      </section>
      <footer id="bottom">
          © P.Guillec
      </footer>
  

      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/js/bootstrap.min.js"></script>
  </body>
</html>