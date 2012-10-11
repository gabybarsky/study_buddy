<?php
include 'core/core.php';

if(isset($_GET['activate']))
{
	GetUserFromActivate($_GET['activate']);
}
else
{
	header("Location: ../index.php");
}

?>

<html>
<head>
<link rel="stylesheet" type="text/css" href="css/activate.css"/>
<meta http-equiv="REFRESH" content="5;url=index.php"></HEAD>

</head>
<body>
<div id="cnt_top">
<h1>Study Buddy</h1>
</div>
<div id="main">

<h1>Thanks for activating your account. You will be redirected shortly, or click <a href="index.php">here</a> to log in. </h1>

</div>
</body>
</html>