
<?php 
//session_start();
include("./configuration/session.php");
//include("top.php");
include("./configuration/dbconnection.php");
$username = $_SESSION['user'];
$query = "select * from user_info,users where username='$username' AND (user_info.id=users.info_id) LIMIT 1";
$rs = mysql_query($query) or die(mysql_error());
$user = mysql_fetch_array($rs);

if($user['user_level'] != 'admin')
{
header("location:logout.php");
}


//student
$query = "select * from user_info,users where username='$username' AND user_info.id=users.info_id";
//	$ticha = "select * from user_info,users where user_level='teacher' and users.info_id=user_info.id";

$rs = mysql_query($query) or die(mysql_error());
$user = mysql_fetch_array($rs);
$Id = $_POST['regno'];
$sub = $_POST['sub'];
//echo "sub"?error dubu
//$year = $_POST['year'];
$marks=$_POST['mark'];
//$subcode = $_POST['subcode'];


$sql = "insert into results (subject_id, student_id, marks, status) values ('$sub','$Id','$marks','1')";
mysql_query($sql) or die(mysql_error());

header('Location:./teacher_upload.php?success=Sussessfully');

/*echo $subcode;
echo $Id;*/
//echo ($_SESSION[uname]);

?>