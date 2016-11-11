<?php
session_start();
ob_start();
include "admin/dbconnection.php";
$email=$_REQUEST['email'];
$password=$_REQUEST['password'];
$checkquery="SELECT * from users where email_id='$email' && password='$password'";
$checkresults=mysql_query($checkquery);
if(mysql_num_rows($checkresults)>0){

if(!empty($_REQUEST['email']))
{
unset($_SESSION['email']);
}
$_SESSION['email']=$_REQUEST['email'];
header('Location:shuttle_service.php?log=success');
}else{
header('Location: index.php?log=fail');
}
ob_end_flush();
?>