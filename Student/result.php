<?
include("./configuration/session.php");
include("./configuration/dbconnection.php");

if($_SESSION['user_level']=='admin'){
header('location:result_admin.php');
}
else if($_SESSION['user_level']=='teacher'){
header('location:result_teacher.php');
}
else if($_SESSION['user_level']=='student'){
header('location:result_student.php');
}
else if($_SESSION['user_level']=='parent'){
header('location:result_parent.php');
}
else
header('location:logout.php');
?>