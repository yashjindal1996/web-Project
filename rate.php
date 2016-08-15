<?php
  include("connect.php");
$x= $_REQUEST["q"];
$title = $_SESSION["title"];
$user = $_SESSION["login_user"];
$qury= $conn->prepare("INSERT INTO rating (username,title,rating) VALUES('$user','$title','$x')");
$qury->execute();
$qq = $conn->prepare("SELECT * FROM rating WHERE title='$title'");
$qq->execute();
$rate=0;
$i=0;
while($r = $qq->fetch())
{
	$rate = $rate+ $r["rating"];
	$i++;
}
$rate = $rate/$i;
	
$query= $conn->prepare("UPDATE book SET rating='$rate' WHERE title='$title' ");
$query->execute();

for($i=0;$i<$x;$i++)
{
	echo "<img src='selected.png'>";
}
echo "<br>Your rating";
?>