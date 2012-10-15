<html>
<head>
<title>Study Buddy</title>
<link rel="stylesheet" type="text/css" href="css/entersecurity.css"/>
</head>
<body>
<?php
include 'core/core.php';

if(isset($_COOKIE['username']))
{
	header("Location: profile.php");
}

if($_POST['username'] == $_POST['repeatusername'])
{	
	//the user entered 2 of the same, but are they valid?
	$username = $_POST['username'];
	$user = GetUserInfo($username);
	//$question = $user[9];
	if($user[1] == null)
	{	
		//ok, so they are not valid
		header("Location: forgotpass.php?error=2");
	}
	else
	{
		//entered two value usernames, get his security question from database
		$question = $user[9];
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
                	<td align="left"><input class="input" id="password" name="password"  type="password" value="Password" onfocus="this.value='';"  onBlur="ValidateField(this,'Password')" style="width: 210px;"/></td>
                	<td align="right" width="15%"><input type="submit" name="submit" class="submit" value="Sign In" style="width: 210px;"/></td>

    </tbody>
    </table>
    </form>
</div>

<div id="main">
<table class="middle">
<form action="newpass.php?id=<?php echo $username ?>" method="POST" name="checkpass">
<fieldset>
<legend align="left">Enter the answer to your security question</legend>
<tr>
<td>
<h3>
<?php
$questionwords = "";
	switch($question)
	{
		case 1: $questionwords = "What city were you born in?"; break;
		case 2: $questionwords = "What was the name of your first pet?"; break;
		case 3: $questionwords = "What is your mothers maiden name?"; break;
		case 4: $questionwords = "What is your favorite school subject?"; break;
		case 5: $questionwords = "What is your childhood nickname?"; break;
	}
	echo $questionwords;
	?>
</h3>
</td>
</tr>
<tr>
<td>
<input type="text" name="answer" value="Answer" onfocus="this.value='';" onblur="ValidateField(this,'Answer')" class="middle" style="width: 350px;"/>
</td>
</tr>
<tr>
<td>
<input type="submit" name="submit" value="Submit" class="submit" style="width: 250px; margin-left:15%; margin-top: 5%;" align="middle"/>
</td>
</tr>
</fieldset>
</form>
</table>
</div>
</body>
</html>