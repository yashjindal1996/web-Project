<?php
include("connect.php");
$username= $_REQUEST["q"];
$query1 =  "SELECT COUNT(*) FROM signup WHERE username='$username'";
	$qu1 = $conn->prepare($query1);
	$qu1->execute();
	
	$result1 = ($qu1->fetchColumn() >0)?1:0;
	if($result1>0)
	{
		echo "user already exist";
	}
	
?>