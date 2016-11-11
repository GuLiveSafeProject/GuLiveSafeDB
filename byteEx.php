<?php
include "admin/dbconnection.php";
define ("MAX_SIZE","10000");
if (isset($_SERVER['HTTP_ORIGIN'])) {
       header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
       header('Access-Control-Allow-Credentials: true');
       header('Access-Control-Max-Age: 86400');    // cache for 1 day
   }

   // Access-Control headers are received during OPTIONS requests
   if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {

       if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
           header("Access-Control-Allow-Methods: GET, POST, OPTIONS");         

       if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
           header("Access-Control-Allow-Headers:        {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

       exit(0);
   }
$email_id=$_POST['email_id'];
$imgData =$_POST['image_path'];
 $imageName= substr(str_shuffle("0123456789"), 0, 3). substr(str_shuffle("0123456789"), 0, 4);
 $name='GUI.jpeg';
$file='admin/img/'.$imageName.$name;
$data = file_put_contents($file, base64_decode($imgData));
$message=$_POST['message'];

$sql="insert into incident_reports(message,image_path,email_id)values('$message','$file','$email_id')";
$res=mysql_query($sql);
if($res)
{
	$out=array('status'=>'success');
$result= json_encode($out);
echo $result;
}
else{
	$out=array('status'=>'fail');
$result= json_encode($out);
echo $result;
}

/* 
localhost/guLife_safe/byteEx.php?email_id=shanthismts787@vsmtsolution.com&image_path=Desert.jpeg&message=kfkfjkdfjkldfjdkfj
 */
 
?>

