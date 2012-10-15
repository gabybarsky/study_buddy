<?php

include('core.php');

if(isset($_POST['password']) && isset($_POST['confirmpassword']))
{
	$password = $_POST['password'];
	$confirm = $_POST['confirmpassword'];
	$username = $_POST['username'];
	//echo $password,$confirm,$username;
	
	//echo $password = $confirm
	
	if($_POST['password'] == $_POST['confirmpassword'])
	{
		//echo "yes";
		
		if(ChangePassword($username,$password))
		{
			header("Location: ../index.php?error=11");
		}	
	}
	else
	{
		header("Location: ../forgotpass.php?error=4");
	}
}

?>