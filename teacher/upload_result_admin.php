<?php 
//session_start();
include("../top.php");
  include("../configuration/session.php"); 
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
        <li><a href="../result.php">Result</a></li>
                  <li></li>
                 
      </ul>
    </div></td>
    <td width="80%">
	
	<table width="100%" border="0" cellspacing="0" cellpadding="10">
  <tr >
    <td>
	<table class="table table-condensed" cellpadding="5" cellspacing="1" border="0" width="100%" style="background:wheat;">
	<tr align="top" style="background:gray;"><td align="center">For single student</td><td align="center">Upload single/multiple result for single/multiple student</td></tr>
	<tr><td width="40%">
	<table width="100%" border="0" cellspacing="0" cellpadding="5" align="left">
<form name="result" method="post" action="../result_process.php">
<tr><td align="center" style="padding-bottom:30px;">Stud.Reg no:</td><td><input class="form-control" type="text" name="regno" id="" value="" onblur="if (this.value == '') {this.value = '';}"
 onfocus="if (this.value == 'eg: ST526/023') {this.value = '';}"/><br></td></tr><tr><td align="center" style="padding-bottom:30px;">Subject:</td>
<td>
<select class="form-control" name="sub" id="" required="required">
<option id="" required="required">Select</option>
<option value="Physics" id="">Physics - PHY</option>
<option value="Chemistry" id="">Chemistry - CHEM</option>
<option value="Maths" id="">Maths - MATH</option>
<option value="Biology" id="">Biology - BIO</option>
<option value="Geography" id="">Geography - GEO</option>
<option value="History" id="">History - HIST</option>
<option value="Civics" id="">Civics - CIV</option>
<option value="English" id="">English - ENG</option>
<option value="Kiswahili" id="">Kiswahili - KISW</option>
</select><br>
</td>
</tr>
<tr><td align="center" style="padding-bottom:30px;">Year:</td><td>
<select class="form-control" name="year" id="">
<option id="">Year</option>
<option value="2014" id="">2014</option>
<option value="2015" id="">2015</option>
<option value="2016" id="">2016</option>
<option value="2017" id="">2017</option>
<option value="2018" id="">2018</option>
</select><br>
</td></tr>
    <td align="center">Marks:</td>
    <td><input class="form-control" type="text" name="mark" id="" required="required" size="2"/><br></td>
  </tr>
  <tr>
  <td align="right" colspan="2">
 <input class="btn btn-primary" type="submit" name="submit" value="Submit"/>
 </td>
 </tr>
 </form>
 </table>	
 </td>
 
 <td>
 <table cellpadding="5" cellspacing="3" border="0" align="center">
 
 <form name="upload" method="post" action="../upload_multiple_admin.php" enctype="multipart/form-data">
 <tr><td align="right"><input type="file" name="upload" id="" required="required"/></td><td>&nbsp;</td></tr>
 <tr><td colspan="2" align="center"><a href="../Upload excels samples/results.xls" style="text-decoration:none"><font size="+1">Click here for sample</font></a></td></tr><tr><td align="right" colspan="3"><input type="submit"  class="btn btn-primary" name="submit" value="Upload"/></td></tr>
 </table>.</td></tr>
 
 </form>
	</table>
	
	<!--
		
 -->
	</td>
  </tr>
  <tr><td align="center"><?php if(@$_GET['success'] == 'Sussessfully'){
        
        echo "<strong><font color='red'>Successfully!</font></strong>";
    }
	else if(@$_GET['error'] == 'Not Succeed')
	{
	        echo "<strong><font color='red'>Current password doesnt match!</font></strong>";
	}
?>
      </td>
        </tr>
<table align="left">
<tr><td>
<a href="result_admin.php" style="text-decoration:none"><img src="../photos/undo_arrow_left_edit_back-128.png" align="left" width="30"/>Back</a>
</td></tr></table>
</td><tr>
</table>

	
	</td>

  </tr>
</table>
