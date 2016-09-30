<?php 
//session_start();
include("../configuration/session.php");
include("../configuration/dbconnection.php");
$id = $_POST['id'];
$fname = $_POST['fname'];
$mname = $_POST['mname'];
$sname = $_POST['lname'];
$gender = $_POST['gender'];
$position=$_POST['role'];
$query="select * from users where info_id=$id";
if(mysql_num_rows(mysql_query($query))>0){
  header('Location:  student_admin.php?success=exist');  
}else{
$sql = "insert into user_info (info_id,fname, mname, lname, gender,user_level) values ($id,'$fname','$mname','$sname','$gender','$position')";
mysql_query($sql) or die(mysql_error());
header('Location:  staff_admin.php?success=Sussessfully');
}
?>