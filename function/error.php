<?php
session_start();
if(empty($_SESSION["error"])){
	$err = "";
	echo $err;
}else{

$err = $_SESSION["error"];

echo $err;
}
?>