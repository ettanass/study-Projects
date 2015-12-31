<?php 
require 'db.class.php';
require 'carts.class.php';
  $DB=new DB();
$cart = new carts($DB);

$json = array('error'=>true);
if (isset($_GET['id_product'])) {

	$product=	$DB->query("SELECT id_product FROM products WHERE id_product=:id_product LIMIT 1",array('id_product' => $_GET['id_product']));


		$cart->addProduct($product[0]->id_product);
		$json['error'] = false;
		$json['total'] = $cart->totalPrice();
		$json['count'] = $cart->countProducts();
		$json['message'] = "le produit a été ajouté";

}
 	echo json_encode($json);

?>