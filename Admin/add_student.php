<?php 
//session_start();
include("../configuration/session.php");
//include("top.php");
include("../configuration/dbconnection.php");
$Reg = $_POST['id'];
$fname = $_POST['fname'];
$mname = $_POST['mname'];
$lname = $_POST['lname'];
$gender = $_POST['gender'];
$query="select * from users where info_id=$Reg";
if(mysql_num_rows(mysql_query($query))>0){
  header('Location:  student_admin.php?success=exist');  
}else{
$acc = "insert into user_info(info_id,fname, mname,lname,gender, user_level) values ('$Reg','$fname','$mname','$lname','$gender', 'student')";
mysql_query($acc) or die(mysql_error());

header('Location:  student_admin.php?success=Sussessfully');    
}


?>