<?php
session_start();
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
include 'admin/dbconnection.php';
$email_id=$_REQUEST['email_id'];
 $sql="select * from users where email_id='$email_id'";
$res=mysql_query($sql);
if(mysql_num_rows($res)>0)
{
$catarray=array();
while($catres=mysql_fetch_assoc($res)) {
$catarray[] = $catres;
}
if(!empty($catarray)){
foreach ($catarray as $cat) {
	
$pass=$cat['password'];
}
}
/* $to ="vinodnaik399@gmail.com";
 $from = $email_id; // this is the sender's Email address
 // Create the message....
$subject = 'Password Verification Information';
// message
$message = '
<html>
<head>
<title>Click And Pick</title>
</head>
<body>
<div style="background-color: #E5E5E5; padding-left:20px;padding:20px">
<p>Your Password Was..</p>
<p>Your email_id is  '.$email_id. ' and password is '.$pass. '.</p>
</div>
</body>
</html>
';


// To send HTML mail, the Content-type header must be set
 $headers = 'From:' . "\r\n" ;
   // $headers .='Reply-To: '. $to . "\r\n" ;
    $headers .='X-Mailer: PHP/' . phpversion();
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";   
// Mail it
mail($from, $subject, $message , $headers); */
//$_SESSION['log']='Success';

     //$response["success"] = 1;
        $response["message"] = "success";

        echo json_encode($response);
//header("Location: Forgotten.php");
}
else{
	//$_SESSION['log']='Fail';
//$response["success"] = 0;
        $response["message"] = "fail";

        echo json_encode($response);
//header("Location: Forgotten.php");
	
}
?>