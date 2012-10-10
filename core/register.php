<?php
include 'core.php';

if($_POST['registerpassword'] != $_POST['confirmpassword'])
{
	header('Location: ../index.php?error=Passwords do not match');
}
if(strlen($_POST['registerpassword']) < 6 || strlen($_POST['confirmpassword']) < 6)
{
	header('Location: ../index.php?error=Password not long enough');
}
if(UserExist($_POST['username']))
{
	header("Location: ../index.php?error=Username unavailable");
}
	
if($_POST['day'] == 'day' || $_POST['year'] == 'year' || $_POST['month'] == 'month' )
{
	header("Location: ../index.php?error=Invalid birthday");
}
if($_POST['school'] == 'school')
{
	header("Location: ../index.php?error=Invalid school");
}
if($_POST['grade'] == 'grade')
{
	header("Location: ../index.php?error=Invalid grade");
}
if($_POST['answer'] == 'answer')
{
	header("Location: ../index.php?error=Invalid answer to security question");
}


$username = $_POST['username'];
$password = $_POST['registerpassword'];
$email = $_POST['email'];
$first = $_POST['firstname'];
$last = $_POST['lastname'];
$school = $_POST['school'];
$grade = $_POST['grade'];
//formatting date
$day = $_POST['day'];
$month = $_POST['month'];
$year = $_POST['year'];
$date_value="$year-$month-$day";
$birthday = Date('Y-m-d',strtotime($date_value));
$securityQ = $_POST['question'];
$securityA = $_POST['answer'];
$datejoined = date("Y-m-d");
$lastonline = date("Y-m-d");
//Register($username, $password, $email, $first, $last, $school, $grade, $birthday, $securityQ, $securityA, $datejoined,$lastonline);

if(Register($username,$password,$email,$first,$last,$school,$grade,$birthday,$securityQ,$securityA,$datejoined,$lastonline))
{
	header("Location: ../index.php?error=An email has been sent to you. Please check it and confirm your account to login.");
}


?>





