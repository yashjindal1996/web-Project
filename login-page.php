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
input::webkit-input-placeholder{
color:red;
}
#username, #password
{
height:35px;
font-size:16px;
border:solid 1px #dcdcdc;
padding-left:10px;
}

input:focus{
border-color:black;
}
input{
margin-top:10px;
border-radius:4px;
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

}
#invalid{
text-align: center;	
color:red;
display:none;
font-size:15px;
}
</style>
<script>
function validate(){
 var elem = document.getElementById("invalid");
var elem1 = document.getElementById("invalid1");
 if(document.myform.fname.value == "" || document.myform.fpassword.value == "")
 {
	elem.innerHTML= "";
	elem1.innerHTML = "Sorry, Please check <br> Username and Password.";
	return false;
 }
}

</script>
</head>
<body>

<?php
include("connect.php");
$username=$password=$err="";
try{
if($_SERVER["REQUEST_METHOD"]=="POST")
{
	$username=testinput($_POST["fname"]);
	$password=testinput($_POST["fpassword"]);
	

$query = "SELECT COUNT(*) FROM signup WHERE username='$username' AND password='$password'";
$qu= $conn->prepare($query);
$qu->execute();

$result= ($qu->fetchColumn()>0)?1:0;
if($result==1)
{
		$_SESSION['login_user']=$username;
		$_SESSION['ID']= "loggedin";
		header('Location:home.php');
}
else{
	
	$err = "Sorry, Please check <br> Username and Password.";
}
}
}
catch(PDOException $w)
{
	echo $w->getMessage();
}

function testinput($data){
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
}

?>
<nav class="navbar navbar-inverse hello">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="home.html"><img src="tak.png"></img></a>
    </div>
    <ul class="nav navbar-nav navbar-right">
       <li ><a href="login-page.php"  class="active" id="home4"><?php echo $_SESSION["login_user"];?>	</a></li>
	   <li><a href="aboutus.php"  id="home3">About</a></li>
	   <li><a href="discussion.php" id="home3">Discussion</a></li>
	   <li><a href="Book-page.php" id="home1">Books</a></li>
	   <li ><a href="home.php" id="home">Home</a></li>
	  </ul>
  </div>
</nav>
<div class="login">
<h2>LogIn</h2>
<br><br>

<form onsubmit="return validate()" method="post" name="myform" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<div id="invalid">
Sorry, Please check <br> Username and Password.
</div>
<div style="text-align:center;color:red;font-size:15px;" id="invalid1">
<?php echo $err; ?>
</div>
	<table>
		<tr>
			<td><input type="text" placeholder="Username" id="username" name="fname"></td>
		</tr>
		<tr>
			<td><input type="password" placeholder="password" id="password" name="fpassword"></td>
		</tr>
		<tr>
			<td><input type="submit" value="Sign in" class="signin"></td>
		<tr>
		<tr>
			<td><a href="forgot.html">Forgot you password? </a></td>
		</tr>
		<tr>
			<td><a href="signup.php">Sign up </a></td>
		</tr>
	</table>	
</form>
</div>
</body>
</html>