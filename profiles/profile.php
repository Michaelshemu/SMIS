<?php 
//session_start();
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
            <tr><td style="padding-top:17px;"><?php echo date('l,M jS Y');?></td><td style="text-align:right;padding-top:17px;width:200px;">Logined as :</td><td style="text-align:right;width:170px;">   <ul style="float:right;margin-right:10px;padding-top:10px;">
                <li class="list dropdown">
				<a href="#" class="dropdown-toggle" style="text-decoration:none;color:white;" data-toggle="dropdown">Administrator</a>
				<ul class="dropdown-menu" style=" background:#337AB7;" >
                      <li><a href="../profiles/profile.php" style="color:black;" >My profile</a></li>
				<li ><a href="#"><b>Change password</b></a></li>
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
        <li ><a href="#">Home</a></li>
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
		<table width="60%" border="0" cellspacing="5" cellpadding="5" align="center">
		
		<div class="" align="center"><i><strong><font face="Times New Roman, Times, serif" size="+2" color="#993333">
		<?php 
    $username = $_SESSION['user'];
	$query = "select * from user_info,users where (username='$username') AND (user_info.id=users.info_id) LIMIT 1";
	$rs = mysql_query($query) or die(mysql_error());
	$user = mysql_fetch_array($rs);

		echo $user['fname']." ".$user['lname']."'s"."&nbsp;&nbsp;&nbsp;"."PROFILE";
            ?>
		</font></strong></i></div>
  <tr>
    <td width="35%">Full Name:</td>
    <td width="65%"><input type="names" name="citizen" id="" value="<?php echo $user['fname'].'&nbsp;&nbsp;&nbsp;'.$user['mname'].'&nbsp;&nbsp;&nbsp;'.$user['lname']; ?>" readonly="readonly" size="35"/></td>
  </tr>
  <tr>
  <td>Username</td><td><input type="text" name="reg#" id="" value="<?php echo $user['username']; ?>" readonly="readonly" size="35"/></td>

  </tr>
  <tr>
    <td>Position:</td>
    <td><input type="text" name="reg#" id="" value="<?php echo $user['user_level']; ?>" readonly="readonly" size="35"/></td>
  </tr>
  <tr>
    <td>Gender:</td>
    <td><input type="text" name="phone" id="" value="<?php echo $user['gender']; ?>" readonly="readonly" size="35" /></td>
  </tr>
  <tr>
  <td align="right">
 <a href="update_profile.php" style="text-decoration:none">
<?php 
 if($user['user_level']=='admin')
 {
 //echo "vv";
 echo '<input type="button" name="edit" value="Edit Profile"/>'; 
 }
     ?>
</a>
 
 </td>
  </tr>
</table>
    </div>
    </body>

</html>
