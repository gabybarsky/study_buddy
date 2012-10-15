<html>
<head>
<title>Study Buddy</title>
<link rel="stylesheet" type="text/css" href="css/entersecurity.css"/>
</head>
<body>
<?php
include 'core/core.php';

//if they are already logged in and somehow ended up on this page… (snooping around)
if(isset($_COOKIE['username']))
{
	//send user to the profile page
	header("Location: profile.php");
}
//make sure the username and answer to security question is given
if(isset($_GET['id']) && isset($_POST['answer']))
{
	$username = $_GET['id'];
	$user = GetUserInfo($username);
	if($user[1] == null)//user doesnt exist and isnt a valid username in our database
	{
		//send back to the forgot password page to fill out a proper username
		header("Location: forgotpass.php?error=2");
	}
	else
	{
		$answer = $user[10];
		$answergiven = $_POST['answer'];
		if($answer != $answergiven)
		{
			header("Location: forgotpass.php?error=3");
		}
	}
	

}
else
{
	header("Location: forgotpass.php?error=1");
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
<form action="core/resetpass.php" name="resetpass" method="POST">
<fieldset>
<legend align="left">Enter a new password</legend>
<tr>
<td>
<h3><input type="password" value="password" name="password" onfocus="this.value='';" onblur="ValidateField(this,'password')" class="middle" style="width: 350px;"/> </h3>
</td>
</tr>
<tr>
<td>
<input type="password" value="PASSWORD" name="confirmpassword" onfocus="this.value='';" onblur="ValidateField(this,'password')" class="middle" style="width: 350px;"/>
</td>
</tr>
<tr>
<td>
<input type="submit" name="submit" value="Submit" class="submit" style="width: 200px; margin-left:23%; margin-top: 5%;" align="middle"/>
</td>
</tr>
<input type="text" style="display: none;" name="username" value="<?php echo $username; ?>"/>
</fieldset>
</form>
</table>
</div>
</body>
</html>