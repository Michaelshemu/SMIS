<?php 
//session_start();
include("../top.php");
 include("../configuration/dbconnection.php"); 
include("../configuration/session.php"); 
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
        <li><a href="deactivate.php" >Deactivate users</a></li>
                 
      </ul>
    </div></td>
    <td width="80%">
	
	<table width="100%" border="0" cellspacing="0" cellpadding="10">
  <tr >
    <td>
<?php
$table = '
<table class="table table-condensed" border="0" width="100%" align="center">
<thead>&nbsp;&nbsp;
<tr style="background:gray;color:white;">
<th width="3%">SSn</th>
<th width="15%">First Name</th>
<th width="10%">SurName</th>
<th width="10%">Staff Id</th>
<th width="15%">Subject name</th>
<th width="8%">Year</th>
<th>Status</th>
</tr>
</thead>
<tbody>';
$query = "select * from users,user_info,subjects,results where users.user_level='teacher' and (users.info_id=user_info.info_id) and (user_info.info_id=subjects.teacher_id) and (subjects.subcode=results.subject_id)";
$rs = mysql_query($query) or die(mysql_error());
echo "<b><center><u>Here is the list uploded results</u></center></b>";
$teacher_id = 1;
while($row = mysql_fetch_assoc($rs)){
$table .= '
<tr>
<td>0'.$teacher_id.'</td>
<td>'.$row['fname'].'</td>
<td>'.$row['lname'].'</td>
<td>'.$row['info_id'].'</td>
<td>'.$row['name'].'</td>
<td>'.$row['year'].'</td>
<td>'.'Already uploaded'.'</td>

</tr>';
++$teacher_id;
}

$table .= '

</table >';
echo $table;
	
 echo '</div>';


?>
<table align="left">
<tr><td>
<a href="result_admin.php" style="text-decoration:none"><img src="../photos/undo_arrow_left_edit_back-128.png" align="left" width="30"/>Back</a>
</td></tr></table>
</td><tr>
</table>

	</td>
  </tr>
  </table>
	


<?php include("./bottom.php");?>