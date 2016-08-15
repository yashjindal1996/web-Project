<?php
$name = $username =  "";
if($_SERVER["REQUEST_METHOD"]=="POST")
{
$name = testinput($_POST["names"]);
$username = testinput($_POST["username"]);
$email = testinput($_POST["e-mail"]);
$password = testinput($_POST["password12"]);

}
function testinput($data){
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
}

$servername = "localhost";
$username1 = "root";
$password1 = "";
try{
$conn = new PDO("mysql:host=$servername;dbname=takshshila",$username1,$password1);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$query =  "SELECT COUNT(*) FROM signup WHERE email='$emailid'";
		$qu = $conn->prepare($query);
		$qu->execute();
		
		$result = ($qu->fetchColumn() >0)?1:0;
		if($result>0)
		$err = "user already exist";
$stmt = $conn->prepare("INSERT INTO signup (name, username, email, password)
VALUES(:name, :username, :email, :password)");
$stmt->bindParam(':name', $name);
$stmt->bindParam(':username', $username);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':password', $password);

$stmt->execute();
}
catch(PDOException $e)
{
  echo $e->getMessage();
}

