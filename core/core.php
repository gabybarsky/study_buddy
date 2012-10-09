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

function Login($uid, $pass)
{
	$uid = clean($uid);
	$pass = clean($pass);
	$pass = md5($pass);
	$sql = mysql_query("SELECT * FROM accounts WHERE username = '$uid' ");
	while($user = mysql_fetch_array($sql))
	{
		if($pass == $user['password'])
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	

}

function Register($uid, $pass,$email,$first,$last,$securityQ,$securityA)
{
	$uid = mysql_real_escape_string($uid);
	$pass = mysql_real_escape_string($pass);
	$pass = md5($pass);
	$email = mysql_real_escape_string($email);
	$first = mysql_real_escape_string($first);
	$last = mysql_real_escape_string($last);
	$securityQ = mysql_real_escape_string($securityQ);
	$securityA = mysql_real_escape_string($securityA);
	$sql = mysql_query("INSERT INTO accounts(username, password, email, firstname,lastname,securityquestion,securityanswer) values('$uid','$pass','$email','$first','$last',$securityQ','$securityA'");
	return "1";
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