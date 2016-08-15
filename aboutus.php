<!DOCTYPE html>
<html>
<head>
<title>Takshshila</title>
<link rel="icon" href="my.ico" type="image/x-icon">
<link rel="stylesheet" type="text/css" href="navbar.css">
<style>
body{
margin:0;
padding:0;
background-image:url('pag1.png');
background-size:cover;
}
.hello{
margin-top:-20px;
}
h1{
text-align:center;
font-family:Lato, sans-serif;
font-size:44px;
}
.slider{
position:relative;
margin-left:22%;
}
.texts{
position:absolute;
color:white;
font-family:Merriweather, Georgia, 'times new roman', serif;
font-size:27px;
text-align:center;
left:10%;
top:70%;
}
#slid{
transition:1s;
}
.div2{
position:relative;
font-family:Lato, 'Helvetica Neue', helvetica, arial, sans-serif;
margin-left:22%;
}
.div2 ul{
list-style:none;
}
#teamh{
margin-left:35%;;

}
.team{
float:left;
background-color:white;
box-shadow:0 0 2px 2px rgba(0,0,0,.1);
width:200px;
height:300px;
margin-top:50px;
margin-left:100px;
}
.team img{
width:200px;
height:250px;
}
.teamtext{
text-align:center;
padding-top:15px;
font-family:Lato, 'Helvetica Neue', helvetica, arial, sans-serif;
font-weight:bold;
}
</style>
<script>
var i=0;
function slide(){
var elem = document.getElementById("slid");
var img = ["about1.jpg", "about2.jpg", "about3.jpg"];
i = (i+1)%3;
elem.src = img[i];
setTimeout("slide()",2000);
}

window.onload = slide;
</script>
</head>
<body>
<?php
include("connect.php");
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
	   <li><a href="#"  id="home3" class="active">About</a></li>
	   <li><a href="discussion.php" id="home3">Discussion</a></li>
	   <li><a href="Book-page.php"  id="home1">Books</a></li>
	   <li ><a href="home.php" id="home" >Home</a></li>
	  </ul>
  </div>
</nav>
	<h1>About Us</h1>
	<div class="slider">
		<img src="about1.jpg" id="slid" style="opacity: .9;"></img>
		<div class="texts">The right book in the right hands at the right <br>time can change the world.</div>
	</div>
	<div class="div2">
		<h2>A Few Things You Can Do On Takshshila</h2>
			<ul>
				<li>Read Book Online.</li>
				<li>Download Books.</li>
				<li>Discussion over Books.</li>
				<li>Find out if book a is good fit for you from user's reviews. </li>
			</ul>
		<h2 id="teamh">Team</h2>
			<div class="team">
				<img src="yash.jpg"></img>
					<div class="teamtext">Yash Jindal</div>
			</div>
	
	<div class="team">
		<img src="ddd"></img>
			<div class="teamtext">Nitin Kumar</div>
			</div>
	
	
	
	</div>
</body>
</html>