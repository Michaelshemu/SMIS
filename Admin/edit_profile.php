<?php 
session_start();
include("../configuration/session.php");
include("../top.php");
include("../configuration/dbconnection.php");


//wengine
$fname = $_POST['fname'];
//$password = md5($_POST['password']);
$mname = $_POST['mname'];
$sname = $_POST['lname'];
$uname= $_POST['uname'];
$info_id=$_SESSION['info_id'];
$gender = $_POST['gender'];

echo "$sname";

/*$username = $_SESSION['user'];
$query = "select * from user_info,users,parent where (parent.username='$username' or users.username='Susername') AND (user_info.id=users.info_id) and (user_info.id=parent.student_id) LIMIT 1";
$rs = mysql_query($query) or die(mysql_error());
$user = mysql_fetch_array($rs);*/
/*
if($user > 0)
{
//$x=$user['username'];

$capture=$user['info_id'];
echo $capture;
//$Reg = $user['Reg'];

//echo $fname;
*/
	//$query = "select * from user_info,users,parent where (parent.username='$username' or users.username='Susername') AND (user_info.id=users.info_id) and (user_info.id=parent.student_id) LIMIT 1";
//    echo $user['fname'];
//	echo $hii;
    
/*if ($_SESSION['user_level']=='parent')
	{

	$sql = "update parent  set fname='$fname', mname='$mname', lname='$sname',username='$uname' where student_id='$info_id'";
	mysql_query($sql) or die(mysql_error());
	
	if($sql)
	{
	header('Location:./profile_p.php?success=Sussessfully');
	}
	else
	header('location:./profile_p.php?error=Not Succeed!');

	}
else
{*/	
	
	
	
	$sql = "update user_info  set fname='$fname', mname='$mname', lname='$sname', gender='$gender' where info_id='$info_id'";
	$sql2 = "update users  set username='$uname' where info_id='$info_id'";

	mysql_query($sql) or die(mysql_error());
	mysql_query($sql2) or die(mysql_error());

	if($sql)
	{
	header('Location:profile.php?success=Sussessfully');
	}
	else if($sql2)
	{
	header('Location:profile.php?success=Sussessfully');	
	}
	else
	header('location:profile.php?error=Not Succeed!');
//}


?>