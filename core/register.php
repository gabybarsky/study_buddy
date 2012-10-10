<?php
include 'core.php';

if($_POST['registerpassword'] != $_POST['confirmpassword'])
{
	header('Location: ../index.php?error=2');
}
if(strlen($_POST['registerpassword']) < 6 || strlen($_POST['confirmpassword']) < 6)
{
	header('Location: ../index.php?error=3');
}
if(UserExist($_POST['username']))
{
	header("Location: ../index.php?error=4");
}
	
if($_POST['firstname'] && $_POST['lastname'])
{
	if($_POST['day'] == 'day' || $_POST['year'] == 'year' || $_POST['month'] == 'month' )
    {
    	header("Location: ../index.php?error=5");
    }
    if($_POST['school'] == 'school')
    {
    	header("Location: ../index.php?error=6");
    }
    if($_POST['grade'] == 'grade')
    {
    	header("Location: ../index.php?error=7");
    }
}
if($_POST['answer'] == 'answer')
{
	header("Location: ../index.php?error=8");
}
else
{
    header("Location: ../index.php?error=9");
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
	header("Location: ../profile.php");
}


?>





