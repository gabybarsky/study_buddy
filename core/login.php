<?php
include 'core.php';
if(strlen($_POST['username'])>0 && strlen($_POST['password'])>0)
{
	if(isset($_POST['username']) && isset($_POST['password']))
	{
		if(Login($_POST['username'],$_POST['password']))
		{
	 		setcookie("username", $_POST['username'], false,"/");
			setcookie("password", md5($_POST['password']), false,"/");
			header('Location: ../profile.php');
		}
		else
		{
			header('Location: index.php?error=1');
		}
	}
}
else
{
	$error = "No username or password entered";
	header('Location: index.php?error=1');
}
?>