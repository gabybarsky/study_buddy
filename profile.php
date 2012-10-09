<?php
include 'core.php';

if(isset($_COOKIE['username']) && isset($_COOKIE['password']))
{
	echo "logged in",base64_decode($_COOKIE['username']);
	echo "<a href='/core/logout.php'>Logout</a>";
}

?>