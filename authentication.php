<?php
require_once './configuration/dbconnection.php';
//capturing the entered username and password for validation
$username = mysql_real_escape_string($_POST['username']);
$password = mysql_real_escape_string(MD5($_POST['password']));
//others
$query = "SELECT * FROM users WHERE username = '$username' AND password = '$password' AND status='1'";

$result = mysql_query($query) or die(mysql_error());

$numrows = mysql_numrows($result);

//parent
$prt="select * from parent where username='$username' and password='$password' and status='1'";

$result_p = mysql_query($prt) or die(mysql_error());

$numrows_p = mysql_numrows($result_p);

//	echo $numrows_p; 

if($numrows > 0){
    
    
    $user = mysql_fetch_array($result);

    session_start();
    $_SESSION['user'] = $user['username'];
	$_SESSION['user_level'] = $user['user_level'];
    $_SESSION['info_id'] = $user['info_id'];
	
    header("Location: welcome.php");
} 
else if($numrows_p > 0)
{
    $user = mysql_fetch_array($result_p);
    
    session_start();
    $_SESSION['user'] = $user['username'];
	$_SESSION['user_level'] = $user['user_level'];
    $_SESSION['student_id'] = $user['student_id'];
	//echo $_SESSION['user_level'];
	//echo $_SESSION['user_level'];
   header("Location: welcome.php");

}
else {
  //  	echo $_SESSION['user_level'];
  header("Location: index.php?error=invalidusername");
}

?>


