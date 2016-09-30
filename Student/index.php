<?php 
session_start();
include("../top.php");
 include("../configuration/dbconnection.php"); 
//include("../configuration/session.php");
?>
<script type="text/javascript" src="datepicker/calendarDateInput.js"></script>
<html>
    <head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="../sis.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="student.css">
<title>Student</title>
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
        <tr id="tbheader"><th>MENU</th><th>WELCOME STUDENT</th></tr>
  <tr align="center" align="top">
    <td id="clmenu">
        <div align="left">
              <ul class="nav nav-pills nav-stacked" >
        <li ><a href="index.php">Home</a></li>
        <li><a href="result_student.php">View results</a></li>
        <li><a href="subjects.php">View Subjects</a></li>
      </ul>
    </div></td>
     <td width="80%">
	
	<table width="100%" border="0" cellspacing="0" cellpadding="10">
  <tr >
    <td>
	<table cellpadding="10" cellspacing="1" border="0" width="100%">
	<tr><td>
	<center><font size="+2" > 
	<?
	echo $user['fname'];
	?>
	</font></center>
	<br>
	<font size="+1" color="#663300">Here you can assess several link were by you can
	<ul>&bull;login</ul><ul>&bull;View results course results<br></ul><ul>&bull;Change Password</ul>
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
