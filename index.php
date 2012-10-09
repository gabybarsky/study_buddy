<?php
/*
# Filename: index.php
# Created on  1 October 2012    by Mitchell
#
# Modification history
# Date       By             Reasons
# ------     ------------   ----------
# 191011	 Mitchell		First Commit
#
# Current Version: 1.0.0
# Function: Home page
*/
if(isset($_COOKIE['username']) && isset($_COOKIE['password']))
{
	header("Location: profile.php");
}
else
{
	if(isset($_GET['error']))
	{
		if($_GET['error']==1)
		{
			$error = "Invalid login";
		}
		elseif($_GET['error']==2)
		{
			$error = "Passwords do not match";
		}
		elseif($_GET['error']==3)
		{
			$error = "Password not long enough";
		}
		elseif($_GET['error']==4)
		{
			$error = "Username unavailable";
		}
		elseif($_GET['error']==5)
		{
			$error = "Invalid birthday";
		}
		elseif($_GET['error']==6)
		{
			$error = "Invalid school";
		}
		elseif($_GET['error']==7)
		{
			$error = "Invalid grade";
		}
		elseif($_GET['error']==8)
		{
			$error = "Invalid answer to security question";
		}
		elseif($_GET['error']==9)
		{
			$error = "Invalid email adress";
		}
		elseif($_GET['error']==10)
		{
			$error = "Username taken";
		}
	}
}
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/index.css"/>
<title>Study Buddy</title>
</head>
<body>
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
                    <td width="20%;"><!--<img src="pen.jpg">--></td><!--<td width="10%">Username:</td>--><td align="left"><input class="input" id="username" name="username" type="text" value="Username" onfocus="if(!this._haschanged){this.value=''};this._haschanged=true;" onBlur="ValidateField(this,'Username')" /></td>
                	<!--<td width="10%">Password:</td>--><td align="left"><input class="input" id="password" name="password"  type="password" value="Password" onfocus="if(!this._haschanged){this.value=''};this._haschanged=true;" onBlur="ValidateField(this,'Password')" /></td>
                	<td align="right" width="15%"><input type="submit" name="submit" class="submit" value="Sign In"/></td>
				</tr>
    <tr>
    <td></td><td></td><td></td><td><h4 align="middle"><?php if($_GET['error']==1) echo $error; ?></h4 ><td></td></td>
    <td align="center"><a href="forgotpass.php">Forgot Password?</a><td>
    </td></td>
    </tr>
    </tbody>
    </table>
    </form>
</div>
<div id="registerleft">
<form style="padding-left:0%;" name="register" method="post" action="core/register.php">
<table class="register">
<h4><?php if($_GET['error']>1) echo $error;?></h4>
<h2>Find Your Study Buddy!</h2>
<tr>
<td><input type="text" name="firstname" value="First Name" onfocus="if(!this._haschanged){this.value=''};this._haschanged=true;" onBlur="ValidateField(this,'First Name')"/></td>
<td align="left" width="140"><h5 style="display: none;" id="checkfirst">*Enter a valid name</h5></td>
</tr>
<tr>
<td><input type="text" name="lastname" value="Last Name" onfocus="if(!this._haschanged){this.value=''};this._haschanged=true;" onBlur="ValidateField(this,'Last Name')"/></td>
<td align="left" width="140"><h5 style="display: none;" id="checklast">*Enter a valid name</h5></td>
</tr>
<tr>
<td><input type="text" name="username" value="Username" onfocus="if(!this._haschanged){this.value=''};this._haschanged=true;" onBlur="ValidateField(this,'Username')"/></td>
<td align="left" width="140"><h5 style="display: none;" id="checkusername">*Username must be at least 6 characters</h5></td>
</tr>
<tr>
<td><input type="password" name="registerpassword" id="registerpassword"  value="Password" onfocus="if(!this._haschanged){this.value=''};this._haschanged=true;" onBlur="ValidateField(this,'password')" /></td><td align="left" width="140"><h5 style="display: none;" id="check">*Must be at least 6 characters</h5></td>
</tr>
<tr>
<td><input type="password" name="confirmpassword" id="confirmpassword" value="Password" onfocus="if(!this._haschanged){this.value=''};this._haschanged=true;" onBlur="ValidateField(this,'password')"/></td><td align="left" width="140"><h5 style="display: none;" id="check2">*Must match password above</h5></td>
</tr>
<tr>
<td><input type="text" name="email" value="Email" onfocus="if(!this._haschanged){this.value=''};this._haschanged=true;" onBlur="ValidateField(this,'Email')"/></td>
</tr>
<tr>
<td>
<select name="question" id="question">
<option value="1">What city were you born in?</option>
<option value="2">What was the name of your first pet?</option>
<option value="3">What is your mothers maiden name?</option>
<option value="4">What is your favorite school subject?</option>
<option value="5">What is your childhood nickname?</option>
</select>
</td><td><h5 align="left">*Security Question</h5></td>
</tr>
<tr>
<td>
<input type="text" value="Answer" name="answer" id="answer" maxlength="250" onblur="ValidateField(this,'Answer')" 
onfocus="if(!this._haschanged){this.value=''};this._haschanged=true;">
</td>
</tr>


<tr>
<td><select name="day" id="day"><option value="day">Day</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
</select>
<select name="month" id="month"><option value="month">Month</option>
<option value="january">January</option>
<option value="february">February</option>
<option value="march">March</option>
<option value="april">April</option>
<option value="may">May</option>
<option value="june">June</option>
<option value="july">July</option>
<option value="august">August</option>
<option value="september">September</option>
<option value="october">October</option>
<option value="november">November</option>
<option value="december">December</option>

</select>
<select align="right" name="year"><option value="year">Year</option>
<option value="1990">1990</option>
<option value="1991">1991</option>
<option value="1992">1992</option>
<option value="1993">1993</option>
<option value="1994">1994</option>
<option value="1995">1995</option>
<option value="1996">1996</option>
<option value="1997">1997</option>
<option value="1998">1998</option>
<option value="1999">1999</option>
<option value="2000">2000</option>
<option value="2001">2001</option>
<option value="2002">2002</option>
<option value="2003">2003</option>
<option value="2004">2004</option>
</select></td>
<td><h5 align="left" style="display: none;" id="check3" name="check3">*Must enter a valid birthday</h5></td>
</tr>

<tr>
<td><select style="width: 210px;" name="school" id="school">
<option value="school">School</option>
<option value="westmount">Westmount</option>
<option value="thornhill">Thornhill</option>
<option value="vaughan">Vaughan</option>
</select></td>
</tr>
<tr>
<td><select style="width: 210px;" name="grade">
<option value="grade">Grade</option>
<option value="9">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>

</select></td>
</tr>
<tr>
<td><input type="submit" name="registersubmit" class="submit" value="Sign Up" /> </td>
</tr>
</table>
</form>
</div>



<div id="mainbody">
<img src="Brain2.png" height="65%" alt="Sign Up"></img>
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











