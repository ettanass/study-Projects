<!DOCTYPE>


<html>
<head>
	<title>INSERTION DE PRODUIT</title>

<meta http-equiv="content-type" content="text/html; charset=utf-8" />

<style type="text/css">


td{
font-weight: bold;
}

</style>
<?php

	include '../includes/connect.php';

?>
</head>
<body>
<form action="insert_product.php" method="post" enctype="multipart/form-data">
	<table align="center" width="80%">
			<tr>
				<td colspan="7" align="center" >
					<h2>Insérer un nouveau produit</h2>
				</td>
			</tr>

			<tr>
				<td align="center" >Titre du produit</td>
				<td align="center" ><input type="text" name="name_product" required></td>
			</tr>

			<tr>
				<td align="center" >Catégorie du produit</td>
				<td align="center" >
					
					<select name="categ_product" >
						<option>choisir une catégorie</option>
						
						<?php

						$sql = "select * from categories";

						$run_sql= mysqli_query($conn , $sql);

						while ($row_categ=mysqli_fetch_array($run_sql)) {
							
							$id_categorie = $row_categ['id_categorie'];
							$name_categorie = $row_categ['name_categorie'];

							echo "<option value='$id_categorie'>$name_categorie</option>";
						}



						?>


					</select>
				</td>
			</tr>

			<tr>
				<td align="center" >Marque du produit</td>
				
				<td align="center" >
				<select name="brand_product" >
						<option >choisir une marque</option>
				<?php

						$sql = "select * from brands";

						$run_sql= mysqli_query($conn , $sql);

						while ($row_categ=mysqli_fetch_array($run_sql)) {
							
							$id_brand = $row_categ['id_brand'];
							$name_brand = $row_categ['name_brand'];
echo '$id_brand';
							echo "<option value='$id_brand'>$name_brand</option>";
						}



						?>
						</select>
						</td>
			</tr>

			<tr>
				<td align="center" >Prix du produit</td>
				<td align="center" ><input type="text" name="price_product" required></td>
			</tr>

			<tr>
				<td align="center" >Description du produit</td>
				<td align="center" ><textarea name="desc_product" ></textarea></td>
			</tr>

			<tr>
				<td align="center" >lien de l'image du produit</td>
				<td align="center" ><input type="file" name="picture_product" required></td>
			</tr>

			<tr>
				<td align="center" >mots-clés du produit</td>
				<td align="center" > <input type="text" name="keywords_product" required></td>
			</tr>

			

			<tr  align="center">
				<td colspan="7"><input type="submit" name="insert_post" value="Valider"></td>
			</tr>
	</table>
	</form>
</body>
</html>

<?php

	if(isset($_POST['insert_post'])){

		$name_product= $_POST['name_product'];
		$categ_product= $_POST['categ_product'];
		$brand_product= $_POST['brand_product'];
		$price_product= $_POST['price_product'];
		$desc_product= $_POST['desc_product'];
		$keywords_product= $_POST['keywords_product'];

	//get image from field
		$picture_product= $_FILES['picture_product']['name'];
		$picture_product_tmp= $_FILES['picture_product']['tmp_name'];

		move_uploaded_file($picture_product_tmp, "images_products/$picture_product");


		$insert_product_query = "insert into products (name_product , category_product, brand_product , price_product ,
								 description_product , image_product , keywords_product) 
								values ('$name_product' , '$categ_product' , '$brand_product' , '$price_product' , '$desc_product' , '$picture_product' , '$keywords_product')";

								echo "$insert_product_query";

		$insert_query= mysqli_query($conn , $insert_product_query);
	
		if($insert_query){

			echo "<script>alert('produit crée')</script>";
			echo "<script>window.open('insert_product.php', '_self')</script>";
	}

	}	

	


?>