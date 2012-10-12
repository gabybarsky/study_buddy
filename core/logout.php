<?php
include 'core.php';
if(isset($_COOKIE['username']))
{
	setcookie("username",'', time()-60*60*24*365,"/");
	header("Location: ../index.php");
}
else
{
	header("Location: ../index.php");
}
?>