<?php
include("../configuration/dbconnection.php");
include("../configuration/session.php");
error_reporting(E_ALL &~ E_NOTICE);
set_time_limit(0);
$ticha=$_SESSION['info_id'];
date_default_timezone_set('Europe/London');


/** Include path **/
set_include_path(get_include_path() . PATH_SEPARATOR . '.Classes/');

 
 $name = $_FILES['upload']['name'];
 $ext = substr($name,strrpos($name,'.'));
 
 $tmp = $_FILES['upload']['tmp_name'];
 
 $path = 'worksheet/';
 
 //echo $ext;
 
 if(!@file_exists($path)) {
   mkdir($path);
 }

/** PHPExcel_IOFactory */
include 'PHPExcel/IOFactory.php';

//echo $path.$name;
if($ext == '.xls') $inputFileType = 'Excel5';
else if($ext == '.xlsx') $inputFileType = 'Excel2007';
else if($ext == '.csv') $inputFileType = 'CSV';
//	$inputFileType = 'Excel2007';
//	$inputFileType = 'Excel2003XML';
//	$inputFileType = 'OOCalc';
//	$inputFileType = 'Gnumeric';


if(move_uploaded_file($tmp,$path.$name)){
	
$inputFileName = $path.$name;


//echo $inputFileName;
//echo 'Loading file ',pathinfo($inputFileName,PATHINFO_BASENAME),' using IOFactory with a defined reader type of ',$inputFileType,'<br />';

$objReader = PHPExcel_IOFactory::createReader($inputFileType);
//echo 'Turning Formatting off for Load<br />';
$objReader->setReadDataOnly(true);
$objPHPExcel = $objReader->load($inputFileName);


//echo '<hr />';

$sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
 //$sheetData[2]['A'];
 
// echo count($sheetData);

//insert into database

 // print_r($sheetData);
for($i =2; $i<=count($sheetData);$i++) {
   $one=$sheetData[$i]['A']; $two=$sheetData[$i]['B']; $three=$sheetData[$i]['C'];$four=$sheetData[$i]['D'];
	  $five= $sheetData[$i]['E'];
    $six= $sheetData[$i]['F'];
$checkticha="select * from teacher_subject_assign where info_id=$ticha and subid=$one";
$qchecktc=mysql_query($checkticha) or die(mysql_error());
$row=mysql_num_rows($qchecktc);
if($row>0){
 $check="select * from users where user_level='student' and info_id=$two ";
$qcheck=mysql_query($check) or die(mysql_error());
$checkuser=mysql_num_rows($qcheck);
if($checkuser>0){
 $query="select * from results where info_id=$two and subid=$one 
and terminal='$four' and tcha=$ticha";
$qrun=mysql_query($query) or die(mysql_error());
$result=mysql_num_rows($qrun);
if($result>0){
  header("location:teacher_upload.php?error=exist");   
}else{   
 $sql = "insert into results (subid, info_id, marks, status,terminal,tcha)
	 values('$one','$two','$three','1','$four','$ticha')";
    mysql_query($sql) or die(mysql_error()); 
    header("location:teacher_upload.php?success=Sussessfully");
}   
}else{
header("location:teacher_upload.php?user=$two");   
}   
}else{
header("location:teacher_upload.php?assign=noop");   
}
}
unlink($path.$name);

//header("location:../upload.php");
}else {
	//header("location:../upload.php");
// echo 'could not reaD ';
}
?>