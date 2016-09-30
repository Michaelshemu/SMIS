<?
include("./configuration/session.php");
include("./configuration/dbconnection.php");

if($_SESSION['user_level']=='admin'){
header('location:Admin/result_admin.php');
}
else if($_SESSION['user_level']=='teacher'){
header('location:teacher/result_teacher.php');
}
else if($_SESSION['user_level']=='student'){
header('location:student/result_student.php');
}
else
header('location:logout.php');
?>