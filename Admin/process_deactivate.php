<?php 
//session_start();
include("../configuration/session.php");
//include("./top.php");
include("../configuration/dbconnection.php");
if(isset($_GET['id'])){
	$rr= $_GET['id'];
}


     	$username = $_SESSION['user'];
	$query = "select * from user_info,users where user_info.info_id='$rr' AND (user_info.info_id=users.info_id) LIMIT 1";
	$rs = mysql_query($query) or die(mysql_error());
	$user = mysql_fetch_array($rs);
echo $user['user_level'];
if($user['user_level']!='')
{
$update1="update users set status='0' where info_id='$rr'";
mysql_query($update1) or die(mysql_error('database error and cannot change your password at this time.'));	
header('location:deactivate.php');

}
else{
$update1="update users set status='0' where info_id='$rr'";
mysql_query($update1) or die(mysql_error('database error and cannot change your password at this time.'));

	
header('location:deactivate.php');

}
?>