<?php
session_start();
$servername="localhost";
$username1 = "root";
$password1 = "";
$username=$password="";
if($_SERVER["REQUEST_METHOD"]=="POST")
{
	$username=testinput($_POST["fname"]);
	$password=testinput($_POST["fpassword"]);
	
}
try{
$conn = new PDO("mysql:host=$servername;dbname=takshshila",$username1,$password1);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$query = "SELECT COUNT(*) FROM signup WHERE username='$username' AND password='$password'";
$qu= $conn->prepare($query);
$qu->execute();

$result= ($qu->fetchColumn()>0)?1:0;
if($result>0)
{
		$_SESSION['login_user']=$username;
		echo "welcome";
}
else{
	
	$err = "Sorry, Please check <br> Username and Password.";
	echo $err;
}
}
catch(PDOException $e)
{
	echo $e->getMessage();
}


function testinput($data){
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
}

?>