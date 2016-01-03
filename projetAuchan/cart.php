<?php 

require 'db.class.php';
require 'carts.class.php';
  $DB=new DB();
$cart = new carts($DB);



?>

<!DOCTYPE>

<html>
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

         
   
                       
            
<form method="POST" action="cart.php">
   <div id="products_box">
<table border="1">
     <tr>
        <th style='border-left:0;border-top:0;'>
          
        </th>
        <th>
          Nom 
        </th>
        <th>
          Prix
        </th>
        <th>
          Quantité
        </th> 
        <th>
          Actions
        </th>
      </tr>



      <?php 
      if(isset($_SESSION['cart'])){

    
    
$session = $_SESSION['cart'];

$id_products = array_keys($session);
$implode = implode(',',$id_products);
//$list = substr($implode, -1,strlen($implode)-1);

if(empty($id_products)){
  $products= array();
}
else{
$products = $DB->query('SELECT * from products WHERE id_product IN ('.$implode.')');
}

foreach ($products as $product) {
?>


<tr>
        <td>
          <img src='admin/images_products/<?= $product->image_product ?>' width='100px';>
        </td>
        <td>
          <?= $product->name_product ?>
        </td>
        <td style="line-height: 50%;">
        <?= number_format($product->price_product,2,'.', ' ') ?> &euro;
        </td>
        <td>
           <input type="number" name="cart[quantity][<?= $product->id_product;?>]" width="10px" value="<?= $_SESSION['cart'][$product->id_product];?>">   
        </td> 
        <td style="color:red;">
          <a href="cart.php?delCart=<?= $product->id_product ?>">Supprimer</a>
        </td>
      </tr>
      <tr >
      
      </tr>



<?php
}

 ?>  
   
 <td colspan= "100%" > <a href="cart.php?delAllProduct=1" style="float:left">Vider le panier</a> <p style="float:right">  prix total : <?=  number_format($cart->totalPrice(),2 ,',',' '); ?> &euro;</p></td> 

      <input type="submit"  value="Rafraichir" style="float:center"/>
    
    </table>
            
     <?php
}

 ?>        

          </div>


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