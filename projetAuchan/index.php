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
if(( empty($_GET['category'])) AND (empty($_GET['brand']))){
$products = $DB->query("SELECT * FROM products");

foreach ($products as $product) {
?>


   <div id="products_box" >
        
              <div id='single_product' class="wrap silver">
            <a href='details.php?id_product=<?= $product->id_product  ?>' id='linkProduct'>
            <h3><?= $product->name_product ?></h3>
            <img id="product_img" src='admin/images_products/<?= $product->image_product ?>'  height='150' />
           </a>
            <span id="price"><?= number_format($product->price_product,2,'.', ' ') ?> &euro; </span>
          
        <a class='addPanier' href='addcart.php?id_product=<?= $product->id_product  ?>' ><img src="images/panier.png" style="width:25px; float:right;line-height:center;"></a>
          </div>
            
            

          </div>

  <?php
}
}
?>

       
<?php 
if(isset($_GET['category'])){
      $id_cat= $_GET['category'];

$products = $DB->query("SELECT * from products where category_product= $id_cat");

foreach ($products as $product) {
?>


   <div id="products_box" >
        
              <div id='single_product' class="wrap silver">
            <a href='details.php' id='linkProduct'>
            <h3><?= $product->name_product ?></h3>
            <img id="product_img" src='admin/images_products/<?= $product->image_product ?>'  height='150' />
           </a>
            <span id="price"><?= number_format($product->price_product,2,'.', ' ') ?> &euro; </span>
          
        <a class='addPanier' href='addcart.php?id_product=<?= $product->id_product  ?>' ><img src="images/panier.png" style="width:25px; float:right;line-height:center;"></a>
          </div>
            
            

          </div>

  <?php
}
}
?>
<?php 
if(isset($_GET['brand'])){
      $id_brand= $_GET['brand'];

$products = $DB->query("SELECT * from products where brand_product= $id_brand");

foreach ($products as $product) {
?>


    <div id="products_box" >
        
              <div id='single_product' class="wrap silver">
            <a href='details.php' id='linkProduct'>
            <h3><?= $product->name_product ?></h3>
            <img id="product_img" src='admin/images_products/<?= $product->image_product ?>'  height='150' />
           </a>
            <span id="price"><?= number_format($product->price_product,2,'.', ' ') ?> &euro; </span>
          
        <a class='addPanier' href='addcart.php?id_product=<?= $product->id_product  ?>' ><img src="images/panier.png" style="width:25px; float:right;line-height:center;"></a>
          </div>
            
            

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