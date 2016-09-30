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
    <link rel="stylesheet" href="ticha.css">
<title>Teacher</title>
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
        <tr id="tbheader"><th>MENU</th><th>WELCOME TEACHER</th></tr>
  <tr align="center" align="top">
    <td id="clmenu">
        <div align="left">
              <ul class="nav nav-pills nav-stacked" >
        <li ><a href=index.php>Home</a></li>
        <li><a href="view_result_teacher.php">Subject uploaded</a></li>
        <li><a href="resultstudent_teacher.php">Result of students</a></li>
        <li><a href="teacher_upload.php">Upload Student results</a></li> 
        <li><a href="subassigned.php">Subject assigned</a></li>
      </ul>
    </div></td>
    <td width="80%">
	
	<table width="100%" border="0" cellspacing="0" cellpadding="10">
  <tr >
    <td>

<?php

$table = '
<table class="table table-condensed" border="1" width="100%" align="center">
<thead>&nbsp;&nbsp;
<tr style="background:gray;color:white;">
<th >SSn</th>
<th>First name</th>
<th>Second name</th>
<th>Middle name</th>
<th> Subject name</th>
<th>term</th>
<th>Result</th>
</tr>
</thead>
<tbody>';
$xx=$_SESSION['info_id'];
$query = "select * from user_info,results,subjects where  (results.subid=subjects.subid) and (results.info_id=user_info.info_id) and results.tcha=$xx";

$rs = mysql_query($query) or die(mysql_error());
        
echo "<b><center><h3>Results uploaded by - ".$_SESSION['fname'].".</h3></center></b>";
//echo $user['fname'];

$teacher_id = 1;
while($row = mysql_fetch_assoc($rs)){
$table .= '
<tr>
<td>'.$row['info_id'].'</td>
<td>'.$row['fname'].'</td>
<td>'.$row['mname'].'</td>
<td>'.$row['lname'].'</td>
<td>'.$row['subname'].'</td>
<td>'.$row['terminal'].'</td>
<td>'.$row['marks'].'</td>
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
<a href="index.php" style="text-decoration:none"><img src="../photos/undo_arrow_left_edit_back-128.png" align="left" width="30"/>Back</a>
</td></tr></table>
</td><tr>
</table>

	</td>
  </tr>
  </table>
	