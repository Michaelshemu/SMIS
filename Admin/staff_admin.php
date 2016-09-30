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
        <tr id="tbheader"><th>MENU</th><th><strong>
	STAFF REGISTRATION FORM:</strong></th></tr>
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
	
	<fieldset style="border-radius:12px;"><legend align="center">
	<font face="Times New Roman, Times, serif" color=""></legend>
		<form  action="add_staff.php"  name="staff_registration_form" method="post">
            <table class="table table-condensed" style="background:wheat;">
            <tr>
            <td>
            <fieldset id="fsname">
             <label for="fname">Staff Id:</label>
            <input class="form-control" type="text" name="id" id="" required="required" />
            <label for="fname"> First Name:</label>
            <input class="form-control" type="text" name="fname" id="" required="required" />
            <label for="mname">Middle name:</label>   
            <input class="form-control" type="text" name="mname" id="" required="required" />
            </fieldset>
            </td>  
            <td>
             <fieldset id="otherparticular">
         <label for="uname">Surname:</label>
        <input class="form-control" type="text" name="lname" required="required" />
            <label for="gender">Gender:</label>
           <select class="form-control" name="gender" >
           <option id="" required="required">---Select Gender---</option>
           <option id="" value="Female">Female</option>
           <option id="" value="Male">Male</option>
           </select>
          <label for="position">Position:</label>
            <select class="form-control" name="role">
                <option required="required">-Position-</option>
                <option value="admin">Admin</option>
                <option value="teacher">Teacher</option>
                 </select>
                 <br>
                 <input class="btn btn-primary" type="submit" name="register" id="" value="Register" />
                 <input class="btn btn-primary" type="Reset" name="reset" id="" value="Clear" />
            </fieldset>
            </td>
            </tr>
            </table>
</form>
<label >ADD MULTIPLE STAFFS FROM EXCEL</label>
<table border="2">
		<form action="upload.php" name="upload_excel" enctype="multipart/form-data" method="post">
		 <tr><td><input type="file" name="upload" value="upload" required="required"/></td><td><input type="submit" class="btn btn-primary" name="Submit" value="Submit"/></td></tr>
		<tr><td colspan="3" align="center" background="photos/bg_footer.PNG"><a href="../sampleusers/STAFF.xlsx" style="text-decoration:none"><font color="black" size="+1">Click here to view the sample of the excel</font></a></td></tr>
		</form>
</table>
	  
  <?php 

    if(@$_GET['success'] == 'Sussessfully'){
        
        echo "<strong><font color='red'>Successfully!</font></strong>";
    }
?> 
	    
		
	</fieldset>
	</td>
  </tr>
</table>
    </div>
    </body>

</html>
