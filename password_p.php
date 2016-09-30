<?php 
//session_start();
include("./configuration/session.php");
include("top.php");
include("./configuration/dbconnection.php");
/*
$username = $_SESSION['user'];
	$query = "select * from user_info,users,parent where (parent.username='$username' or users.username='Susername') AND (user_info.id=users.info_id) and (user_info.id=parent.student_id) LIMIT 1";
$rs = mysql_query($query) or die(mysql_error());
$user = mysql_fetch_array($rs);*/

 ?>
<div align="right"><?php echo date('l,M jS Y');?></div>
<table width="100%" border="1" cellspacing="0" cellpadding="10" align="center" height="330">
  <tr align="center" valign="top">
    <td width="20%" background="photos/bg_left.PNG"><div align="left">
		<?
		
	  if($_SESSION['user_level']=='parent'){
	  	$username = $_SESSION['user'];
	$query = "select * from user_info,parent where (username='$username') AND (user_info.id=parent.student_id) LIMIT 1";
	$rs = mysql_query($query) or die(mysql_error());
	$user = mysql_fetch_array($rs);
	  	      echo'<p><a href="./welcome.php" style="text-decoration:none">Home</a></p>';
      echo'<p><a href="./profile_p.php" style="text-decoration:none">My Profile</a></p>';
     echo' <p><a href="./result.php" style="text-decoration:none">Results</a></p>';
      echo'<p><a href="./logout.php" style="text-decoration:none">Logout</a></p>';
	  
	  }
	  
	  else{
	  echo'<p><a href="./index.php" style="text-decoration:none">Home</a></p>';
	  
	  }
	  
	  ?>
    </div></td>
    <td width="80%">
	
	<script type="text/javascript" language="javascript">
		
		 function login(){
        var newpwd =  document.getElementById("newpwd").value;
        var confirmpwd =  document.getElementById("confirmpwd").value;
		
        if(newpwd != confirmpwd ){
            alert("Password mismatch");
			document.getElementById("newpwd").focus();   
        	return false;
		}
		else
		{
			//document.forms.changepwd.submit();
			return true;
		}		
    }
	</script>
	
	<form action="./changepwd.php" method="post" name="changepwd" onsubmit="return login();">
	
	<fieldset style="border-radius:12px"><legend align="center">Change Password</legend>
	
	<table width="100%" border="0" cellspacing="0" cellpadding="10">
  <tr>
    <td width="25%">Enter Current Password:</td>
    <td width="75%"><input type="password" name="currentpwd" id="currentpwd" size="25" maxlength="100" placeholder="enter old password" required="true" reqiuredmessage="Please enter current password" /></td>
  </tr>
  <tr>
    <td>Enter New Password:</td>
    <td><input type="password" name="newpwd" id="newpwd" size="25" maxlength="100" placeholder="enter new password" required="true" reqiuredmessage="Please enter new password" /></td>
  </tr>
  <tr>
    <td>Confirm New Password:</td>
    <td><input type="password" name="confirmpwd" id="confirmpwd" size="25" maxlength="100" placeholder="confirm password" required="true" reqiuredmessage="Please confirm password" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="Submit" name="change" id="" value="Submit" onclick="login()" /><input type="reset" name="reset" id="" value="Reset" /></td>
  </tr>
</table>
	  <?php 

    if(@$_GET['success'] == 'Sussessfully'){
        
        echo "<strong><font color='red'>Successfully!</font></strong>";
    }
	else if(@$_GET['error'] == 'Currentpwd')
	{
	        echo "<strong><font color='red'>Current password doesnt match!</font></strong>";

	}
		?>


	
	</fieldset>
	</form>
	
	</td>
  </tr>
</table>


<?php include("bottom.php");?>