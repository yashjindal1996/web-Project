<?php
header("Content-Type: application/octet-stream");

$file = $_GET["file"] .".pdf";
header("Content-Disposition: attachment; filename=".$file);   
readfile($file);
?>