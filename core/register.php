<?php
include 'core.php';

if($_POST['registerpassword'] != $_POST['confirmpassword'])
{
	header('Location: ../index.php?error=2');
}
if(len($_POST['registerpassword']) < 6 || len($_POST['confirmpassword']) < 6)
{
	header('Location: ../index.php?error=3');
}

if(strlen($_POST['username']) > 6)
{
	echo $_POST['username'];
	echo $_POST['password'];
	echo $_POST['firstname'];
	echo $_POST['lastname'];
	echo $_POST['day'];
	echo $_POST['month'];
	echo $_POST['year'];
	echo $_POST['school'];
	echo $_POST['grade'];
	if($_POST['firstname'] && $_POST['lastname'])
	{
		if($_POST['day'] != 'day')
		{
			//echo "day";
			if($_POST['month'] != 'month')
			{
				if($POST['year'] != 'year')
				{
					if($POST['school'] != 'School')
					{
						if($POST['grade'] != 'Grade')
						{
							
						}
					}
				}
			}
		}	
	}
}
?>