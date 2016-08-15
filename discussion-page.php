<?php include("connect.php"); ?>
<!DOCTYPE html>
<html>
<head>
<title>Takshshila</title>
<link rel="icon" href="my.ico" type="image/x-icon">
 <link rel="stylesheet" type="text/css" href="navbar.css">
 <link rel="stylesheet" type="text/css" href="footer.css">
<script>
	function submiting()
	{
		var comment = document.myform.comments.value;
		var tab = document.getElementById("tablediv");
		
		if(comment.length==0)
		{
			return;
		}
		else{
			 xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange= function()
			{
				if(xmlhttp.readystate==4 && xmlhttp.status == 200)
				{
					tab = tab + xmlhttp.responseText;
				}
			};
			xmlhttp.open("POST" ,"discuss.php?q="+comment+"&topic=<?php echo $topic;?>");
			xmlhttp.send();
			
		}
		
	}
</script>
<style>
body{
padding:0;
margin:0;
}
.hello{
margin-top:-20px;
}
.container{
	font-family:Tahoma, Arial, sans-serif;
	position:relative;
	width:60%;
	left:20%;
	top:70px;
	height:auto;
	margin-bottom:100px;
	
}
.description{
	width:100%;
	height:100px;
}
table{
	border:solid black 1px;
	border-collapse: collapse;
	border-radius:2px;
	font-family:Tahoma, Arial, sans-serif;
	text-align:left;
	width:100%;
}
.display-comments{
	margin-top:50px;
	height:auto;
}
.head{
	background-color:#F2F2F2;
	height:50px;
}
td{
	border-bottom:solid black 1px;
	height:auto;
padding-top:10px;
	}
textarea{
	resize:none;
}
</style>
<script>
	function postcomment()
	{
		var cc = document.getElementById("comments");
	var comment = cc.value;
	if(comment=="")
		return 0;
	else{
		var xmlhttp = new XMLHttpRequest();
         xmlhttp.onreadystatechange = function() {
             if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                 document.getElementById("table").innerHTML = xmlhttp.responseText;
				 cc.value = "";
             }
         }
         xmlhttp.open("GET", "discuss.php?q="+comment, true);
         xmlhttp.send();
	}
	}
</script>
</head>
<body>
<?php 
$id = $_REQUEST["id"];
$query = $conn->prepare("SELECT * FROM topic WHERE id='$id'");
$query->execute();
$query->setFetchMode(PDO::FETCH_ASSOC);
while($r = $query->fetch())
{	$time= $r['time'];
	$topic = $r['topic'];
	$description = $r['description'];
	$created_by = $r['created_by'];
}
$_SESSION["topic"]=$topic;
$comm = $conn->prepare("SELECT * FROM topic_comment WHERE topic='$topic' ORDER BY time DESC");
$comm->execute();


$count = $conn->prepare("SELECT COUNT(*) FROM topic_comment WHERE topic='$topic'");
		$count->execute();
		$result = $count->fetchColumn();
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
	<?php
	echo '<h2>'.$topic.' </h2>
	<h4>Posted on '.date('M j Y ', strtotime($time)).' by <u>'.$created_by.'</u></h4>
		<div class="description">'.$description.'</div>';?>
		
		
	<div class='give-comment'">
	
			<?php 
			if(isset($_SESSION["ID"]))
			echo "<h3>Comment</h3>
			<div><textarea name='comments' id='comments' style='font-family:sans-serif;font-size:1.2em;' rows='5' cols='79'></textarea></div>
			<input type='submit' name='comment' onclick='postcomment()' value='Submit' style='background-color:#faa605;color:white;border:none;margin-top:10px;padding:10px;'>";
		?>
	</div>
	
	<div class="display-comments">
		<table id="table">
			<tr>
				<?php echo'<td class="head">Comments('.$result.')</td>';?>
			</tr>
			<div id="tablediv">
					<?php 
					while($x = $comm->fetch())
					echo '<tr>
						<td>
							<div style="padding:5px;margin-left:40px;">
								<b>'.$x['username'].'</b><br>'.$x['comment'].'
							</div>
						</td>
					</tr>'; ?>
			</div>
		</table>
	</div>
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