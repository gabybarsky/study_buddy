<?php
include 'core.php';
if(strlen($_POST['username'])>0 && strlen($_POST['password'])>0)
{
	if(isset($_POST['username']) && isset($_POST['password']))
	{
		if(Login($_POST['username'],$_POST['password']))
		{
			$username = $_POST['username'];
			$username = base64_encode($username);
			$password = $_POST['password'];
			$password = base64_encode($password);
	 		setcookie("username", $username, false,"/");
			header('Location: ../profile.php');
		}
		else
		{
			header('Location: ../index.php?error=0'); break;
		}
	}
}
else
{
	header('Location: ../index.php?error=0'); break;
}
?>