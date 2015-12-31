<?php 
require 'db.class.php';
require 'carts.class.php';
  $DB=new DB();
$cart = new carts($DB);

if(isset($_POST['login'])){
 $username=  $_POST['username'];
 $password=  $_POST['password'];

$login = $DB->query("SELECT COUNT('id_client') FROM client WHERE 'email_client'='$username' AND 'password_client'='$password'");
//$count = $login->fetchColumn();

if ($login=="1"){

  $_SESSION['username']= $username;

  header('location : login.php');
}
}

?>

<!DOCTYPE html>

<html lang="fr">
<head>
  <title>Accueil</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="css/style.css" media="all"/>
</head>
<body>

  <div class="main_wrapper">
    <!--header -->
<?php require 'header.php' ?>
  <!-- menu bar -->
   <?php require 'menubar.php' ?>
<!--content -->
    <div class="content">
<!--barre menu -->
<?php require 'sidebar.php' ?>
        
       
        <div id="content_area">

          
   <form method="post" name="login">

    <input type="text" name="username" placeholder="E-mail">
    <input type="text" name="password" placeholder="Mot de passe">
    <input type="submit" name="login" value="Connexion">

   </form>
   
                       
            



       



        </div>
    </div>

    <!--footer -->
    <div id="footer">
<h2 style="text-align:center;padding-top:10px;">&copy; 2016 by Anass ETTOUHAMI</h2>
     </div>

  </div>

 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
 <script type="text/javascript" src="js/cart.js"></script>
</body>
</html>