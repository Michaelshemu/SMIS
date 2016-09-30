
<?php 
//session_start();
include("./configuration/session.php");
//include("top.php");
include("./configuration/dbconnection.php");
$username = $_SESSION['user'];
$Id = $_POST['regno'];
$sub = $_POST['sub'];
$year = $_POST['year'];
$marks=$_POST['mark'];
//$subcode = $_POST['subcode'];

if($Id =='eg: ST526/023'|| $sub=='Select' || $year=='Year')
{
header('location:./upload_result_admin.php?error=Not Succeed');
}
else
{
if($sub=='Civics' and $year=='2015')
{
$subcode='CIV2015';
echo $subcode;
}
if($sub=='Physics' and $year=='2015')
{
$subcode='PHY2015';
echo $subcode;
}
if($sub=='Chemistry' and $year=='2015')
{
$subcode='CHEM2015';
echo $subcode;
}
if($sub=='Maths' and $year=='2015')
{
$subcode='MATH2015';
echo $subcode;
}
if($sub=='Biology' and $year=='2015')
{
$subcode='BIO2015';
echo $subcode;
}
if($sub=='History' and $year=='2015')
{
$subcode='HIST2015';
echo $subcode;
}
if($sub=='Kiswahili' and $year=='2015')
{
$subcode='KISW2015';
echo $subcode;
}
if($sub=='English' and $year=='2015')
{
$subcode='ENG2015';
echo $subcode;
}
if($sub=='Geography' and $year=='2015')
{
$subcode='GEO2015';
echo $subcode;
}

if($sub=='Civics' and $year=='2014')
{
$subcode='CIV2014';
echo $subcode;
}
if($sub=='Physics' and $year=='2014')
{
$subcode='PHY2014';
echo $subcode;
}
if($sub=='Chemistry' and $year=='2014')
{
$subcode='CHEM2014';
echo $subcode;
}
if($sub=='Maths' and $year=='2014')
{
$subcode='MATH2014';
echo $subcode;
}
if($sub=='Biology' and $year=='2014')
{
$subcode='BIO2014';
echo $subcode;
}
if($sub=='History' and $year=='2014')
{
$subcode='HIST2014';
echo $subcode;
}
if($sub=='Kiswahili' and $year=='2014')
{
$subcode='KISW2014';
echo $subcode;
}
if($sub=='English' and $year=='2014')
{
$subcode='ENG2014';
echo $subcode;
}
if($sub=='Geography' and $year=='2014')
{
$subcode='GEO2014';
echo $subcode;
}

if($sub=='Civics' and $year=='2016')
{
$subcode='CIV2016';
echo $subcode;
}
if($sub=='Physics' and $year=='2016')
{
$subcode='PHY2016';
echo $subcode;
}
if($sub=='Chemistry' and $year=='2016')
{
$subcode='CHEM2016';
echo $subcode;
}
if($sub=='Maths' and $year=='2016')
{
$subcode='MATH2016';
echo $subcode;
}
if($sub=='Biology' and $year=='2016')
{
$subcode='BIO2016';
echo $subcode;
}
if($sub=='History' and $year=='2016')
{
$subcode='HIST2016';
echo $subcode;
}
if($sub=='Kiswahili' and $year=='2016')
{
$subcode='KISW2016';
echo $subcode;
}
if($sub=='English' and $year=='2016')
{
$subcode='ENG2016';
echo $subcode;
}
if($sub=='Geography' and $year=='2016')
{
$subcode='GEO2016';
echo $subcode;
}

if($sub=='Civics' and $year=='2017')
{
$subcode='CIV2017';
echo $subcode;
}
if($sub=='Physics' and $year=='2017')
{
$subcode='PHY2017';
echo $subcode;
}
if($sub=='Chemistry' and $year=='2017')
{
$subcode='CHEM2017';
echo $subcode;
}
if($sub=='Maths' and $year=='2017')
{
$subcode='MATH2017';
echo $subcode;
}
if($sub=='Biology' and $year=='2017')
{
$subcode='BIO2017';
echo $subcode;
}
if($sub=='History' and $year=='2017')
{
$subcode='HIST2017';
echo $subcode;
}
if($sub=='Kiswahili' and $year=='2017')
{
$subcode='KISW2017';
echo $subcode;
}
if($sub=='English' and $year=='2017')
{
$subcode='ENG2017';
echo $subcode;
}
if($sub=='Geography' and $year=='2017')
{
$subcode='GEO2017';
echo $subcode;
}


if($sub=='Civics' and $year=='2018')
{
$subcode='CIV2018';
echo $subcode;
}
if($sub=='Physics' and $year=='2018')
{
$subcode='PHY2018';
echo $subcode;
}
if($sub=='Chemistry' and $year=='2018')
{
$subcode='CHEM2018';
echo $subcode;
}
if($sub=='Maths' and $year=='2018')
{
$subcode='MATH2018';
echo $subcode;
}
if($sub=='Biology' and $year=='2018')
{
$subcode='BIO2018';
echo $subcode;
}
if($sub=='History' and $year=='2018')
{
$subcode='HIST2018';
echo $subcode;
}
if($sub=='Kiswahili' and $year=='2018')
{
$subcode='KISW2018';
echo $subcode;
}
if($sub=='English' and $year=='2018')
{
$subcode='ENG2018';
echo $subcode;
}
if($sub=='Geography' and $year=='2018')
{
$subcode='GEO2018';
echo $subcode;
}

$sql = "insert into results (subject_id, student_id, marks, status) values ('$subcode','$Id','$marks','1')";
mysql_query($sql) or die(mysql_error());

header('Location:Admin/upload_result_admin.php? success=Sussessfully');

/*echo $subcode;
echo $Id;*/
//echo ($_SESSION[uname]);

}

?>