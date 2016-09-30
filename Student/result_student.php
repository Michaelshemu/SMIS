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
	<table cellpadding="3" cellspacing="0" border="0" width="100%">
	<tr><td>
	<center><font size="+1" >Welcome 
	<?php
	echo $_SESSION['fname'].' '.$_SESSION['mname'].' '.$_SESSION['user'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Reg No:'.$_SESSION['info_id'];
	?>
	</font></center>
	</td></tr>
	<tr><td>
<?php

$table = '
<table class="table table-condensed" border="1" width="100%" align="center">
<thead>&nbsp;&nbsp;
<tr style="background:gray;color:white;">
<th >SSn</th>
<th> Subject id</th>
<th>subject name</th>
<th>Term</th>
<th>Result</th>
</tr>
</thead>
<tbody>';
$xx=$_SESSION['info_id'];
$query = "select * from subjects,results,users where (subjects.subid=results.subid) and (results.info_id=users.info_id) and results.info_id=$xx;";
if($rs = mysql_query($query)){
    $teacher_id = 1;
while($row = mysql_fetch_assoc($rs)){
$table .= '
<tr>
<td>'.$teacher_id.'</td>
<td>'.$row['subid'].'</td>
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

}else{
   die(mysql_error());  
}


?>

</td></tr>
	</table>
	</td>
  </tr>
  </table>
	
	
	</td>
  </tr>
</table>
