<?php
include("connect.php");
$comment = $_REQUEST["q"];

	
	$comment = trim($comment);
	$comment = htmlspecialchars($comment);
	$title = $_SESSION["title"];
	$user = $_SESSION["login_user"];
	
	$up = $conn->prepare("INSERT INTO comments (title, username, comment) VALUES('$title', '$user' ,'$comment')");
	$up->execute();
	
$query = $conn->prepare("SELECT * FROM comments WHERE title='$title' ORDER BY time DESC");
	$query->execute();
	
	while($x = $query->fetch())
		echo '<div class="display-comment">
		<div class="profile-image">
			<img src="ass" height="40px" width="30px">
		</div>
		<div class="user-comment">
			
			<h4 style="left:5px;color:#006371;"><u>'.$x['username'].'</u></h4>
			<p style="font-family:Merriweather, Georgia, serif;">'.$x['comment'].'</p>
		</div>	
		</div>
		<hr>';
?>