<?php
include("connect.php");
if(isset($_SESSION["ID"])){
	header('Location:success.php');
	}
else{
	header('Location:login-page.php');
}

?>