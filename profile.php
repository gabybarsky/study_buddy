<?php
if(isset($_COOKIE['username']))
{
	echo "logged in",base64_decode($_COOKIE['username']);
	echo "<a href='core/logout.php'>Logout</a>";
}

?>
