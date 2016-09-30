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
	<table width="100%" border="0" cellspacing="0" cellpadding="10">
        <tr>
        <form action="subjectadded.php" method="post">
            <table class="table" style="background:wheat;">
            <tr>
            <td style="text-align:right;">Subject code:</td><td><input type="text" name="subcode" required="required"></td>
                </tr> 
                <tr>
            <td style="text-align:right;">Subject name:</td><td><input type="text" name="subname" required="required"></td>
            </tr>
                <tr><td>
                            <a href="ass_sub.php" style="text-decoration:none"><img src="../photos/undo_arrow_left_edit_back-128.png" align="left" width="30"/>Back</a>
                    </td>
                <td>
                    <input type="submit" name="submit" class="btn btn-primary" value="save">
                    </td>
                </tr>
            </table>
            </form>
    	  
  <?php 

    if(@$_GET['success'] == 'Sussessfully'){
        
        echo "<strong><font color='red'>Successfully!</font></strong>";
    }
?> 
        </tr>
 </table>	
  </form>

	
	</td>
  </tr>
</table>
    </div>
    </body>

</html>
