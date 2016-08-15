<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="navbar.css">	
<title>Takshshila</title>
<link rel="icon" href="my.ico" type="image/x-icon">
<style>
body{
margin:0;
padding:0;
}
.hello{
margin-top:-20px;
}
.login{
position:absolute;
top:20%;
left:30%;
background-color:white;	
padding:	20px 70px 70px 70px;
box-shadow: 5px 4px 8px 0 rgba(0, 0, 0, 0.2), 5px 6px 20px 0 rgba(0, 0, 0, 0.19);
background:rgba(0,0,0,0.5);
font-family: Lato, 'helvetica neue', helvetica, sans-serif;
}
body{
background-image:url('login-book.jpg');
}
h2{
text-align:center;
color:white;
}
.signin{
background-color:#faa605;
border:none;
padding:10px;
width:100%;
color:white;
transition: 1s;
}
a{
align:center;
color:white;
text-decoration:none;
}
a:hover{
color:#F1E1A8;
}
.signin:hover{
background-color:#db9b25;


</style>

</head>
<body>
<nav class="navbar navbar-inverse hello">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="home.php"><img src="tak.png"></img></a>
    </div>
    <ul class="nav navbar-nav navbar-right">
       <li ><a href="login-page.php"  class="active" id="home4">Login</a></li>
	   <li><a href="aboutus.php"  id="home3">About</a></li>
	   <li><a href="Book-page.php" id="home1">Books</a></li>
	   <li ><a href="home.php" id="home">Home</a></li>
	  </ul>
  </div>
</nav>
<form name="myform" onsubmit="return validate()">	
<div class="login">
<h2>Success</h2>
</div>
		
</form>
</div>
</body>
</html>