<?php 
require 'db.class.php';
require 'carts.class.php';
  $DB=new DB();
$cart = new carts($DB);

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

          
   
   
                       
            



       
<?php 
if(isset($_GET['id_product'])){
      $id_prod= $_GET['id_product'];

$products = $DB->query("SELECT * from products where id_product='$id_prod'");

foreach ($products as $product) {
?>


   <div  >
      
              <div id='single_product' style="margin-left:20px;">
            <a href='details.php' id='linkProduct'>
            <h2 style="color:#B71C1C"><?= $product->name_product ?></h2>
            <img  src='admin/images_products/<?= $product->image_product ?>'  height='300px' style="border:solid 1px;float:left" />
           </a>
           <a  href='addcart.php?id_product=<?= $product->id_product  ?>' style="text-decoration:none">Ajouter au panier<br><img src="images/panier.png" style="width:100px;line-height:center;"></a><br>
            <span id="price" style="font-size:100px"><?= number_format($product->price_product,2,'.', ' ') ?> &euro; </span>
          
        
          </div><br/><br/><br/><br/><br/>
            <div style="font-size:20px;float:left "><?=$product->description_product ?></div>
           

          </div>

  <?php
}
}
?>


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