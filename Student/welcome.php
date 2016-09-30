<?php
//include("./configuration/session.php"); 
//include("top.php");
include("./configuration/dbconnection.php");
?>
<div align="right">
<?php
 echo date('l,M jS Y');
?>
</div>
<table width="100%" border="1" cellspacing="0" cellpadding="10" align="center" height="330">
  <tr align="center" valign="top">
    <td width="20%" background="photos/bg_left.PNG"><div align="left">
	<?php
		if($_SESSION['user_level']=='student'){
			$username = $_SESSION['user'];
	$query = "select * from user_info,users where (username='$username') AND (user_info.id=users.info_id) LIMIT 1";
	$rs = mysql_query($query) or die(mysql_error());
	$user = mysql_fetch_array($rs);

	      echo'<p><a href="./profile.php" style="text-decoration:none">My Profile</a></p>';
     echo' <p><a href="result.php" style="text-decoration:none">Results</a></p>';
      echo'<p><a href="./password.php" style="text-decoration:none">Change Password</a></p>';
      echo'<p><a href="./logout.php" style="text-decoration:none">Logout</a></p>';
	  }
	  else if($_SESSION['user_level']=='admin'){
      	$username = $_SESSION['user'];
	$query = "select * from user_info,users where (username='$username') AND (user_info.id=users.info_id) LIMIT 1";
	$rs = mysql_query($query) or die(mysql_error());
	$user = mysql_fetch_array($rs);

	  echo'<p><a href="./profile.php" style="text-decoration:none">My Profile</a></p>';
	  echo'<p><a href="./users.php" style="text-decoration:none">Profile Users</a></p>';
	  echo'<p><a href="./student_admin.php" style="text-decoration:none">Register Student</a></p>';
     	echo' <p><a href="./staff_admin.php" style="text-decoration:none">Register Staff</a></p>';
		echo' <p><a href="./ass_sub.php" style="text-decoration:none">Assign Subject</a></p>';
	    echo' <p><a href="result.php" style="text-decoration:none">Result</a></p>';
      echo'<p><a href="./password.php" style="text-decoration:none">Change Password</a></p>';
      echo'<p><a href="./logout.php" style="text-decoration:none">Logout</a></p>';
	  
	  }
	  else if($_SESSION['user_level']=='teacher'){
	$username = $_SESSION['user'];
	$query = "select * from user_info,users where (username='$username') AND (user_info.id=users.info_id) LIMIT 1";
	$rs = mysql_query($query) or die(mysql_error());
	$user = mysql_fetch_array($rs);
	  //echo $user['fname'];
     echo'<p><a href="profile.php" style="text-decoration:none">My Profile</a></p>';
	  echo'<p><a href="./student_staff.php" style="text-decoration:none">Register Student</a></p>';
     echo' <p><a href="result.php" style="text-decoration:none">Results</a></p>';
      echo'<p><a href="./password.php" style="text-decoration:none">Change Password</a></p>';
      echo'<p><a href="./logout.php" style="text-decoration:none">Logout</a></p>';
	  
	  }
  
	  else if($_SESSION['user_level']=='parent'){
	$username = $_SESSION['user'];
	$query = "select * from user_info,parent where (username='$username') AND (user_info.id=parent.student_id) LIMIT 1";
	$rs = mysql_query($query) or die(mysql_error());
	$user = mysql_fetch_array($rs);

     echo'<p><a href="./profile_p.php" style="text-decoration:none">My Profile</a></p>';
     echo' <p><a href="result.php" style="text-decoration:none">Results</a></p>';
      echo'<p><a href="./password_p.php" style="text-decoration:none">Change Password</a></p>';
      echo'<p><a href="./logout.php" style="text-decoration:none">Logout</a></p>';
	  
	  }
	  
	  else{
	  echo'<p><a href="./index.php" style="text-decoration:none">Home</a></p>';
	  
	  }
	  ?>
    </div></td>
    <td width="80%">
	
	<?php 
/*	$userid = $_SESSION['user']['Username'];
$query = "select * from users where id='$userid'";
$rs = mysql_query($query) or die(mysql_error());
$user = mysql_fetch_assoc($rs);
*/

//ACHANA NA HII NI USENGE  FATCH UNIQUE
	
	?>
	
		<p align="center"><table cellpadding="5" cellspacing="1" width="100%" border="1" bgcolor="#9999CC">
		 <tr><td><b>Welcome</b> - &nbsp; 
		 <?
		echo $user['user_level'];
		 ?>
		 </td><td> <? 
		echo "<b>Name</b> - ";
		echo $user['fname'].'&nbsp;&nbsp;'.$user['mname'].'&nbsp;&nbsp;'.$user['lname'];		
		 ?></td></tr>
		 </table>
		 <hr /></p>
		<p align="left">You have successfully login to the Online School Management System (OSMS)</p>
		<p align="left">	You can access OSMS functionalities by following appropriate links on the menu side. Following is further information about the links : </p>


		<?php if($_SESSION['user_level']=='student'){
		echo '<p align="left" style="font-weight: bold">Results</p>
        <div align="left">		
          <p>This functionality allows you as a student to view your results once they are published.</p>						 
          <p style="font-weight: bold">Profile </p>
          <p>This functionality allows you as a student to view the details concerning yourself to the school</p>
          <p style="font-weight: bold"> Change Password            </p>
          <p>This functionality allows you to change your password any time you wish to do so. It is recommended that you change your password immediately after your first login             into OSMS system
            </p>';
			}
			else if($_SESSION['user_level']=='teacher'){
			
				echo '
				<p align="left" style="font-weight: bold">Results</p>
          <div align="left">		
          <p>This functionality allows you as a staff to upload exam results of the students.</p>
		  						 
          <p style="font-weight: bold">Profile </p>
          <p>This functionality allows you as a teacher to view the details concerning yourself to the school</p>
         
		  <p style="font-weight: bold"> Change Password</p>
		  
          <p>This functionality allows you to change your password any time you wish to do so. It is recommended that you change your password immediately after your first login 		             into OSMS system
            </p>';
			}
			else if($_SESSION['user_level']=='admin'){
			
							echo '
				<p align="left" style="font-weight: bold">Results</p>
          <div align="left">		
          <p>This functionality allows you as a admin to upload exam results.</p>
		  						 
          <p style="font-weight: bold">Profile </p>
          <p>This functionality allows you as a admin to view the details concerning yourself to the school</p>
		  <p style="font-weight: bold"> Change Password</p>
		  
          <p>This functionality allows you to change your password any time you wish to do so. It is recommended that you change your password immediately after your first login 			             into OSMS system
            </p>';
			}
			 
			 else if($_SESSION['user_level']=='parent'){
			 	echo '
				<p align="left" style="font-weight: bold">Course Results</p>
          <div align="left">		
          <p>This functionality allows you as a parent to view the your children exam results.</p>
		  						 
          <p style="font-weight: bold">Profile </p>
          <p>This functionality allows you as a parent to view the details concerning yourself to the school</p>
		  <p style="font-weight: bold"> Change Password</p>
		  
          <p>This functionality allows you to change your password any time you wish to do so. It is recommended that you change your password immediately after your first login 			             into OSMS system
            </p>';
			 }
			?>
          </p>
        </div></td>
  </tr>
</table>


<?php include("bottom.php");?>