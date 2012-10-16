<html>
<head>
<title>Study Buddy</title>
<link rel="stylesheet" type="text/css" href="css/faq.css"/>
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
}
</script>


<div id="cnt_top">
	<form method="post" name="login" action="core/login.php">
	<table style="	border-collapse:separate;
	empty-cells:hide;">
	            <tbody>
	            <tr>
	            	<td width="40%" height="5px"><h1>Study Buddy</h1></td><td></td>
                    <td width="20%;"></td><td align="left"><input class="input" id="username" name="username" type="text" value="Username" onfocus="this.value='';" onBlur="ValidateField(this,'Username')" style="width: 210px;"/></td>
                	<td align="left"><input class="input" id="password" name="password"  type="password" value="Password" onfocus="this.value='';" onBlur="ValidateField(this,'Password')" style="width: 210px;"/></td>
                	<td align="right" width="15%"><input type="submit" name="submit" class="submit" value="Sign In" style="width: 210px;"/></td>
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
<img src="images/faq.jpg" width="250" height="80"></img>

<li><a href="#q1">How old do i need to be to register for Study Buddy?</a></li>
<li><a href="#q2">Why are high school students the only age group eligible to create an account on Study Buddy?</a></li>
<li><a href="#q3">I don't see my school from the options listed, why is that?</a></li>
<li><a href="#q4">The course i'm looking for isn't listed, why is that?</a></li>
<li><a href="#q5">Is anyone eligible to sign up to be a tutor for any course?</a></li>
</div>


<div id="q1">
<h1>How old do i need to be to register for Study Buddy?</h1><hr>
<p>You must be a high school student in order to register for the site.</p>
<p><a href="/faq.php">Back to top</a></p>
</div>

<div id="q2">
<h1>Why are high school students the only age group eligible to create an account on study buddy?</h1><hr>
<p>Study Buddy is in it's early stages and currently in the process of expanding our database to include universities and middle schools. Keep checking the site to see when these educational institutes had been added.</p>
<p><a href="/faq.php">Back to top</a></p>
</div>

<div id="q3">
<h1>I don't see my school from the options listed, why is that?</h1><hr>
<p>Study Buddy is in it's early stages and currently in the process of expanding our databases to include more and more schools. Please be patient and keep checking the site to see if your school has been added. If you would like to know the status of your school please email the site at info@studybuddy.ca.</p>
<p><a href="/faq.php">Back to top</a></p>
</div>

<div id="q4">
<h1>The course i'm looking for isn't listed, why is that?</h1><hr>
<p>Make sure the spelling of the course is correct or that you have entered the correct course code. If you have done both these things and your course is still not listed, it is most likely that it has not yet been added to the database. Please email the site at info@studybuddy.ca if you would like to know the status of a course or to request the addition of it the database. </p>
<p><a href="/faq.php">Back to top</a></p>
</div>

<div id="q5">
<h1>Is anyone eligible to sing up to be a tutor for any course?</h1><hr>
<p>Though we allow any user to sign up to be a tutor for any course, we strongly suggest that any student wishing to be a tutor be exceptionally strong in the chosen subject, and that they have taken the course that they have signed up to tutor. This is done in an attempt to ensure that the quality of tutoring is kept to the highest standard. Please be mindful when deciding to become a tutor, as other student's marks will be directly impacted by your decision.</p>
<p><a href="/faq.php">Back to top</a></p>
</div>

<?php include "core/footer.php"; ?>

</body>
</html>