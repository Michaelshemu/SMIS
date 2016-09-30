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
        <li><a href="result.php">Result</a></li>
                  <li></li>
                 
      </ul>
    </div></td>
<td width="80%">
	<table width="100%" border="0" cellspacing="0" cellpadding="10">
  <tr>
    <td>
		
		<div class="" align="center"><i><strong><font face="Times New Roman, Times, serif" size="+2" color="#993333">
            <?php 
         	      	$username=$_SESSION['user'];
	$query = "select * from user_info,users where username='$username' AND (user_info.info_id=users.info_id) LIMIT 1";
	$rs = mysql_query($query) or die(mysql_error());
	$user = mysql_fetch_array($rs);
     echo "Edit"; 
     echo $user['fname']." ".$user['lname']."'s"."&nbsp;&nbsp;&nbsp;"."PROFILE";
            ?>
		</font></strong></i></div>
		 <form name="edit_profile" action="edit_profile.php" method="post">
		<table width="100%" border="0" cellspacing="5" cellpadding="5" align="center">
  <tr>
    <td width="15%">First Name:</td>
    <td width="15%"><input type="text" name="fname"  value="<?php echo $user['fname'] ?>"/></td>
	 <td width="15%">Middle Name:</td>
    <td width="15%"><input type="text" name="mname"  value="<?php echo $user['mname'] ?>" /></td>
  </tr>
   <tr>
    <td width="15%">Surname Name:</td>
    <td width="15%"><input type="text" name="lname"  value="<?php echo $user['lname'] ?>"/></td>
    <td>Username:</td>
    <td><input type="text" name="uname"  value="<?php echo $user['username']; ?>" /></td>
  </tr>
  <tr>
    <td>Gender:</td>
    <td><select name="gender" id="">
	<?
	if($user['gender']=='Male')
	{
	?>
	<option value="Male" id="">Male</option>

	<option value="Female" id="">Female</option>	
	<?
	}
	else if ($user['gender']=='Female')
	{
	?>
	<option value="Female" id="">Female</option>	
		<option value="Male" id="">Male</option>

	<?
	}
	?>
	</select>
	</td>
    <td>Position:</td>
    <td>
<input type="text" value="<?php echo $user['user_level']; ?>" id="" readonly="readonly"/>	
</td>
  </tr>
  <tr>
  <td align="right" colspan="4">
 <input type="submit" value="Request Changes"/>
 </a>
 </td>
 </tr>
 <tr>
 <td colspan="4" align="right">
</td></tr>
 </table>	
 </form>
	</td>
  </tr>
  
</table>

	
	
	</td>
  </tr>
</table>
    </div>
    </body>

</html>
