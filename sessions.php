<?php

if(isset($_COOKIE['username']))
{
	$uid = base64_decode($_COOKIE['username']);
}
else
{
	header("Location: index.php");
}

?>

<html>
<head>

<title>Study Buddy</title>
<link rel="stylesheet" type="text/css" href="css/sessions.css"/>
</head>
<body>

<div id="cnt_top">
	<form method="post" name="login" action="core/login.php">
	<table style="	border-collapse:separate;
	empty-cells:hide; text-align: center;">
	            <tbody>
	            <tr>
	            	<td width="10%" align="left"><h1>Study Buddy</h1></td>
                    <td width="10%"></td><td width="2%"><h3><a href="profile.php">Profile</a></h3></td><td width="2%"><h3><a href="requests.php">Requests(n)</a></h3></td><td width="2%"><h3><i>Sessions</i></h3></td><td width="2%"><h3><a href="settings.php">Settings</a></h3></td>
				</tr>
				
				<tr>
				<td colspan="6" align="right">
				<h4>You are currently logged in as <?php echo $uid; ?>(<i><a href="core/logout.php">Logout</a></i>)</h4>
				</td>
				</tr>
    </tbody>
    </table>
    </form>
</div>

<div id="main">
<table border="1px">
<fieldset>
<legend>Sessions For This week</legend>
<tr>
<td>

</td>
</tr>
</fieldset>
</table>

</div>


<div id="footer">
<table align="center" width="50%">
<tr>
<td><p><a href="/faq.html">FAQ</a></p></td><td>|</td>
<td><p><a href="/about.html">About</a></p></td><td>|</td>
<td><p><a href="/contact.html">Contact</a></p></td><td>|</td>
<td><p><a href="/privacy.html">Privacy</a></p></td><td>|</td>
<td><p><a href="/legal.html">Legal</a></p></td><td>|</td>
<td><p><a href="/apply.html">Apply</a></p></td>
</tr>
</table>
</div>
</body>
</html>