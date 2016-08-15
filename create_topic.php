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
	min-height:295px;
	
}
	#description{
		resize:none;
	}
</style>
<script>
	function validate()
	{
			var title = document.getElementById("newtitle").value;
			var description = document.getElementById("description").value;
			var same = document.my.allow;
			var allow = 0;
			if(same.checked)
			{
				allow= 1;
			}
			if(title.length < 5 )
				{
					alert("too Short");
					return false;
				}
			else if(title.length > 500)
			{
				alert("maximum character limit exceed");
				return false;
			}
			
			if(description.length > 1000)
			{
				alert("maximum character limit exceed");
				return false;
			}
	}
</script>
<?php 
	include("connect.php");
	$err= "";
	if($_SERVER["REQUEST_METHOD"]=="POST")
		{
			$title = $_POST["newtitle"];
			$description = $_POST["description"];
			$title = trim($title);
			$title = htmlspecialchars($title);
			$description = trim($description);
			$description = htmlspecialchars($description);
			$user = $_SESSION["login_user"];
			try{
				$rr= $conn->prepare("SELECT COUNT(*) FROM topic WHERE topic='$title'");
				$rr->execute();
				$result = ($rr->fetchColumn() >0)?1:0;
				if($result==1)
				{
					$err= "Please choose different name for your topic, as it already <br>created by someone else";
					
				}
				else{
			$query = $conn->prepare("INSERT INTO topic (topic , description, created_by) VALUES('$title', '$description', '$user')");
			$query->execute();
			
			header('Location:discussion.php');
			}
			}
			catch(PDOException $e)
			{
				echo $e->getMessage();
			}
		}
	
?>
</head>
<body>
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
		<h3>New Topic Details</h3>
		<form onsubmit="return validate();" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" name="my">
			Title<span style="color:red">*</span><br>
			<input type="text" id="newtitle" name="newtitle"><br>
			 <br>
				<p style="color:red;">
				<?php echo $err;?>
				</p>
			<br>
			Description<br>
			<textarea id="description" name="description" rows="10" cols="50"></textarea>
			<br><br>
			<input type="submit" value="Save&Add">
			<input type="button" onclick=window.open("discussion.php","_self") value="Cancel"><br><br>
			<span style="color:red">*</span> mandatory
		</form>
	</div>
</body>
</html>