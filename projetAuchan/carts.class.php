<?php

class carts{
private $DB;
	public function __construct($DB){
		if(!isset($_SESSION)){
			session_start();
		}

		if(!isset($_SESSION['cart'])){

			$_SESSION['cart'] = array();
		}
		$this->DB=$DB;
		if(isset($_GET['delCart'])){
			$this->delProduct($_GET['delCart']);

		}
		if(isset($_GET['cart'])){
			$this->recalc();
		}
		if(isset($_GET['delAllProduct'])){
			$this->delAllProduct();
		}
	}
	public function recalc(){

		var_dump($_POST);
	}
	public function addProduct($id_product){
		if(isset($_SESSION['cart'][$id_product])){
			$_SESSION['cart'][$id_product]++;
		}else

		$_SESSION['cart'][$id_product]=1;

		}

	public function delProduct($id_product){
		unset($_SESSION['cart'][$id_product]);

		}
	
	public function delAllProduct(){
			unset($_SESSION['cart']);
			$_SESSION['cart']=array();
		}

	public function countProducts(){

		return array_sum($_SESSION['cart']);

		}
	

	public function totalPrice(){
		$totalPrice = 0 ;

		$session = $_SESSION['cart'];
		$id_products = array_keys($session);
		$implode = implode(',',$id_products);
		//$list = substr($implode, -1,strlen($implode)-1);

	if(empty($id_products)){
	  $products= array();
		}
		else{
		$products = $this->DB->query('SELECT id_product, price_product from products WHERE id_product IN ('.$implode.')');
		}


		foreach ($products as $product) {
		$totalPrice+= $product->price_product * $_SESSION['cart'][$product->id_product] ;
		}
	return $totalPrice;
	}

}

?>