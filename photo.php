<?php 
include("connect.php");
$photo = $_REQUEST["q"];
$user = $_SESSION["login_user"];

$query= $conn->prepare("UPDATE signup SET profile_pic='$photo' WHERE username='$user'");
$query->execute();

echo '<img src="'.$photo.'">';

?>