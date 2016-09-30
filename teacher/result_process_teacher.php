
<?php 
include("../configuration/session.php");
include("../configuration/dbconnection.php");
$Id = $_POST['regno'];
$sub = $_POST['sub'];
$marks=$_POST['mark'];
$term=$_POST['term'];
$ticha=$_SESSION['info_id'];
$check="select * from users where info_id=$Id and user_level='student'";
$qcheck=mysql_query($check) or die(mysql_error());
$checkuser=mysql_num_rows($qcheck);
if($checkuser>0){
 $query="select * from results,teacher_subject_assign as where (as.subid=results.subid) and terminal='$term' and results.subid=$sub
and tcha=$ticha and results.info_id=$Id";
$qrun=mysql_query($query) or die(mysql_error());
$result=mysql_num_rows($qrun);
if($result>0){
    header('Location:teacher_upload.php?error=exist');
}else{
     $sql = "insert into results (subid, info_id, marks, status,terminal,tcha) values($sub,$Id,$marks,'1','$term',$ticha)";
if(mysql_query($sql)){
 header('Location:teacher_upload.php?success=Sussessfully');    
}else{
 header('Location:teacher_upload.php?error=exist');    
} 
}   
}else{
 header("location:teacher_upload.php?user=$Id");   
}

?>