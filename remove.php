<?php
include("connect.php"); 
$topic = $_REQUEST["topic"];
$query = $conn->prepare("DELETE FROM topic WHERE topic='$topic'");
$query->execute();
$query = $conn->prepare("DELETE FROM topic_comment WHERE topic='$topic'");
$query->execute();
header('Location:profile.php');
?>