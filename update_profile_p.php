<?php 
//session_start();
include("./configuration/session.php");
include("top.php");
include("./configuration/dbconnection.php");


$username = $_SESSION['user'];
	$query = "select * from user_info,users,parent where (parent.username='$username' or users.username='Susername') AND (user_info.id=users.info_id) and (user_info.id=parent.student_id) LIMIT 1";
$rs = mysql_query($query) or die(mysql_error());
$user = mysql_fetch_array($rs);

?>


<div align="right"><?php echo date('l,M jS Y');?></div>
<table width="100%" border="1" cellspacing="0" cellpadding="10" align="center" height="330">
  <tr align="center" valign="top"><td background="photos/bg_left.PNG"><div align="left">
  <?
	  
	 if($_SESSION['user_level']=='parent'){
	  	$username = $_SESSION['user'];
	$query = "select * from user_info,parent where (username='$username') AND (user_info.id=parent.student_id) LIMIT 1";
	$rs = mysql_query($query) or die(mysql_error());
	$user = mysql_fetch_array($rs);

	echo'<p><a href="./welcome.php" style="text-decoration:none">Home</a></p>';
     echo' <p><a href="result.php" style="text-decoration:none">Results</a></p>';
      echo'<p><a href="./password_p.php" style="text-decoration:none">Change Password</a></p>';
      echo'<p><a href="./logout.php" style="text-decoration:none">Logout</a></p>';
	  
	  }
	  
	  else{
	  echo'<p><a href="./index.php" style="text-decoration:none">Home</a></p>';
	  
	  }
	  
	  ?>

 
  </td>
    <td width="80%">
	<table width="100%" border="0" cellspacing="0" cellpadding="10">
  <tr>
    <td>
		
		<div class="" align="center"><i><strong><font face="Times New Roman, Times, serif" size="+2" color="#993333">
		
		<?
				      	$username = $_SESSION['user'];
	$query = "select * from user_info,parent where (username='$username') AND (user_info.id=parent.student_id) LIMIT 1";
	$rs = mysql_query($query) or die(mysql_error());
	$user = mysql_fetch_array($rs);

		 echo "Edit"; ?>
		<?php echo $user['fname']." ".$user['lname']."'s"."&nbsp;&nbsp;&nbsp;"."PROFILE";?>
		</font></strong></i></div>
		 <form name="./edit_profile" action="edit_profile_p.php" method="post">
		<table width="100%" border="0" cellspacing="5" cellpadding="5" align="center">
  <tr>
    <td width="15%">First Name:</td>
    <td width="15%"><input type="text" name="fname"  value="<?php echo $user['fname'] ?>"/></td>
	 <td width="15%">Middle Name:</td>
    <td width="15%"><input type="text" name="mname"  value="<?php echo $user['mname'] ?>" /></td>
  </tr>
   <tr>
    <td width="15%">Surname Name:</td>
    <td width="15%"><input type="text" name="sname"  value="<?php echo $user['lname'] ?>"/></td>
    <td>Username:</td>
    <td><input type="text" name="uname"  value="<?php echo $user['username']; ?>" /></td>
  </tr>
  <tr>
  <td align="right" colspan="4">
 <input type="submit" value="Request Changes"/>
 </a>
 </td>
 </tr>
 <tr>
 <td colspan="4" align="right">
</td></tr>
 </table>	
 </form>
	</td>
  </tr>
  
</table>

	
	
	</td>
  </tr>
</table>


<?php include("./bottom.php");?>