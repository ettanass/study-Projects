    <div class="header">
 <a href="index.php">
      <img id="logo" src="images/logo.png">
</a>
       
      
 <div id="shopping_cart" >
  <a href="cart.php" style="text-decoration:none;">
           <p style='float:left; line-height:30px;'> nombre de produits :<span  id="count">
              <?php 
              if(isset($_GET['cart'])){
              echo $cart->countProducts() ;
              }

            ?><br>  
            </span></p>
            <img id="panierLogo" src="images/panier.png" alt="Panier" > 
          <p style='float:left; line-height:30px;'>  prix total :<span  id="total">
             <?php
 if(isset($_GET['cart'])){
              echo number_format($cart->totalPrice(),2,'.', ' ') ;
            }
              ?></span>&euro;</p>
            
   </a>

          </div>

    </div>