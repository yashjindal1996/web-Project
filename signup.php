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
overflow:hidden;
}
.hello{
margin-top:-20px;
}
.Sign-up{
position:absolute;
top:20%;
left:30%;
background-color:white;	
padding:0 80px 60px 80px;

box-shadow: 5px 4px 8px 0 rgba(0, 0, 0, 0.2), 5px 6px 20px 0 rgba(0, 0, 0, 0.19);
background:rgba(0,0,0,0.5);
font-family: Lato, 'helvetica neue', helvetica, sans-serif;
}
body{
background-image:url('Sigup.jpg');
background-repeat:no-repeat;
background-size:cover;


}
h2{
text-align:center;
color:white;
}
.signup{
background-color:#faa605;
border:none;
padding:10px;
width:60%;
color:white;
transition: 1s;
margin-right:0;
}
#name, #password1, #password2, #e-mail, #username
{
height:30px;
font-size:16px;
border:solid 1px #dcdcdc;
width:110%;
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
}
a:hover{
color:#F1E1A8;
}
.signup:hover{
background-color:#db9b25;
}

form{
color:white;
}
#empty-name, #no-match, #password-too, #invalid-email, #invalid-user{
display:none;
color:red;
font-size:12px;
}
</style>
<script>
var nn=0;
var ee=0;
function validation(){
var pass_exp = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,16}$/;
var emai_exp = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)$/;
var names1 = document.forms["myform"]["names"];
var unames1 = document.forms["myform"]["username"];
var password1 = document.forms["myform"]["password12"];
var password2 = document.forms["myform"]["password21"];
var emails = document.forms["myform"]["e-mail"];
document.getElementById("empty-name").style.display = "none";
document.getElementById("no-match").style.display = "none";
document.getElementById("invalid-email").style.display = "none";
document.getElementById("password-too").style.display = "none";
document.getElementById("invalid-user").style.display = "none";
if(names1.value == null || names1.value == "")
{
document.getElementById("empty-name").style.display = "block";
names1.focus();
return false;
}
if(unames1.value == null || unames1.value=="")
{
document.getElementById("invalid-user").style.display = "block";
unames1.focus();
return false;
}
if(!emai_exp.test(emails.value))
{
document.getElementById("invalid-email").style.display = "block";
emails.focus();
return false;
}
if(!pass_exp.test(password1.value))
{
document.getElementById("password-too").style.display = "block";
password1.focus();
return false;
}
if(password1.value != password2.value)
{
document.getElementById("no-match").style.display = "block";
password2.focus();
return false;
}
if(ee==1||nn==1)
{
	return false;
}

}
function checkname()
{
	var unames1 = document.forms["myform"]["username"].value;

	if(unames1=="")
		return 0;
	else{
		var xmlhttp = new XMLHttpRequest();
         xmlhttp.onreadystatechange = function() {
             if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				 if((xmlhttp.responseText).length>0)
					nn=1;
				 else
					 nn=0;
                 document.getElementById("uname").innerHTML = xmlhttp.responseText;
				
             }
         }
         xmlhttp.open("GET", "checkname.php?q="+unames1, true);
         xmlhttp.send();
	}
	
}
function checkemail()
{
	var emails = document.forms["myform"]["e-mail"].value;

	if(emails=="")
		return 0;
	else{
		var xmlhttp = new XMLHttpRequest();
         xmlhttp.onreadystatechange = function() {
             if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				 if((xmlhttp.responseText).length>0)
					ee=1;
				 else 
					ee=0;
                 document.getElementById("ename").innerHTML = xmlhttp.responseText;
				
             }
         }
         xmlhttp.open("GET", "checkemail.php?q="+emails, true);
         xmlhttp.send();
	}
}
</script>
</head>
<body>
<?php
include("connect.php");
$name = $username = $emailid = $password = $password2= "";
$servername = "localhost";
$username1 = "root";
$password1 = "";
$errema=$erruser="";
if($_SERVER["REQUEST_METHOD"]=="POST")
{
$name = testinput($_POST["names"]);
$username = testinput($_POST["username"]);
$emailid = testinput($_POST["e-mail"]);
$password = testinput($_POST["password12"]);
$password2 = testinput($_POST["password21"]);

try{
			
			
			$stmt = $conn->prepare("INSERT INTO signup (name, username, email, password)
			VALUES(:name, :username, :email, :password)");
			$stmt->bindParam(':name', $name);
			$stmt->bindParam(':username', $username);
			$stmt->bindParam(':email', $emailid);
			$stmt->bindParam(':password', $password);
			$stmt->execute();
			header('Location:redirecting.php');
	}
catch(PDOException $e)
{
  echo $e->getMessage();
}
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
      <a class="navbar-brand" href="home.php"><img src="tak.png"></img></a>
    </div>
    <ul class="nav navbar-nav navbar-right">
       <li ><a href="login-page.php"  class="active" id="home4">Login</a></li>
	   <li><a href="aboutus.php"  id="home3">About</a></li>
	   <li><a href="discussion.php" id="home3">Discussion</a></li>
	   <li><a href="Book-page.php" id="home1">Books</a></li>
	   <li ><a href="home.php" id="home">Home</a></li>
	  </ul>
  </div>
</nav>
<div class="Sign-up">
<h2>Sign up</h2>
<br><br>
<form name="myform" onsubmit="return validation()" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	<table>
		<tr>
			<td>Name</td>
			<td><input type="text" id="name" name="names" onchange="validatename()" value=<?php echo $name; ?> ></td>
		</tr>
		<tr>
			<td></td>
			<td  id="empty-name">Cannot bo empty.</td>
		</tr>
		<tr>
			<td>Username</td>
			<td><input type="text" id="username" name="username" onchange="checkname()" value=<?php echo $username; ?>></td>
		</tr>
		<tr>
		  <td></td>
			<td style="color:red;font-size:12px" id="uname">
			</td>
		</tr>
		<tr >
			<td></td>
			<td id="invalid-user">Username cannot be empty.</td>
		</tr>
		
		<tr>
			<td>E-mail</td>
			<td><input type="text" id="e-mail" name="e-mail" onchange="checkemail()" value= "<?php echo $emailid; ?>" ></td>
		</tr>
		<tr>
			<td></td>
			<td  id="invalid-email">Invalid E-mail address.</td>
		</tr>
		<tr>
		  <td></td>
			<td style="color:red;font-size:12px;" id="ename">
			</td>
		</tr>
		
		<tr>
			<td>Password</td>
			<td><input type="password"  id="password1" name="password12" value= "<?php echo $password; ?>" ></td>
		</tr>
		<tr>
		<td></td>
		<td id="password-too"><P>must contain numbers & special characters.<br>should contain 6-16 char</p></td>
		</tr>
			<tr>
			<td>Confirm Password</td>
			<td><input type="password"  id="password2" name="password21" value="<?php echo $password2; ?>"></td>
		</tr>
		<tr >
		<td></td>
		<td id="no-match">Password didn't match.</td>
		</tr>
		<tr>
		<td></td>
			<td><input type="submit" value="Sign up" class="signup"></td>
		</tr>
		<tr>
			<td></td>
		</tr>
		<tr>
			<td colspan="2" style="color:red;" >All fields are mandatory.</td>
		</tr>
	</table>	
</form>
</div>

</body>
</html>