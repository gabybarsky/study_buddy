<?php
//Connection to Database
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "root";
$dbname = "StudyBuddy";
$link = mysql_connect($dbhost,$dbuser,$dbpass) or die(mysql_error());
mysql_select_db($dbname) or die("Couldn't connect!");
//Core Functions

function GetUserInfo($uid, $pass)
{
	$uid = clean($uid);
	$pass = clean($pass);
	$pass = md5($pass);
	$sql = mysql_query("SELECT * FROM accounts WHERE username = '$uid' AND password ='$pass'");
	if(mysql_num_rows($sql) > 0)
	{
		$user = mysql_fetch_array($sql);
		return $user;
	}
	header("Location: index.php");
	//return $sql;		
}

function UserExist($uid)
{
	$uid = clean($uid);
	$sql = mysql_query("SELECT * FROM accounts WHERE username = '$uid' ");
	if(mysql_num_rows($sql) > 0)
	{
		return true;
	}
	return false;
}
function EmailExist($email)
{
	$email = clean($email);
	$sql = mysql_query("SELECT * FROM accounts WHERE email = '$email' ");
	if(mysql_num_rows($sql) > 0)
	{
		return true;
	}
	return false;
}

function Login($uid, $pass)
{
	$uid = clean($uid);
	$pass = clean($pass);
	$pass = md5(sha1(sha1(sha1($pass))));
	$sql = mysql_query("SELECT * FROM accounts WHERE username = '$uid' ");
	
	$result = mysql_query("UPDATE `accounts` SET `lastonline`=CURDATE() WHERE `username`='$uid'");
	
	while($user = mysql_fetch_array($sql))
	{
		if($pass == $user['password'])
		{
			if($user['confirmed']=="yes")
			{
				return true;
			}
			else
			{
				header("Location: ../index.php?error=10");
			}
		}
		else
		{
			return false;
		}
	}
}

function Register($uid, $pass, $email, $first, $last, $school, $grade, $birthday, $securityQ, $securityA, $datejoined,$lastonline)
{	
	$uid = mysql_real_escape_string($uid);
	$pass = mysql_real_escape_string($pass);
	$pass = md5(sha1(sha1(sha1($pass))));
	$email = mysql_real_escape_string($email);
	$first = mysql_real_escape_string($first);
	$last = mysql_real_escape_string($last);
	$school = mysql_real_escape_string($school);
	$grade = mysql_real_escape_string($grade);
	$securityQ = mysql_real_escape_string($securityQ);
	$securityA = mysql_real_escape_string($securityA);
	//echo $uid,"  ",$pass,"  ",$email,"  ",$first,"  ",$last,"  ",$school,"  ",$grade,"  ",$birthday,"  ",$securityQ,"  ",$securityA,"  ",$datejoined,"  ",$lastlonline;
	echo $uid;
	if(UserExist($uid))
	{
		header("Location: ../index.php?error=1");
	}
	else
	{
		if(EmailExist($email))
		{
			header("Location: ../index.php?error=4");
		}
		else
		{
			if($sql = mysql_query("INSERT INTO accounts (username,password,email,firstname,lastname,school,grade,birthday,securityquestion,securityanswer,datejoined,lastonline,confirmed) VALUES ('$uid','$pass','$email','$first','$last','$school','$grade','$birthday','$securityQ','$securityA','$datejoined','$lastonline','no')"	))
			{
				//register sucessful
				//email user and ask for confirmation
				$activationID = uniqid();
				$sql2 = mysql_query("INSERT INTO `activation` (username,activation) VALUES('$uid','$activationID')");
				
				$subject = "Do not reply to this email";
				$message = "Thank you for registering at StudyBuddy.com! To begin using our service, please click the link below. '\r\n' studybuddy.com/activate.php?activate='$activationID' ";
				$message = wordwrap($message);
				$headers = "From: mitchfriedman5@gmail.com";
				
				mail($email,$subject,$message,$headers);
				return true;
			}
		}
	}	
}

function GetUserFromActivate($id)
{
	//echo $id;
	$sql = mysql_query("SELECT * FROM `activation` WHERE `activation` = '$id'");
	$user = mysql_fetch_array($sql);
	
	$username = $user['1'];
	$value = "yes";
	$result = mysql_query("UPDATE `accounts` SET `confirmed` = '$value' WHERE `username` = '$username' ");
	if(!$result)
	{
		   echo  mysql_error();
	}
	$result2 = mysql_query("DELETE FROM `activation` WHERE `username` = '$username'");
	if(!$result2)
	{
		echo mysql_error();
	}
}

function clean($str, $encode_ent = false) {
	$str = @trim($str);
    
    if($encode_ent) {
    	$str = htmlentities($str);
	}
    
    if(version_compare(phpversion(),'4.3.0') >= 0) {
    	if(get_magic_quotes_gpc()) {
        	$str = stripslashes($str);
		}
    
		if(@mysql_ping()) {
			$str = mysql_real_escape_string($str);
		} else {
			$str = addslashes($str); 
		}
    } else {
		if(!get_magic_quotes_gpc()) {
			$str = addslashes($str);
		}
	}
	
	return $str;
}

?>