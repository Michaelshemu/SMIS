<?php 
//session_start();
include("../configuration/session.php");
include("../configuration/dbconnection.php");
$sub = $_POST['subcode'];
$subname = $_POST['subname'];
$sql = "insert into subjects (subid,subname,status) values ($sub,'$subname',1)";
mysql_query($sql) or die(mysql_error());
header('Location:  addsubject.php?success=Sussessfully');
?>