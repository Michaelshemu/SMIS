<?php 
//session_start();
include("../configuration/session.php");
include("../configuration/dbconnection.php");
$tid=$_POST['tcha'];
$sub=$_POST['sub'];
$class=$_POST['class'];
$sql = "insert into teacher_subject_assign(subid,info_id,Cname) values ($sub,$tid,'$class')";
if(mysql_query($sql)){
 header('Location:  ass_sub.php?success=Sussessfully');   
} else{
 header('Location:  ass_sub.php?success=fail');
}
?>