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
?>

<script type="text/javascript">

function ValidateField(field,value)
{
	if(field.value=="")
	{
		field.value= value;	
	}
	if(field.name=="registerpassword")
	{
		
		if(field.value.length < 6)
		{
			document.getElementById("check").style.display = "inline";
			field.focus();
		}
		if(field.value.length >= 6)
		{
			document.getElementById("check").style.display = "none";
		}
	}
	if(field.name=="confirmpassword")
	{
		if(field.value != document.getElementById("registerpassword").value)
		{
			document.getElementById("check2").style.display = "inline";
			//field.focus();
		}
		else
			document.getElementById("check2").style.display = "none";
	}
	if(field.name == "firstname")
	{
		if(field.value.length <= 1)
		{
			document.getElementById("checkfirst").style.display = "inline";
			field.focus();
		}
		else
		{
			document.getElementById("checkfirst").style.display = "none";
		}
	}
	if(field.name == "lastname")
	{
		if(field.value.length <= 1)
		{
			document.getElementById("checklast").style.display = "inline";
			field.focus();
		}
		else
		{
			document.getElementById("checklast").style.display = "none";
		}
	}
	if(field.name == "username")
	{
		if(field.value.length <= 1)
		{
			document.getElementById("checkusername").style.display = "inline";
			field.focus();
		}
		else
		{
			document.getElementById("checkusername").style.display = "none";
		}
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
                    <td width="20%;"></td><td align="left"><input class="input" id="username" name="username" type="text" value="Username" onfocus="if(!this._haschanged){this.value=''};this._haschanged=true;" onBlur="ValidateField(this,'Username')" /></td>
                	<td align="left"><input class="input" id="password" name="password"  type="password" value="Password" onfocus="if(!this._haschanged){this.value=''};this._haschanged=true;" onBlur="ValidateField(this,'Password')" /></td>
                	<td align="right" width="15%"><input type="submit" name="submit" class="submit" value="Sign In"/></td>
				</tr>
    <tr>
    <td><h4 align="center"><?php if(isset($_GET['error']) && $_GET['error'] == 10) echo $error; ?></h4></td><td></td><td></td><td><h4 align="middle"><?php if(isset($_GET['error']) && $_GET['error']==0) echo $error; ?></h4 ><td></td></td>
    <td align="center"><a href="forgotpass.php">Forgot Password?</a><td>
    </td></td>
    </tr>
    </tbody>
    </table>
    </form>
</div>

<div id="main">
	<table class="middle">
		<fieldset>
			<legend align="left">Forgot Password</legend>
			<tr>
				<td>
					<input type="text" name="email" value="Email" onfocus="if(!this._haschanged){this.value=''};this._haschanged=true;" onBlur="ValidateField(this,'Email')" class="middle"/>
				</td>
			</tr>
			<tr>
				<td>
					<input type="text" name="repeatemail" value="Confirm Email" onfocus="if(!this._haschanged){this.value=''};this._haschanged=true;" onBlur="ValidateField(this,'Confirm Email')" class="middle"/>
				</td>
			</tr>
			<tr>
				<td>
					<input type="submit" name="submit" value="Submit" class="submit"/>
				</td>
			</tr>
		</fieldset>
	</table>
</div>

</body>
</html>