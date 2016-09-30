<?php 
//session_start();
//include("../configuration/session.php");
//include("../top.php");
include("../configuration/dbconnection.php");
$fname = $_POST['fname'];
//$password = md5($_POST['password']);
$mname = $_POST['mname'];
$sname = $_POST['lname'];
$id=$_POST['id'];
$position=$_POST['role'];
$gender = $_POST['gender'];

	$sql = "update user_info set fname='$fname', mname='$mname',lname='$sname',gender='$gender',user_level='$position' where info_id='$id'";
 if(mysql_query($sql))
 {
  header("location:users.php");  
 }else{
   echo mysql_error();
 }
?>