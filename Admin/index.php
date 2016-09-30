<?php 
session_start();
include("../top.php");
 include("../configuration/dbconnection.php");  
?>
<script type="text/javascript" src="datepicker/calendarDateInput.js"></script>
<html>
    <head>
<meta http-equiv="Content-Typ`  e" content="text/html; charset=iso-8859-1" />
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
        <li><a href="deactivate.php" >Deactivate users</a></li> 
       <li><a href="activate.php" >Activate users</a></li>
      </ul>
    </div></td>
     <td width="80%">
	
	<table width="100%" border="0" cellspacing="0" cellpadding="10">
  <tr >
    <td>
<table background="photos/bg_footer.PNG" cellpadding="5" cellspacing="1" align="center">
	<tr>
	<td></td>
	<td background="photos/bg_body.PNG">&nbsp;&nbsp;&nbsp;&nbsp;</td>
	<td></td>
	<td background="photos/bg_body.PNG">&nbsp;&nbsp;&nbsp;&nbsp;</td>
	<td></td>
	<td background="photos/bg_body.PNG">&nbsp;&nbsp;&nbsp;&nbsp;</td>
	<td></td>
	</tr>
	</table>
	<table cellpadding="10" cellspacing="1" border="0" width="100%">
	<tr><td>
	<center><font size="+2" > 
	<?
	echo $user['fname'];
	?>
	</font></center>
	<br>
	<font size="+1" color="#663300">Functions of Adminstrator in the system<br>
	<ul>Manage users account</ul>
	<ul>Add or Edit users</ul>
    <ul>Add subjects and assign to that subject to teacher</ul>
	</td></tr>
	</table>
	</td>
  </tr>
  </table>
	
	</td>
  </tr>
</table>
    </div>
    </body>

</html>
