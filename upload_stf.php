<?php
include("./configuration/dbconnection.php");
error_reporting(E_ALL &~ E_NOTICE);
set_time_limit(0);

date_default_timezone_set('Europe/London');


/** Include path **/
set_include_path(get_include_path() . PATH_SEPARATOR . './Classes/');

 
 	
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
	  $five= $sheetData[$i]['E']; $six= $sheetData[$i]['F'];
	 
	 
	 $ise=md5($four);
   $query1 = "insert into users(username,password,status,user_level,info_id) VALUES ('$six','$ise','1','teacher','$one')";
    mysql_query($query1) or die(mysql_error());
	
	$query2="insert into user_info (id,fname,mname,lname,gender) values('$one','$two','$three','$four','$five')";
    mysql_query($query2) or die(mysql_error());
	
	
//	echo $one.$two.'<br/>';
header("location:./staff_admin.php?success=Sussessfully");

   
}

unlink($path.$name);

//header("location:../upload.php");
}else {
	//header("location:../upload.php");
// echo 'could not reaD ';
}
?>