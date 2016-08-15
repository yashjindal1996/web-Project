<?php
include("connect.php");
$emailid= $_REQUEST["q"];
$query =  "SELECT COUNT(*) FROM signup WHERE email='$emailid'";
	$qu = $conn->prepare($query);
	$qu->execute();		
	$result = ($qu->fetchColumn() >0)?1:0;

		
		if($result>0)
		echo "Email-id is already registered";
	
	
?>