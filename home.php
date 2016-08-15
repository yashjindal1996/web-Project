
<html>
<head>
<title>Takshshila</title>
<link rel="icon" href="my.ico" type="image/x-icon">

<link rel="stylesheet" type="text/css" href="slider-copy.css">
<link rel="stylesheet" type="text/css" href="navbar.css">

  
  <style>
  
  body{
  overflow-x:hidden;
  padding:0;
  margin:0;
  }
  
.hello{
	margin-top:-20px;
}
.quote{
Color:white;
font-size:50px;
text-align:center;
font-family:anton,sans-serif;
margin:60px 320px;
}
.containx{
background-image:url("background.png");
max-width:100%;
height:auto;
background-repeat:no-repeat;
padding:90px 80px 80px 90px;	
}
.text{
color:white;
}
#linkk:hover{
background-color:#faa605;
}
.author-quote{
  width: 100%;
  height:250px;
  background-color: white;
  box-shadow: 5px 4px 8px 0 rgba(0, 0, 0, 0.2), 5px 6px 20px 0 rgba(0, 0, 0, 0.19);
  border:1px solid #ccc;
  margin-bottom: 25px;
	margin-top:20px;
}

.quote-of-day, .middle{
margin-top:50px;
text-align:center;
line-height:44px;
font-weight:underline;
}


.author-text{
display:block;
border-botton-style:solid;
border-bottom-width:2px;
border-bottom-color:#faa605;
background-color:white;
}
hr{
width:300px;
border-top:3px solid #faa605;
}
#quote1{
color:black;
padding:30px 60px 0px 30px;
font-size:30px;
font-weight:bold;
font-style:italic;
}
#author-name{
font-size:20px;
}



.footer{
background-color:#474747;
position:absolute;
width:100%;
text-align:center;
top:250px;
}

.logos{
height:40px;
width:40px;	
	
margin-left:3px;
}

.social-media{
padding:20px;
}

.low-foot{
color:white;
}

div.footer.social-media li{
color:white;
}

.middle{
position:relative;
margin-top:20px;
bottom:0;
}
  </style>
  <script type='text/javascript'>

		function moveleft(){
			var elem = document.getElementsByClassName("whole");
			var x = elem[0].style.left;
			var y = x.indexOf("p");
			var z = Number(x.slice(0,y));
			z=z-100;
				if(z<-550)
					{
						z=0;
					}
				elem[0].style.left = z + 'px';
				}
      function moveright(){
			var elem = document.getElementsByClassName("whole");
			var x = elem[0].style.left;
			var y = x.indexOf("p");
			var z = Number(x.slice(0,y));
			z=z+100;
				if(z>0)
					{
						z=-550;
					}
				elem[0].style.left = z + 'px';
		}
	function redirect(str){
		window.location.href="book-dec.php?title="+str;
	}
</script>
</head>
<body>
<?php include("connect.php");?>
<nav class="navbar navbar-inverse hello">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#"><img src="tak.png"></img></a>
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
	   <li><a href="Book-page.php"  id="home1">Books</a></li>
	   <li ><a href="#" id="home" class="active">Home</a></li>
	  </ul>
  </div>
</nav>
<div class="containx">
<div  style="background-color:rgba(0, 0, 0, 0.4);" class="quote">
   <p>There Comes A Time
     <br>
       When You Have To Choose 
		<br>
		Between Turning The Page
		<br>
		Or Scrolling The Mouse.
	</p>
  </div>
  <div style="text-align:center;">
  <a href="#Quote-day" id="linkk" style="padding:20px;color:white;text-decoration:none;font-size:20px;border:solid 4px #faa605;text-align:center;transition:1s;">Quote of The Day</a>
  </div>
</div>
<div class="Quote-of-day">
	<div class="author-text">
		<h1 id="Quote-day" name="Today">Quote Of The Day</h1><hr id="lineof">
	</div>
	<div id="quote1" ></div>
	<div id="author-name"></div>
<script>
      (function() {
      var quotes = [
            {
                text: "A good novel tells us the truth about its hero; but a bad novel tells us the truth about its author.",
				text1: " Gilbert K. Chesterton"
			},
			
			{
				text: "It is what you read when you don’t have to that determines what you will be when you can’t help it.",
            	text1:	" Oscar Wilde"	
			},
			{
                text:"A book is the only place in which you can examine a fragile thought without breaking it.",
				text1:" Edward P. Morgan"
			},
			{
				text:"Whenever you read a good book, somewhere in the world a door opens to allow in more light.",
				text1:" Vera Nazarian"
			
			},
			{
				text:"Always read something that will make you look good if you die in the middle of it.",
				text1:" P.J. O’Rourke"
			}
      ];
      var quote = quotes[Math.floor(Math.random() * quotes.length)];
	  var div=document.getElementById('quote1');
	  div.innerHTML= div.innerHTML + '<p>"'+ quote.text+'"</p>';
		var div1=document.getElementById('author-name');
	  div1.innerHTML=div1.innerHTML + '<p>'+ quote.text1 +'</p>';

    })();
</script>
</div>
	<div class="author-text middle">
		<h1 id="NewArrival">New Arrival</h1><hr class="lineof">
</div>
<div class="middle">
	
<span class='arrow-left'><img src="left.png" height="60" width="50" onclick="moveright()"></span>
<span class='arrow-right'><img src="right.png" height="60" width="50" onclick="moveleft()"></span>
<div class="whole">
<div class='row offer-pg-cont'>
    <div class='offer-pg'>
	<?php
		class TableRows extends RecursiveIteratorIterator { 
     function __construct($it) { 
         parent::__construct($it, self::LEAVES_ONLY); 
     }

     function current() {
         return "<img src='". parent::current()."' title='". parent::next()."".parent::current()."' class='items' onclick='redirect(this.title)' height='150' width='100' style='cursor:pointer;'>";
     }

     function beginChildren() { 
         echo "<div class='portfolio-item'>"; 
     } 

     function endChildren() { 
         echo "</div>" . "\n";
     } 
} 
		 $stmt = $conn->prepare("SELECT imagepath,title FROM newarrival"); 
     $stmt->execute();

     // set the resulting array to associative
     $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 

     foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) { 
         echo $v;
     }
?>
    </div>
</div>
 </div>    



<div class="footer">
  <div class="social-media">
		<a href="#"><img src="facebook.png" class="logos"></a>
		<a href="#"><img src="twitter.png" class="logos"></a>
		<a href="#"><img src="linkdin.png" class="logos"></a>
		<a href="#"><img src="instagram.png" class="logos"></a>
 </div>
   <a href="#" style="text-decoration:none;font-family:sans-serif;color:white;">Contact Us</a>
   <div class="low-foot">
   <br>&copy copyright 2016-2017 takshshila 
</div>
</div>
</div>
</body>
</html>