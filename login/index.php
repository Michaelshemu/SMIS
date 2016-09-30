<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Login Form</title>

        <link rel="stylesheet" href="css/style.css">
       <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/bootstrap.min.css"> 
  </head>
  <body style="background:gray;">
<div class="login">
  <div class="login-header">
    <h1>Login</h1>
  </div>
  <div class="login-form">
  <form action="index.php" method="post">
    <h3>Username:</h3>
    <input type="text" name="username" placeholder="Username"/><br>
    <h3>Password:</h3>
    <input type="password" name="password" placeholder="Password"/>
    <br>
    <input type="submit" value="Login" name="submit" class="btn btn-primary"/>
    <br>
    <br>
    <h6 class="no-access">Can't access your account?</h6>
	</form>
  </div>
</div>
        <script src="js/index.js"></script>
  </body>
</html>
<?php
//echo md5('1234');
require("../configuration/settings.php");
require("../configuration/connect.inc.php");
include("../configuration/session.php");
if(isset($_POST['submit'])){
if(isset($_POST['username'])&&isset($_POST['password'])){
$username=$_POST['username'];
$password=$_POST['password'];
$password_hash=md5($password);
 if(!empty($username)&&!empty($password)){
 $query="SELECT * FROM user_info,users WHERE username='$username' AND password='$password_hash' AND (user_info.info_id=users.info_id) LIMIT 1";
 if($query_run=mysql_query($query)){
$mysql_query_num_rows=mysql_num_rows($query_run);
if($mysql_query_num_rows==0){
 echo '<h3 style="color:white;">Incorrect username or password</h3>';
}else if($mysql_query_num_rows==1){
    $id=mysql_result($query_run,0,'info_id');
	$user=mysql_result($query_run,0,'username');
    $fname=mysql_result($query_run,0,'fname');
    $mname=mysql_result($query_run,0,'mname');
    $gender=mysql_result($query_run,0,'gender');
    $user_level=mysql_result($query_run,0,'user_level');
	$_SESSION['user']=$user;
    $_SESSION['fname']=$fname;
    $_SESSION['mname']=$mname;
    $_SESSION['gender']=$gender;
    $_SESSION['info_id']=$id;
    $_SESSION['user_level']=$user_level;
$query = "select * from user_info,users where username='$username' AND (user_info.info_id=users.info_id) LIMIT 1";
$rs = mysql_query($query) or die(mysql_error());
$user = mysql_fetch_array($rs);
if($user['status']==1){
 if($user['user_level'] == 'Admin')
{
header("location:../Admin/index.php");
}else if($user['user_level'] =='teacher'){
header("location:../teacher/index.php");
}
else if($user['user_level']=='student'){
header("location:../Student/index.php");
}   
}else{
    echo '<h3 style="color:white;">Your are not activated in the system please contact with the system Adminstrator</h3>';
}
}
 }else
	 echo mysql_error();

 }else
 echo '<h3 style="color:white;">Your must fill username and password to login</h3>';
}
}
?>
