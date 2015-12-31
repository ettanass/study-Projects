    <div class="header">
 <a href="index.php">
      <img id="logo" src="images/logo.png">
</a>
       
      
 <div id="shopping_cart" >
  <a href="cart.php" style="text-decoration:none;">
            <span style='float:left; line-height:30px;' id="count">
              nombre de produits :<?= $cart->countProducts() ?><br>  
            </span>
            <img id="panierLogo" src="images/panier.png" alt="Panier" > 
            <span style='float:left; line-height:30px;' id="total">
            prix total : <?= number_format($cart->totalPrice(),2,'.', ' ') ?></span>
            
   </a>
          </div>

    </div>