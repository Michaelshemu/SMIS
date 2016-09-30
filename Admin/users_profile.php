<?php 
session_start();
include("../top.php");
 include("../configuration/dbconnection.php");  
?>
<script type="text/javascript" src="datepicker/calendarDateInput.js"></script>
<html>
    <head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="../sis.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="admin.css">
<title>Administrator</title>
    </head>
    <body style="background:#BDBDBD;">
    <div id="container">
        <div style="background:#9B9676;color:white;">
        <table class="table table-condensed">
            <tr><td style="padding-top:17px;"><?php echo date('l,M jS Y');?></td><td style="text-align:right;padding-top:17px;">Logined as </td><td style="text-align:right;width:100px;">   <ul style="float:right;margin-right:10px;padding-top:10px;list-style:none;">
                <li class="list dropdown">
				<a href="#" class="dropdown-toggle" style="text-decoration:none;color:white;" data-toggle="dropdown"><?php echo $_SESSION['fname']."&nbsp;".$_SESSION['mname']."&nbsp;".$_SESSION['user']; ?></a>
				<ul class="dropdown-menu" style=" background:#337AB7;" >
                      <li><a href="profile.php" style="color:black;" >My profile</a></li>
				<li ><a href="password.php"><b>Change password</b></a></li>
				<li><a href="../login/index.php"><b>Logout</b></a></li>
				</ul></li>
            </ul></td></tr>
            </table>
        </div>
        <table id="maintable" class="table table-condensed" width="100%" border="1" cellspacing="0" cellpadding="10" align="center" height="330">
        <tr id="tbheader"><th>MENU</th><th>WELCOME ADMINISTRATOR</th></tr>
  <tr align="center" align="top">
    <td id="clmenu">
        <div align="left">
              <ul class="nav nav-pills nav-stacked" >
        <li ><a href="index.php">Home</a></li>
        <li><a href="users.php">Profile Users</a></li>
        <li><a href="student_admin.php">Register Student</a></li>
        <li> <a href="staff_admin.php">Register Staff</a></li>
        <li><a href="ass_sub.php" >Assign Subject</a></li>
                  <li></li>
                 
      </ul>
    </div></td>
<td width="80%">
	<?php 
    if(isset($_GET['id']))
{
	$id=$_GET['id'];
	//echo "$id";
	$query = "select * from user_info,users where (user_info.info_id=users.info_id) and user_info.info_id='$id' LIMIT 1";
	$rs = mysql_query($query) or die(mysql_error());
	$user = mysql_fetch_array($rs);
	//$vv=$user['user_level'];
//	echo "$vv";
}

?>
	<table width="100%" border="0" cellspacing="0" cellpadding="10">
  <tr>
    <td>
		<table class="table table-condensed" width="60%" border="0" cellspacing="5" cellpadding="5" align="center" style="background:wheat;">
		<form action="edit_profile_users.php" method="post">
		<div class="" align="center"><i><strong><font face="Times New Roman, Times, serif" size="+2" color="#993333">
		</font></strong></i></div>
  <tr><td>Identification Number</td><td><input name="id" value="<?php echo $user['info_id'] ?>" readonly="readonly" /></td></tr>
  <tr>
  
    <td width="35%">First Name:</td>
    <td width="65%"><input type="text" name="fname" id="" value="<?php echo $user['fname'] ?>" /></td>
  </tr>
  
  <tr><td width="35%">Middle Name:</td><td><input type="text" name="mname" id="" value="<?php echo $user['mname'] ?>" /></td></tr>
  
  <tr><td width="35%">Surname</td><td><input type="text" name="lname" id="" value="<?php echo $user['lname'] ?>" /></td></td></tr>
  <tr>
  <td>Username</td><td><input type="text" name="uname" id="" value="<?php echo $user['username']; ?>"  /></td></tr>
   <tr><td>User role:</td><td>
    <?php 
       if($user['user_level']!='student'){
        ?><select  id="" style="width:178px;height:30px;" name="role" >
	<option value="Admin" id="">Admin</option>
    <option value="teacher" id="">Teacher</option>
         <option value="student" id="">Student</option>
        </select>
        </td> 
       <?php
       }
       ?>
</tr>
  <tr><td>gender:</td><td>
	<select style="width:178px;height:30px;" name="gender">
	<option value="male" id="">Male</option>
    <option value="female" id="">Female</option>
        </td></tr>
  <tr><td></td>
  <td align="right"><input class="btn btn-primary" type="submit" name="submit" value="Edit Profile"/>
 
 </td>
 </tr>
 </form>
 </table>	

	</td>
  </tr>
</table>
    </div>
    </body>

</html>
