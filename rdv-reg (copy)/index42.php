<?php
/**
 * Created by PhpStorm.
 * User: mew
 * Date: 10/19/16
 * Time: 1:08 AM
 */
$timeSecret="omnitrix";
$allowedTime=$_GET["a"];
$nowTime=$_GET["n"];
$token=$_GET["token"];
setcookie("token",$token);
setcookie("allowedTime",$allowedTime);
setcookie("nowTime",$nowTime);
if($token!=md5($nowTime.".".$allowedTime.".".$timeSecret))
    die("Token mismatch");
else if($allowedTime>time())
    die("Too soon");
else{
//    var_dump($_COOKIE);
    header("Location: https://oauth.iitd.ac.in/login.php?response_type=code&client_id=6Yilh2LhO1Bvg0YI8494RrVWDb0OXJu4&state=xyz&redirect_uri=http://brca.iitd.ac.in/rdv-reg");
    exit;
}
?>
