<?php 
//session_start();
include("../configuration/session.php");
include("../configuration/dbconnection.php");
$currentpwd = MD5($_POST['currentpwd']);
$newpwd = ($_POST['newpwd']);
$confirmpwd = ($_POST['confirmpwd']);
//wengine
$username = $_SESSION['user'];
$query = "select * from user_info,users where username='$username' AND (user_info.info_id=users.info_id) LIMIT 1";
$rs = mysql_query($query) or die(mysql_error());
$user = mysql_fetch_array($rs);

/*
echo $currentpwd."<br/>";
echo $newpwd."<br/>";
echo $confirmpwd."<br/>";
echo $user['password'];
*/
echo $rs;
echo $rs_p;
echo $_SESSION['user_level'];


if($_SESSION['user_level']=='parent')
{
	//	header('Location: index.php');
	$sql = "select * from parent where username='$username' and password='$currentpwd'";
	$result = mysql_query($sql) or die(mysql_error());
	
	$numrows = mysql_numrows($result);
	
	if($numrows > 0)
	{
	$update = "update parent set password = MD5('$confirmpwd') where username='$username'";
	mysql_query($update) or die(mysql_error('database error and cannot change your password at this time.'));
	
	$msg="password changed successful"; 
	header("Location:./password_p.php?success=Sussessfully");   
	
	} 
	else
	 {    
		header("Location:./password_p.php?error=Currentpwd");
	 }
}

else
{
	
	$sql = "select * from users where username='$username' and password='$currentpwd'";
	$result = mysql_query($sql) or die(mysql_error());
	
	$numrows = mysql_numrows($result);
	
	if($numrows > 0)
	{
	$update = "update users set password = MD5('$confirmpwd') where username='$username'";
	mysql_query($update) or die(mysql_error('database error and cannot change your password at this time.'));
	
	$msg="password changed successful"; 
	header("Location:password.php?success=Sussessfully");   
	
	} 
	else
	 {    
		header("Location:password.php?error=Currentpwd");
	}
}

 ?>
 
 