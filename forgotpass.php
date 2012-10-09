<html>
<head>
<title>Study Buddy</title>
<link rel="stylesheet" type="text/css" href="css/forgotpass.css"/>
</head>
<body>
<?php
include 'core.php';
if(isset($_COOKIE['username']) && isset($_COOKIE['password']))
{
	header("Location: profile.php");
}
?>

<div id="container">
<div id="forget">
<table>
<fieldset>
<legend>Forgot Password</legend>
</fieldset>
</table>
</div>
</div>
</body>
</html>