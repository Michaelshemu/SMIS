<?php 
//session_start();
include("./configuration/session.php");
include("./top.php");
include("./configuration/dbconnection.php");


$username = $_SESSION['user'];
$query = "select * from user_info,users where username='$username' AND (user_info.id=users.info_id) LIMIT 1";
$rs = mysql_query($query) or die(mysql_error());
$user = mysql_fetch_array($rs);

?>


<div align="right"><?php echo date('l,M jS Y');?></div>
<table width="100%" border="1" cellspacing="0" cellpadding="10" align="center" height="330">
  <tr align="center" valign="top">
    <td width="20%" background="photos/bg_left.PNG"><div align="left">
      <p><a href="./welcome.php" style="text-decoration:none">Home</a></p>
         <p><a href="./student_admin.php" style="text-decoration:none">Register Student</a></p>
	     <p><a href="./result.php" style="text-decoration:none">Result</a></p>
		 <p><a href="./password.php" style="text-decoration:none">Change Password</a></p>
         <p><a href="./logout.php" style="text-decoration:none">Logout</a></p>
    </div></td>
    <td width="80%">
	
	<table width="100%" border="0" cellspacing="0" cellpadding="10">
  <tr>
    <td>
		<table width="60%" border="0" cellspacing="5" cellpadding="5" align="center">
		
		<div class="" align="center"><i><strong><font face="Times New Roman, Times, serif" size="+2" color="#993333">
		<?php echo $user['fname']." ".$user['lname']."'s"."&nbsp;&nbsp;&nbsp;"."PROFILE";?>
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
    <td>Date of Birth:</td>
    <td><input type="text" name="email" id="" value="<?php echo $user['dob']; ?>" readonly="readonly" size="35" /></td>
  </tr>
  <tr>
    <td>Gender:</td>
    <td><input type="text" name="phone" id="" value="<?php echo $user['gender']; ?>" readonly="readonly" size="35" /></td>
  </tr>
  <tr>
  <td align="right">
 <a href="update_profile.php" style="text-decoration:none"><input type="button" name="edit" value="Edit Profile"/></a>
 
 </td>
 </tr>
 </table>	
	</td>
  </tr>
  
</table>

	
	
	</td>
  </tr>
</table>


<?php include("./bottom.php");?>