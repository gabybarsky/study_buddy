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
	}
}
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/index.css"/>
<title>Study Buddy</title>
</head>
<body>
<div id="container">
<div id="cnt_top">
	<form method="post" name="login" action="core/login.php">
	<table>
	            <tbody>
	            <tr>
	            	<td><h1>Study</h1></td><td><h1>Buddy</h1></td><td width="50%;"><h3><?php echo $error; ?></h3></td>
                    <td width="6%" text-align="right">Username</td><td><input class="input" id="username" name="username" type="text" /></td>
                	<td>Password</td><td><input class="input" id="password" name="password"  type="password"/></td>
				</tr>
				
       			

    <tr>
    <td></td><td></td><td></td><td></td><td>
    <a href="forgotpass.php" text-align="right" align="right">Forgot Password?</a><td></td>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp
    </td>
    <td colspan="2" align="right"><input type="submit" name="submit" value="Sign In"/></td>
    </tr>
    
    </tbody>
    </table>
    </form>

</div>
<div id="mainbody">
lol
</div>
<div id="footer">
<table align="center" width="70%">
<tr>
<td><p><a href="/faq.html">FAQ</a></p></td>
<td><p><a href="/about.html">About</a></p></td>
<td><p><a href="/contact.html">Contact</a></p></td>
<td><p><a href="/privacy.html">Privacy</a></p></td>
<td><p><a href="/legal.html">Legal</a></p></td>
<td><p><a href="/apply.html">Apply</a></p></td>
</tr>
</table>
</div>
</div>
</body>
</html>











