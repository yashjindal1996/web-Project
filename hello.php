<!DOCTYOPE html>
<html>
<head>
<title>Takshshila</title>
<link rel="icon" href="my.ico" type="image/x-icon">
 <link rel="stylesheet" type="text/css" href="navbar.css">
 <link rel="stylesheet" type="text/css" href="footer.css">
<style>
body{
overflow-x:hidden;
margin:0;
padding:0;
}
.container{
position:relative;
top:10%;
width:70%;
left:15%;
height:600px;

}
.book-image{
text-align:center;
float:left;
width:250px;
height:100%;
}

.description{
padding-left:10px;
margin-left:250px;
height:100%;
}

.give-comments{
width:70%;
margin-left:15%;
margin-top:10%;
margin-bottom:15%;

}
.display-comment{
	position:relative;
	margin-top:10px;
}
.profile-image{

	float:left;
}
.user-comment{

	margin-left:32px;
}
.book-image img{
height:350px;
width:250px0px;
}
.container a{
text-decoration:none;
}
.container ul{
list-style:none;
text-align:center;
display:inline-block;
}
.book-image ul li{
padding:20px 0px;
}
.buttons{
border:solid 2px #3D9363;
color:black;
border-radius:5px;
transition:1s;
font-family: Lato, 'helvetica neue', helvetica, sans-serif;
}
.buttons:hover{
color:white;
background-color:#3D9363;
}
.book-image li a{
display:block;
padding:14px 20px;
font-family:arial,sans-serif;
font-size:20px;
font-color:white;

}
li a:hover
{
border-bottom-style:solid;
border-width:2px;
}
li a.active
{
color:white;
border-width:2px;
background-color:
}
#bookpdf{
margin-left:10%;
display:none;
}
#extra{
display:none;
}
hr{
background-color:black;
height:1px;
}
/* rating bar */


.rating {
    float:left;
    width:110px;
	align-content:center;
}
.rating span 
{ float:right; 
position:relative;
 }
.rating span input {
    position:absolute;
    top:0px;
    left:0px;
    opacity:0;
}
.rating span label {
    display:inline-block;
    width:10px;
    height:10px;
    text-align:center;
    background:#ccc;
    margin-right:2px;
    border-radius:50%;
   
}
.rating span:hover ~ span label,
.rating span:hover label,
.rating span.checked label,
.rating span.checked ~ span label {
    background:#F90;
    color:#FFF;
}

</style>
<script>
function showmore()
{
var elem = document.getElementById("more");
var elem1 = document.getElementById("extra");
elem.style.display = "none";
elem1.style.display = "block";
};
function showless(){
var elem = document.getElementById("less");
var elem1 = document.getElementById("extra");
elem.style.display = "none";
elem1.style.display= "none";
};

function commentinput(){
var comm = document.getElementById("comments").value;
alert(comm);
}
function rate(){
var rating = document.forms[0];
var i;
var x;
 for(i=0;i<5;i++)
{
	if(rating[i].checked)
		{
		break;
		}
}
alert(rating[i].value);
}
</script>
</head>
<body>
<?php include("connect.php");
//$titleof = $_REQUEST["title"];
$query = $conn->prepare("SELECT * FROM book WHERE title='art2'");
$query->execute();
$query->setFetchMode(PDO::FETCH_ASSOC);
$para = "Christopher John Francis Boone knows all the countries of the world and their capitals and every prime number
			up to 7,057. He relates well to animals but has no understanding of human emotions. He cannot stand to be touched. And he detests the color yellow.
			Although gifted with a superbly logical brain, for fifteen-year-old Christopher everyday..
			interactions and admonishments have little meaning . He lives on patterns, rules, and a diagram kept in his pocket. Then one day, a neighbor's dog, Wellington, 
			is killed and his carefully constructive universe is threatened. Christopher sets out to solve the murder 
			in the style of his favourite (logical) detective, Sherlock Holmes. What follows makes for a novel that
			is funny, poignant and fascinating in its portrayal of a person whose curse and blessing are a mind that 
			perceives the world entirely literally. ";
while($r = $query->fetch())
{
	
$path = $r['imagepath'];
$titl =$r['title'];
$author=$r['author'];
}?>
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
	   <li><a href="Book-page.php" class="active" id="home1">Books</a></li>
	   <li ><a href="home.php" id="home">Home</a></li>
	  </ul>
  </div>
</nav>

 <div class="container">
	<div class="book-image">
		<?php
			
			
		echo "<img src='".$path."' >";
			
		echo "<ul>";
		echo "<li><a href='java.pdf' class='buttons' target='window'>Read Online</a></li>";
		echo "<li><a href='#' class='buttons'>Download</a> </li>"
		?>
		<ul>
	</div>

<div class="description" name="reading" >
		
		<?php 
		echo "<h2>".$titl."</h2>";
		echo "<p>by <b>".$author."</b></p>";
		if(strlen($para)>400)
		{
			$stringcut = substr($para,0,400);
		}
		echo $stringcut."...<a href='#' onclick=''>Read more</a>";
		
		
		?>
			<hr/>
		<p>Paperback, Vintage Contemporaries, 226 pages</p>	
		<p>Published May 18th 2004 by Vintage (first published July 31st 2003)</p>
	</div>
</div>


	<div class="give-comments" >
		<div class="give-comment">
				
					<form name="myform" method="post" action="comment.php">
						<h3>Comment</h3>
						<div>
							<textarea name="comments" id="comments" style="font-family:sans-serif;font-size:1.2em;" rows="5" cols="90"></textarea>
						</div>
						<input type="submit" name="comment" value="Submit" style="background-color:#faa605;color:white;border:none;margin-top:10px;padding:10px;">
					</form>		
		</div>
		<br><br>
			<h3>Reviews</h3>
			<hr>
		<div class="display-comment">
		<div class="profile-image">
			<img src="ass" height="40px" width="30px">
		</div>
		<div class="user-comment">
			<h4 style="left:5px;color:#006371;"><u>Aubrey</u></h4>
			<p>
				Absolute garbage. Easily the worst book I’ve read in 2008, and certainly a contender for Worst
				Book I’ve Ever Read. This crap won the prestigious Whitbread Book of the Year honors, and while I
				have absolutely no idea what that entails, I firmly support both the eradication of this farcical 
				award and the crucifixion of anyone on the selection committee that nominated this stinking smegma.
			</p>
		</div>	
		</div>
		<hr>
	</div>
	<br><br>
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