<?php
include 'core/core.php';

if(isset($_GET['activate']))
{
	GetUserFromActivate($_GET['activate']);
}

?>

<html>
<head>
</head>
<body>
<p>thanks for activating</p>
</body>
</html>