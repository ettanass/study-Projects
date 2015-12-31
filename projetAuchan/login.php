<?php
if(isset($_SESSION['username'])){
echo "bienvenue" .$_SESSION['username'];
}
if (isset($_POST['logout'])) {

session_destroy();
}

?>
<div style="float:right"></div>
<h6>Authentification</h6>
<form method="post" >
	<input type="submit" name="logout" value="Deconnexion">
</form>