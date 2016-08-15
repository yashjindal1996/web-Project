<?php 
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$imagepath = $title = "";
try{
$conn = new PDO("mysql:host=$servername;dbname=takshshila",$username,$password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
/*
 $stmt = $conn->prepare("INSERT INTO newarrival (title, imagepath) 
    VALUES (:title, :imagepath)");
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':imagepath', $imagepath);

$title = "The spectacular now";
$imagepath = "newarrival/new1.jpg";
$stmt->execute();

$title = "Popular children";
$imagepath = "newarrival/new2.jpg";
$stmt->execute();

$title = "City of bones";
$imagepath = "newarrival/new3.jpg";
$stmt->execute();

$title = "The naughtiest girl";
$imagepath = "newarrival/new4.jpg";
$stmt->execute();

$title = "magnus chase";
$imagepath = "newarrival/new5.jpg";
$stmt->execute();

$title = "The bane chronicles";
$imagepath = "newarrival/new6.jpg";
$stmt->execute();

$title = "Saint anything";
$imagepath = "newarrival/new7.jpg";
$stmt->execute();

$title = "forever with you";
$imagepath = "newarrival/new8.jpg";
$stmt->execute();

$title = "Red Rising";
$imagepath = "newarrival/new9.jpg";
$stmt->execute();

$title = "Immaculate";
$imagepath = "newarrival/new10.jpg";
$stmt->execute();

$title = "Innovators";
$imagepath = "newarrival/new11.jpg";
$stmt->execute();

$title = "the land or stories";
$imagepath = "newarrival/new12.jpg";
$stmt->execute();

$title = "Gone girl";
$imagepath = "newarrival/new13.jpg";
$stmt->execute();

$title = "dark places";
$imagepath = "newarrival/new14.jpg";
$stmt->execute();

$title = "the opposite of loneliness";
$imagepath = "newarrival/Snew15.jpg";
$stmt->execute();

*/



if(!isset($_SESSION["login_user"]))
{
	$_SESSION["login_user"] = "Login";
	}

}
catch(PDOException $e)
{
	echo $e->getMessage();
	
}
?>