<?php 
//session_start();
include("./configuration/session.php");
include("./top.php");
include("./configuration/dbconnection.php");

$username = $_SESSION['user'];
	$query = "select * from user_info,users,parent where (parent.username='$username' or users.username='Susername') AND (user_info.id=users.info_id) and (user_info.id=parent.student_id) LIMIT 1";
$rs = mysql_query($query) or die(mysql_error());
$user = mysql_fetch_array($rs);

if($user['user_level'] !='parent')
{
header("location:logout.php");
}
?>


<div align="right"><?php echo date('l,M jS Y');?></div>
<table width="100%" border="1" cellspacing="0" cellpadding="10" align="center" height="330">
  <tr align="center" valign="top">
    <td width="20%" background="photos/bg_left.PNG"><div align="left">
	
 <?	  
	 if($_SESSION['user_level']=='parent'){
	echo'<p><a href="./welcome.php" style="text-decoration:none">Home</a></p>';
     echo' <p><a href="./result.php" style="text-decoration:none">Results</a></p>';
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
		<table width="60%" border="0" cellspacing="5" cellpadding="5" align="center">
		
		<div class="" align="center"><i><strong><font face="Times New Roman, Times, serif" size="+2" color="#993333">
		<?php 
		      	$username = $_SESSION['user'];
	$query = "select * from user_info,parent where (username='$username') AND (user_info.id=parent.student_id) LIMIT 1";
	$rs = mysql_query($query) or die(mysql_error());
	$user = mysql_fetch_array($rs);

		echo $user['fname']." ".$user['lname']."'s"."&nbsp;&nbsp;&nbsp;"."PROFILE";?>
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
 </tr>
 </table>	
	</td>
  </tr>
  
</table>

<?     if(@$_GET['success'] == 'Sussessfully'){
        
        echo "<strong><font color='red'>Successfully!</font></strong>";
    }
	else if(@$_GET['error'] == 'Not Succeed')
	{
	        echo "<strong><font color='red'>Current password doesnt match!</font></strong>";

	}
?>
	
	
	</td>
  </tr>
</table>


<?php include("./bottom.php");?>