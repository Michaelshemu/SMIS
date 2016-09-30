
<?php 
//session_start();
include("../top.php");
 include("../configuration/dbconnection.php");  
?>
<html>
    <head>
<meta http-equiv="Content-Typ`  e" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="../sis.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="password.css">
    <script type="text/javascript" src="datepicker/calendarDateInput.js"></script>

<title>change password</title>
    </head> 
    <body style="background:#BDBDBD;">
    <div id="container">
        <div style="background:#9B9676;color:white;"> 
        </div>
        <table id="maintable" class="table table-condensed" width="100%" border="1" cellspacing="0" cellpadding="10" align="center" height="330">
  <tr align="center" align="top">
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
    <td><input type="Submit" name="Change" id="" value="Submit" onclick="login()" /><input type="reset" name="reset" id="" value="Reset" /></td>
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
    </div>
        	<?
        $username = $_SESSION['user'];
		if($_SESSION['user_level']=='student'){
		      	$username = $_SESSION['user'];
	$query = "select * from user_info,users where (username='$username') AND (user_info.info_id=users.info_info_id) LIMIT 1";
	$rs = mysql_query($query) or die(mysql_error());
	$user = mysql_fetch_array($rs);
	  }
	  else if($_SESSION['user_level']=='admin'){
	        	$username = $_SESSION['user'];
	$query = "select * from user_info,users where (username='$username') AND (user_info.id=users.info_id) LIMIT 1";
	$rs = mysql_query($query) or die(mysql_error());
	$user = mysql_fetch_array($rs);
	  
	  }
	  else if($_SESSION['user_level']=='teacher'){
	  	$username = $_SESSION['user'];
	$query = "select * from user_info,users where (username='$username') AND (user_info.id=users.info_id) LIMIT 1";
	$rs = mysql_query($query) or die(mysql_error());
	$user = mysql_fetch_array($rs);
 }
	else{
	  
	  }
    </body>
</html>
