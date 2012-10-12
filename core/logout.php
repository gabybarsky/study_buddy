<?php
include 'core.php';
if(isset($_COOKIE['username']) && isset($_COOKIE['password']))
{
	setcookie("username",'', time()-60*60*24*365,"/");
	setcookie("password", '', time()-60*60*24*365,"/");
	header("Location: ../index.php");
}
else
{
	header("Location: ../index.php");
}
?>