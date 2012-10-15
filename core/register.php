<?php
include 'core.php';

if(UserExist($_POST['username']))
{
	header("Location: ../index.php?error=1"); break;
}
elseif(strlen($_POST['registerpassword']) < 6 || strlen($_POST['confirmpassword']) < 6)
{
	header('Location: ../index.php?error=2'); break;
}
elseif($_POST['registerpassword'] != $_POST['confirmpassword'])
{
	header('Location: ../index.php?error=3'); break;
}
elseif($_POST['firstname'] == 'First Name' || $_POST['lastname'] == 'Last Name')
{
	header("Location: ../index.php?error=5"); break;
}
elseif($_POST['answer'] == 'answer')
{
	header("Location: ../index.php?error=6"); break;
}
elseif($_POST['day'] == 'day' || $_POST['year'] == 'year' || $_POST['month'] == 'month' )
{
	header("Location: ../index.php?error=7"); break;
}
elseif($_POST['school'] == 'school')
{
	header("Location: ../index.php?error=8"); break;
}
elseif($_POST['grade'] == 'grade')
{
	header("Location: ../index.php?error=9"); break;
}
elseif($_POST['question'] == '0')
{
	header("Location: ../index.php?error=12"); break;
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
	header("Location: ../index.php?error=10");
}


?>





