<!DOCTYPE html>
<html>
<head>
<title>Takshshila</title>
<link rel="icon" href="my.ico" type="image/x-icon">
 <link rel="stylesheet" type="text/css" href="navbar.css">
 <link rel="stylesheet" type="text/css" href="footer.css">

<style>
body{
padding:0;
margin:0;
}
.hello{
margin-top:-20px;
}
.container{
	height:auto;
	position:relative;
	width:60%;
	left:20%;
	top:70px;
	margin-bottom:161px;
	min-height:295px;
	text-align:center;
}
#create{
	text-decoration:none;
	border:solid black 2px;
	padding:5px;

	color:black;
	
}
table{
	border:solid black 1px;	
	border-collapse: collapse;
	font-family:Tahoma, Arial, sans-serif;
	text-align:left;
	margin-top:15px;
	
	}

th, td{
	border-bottom:1px solid black;
}
th{
	height:30px;
	background-color:#F2F2F2;
		
}
.col1{
	width:35%;
}
.col2{
	width:15%;
}
.col3{
	width:15%;
}
td{
	padding-left:10px;
	padding-top:10px;
}
.topic-name{
	text-decoration:none;
	color:#009ACF;
}

</style>
</head>
<body>
<?php include("connect.php");

$query = $conn->prepare("SELECT * FROM topic ORDER BY time DESC");
$query->execute();
?>
<nav class="navbar navbar-inverse hello">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="home.php"><img src="tak.png"></img></a>
    </div>
    <ul class="nav navbar-nav navbar-right">
       <li class="loginin">
	   <?php  
			if(isset($_SESSION['ID']))
			{
				echo "<a href='#' id='user'>".$_SESSION['login_user']."&#9662;</a>";
				echo "<ul class='dropdown'>";
				echo "<a href ='profile.php' class='logg' >Profile</a></li>";
				echo "<a href ='signout.php'  class='logg'>Signout</a></li>";
				echo "</ul>";
			}
			else{
				
				echo "<a href='login-page-sc.php' id='home4'>Login</a>";
			}
	   
	   ?></a></li>
	   <li><a href="aboutus.php"  id="home3">About</a></li>
	   <li><a href="discussion.php" class="active" id="home3">Discussion</a></li>
	   <li><a href="Book-page.php"  id="home1">Books</a></li>
	   <li ><a href="home.php" id="home">Home</a></li>
	  </ul>
  </div>
</nav>
<div class="container">
<h3>Books Blogs</h3>
<?php
	if(isset($_SESSION["ID"]))
		echo '<a href="create_topic.php" id="create">Create Topic</a>';
	else
		echo '<a href="login-page.php">Login</a> to Create Your own topic.';

?>
	<table>
		<tr>
			<th class="col1" id="col1">Topics</th>
			<th class="col2" id="col2">Comments</th>
			<th class="col3" id="col3">Last Comment</th>
		</tr>
		<?php 
	
		while($r = $query->fetch())
		{
			
			$x=$r['topic'];
		$count = $conn->prepare("SELECT COUNT(*) FROM topic_comment WHERE topic='$x'");
		$count->execute();
		$result = $count->fetchColumn();
		if($result==0)
		{
			$last = "No Comments";
		}
		else
		{
		$qq = $conn->prepare("SELECT username FROM topic_comment WHERE topic='$x'");
			$qq->execute();
			while($y = $qq->fetch())
				$last = $y["username"];
		}
		echo '<tr>
			<td><a href="discussion-page.php?id='.$r['id'].'" class="topic-name">'.$r['topic'].'</a><br>created by <b>'.$r['created_by'].'<b></td>
			<td>Comments:'.$result.'</td>
			<td>by <b>'.$last.'</b></td>
		</tr>';
		}?>
	
	</table>
</div>
<div class="footer">
  <div class="social-media">
		<a href="#"><img src="facebook.png" class="logos"></a>
		<a href="#"><img src="twitter.png" class="logos"></a>
		<a href="#"><img src="linkdin.png" class="logos"></a>
		<a href="#"><img src="instagram.png" class="logos"></a>
 </div>
   <a href="#" style="text-decoration:none;color:white;">Contact Us</a>
   <div class="low-foot">
   <br>&copy copyright 2016-2017
</div>
</div>

</body>
</html>