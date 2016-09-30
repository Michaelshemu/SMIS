<?php 
//session_start();
include("../configuration/session.php");
include("../top.php");
include("../configuration/dbconnection.php");

$username = $_SESSION['user'];
$query = "select * from user_info,users where username='$username' AND (user_info.id=users.info_id) LIMIT 1";
$rs = mysql_query($query) or die(mysql_error());
$user = mysql_fetch_array($rs);

if($user['user_level'] != 'teacher')
{
header("location:./logout.php");
}
?>

<script type="text/javascript" src="datepicker/calendarDateInput.js"></script>
<div align="right"><?php echo date('l,M jS Y');?></div>
<table width="100%" border="1" cellspacing="0" cellpadding="10" align="center" height="330">
  <tr align="center" valign="top">
    <td width="20%" background="photos/bg_left.PNG"><div align="left">
      <p><a href="./welcome.php" style="text-decoration:none">Home</a></p>
         <p><a href="./profile.php" style="text-decoration:none">My Profile</a></p>
	     <p><a href="./result.php" style="text-decoration:none">Result</a></p>
		 <p><a href="./password.php" style="text-decoration:none">Change Password</a></p>
         <p><a href="./logout.php" style="text-decoration:none">Logout</a></p>
    </div></td>
    <td width="80%">
	
	<fieldset style="border-radius:12px"><legend align="center">
	<font face="Times New Roman, Times, serif" color=""><strong><i>
	STUDENT REGISTRATION FORM:</i></strong></legend>
		<form  action="./add_student.php"  name="student_registration_form" method="post">
		<table width="100%" border="0" cellspacing="10" cellpadding="0">
  <tr>
    <td width="25%" >Reg Number:</td>
    <td width="25%"><input type="text" name="Reg" id=""  required="required" value="S1208/" /></td><td align="left"><font color="#FF0000">Example: S1208/007</font></td>
  </tr>
  <tr>
    <td> First Name:</td>
    <td align="left"><input type="text" name="fname" id="" required="required" /></td>
    <td>Middle Name:</td>
    <td align="left"><input type="text" name="mname" id="" required="required" /></td>
    
  </tr>
  <tr>
  <td>Surname:</td>
    <td align="left"><input type="text" name="sname" id="" required="required" /></td>
	<td>User name</td><td><input type="text" name="uname" required="required" /></td></tr>
	<tr>
    <td>Gender: </td>
    <td align="left"><select name="gender" id=""><option id="" required="required">---Select Gender---</option><option></option><option id="" value="Female">Female</option><option id="" value="Male">Male</option></select> </td>
  </tr>
  <tr><td colspan="4" align="center">&bull;<b><u>Parents/Relative details</u></b></td></tr>
  <tr><td>First Name</td><td><input type="text" name="pfname" required="required" /></td><td>Middle Name</td><td><input type="text" name="pmname" required="required" /></td></tr>
  <tr><td>Surname</td><td><input type="text" name="psname" required="required" /></td><td>User name</td><td><input type="text" name="puname" required="required" /></td></tr>
  <tr>
  	<td colspan="4" align="right">
	<input type="submit" name="register" id="" value="Register" />
	<input type="Reset" name="reset" id="" value="Clear" />
	</td>
	  </tr>
 
</table>			
	    </form>
		
		
		
	</fieldset>
	</td>
  </tr>

<?php 

    if(@$_GET['success'] == 'Sussessfully'){
        
        echo "<strong><font color='red'>Successfully!</font></strong>";
    }
?>



<?php include("./bottom.php");?>