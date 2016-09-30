<?php 
$server='localhost';
$user='root';
$pass='';
$mysql_db='sis';
if(!mysql_connect($server,$user,$pass)||!mysql_select_db($mysql_db)){	
die(mysql_error());	
}else{
	
}
  