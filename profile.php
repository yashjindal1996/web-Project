<html>
<head>
	<link rel="stylesheet" type="text/css" href="navbar.css">	
	<title>Takshshila</title>
	<link rel="icon" href="my.ico" type="image/x-icon">
<style>
	body{
		padding:0;
		margin:0;
		background-image:url('pag1.png');
background-size:cover;
background-size:cover;
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

	min-height:500px;
	
	}
	#profile_pic{
		text-align:center;
		position:absolute;
		width:200px;
		height:auto;
	
		left:0px;
	}
	#profile_pic img{
		height:250px;
		width:200px;
	}
	#review{
		
	}
	#details{
		
		position:absolute;
		left:250px;
		height:500px;
		width:500px;
	}
	#profile{
		text-align:left;
	}
	 #profile th{
		width:100px;
	}
	#profile td,td{
		width:250px;
	}
	.list {
		text-decoration:none;
		color:black
	}
	
	
.modal {
    display:none;
    position: fixed; 
    z-index: 6; 
    padding-top: 100px; 
    left: 0;
    top: 0;
    width: 100%; 
    
	background-color: rgba(0,0,0,0.4); 
}
.modal-content {
    background-color: #fefefe;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 70%;
}


.close {
    color: #aaaaaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}
.modal-content img{
height:200px;
width:150px;
margin-left:20px;
}
</style>
<script>
function change()
{
	var elem = document.getElementById("phone");
	elem.innerHTML = "<input type='text' name='phone' id='number' onchange='submit()'>"
	
}
function submit()
{
	var nm = document.getElementById("number").value;
	
	if(nm.length!=10 || isNaN(nm))
	{
		document.getElementById("invalid").innerHTML = "Not a valid Number";
	}
	else{
		document.getElementById("invalid").innerHTML = "";
	
	var xmlhttp = new XMLHttpRequest();
         xmlhttp.onreadystatechange = function() {
             if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                 document.getElementById("phone").innerHTML = xmlhttp.responseText;
				 
             }
         }
         xmlhttp.open("GET", "phone.php?q="+nm, true);
         xmlhttp.send();
	}
}


function display()
{
	var modal = document.getElementById('myModal');
	 modal.style.display = "block";
}
function hide() {
	var modal = document.getElementById('myModal');
    modal.style.display = "none";
}
function set(a)
{
	hide();
	var path = a.src;
	var index = path.lastIndexOf("webtech/");
	
	var image = path.substring((index + 8), path.length);
	

	var xmlhttp = new XMLHttpRequest();
         xmlhttp.onreadystatechange = function() {
             if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                 document.getElementById("cover").innerHTML = xmlhttp.responseText;
				 
             }
         }
         xmlhttp.open("GET", "photo.php?q="+image, true);
         xmlhttp.send();
}

</script>
</head>
<body>
<?php include("connect.php"); 
$user = $_SESSION["login_user"];
$query = $conn->prepare("SELECT * FROM signup WHERE username='$user'");

$query->execute();
while($r = $query->fetch())
{
	$email = $r["email"];
	$name = $r["name"];
	$phone = $r["phone"];
	$photo = $r["profile_pic"];
}
$query = $conn->prepare("SELECT * FROM topic WHERE created_by='$user'");
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
	   <li><a href="discussion.php"  id="home3">Discussion</a></li>
	   <li><a href="Book-page.php"  id="home1">Books</a></li>
	   <li ><a href="home.php" id="home">Home</a></li>
	  </ul>
  </div>
</nav>
<div class="container">
	<div id="profile_pic">
			<div id="cover">
			<?php
				if(isset($photo))
					echo '<img src="'.$photo.'">';
				else
				 echo '<img src="profile.png">';
			?>
			</div>
			<button id="myBtn" onclick="display()" style="margin-top:15px;padding:10px;color:white;background-color:#faa605;border:none;cursor:pointer;">Edit Profile Photo</button>


<div id="myModal" class="modal">

  <div class="modal-content">
    <span class="close" onclick="hide()">&#8855;</span>
    
	<img src="1.jpg" onclick="set(this)" style="cursor:pointer;border:solid;">
	<img src="2.jpg " onclick="set(this)" style="cursor:pointer;border:solid;">
	<img src="3.jpg" onclick="set(this)" style="cursor:pointer;border:solid;">
	<img src="4.jpg" onclick="set(this)" style="cursor:pointer;border:solid;">
	<img src="5.jpg" onclick="set(this)" style="cursor:pointer;border:solid;">
	<img src="6.jpg " onclick="set(this)" style="cursor:pointer;border:solid;">
	<img src="7.png" onclick="set(this)" style="cursor:pointer;border:solid;">

	
  </div>

</div>
			<div id="review">
			<?php
			$rr1 = $conn->prepare("SELECT COUNT(*) FROM comments WHERE username='$user'");
			$rr1->execute();
			$c1 = $rr1->fetchColumn();
			
			$rr2 = $conn->prepare("SELECT COUNT(*) FROM topic WHERE created_by='$user'");
			$rr2->execute();
			$c2 = $rr2->fetchColumn();
			
			$rr3 = $conn->prepare("SELECT COUNT(*) FROM rating WHERE username='$user'");
			$rr3->execute();
			$c3 = $rr3->fetchColumn();
				echo '<p>rated '.$c3.'</p>
				<p>reviews '.$c1.'</p>
				<p>Topic '.$c2.'</p>';
			?>
			</div>
	</div>
	<div id="details">
	<?php

		
	echo '
		<h2>'.$user.'</h2>
		<hr>
		<br>
		<table id="profile">
			<tr>
				<th>Name:</th>
				<td>'.$name.'</td>
			</tr>
			<tr>
				<th>E-mail:</th>
				<td>'.$email.'</td>
			</tr>
			<tr>
				<th>Phone:</th><td id="phone">';
				if(isset($phone))
				echo $phone;
				else
					echo '<a href="#" onclick="change()">Click here</a> to add phone number';
			echo '</td><td style="color:red" id="invalid"></td></tr>
		</table>';
		?>
		<br>
	<div id="topic">
		<h3>Your Topics</h3>
		<hr>
		<table>
			<?php 
				while($r = $query->fetch())
				{
					$topic = $r["topic"];
					$id= $r["id"];
					$cc = $conn->prepare("SELECT COUNT(*) FROM topic_comment WHERE topic='$topic'");
					$cc->execute();
					$result= $cc->fetchColumn();
				echo '<tr> 
					<td><a href="discussion-page.php?id='.$id.'" class="list">'.$topic.'</a></td>
					<td>('.$result.')</td>
					<td><a href="remove.php?topic='.$topic.' ">Remove</a></td>
				</tr>';
				}
			?>

		</table>
	</div>
	</div>
	<div id="description">
	</div>
</div>
</body>
</html>