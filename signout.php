<?php
include("connect.php");
session_unset();
session_destroy();
header('Location:home.php');

?> 