<!DOCTYPE html>
<html>
<head>
<title>Takshshila</title>
<link rel="icon" href="my.ico" type="image/x-icon">
  <link rel="stylesheet" type="text/css" href="navbar.css">	
<style>
body{
background-image: url('hd.png');

background-size:cover;
margin:0;
padding:0;
}

.hello{
margin-top:-20px;
}
.category-bar{
margin-left:0;
position:absolute;
}
#filterbar{
list-style-type:none;
background-color:white;
box-shadow:0 0 2px 2px rgba(0,0,0,.1);	
}
.category-bar li{
list-style-position:inside;
width:auto;

}
.category-bar li a{
text-decoration:none;
display:block;
padding:14px 20px;
font-family:arial,sans-serif;
font-size:20px;
color:#3776AB;

}

.book-category:hover
{
background-color:#9f7356;
color:white;
text-decoration:none;	
}
.book-category:active
{
background-color:#a23311;
color:white;
display:block;
text-decoration:none;
}
.big-container{
padding-top:10px;
width:100%;
height:auto;

}
.card{
background-color:white;
box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.4), 0 6px 20px 0 rgba(0, 0, 0, 0.4);
margin:50px;
float:left;
width:150px;
height:200px;
}
.card img{
width:150px;;
height:200px;
}
.searchf{
width:150px;
height:22px;
border:solid 2px white;
}
#searcch{
border-left:solid 1px gray;
background-color:white;
float:right;
}
</style>
<script>
function filter(x){
var elem = document.getElementsByClassName("card");
var i;
for(i=0;i<elem.length;i++)
elem[i].style.display = "none";
var elem1 = document.getElementsByClassName(x);
var j;
for(j=0;j<elem1.length;j++)
elem1[j].style.display = "block";
}


function searchbook()
{
var str = document.getElementById("searchtext").value;	
var elem1 = document.getElementsByClassName("card");
if(str.length == 0)
{
	return 0;
}
var i;
var counter = 0;
var str1 = str.toLowerCase();
for(i=0;i<elem1.length;i++)
elem1[i].style.display = "none";

for(i=0;i<elem1.length;i++)
{
	var titl = elem1[i].getAttribute("title");
	var titl1 = titl.toLowerCase();
	var index = titl1.indexOf(str1);
	if(index !=-1)
	{
		elem1[i].style.display = "block";
		counter++;
	}
}
if(counter == 0)
{
	document.getElementById("noresult").style.display = "block";
}
}
function redirect(str){
		window.location.href="book-dec.php?title="+str;
	}
</script>
</head>
<body >
<?php include("connect.php"); ?>

<nav class="navbar navbar-inverse hello" >
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="home.php"><img src="tak.png"></a>
    </div>
	
	<div class="navbar-header">
      <input type="text" placeholder="Search by title" id="searchtext" class="searchf">
	  <input type="image" name="search" id="searcch" src="search.png" width="25px" height="28px" onclick="searchbook()" >
	  </div>
    <ul class="nav navbar-nav navbar-right">
         <li class="loginin">
	   <?php  
			if(isset($_SESSION['ID']))
			{
				echo "<a href='#' id='user'>".$_SESSION['login_user']."&#9662;</a>";
				echo "<ul class='dropdown'>";
				echo "<a href ='profile.php' class='logg' >Profile</a>";
				echo "<a href ='signout.php'  class='logg'>Signout</a>";
				echo "</ul>";
			}
			else{
				
				echo "<a href='login-page-sc.php' id='home4'>Login</a>";
			}
	   
	   ?></li>
	   <li><a href="aboutus.php"  id="home3">About</a></li>
	   <li><a href="discussion.php" id="home3">Discussion</a></li>
	   <li><a href="Book-page.php"  id="home1" class="active">Books</a></li>
	   <li ><a href="home.php" id="home" >Home</a></li>
	 </ul>
  </div>
</nav>
   <div class="container">
	<div class="big-container" style="position:relative;">
		<div class="category-bar" >
					<h2 style="text-align:center;">Category</h2>
				 <ul id="filterbar" >
					<li ><a href="#" onclick="filter('art')" class="book-category" >Art</a></li>
					<li ><a href="#" onclick="filter('biography')" class="book-category">Biography</a></li>
					<li ><a href="#" onclick="filter('Childrens')" class="book-category">Childrens</a></li>
					<li ><a href="#" onclick="filter('Classic')" class="book-category">Classic</a></li>
					<li ><a href="#" onclick="filter('Comics')" class="book-category">Comics</a></li>
					<li ><a href="#" onclick="filter('Crime')" class="book-category">Crime</a></li>
					<li ><a href="#" onclick="filter('fantasy' )" class="book-category">Fantasy</a></li>
					<li ><a href="#" onclick="filter('food')" class="book-category">Food</a></li>
					<li ><a href="#" onclick="filter('History')" class="book-category">History</a></li>
					<li ><a href="#" onclick="filter('Horror')" class="book-category">Horror</a></li>
					<li ><a href="#" onclick="filter('Mystery')" class="book-category">Mystery</a></li>
					<li ><a href="#" onclick="filter('Philosophy')" class="book-category">Philosophy</a></li>
					<li><a href="#" onclick="filter('Poetry')" class="book-category">Poetry</a></li>
					<li><a href="#" onclick="filter('Religion')" class="book-category">Religion</a></li>
					<li ><a href="#" onclick="filter('Romance')" class="book-category">Romance</a></li>
					<li ><a href="#" onclick="filter('Science')" class="book-category">Science</a></li>
					<li ><a href="#" onclick="filter('Sports')" class="book-category">Sports</a></li>
					<li ><a href="#" onclick="filter('Travel')" class="book-category">Travel</a></li>
			     </ul>
		</div>
		 
			<div class="contain-books" style="width:80%;margin-left:15%;position:absolute;">
			<div id="noresult" style="text-align:center;font-size:20px;display:none;">
			Sorry no results were found
			</div>
			
			<?php
		class TableRows extends RecursiveIteratorIterator { 
     function __construct($it) { 
         parent::__construct($it, self::LEAVES_ONLY); 
     }

     function current() {
		 
        return "<div class='card' title='".parent::current()."'><div class='image ".parent::current()."'><img title='".parent::current()."'src='".parent::next()."". parent::current()."'class='items' onclick='redirect(this.title)' height='150' width='100' style='cursor:pointer;'>";
     }

     function beginChildren() { 
         echo ""; 
     } 

     function endChildren() { 
         echo "</div></div>" . "\n";
     } 
	} 
		 $stmt = $conn->prepare("SELECT title,imagepath FROM newarrival"); 
     $stmt->execute();

     // set the resulting array to associative
     $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 

     foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) { 
         echo $v;
     }
?>
			 <div class="card fantasy" title="Morning Star" >
				 <div class="image">
					<a href="book-dec.php;"><img src=".\fantasy\fantasy2.jpg"></a>
				 </div>
			 </div>
			<div class="card biography" Title="John brown">
				 <div class="image">
					<a href="book-dec.php"><img src=".\biography\bio2.jpg"></a>
					 
				 </div>
			 </div>
			 <div class="card art" title="Behind Canvas">
				 <div class="image">
					<a href="book-dec.php"><img src=".\art\art2.jpg"></a>
				 </div>
			 </div>
			 <div class="card biography" title="hello">
				 <div class="image">
					<a href="book-dec.php"><img src=".\biography\bio10.jpg"></a>
				 </div>
			 </div>
			 <div class="card fantasy" title="hello">
				 <div class="image">
					<a href="book-dec.php"><img src=".\fantasy\fantasy5.jpg"></a>
				 </div>
			 </div>
			 <div class="card art" title="hello">
				 <div class="image">
					<a href="book-dec.php"><img src=".\art\art1.jpg"></a>
				 </div>
			 </div>
			 <div class="card fantasy" title="hello">
				 <div class="image">
					<a href="book-dec.php"><img src=".\fantasy\fantasy1.jpg"></a>
				 </div>
			 </div>
			 <div class="card fantasy" title="hello">
				 <div class="image">
					<a href="book-dec.php"><img src=".\fantasy\fantasy6.jpg"></a>
				 </div>
			 </div>
			 <div class="card art" title="hello">
				 <div class="image">
					<a href="book-dec.php"><img src=".\art\art3.jpg"></a>
				 </div>
			 </div>
			 <div class="card fantasy" title="hello">
				 <div class="image">
					<a href="book-dec.php"><img src=".\fantasy\fantasy7.jpg"></a>
				 </div>
			 </div>
			 <div class="card biography" title="hello">
				 <div class="image">
					<a href="book-dec.php"><img src=".\biography\bio6.jpg"></a>
				 </div>
			 </div>
			 <div class="card biography" title="hello">
				 <div class="image">
					<a href="book-dec.php"><img src=".\biography\bio7.jpg"></a>
				 </div>
			 </div>
			 <div class="card art" title="hello">
				 <div class="image">
					<a href="book-dec.php"><img src=".\art\art4.jpg"></a>
				 </div>
			 </div>
			 <div class="card fantasy" title="hello">
				 <div class="image">
					<a href="book-dec.php"><img src=".\fantasy\fantasy8.jpg"></a>
				 </div>
			 </div>
			 <div class="card biography" title="hello">
				 <div class="image">
					<a href="book-dec.php"><img src="new-book2.jpg"></a>
				 </div>
			 </div>
			 <div class="card fantasy" title="hello">
				 <div class="image">
					<a href="book-dec.php"><img src=".\fantasy\fantasy9.jpg"></a>
				 </div>
			 </div>
			 
			</div>
   </div> 
   </div>

</body>
</html>