<?php 
include("connect.php");
$phone = $_REQUEST["q"];
$user = $_SESSION["login_user"];

$query= $conn->prepare("UPDATE signup SET phone='$phone' WHERE username='$user'");
$query->execute();
echo $phone;
?>