<?php
include('core/core.php');

if(isset($_COOKIE['username']))
{
	$uid = base64_decode($_COOKIE['username']);
	$courses = GetUserCourses($uid);
	/*
	for ($i=0;$i< count($courses); $i++)
	{
		echo $courses[$i]['name'];
	}*/
	//echo $courses[0]['name'];
}
else
{
	header("Location: index.php");
}


?>

<html>
<head>

<title>Study Buddy</title>
<link rel="stylesheet" type="text/css" href="css/profile.css"/>
</head>
<body>

<div id="cnt_top">
	<form method="post" name="login" action="core/login.php">
	<table style="	border-collapse:separate;
	empty-cells:hide; text-align: center;">
	            <tbody>
	            <tr>
	            	<td width="10%" align="left"><h1>Study Buddy</h1></td>
                    <td width="10%"></td><td width="2%"><h3><i>Profile</i></h3></td><td width="2%"><h3><a href="requests.php">Requests(n)</a></h3></td><td width="2%"><h3><a href="sessions.php">Sessions</a></h3></td><td width="2%"><h3><a href="settings.php">Settings</a></h3></td>
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

<div id="courses">
<h1>Welcome to your profile, <?php echo $uid; ?>!</h1>
<h5>Your courses</h5>
<fieldset>

<table class="courses">
<tr>
<td>
<h2>Course Name</h2>
</td>
<td>
<h2>Course Code</h2>
</td>
<td>
<h2>Mark Range</h2>
</td>
</tr>
<?php 
for ($i=0;$i< count($courses); $i++)
{
	echo "<tr><td>";
	echo $courses[$i]['name'];
	echo "</td><td>";
	echo $courses[$i]['coursecode'];
	echo "</td><td>";
	echo $courses[$i]['mark'];
	echo "</td></tr>";
}
?>


</table>

<a href="addcourses.php"><h3>Add/Edit your courses</h3></a>
</fieldset>

<h5>Your interests</h5>
<fieldset>

<table class="courses">




</table>
</fieldset>

</div>
<div id="picture">
<!-- Draw users picture from database here -->
<fieldset>
<table>
<tr>
<td>
users picture
</td>
</tr>

</table>

</fieldset>
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