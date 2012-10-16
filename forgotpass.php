<html>
<head>
<title>Study Buddy</title>
<link rel="stylesheet" type="text/css" href="css/forgotpass.css"/>
</head>
<body>
<?php
include 'core/core.php';
if(isset($_COOKIE['username']))
{
	header("Location: profile.php");
}
if(isset($_GET['error']))
{
	switch ($_GET['error']) 
	{
		case  0: $error = "Invalid Login"; break;
		case  1: $error = "Usernames don't match"; break;
		case  2: $error = "Invalid username"; break;
		case  3: $error = "Invalid answer to security question. Try again."; break;
		case  4: $error = "New passwords entered did not match. Try again."; break;
		case 10: $error = "An email has been sent to you. Please check it and confirm your account to login."; break;
	}
}
?>

<script type="text/javascript">

function ValidateField(field,value)
{
	if(field.value=="")
	{
		field.value= value;	
	}
}
</script>


<div id="cnt_top">
	<form method="post" name="login" action="core/login.php">
	<table style="	border-collapse:separate;
	empty-cells:hide;">
	            <tbody>
	            <tr>
	            	<td width="40%" height="5px"><h1>Study Buddy</h1></td><td></td>
                    <td width="20%;"></td><td align="left"><input class="input" id="username" name="username" type="text" value="Username" onfocus="this.value='';"  onBlur="ValidateField(this,'Username')" style="width: 210px;"/></td>
                	<td align="left"><input class="input" id="password" name="password"  type="password" value="Password" onfocus="this.value='';" onBlur="ValidateField(this,'Password')" style="width: 210px;"/></td>
                	<td align="right" width="15%"><input type="submit" name="submit" class="submit" value="Sign In" style="width: 210px;"/></td>
				</tr>
    <tr>
    <td><h4 align="center"><?php if(isset($_GET['error']) && $_GET['error'] == 10) echo $error; ?></h4></td><td></td><td></td><td><h4 align="middle"><?php if(isset($_GET['error']) && $_GET['error']==0) echo $error; ?></h4 ><td></td></td>
    <!--<td align="center"><a href="forgotpass.php">Forgot Password?</a><td>-->
    </td></td>
    </tr>
    </tbody>
    </table>
    </form>
</div>

<div id="main">
<table class="middle">
<h4><?php if(isset($_GET['error']) && $_GET['error'] != 10) echo $error; ?></h4>
<form action="entersecurity.php" method="POST" name="getquestion">
<fieldset>
<legend align="left">Forgot Your Password?</legend>
<tr>
<td>
<input type="text" name="username" value="Username" onfocus="this.value='';" onBlur="ValidateField(this,'Username')" class="middle" style="width: 300px;"/>
</td>
</tr>
<tr>
<td>
<input type="text" name="repeatusername" value="Confirm Username" onfocus="this.value='';" onblur="ValidateField(this,'Confirm Username')" class="middle" style="width: 300px;"/>
</td>
</tr>
<tr>
<td>
<input type="submit" name="submit" value="Submit" class="submit" style="width: 200px; margin-left: 15%; margin-top: 5%;"/>
</td>
</tr>
</fieldset>
</form>
</table>
</div>

<?php include "core/footer.php"; ?>

</body>
</html>