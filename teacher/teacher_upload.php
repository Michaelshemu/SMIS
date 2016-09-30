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
	<table class="table table-condensed" cellpadding="5" cellspacing="1" border="1" width="100%" style="background:gray;">
	<tr valign="top"><td align="center" background="photos/bg_footer.PNG">Result of student</td></tr>
	<tr><td width="40%">
	<table class="table table-condensed" width="100%" border="0" cellspacing="0" cellpadding="5" align="left" style="background:wheat;">
<form name="result" method="post" action="result_process_teacher.php">
<tr><td align="center">Student.Reg no:</td><td><input type="text" name="regno" id="" value="" onblur="if (this.value == '') {this.value = 'Enter Id';}"
 onfocus="if (this.value == 'Id') {this.value = '';}"/></td></tr><tr><td align="center">Subject Code:</td>
<td>
<?php
$cc=$_SESSION['info_id'];
	$ticha = "select * from subjects,teacher_subject_assign ass where subjects.status='1' and ass.subid=subjects.subid and ass.info_id=$cc";
	$res = mysql_query($ticha) or die(mysql_error());

?>
<select name="sub" id="" required="required"><option id="" required="required">Select</option>
<?php  
while($row = mysql_fetch_assoc($res))
	{
		 echo '<option value='.$row['subid'].'>'.$row['subid'].' -'.$row['subname'].'</option>';
++$index;	
}
	?>
	</select>
</td>
</tr>
    <tr>
    <td align="center">Marks:</td>
    <td><input type="text" name="mark" id="" required="required" size="2"/>	</td>
  </tr>
    <tr>
        <td align="center">TERM</td>
         <td><select name="term">
             <option value="TERM-I">TERM-I</option>
              <option value="TERM-II">TERM-II</option>
             </select><br><br>
         <input class="brn btn-primary"type="submit" name="submit" value="Submit"/>  
        </td>
    </tr>
 </form>
        <tr><td></td>
        <td>
                <label >ADD MULTIPLE RESULT FROM EXCEL</label>
<table border="0">
		<form action="multiple.php" name="upload_excel" enctype="multipart/form-data" method="post">
		 <tr><td><input type="file" name="upload" value="upload" required="required"/></td><td><input type="submit" class="btn btn-primary" name="Submit" value="Submit"/></td></tr>
                  <?php     
        if(@$_GET['user']){
        $user=$_GET['user'];
        echo "<strong><font color='red'><a href='teacher_upload.php'> Student with Id&nbsp;".$user." does not exist</a></font></strong>";
    }
        if(@$_GET['success'] == 'Sussessfully'){
        
        echo "<strong><font color='red'><a href='teacher_upload.php'> Successfully!</a></font></strong>";
    }else
                if(@$_GET['assign'] == 'noop'){
        
        echo "<strong><font color='red'><a href='teacher_upload.php'> The subject not assigned</a></font></strong>";
    }
	else if(@$_GET['error'] == 'fail')
	{
	        echo "<strong><font color='red'>fail!</font></strong>";

	}else if(@$_GET['error'] == 'exist'){
         echo "<strong><font color='red'><a href='teacher_upload.php' >The result already uploaded!</a></font></strong>"; 
    }
?>
		<tr><td colspan="3" align="center" background="photos/bg_footer.PNG"></td></tr>
		</form>
</table>    
        </td>
        </tr>
 </table>	
 </td> 
</tr>
	</table>
	</td>
  </tr>
<table align="left">
<tr><td>
<a href="result_teacher.php" style="text-decoration:none"><img src="../photos/undo_arrow_left_edit_back-128.png" align="left" width="30"/>Back</a>
</td></tr></table>
</td><tr>
</table>

	
	
	</td>

  </tr>
</table>