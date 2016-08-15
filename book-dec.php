<?php include("connect.php"); ?>
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
font-family:Lato, 'Helvetica Neue', Helvetica, sans-serif;
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
padding-left:20px;
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
hr{
	background-color:#D8D8D8;
	border:solid 1px #D8D8D8;
	}
.mybook{
height:350px;
width:250px;
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


.rating {
          overflow: hidden;
          display: inline-block;
      }
      .rating-input {
          position: absolute;
          left: 0;
		  visibility:hidden;
		  
      }
      .rating-star {        
          display: block;
          float: right;        
          width: 16px;
          height: 16px;
          background: url('star.png') 0 -16px;
      }
      .rating-star:hover,
      .rating-star:hover ~ .rating-star,
      .rating-input:checked ~ .rating-star {
          background-position: 0 0;
      }
	  
	  .imgDescription {
  position: absolute;
  top: 85	;
  bottom: 0;
  left: 50;
  right: 0;
	color: #00;
  visibility: hidden;


}
.vote{
height:40px;
width:60px;
opacity:.9;
}

.imgWrap:hover .imgDescription {
  visibility: visible;
  opacity: 1;
}

</style>
<script>
function showmore()
{
var elem = document.getElementById("more");
var elem1 = document.getElementById("extra");
var elem2 = document.getElementById("less");
elem.style.display = "none";
elem1.style.display = "block";
elem2.style.display = "block";
};
function showless(){
var elem = document.getElementById("less");
var elem1 = document.getElementById("extra");
var elem2 = document.getElementById("more");
elem2.style.display = "block";
elem.style.display = "none";
elem1.style.display= "none";
};

function call(){

var rating = document.rate.ratingbar;
var i;
var x;

 for(i=0;i<5;i++)
{
	if(rating[i].checked)
		{
			x = rating[i].value;
		break;
		}
}


 var xmlhttp = new XMLHttpRequest();
         xmlhttp.onreadystatechange = function() {
             if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                 document.getElementById("ratingbar").innerHTML = xmlhttp.responseText;
             }
         }
         xmlhttp.open("GET", "rate.php?q="+x, true);
         xmlhttp.send();
}

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
                 document.getElementById("comment-div").innerHTML = xmlhttp.responseText;
				 cc.value = "";
             }
         }
         xmlhttp.open("GET", "comment.php?q="+comment, true);
         xmlhttp.send();
	}
	
	
}
</script>
</head>
<body>
<?php 

$titleof = $_REQUEST["title"];
$_SESSION["title"]=$titleof;
$query = $conn->prepare("SELECT * FROM book WHERE title='$titleof'");
$query->execute();
$query->setFetchMode(PDO::FETCH_ASSOC);
while($r = $query->fetch())
{
	
$path = $r['imagepath'];
$titl =$r['title'];
$author=$r['author'];
$paper=$r['paperback'];
$desc = $r['description'];
$publisher = $r['publisher'];
$rate = $r['rating'];
$path1=$r['path'];
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
	   <li><a href="discussion.php" id="home3">Discussion</a></li>
	   <li><a href="Book-page.php" class="active" id="home1">Books</a></li>
	   <li ><a href="home.php" id="home">Home</a></li>
	  </ul>
  </div>
</nav>

 <div class="container">
 
	<div class="book-image">
		<?php
			
			
		echo "<img src='".$path."' class='mybook'>";
			
		echo "<ul>";
		$user = $_SESSION['login_user'];
		$qu = $conn->prepare("SELECT COUNT(*) FROM rating WHERE username='$user' AND title='$titleof'");
		$qu->execute();
		$res = $qu->fetchColumn();
		
		if(isset($_SESSION["ID"])&& $res==0)
		{
			echo 
		'<span class="rating" id="ratingbar">
		<form name="rate">
        <input type="radio" class="rating-input" id="rating-input-1-5" name="ratingbar" value="5" onclick="call()"> 
        <label for="rating-input-1-5" class="rating-star"></label>
        <input type="radio" class="rating-input" id="rating-input-1-4" name="ratingbar" value="4" onclick="call()">
        <label for="rating-input-1-4" class="rating-star"></label>
        <input type="radio" class="rating-input" id="rating-input-1-3" name="ratingbar" value="3" onclick="call()">
        <label for="rating-input-1-3" class="rating-star"></label>
        <input type="radio" class="rating-input" id="rating-input-1-2" name="ratingbar" value="2" onclick="call()">
        <label for="rating-input-1-2" class="rating-star"></label>
        <input type="radio" class="rating-input" id="rating-input-1-1" name="ratingbar" value="1" onclick="call()">
        <label for="rating-input-1-1" class="rating-star"></label>
		<br><p>Rate</p>
		</form>
		</span>';
		}
		else if(isset($_SESSION["ID"]))
		{
			$qq = $conn->prepare("SELECT * FROM rating WHERE title='$titleof' AND username='$user'");
			$qq->execute();
			 while($r = $qq->fetch())
			 {
				 $xy = $r["rating"];
				 
			 }
			for($i=0;$i<$xy;$i++)
			{
				echo "<img src='selected.png'>";
			}
			echo "<br>Your rating";
		}
		if(isset($_SESSION["ID"])){
		echo "<li><a href='".$path1.".pdf' class='buttons' target='window'>Read Online</a></li>";
		echo "<li><a href='download.php?file=".$path1."' class='buttons'>Download</a> </li>";
		}
		?>
		</ul>
	</div>

<div class="description" name="reading" >
		
		<?php 
		echo "<h2>".$titl."</h2>";
		echo "<p>by <b>".$author."</b></p>";
		$i=0;
		echo "Users rating:<span class='rating'>";
		while($i<$rate){
			echo "<img src='selected.png'>";
			$i++;
			}
			
		echo "</span>";
		if(strlen($desc)>500)
		{
			$str = substr($desc,0,500);
			$str1 = substr($desc,501,strlen($desc));
			echo "<p>".$str."<a href='#' id='more' onclick='showmore()'> View more[+]</a></p>";
			echo "<p id='extra'>".$str1."<a href='#' id='less' onclick='showless()'>Show less[-]</a></p>";
		}
		else{
			echo "<p>".$desc."</p>";
		}
		echo "<hr>";
		  echo "<p>Paperback, ".$paper."</p>	";
		echo "<p>".$publisher."</p>"; ?>
	</div>
</div>


	<div class="give-comments"  >
	<?php 
	if(isset($_SESSION['ID']))
	{
		echo "<div class='give-comment'>";
		
		echo "<h3>Comment</h3>";
		echo "<div><textarea name='comments' id='comments' style='font-family:sans-serif;font-size:1.2em;' rows='5' cols='90'></textarea></div>";
		echo "<input type='submit' name='comment' onclick='postcomment()' value='Submit' style='background-color:#faa605;color:white;border:none;margin-top:10px;padding:10px;'></form></div>";
	}
	else{
		echo "<i><p><a href='login-page.php'>Login </a>here to post Comment</p></i>";
	}
	$query = $conn->prepare("SELECT * FROM comments WHERE title='$titleof' ORDER BY time DESC");
	$query->execute();
	
		
	echo '<br><br>
			<h3>Reviews</h3>
			<hr>';
			echo "<div id='comment-div'>";
			while($x = $query->fetch())
			{
					$na = $x['username'];
				$xyz = $conn->prepare("SELECT profile_pic FROM signup WHERE username='$na'");
		$xyz->execute();
		while($rrr = $xyz->fetch())
			$profile = $rrr["profile_pic"];
		echo '<div class="display-comment">
		<div class="profile-image">';
		if(isset($profile))
			echo '<img src="'.$profile.'" height="40px" width="30px">';
		else
			echo '<img src="profile.png" height="40px" width="30px">';
		echo '</div>
		<div class="user-comment">
			
			<h4 style="left:5px;color:#006371;"><u>'.$x['username'].'</u></h4>
			<p style="font-family:Merriweather, Georgia, serif;">'.$x['comment'].'</p>
		</div>	
		</div>
		<hr>';
			}
		echo "</div>";
	echo '</div>
	<br><br>';?>
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