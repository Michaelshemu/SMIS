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
        <li><a href="deactivate.php" >Deactivate users</a></li> 
       <li><a href="activate.php" >Activate users</a></li>
      </ul>
    </div></td>
     <td width="80%">
	<table width="100%" border="0" cellspacing="0" cellpadding="10">
  <tr>
    <td>
		<div class="" align="center"><i><strong><font face="Times New Roman, Times, serif" size="+2" color="#993333"></font></strong></i></div>
        <a href="addsubject.php">Add new subject</a><br/>
		 <font color="#993333"  style="widows:inherit"><center><B>ASSIGN SUBJECT TO TEACHER</B></center></font>
<?		 
?>
	  </td>	 
		<table width="80%" border="0" cellspacing="0" cellpadding="0" align="center">
  	
 <form action="assignedsub.php" method="post">
  <tr>
    <td width="2%" style="padding-bottom:30px;" align="center">Teacher name:</td>
    <td width="5%">
        <select 
            class="form-control" name="tcha">
        <option id="" required="required">Select teacher</option>
        	<?php  
    $ticha = "select * from user_info where user_level='teacher'";
	$res = mysql_query($ticha) or die(mysql_error());
        $index=1;
        while($row = mysql_fetch_array($res))
	{
		 echo '<option value="'.$row['info_id'].'">'.$row['fname'].'&nbsp;'.$row['lname'].'</option>';
            ++$index;
	}
	?>
	</select>
	</td>
	
	
</tr>
<tr>
    <td align="center" style="padding-bottom:30px;">Subject:</td>
<td>
<select class="form-control" name="sub" id="" required="required">
        <option id="" required="required"></option>
        	<?php  
    $ticha = "select * from subjects";
	$res = mysql_query($ticha) or die(mysql_error());
        $index=1;
        while($row = mysql_fetch_array($res))
	{
		 echo '<option value="'.$row['subid'].'">'.$row['subname'].'</option>';
            ++$index;
	}
	?>
</select>
</td>
</tr>
     <tr>
     <td style="padding-bottom:30px;text-align:center;">Class:</td><td>
         
         <select class="form-control" name="class" id="" required="required">
        <option id="" required="required"></option>
        	<?php  
    $ticha = "select * from class";
	$res = mysql_query($ticha) or die(mysql_error());
        $index=1;
        while($row = mysql_fetch_array($res))
	{
echo '<option value="'.$row['CName'].'-'.$row['stream'].'">'.$row['CName'].'&nbsp;'.$row['stream'].'</option>';
            ++$index;
	}
	?>
</select>
         </td>
     </tr>
  <tr>
  <td align="right" colspan="4">
 <input class="btn btn-primary" type="submit" value="Submit" />
        </form>
 </td>
 </tr>
  <tr><td colspan="2" align="right">	  <?php

    if(@$_GET['success'] == 'Sussessfully'){
        
        echo "<strong><font color='red'><a href='ass_sub.php'>Successfully!</a></font></strong>";
    }else if(@$_GET['success'] == 'fail'){
        echo "<strong><font color='red'><a href='ass_sub.php'>The subject alread assigned to that teacher</a></font></strong>";   
    }
	if(@$_GET['error']=='fill all details correctly'){
	echo "<strong><font color='red'>Operation not successed!</font></strong>";
	}
?>
</td></tr>

 </table>	
  </form>

	
	</td>
  </tr>
</table>
    </div>
    </body>

</html>
