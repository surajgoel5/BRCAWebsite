<?php
/**
 * Created by PhpStorm.
 * User: mew
 * Date: 10/11/16
 * Time: 8:59 PM
 */
include_once('db-info.php');
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: access-control-allow-credentials, access-control-allow-headers, access-control-allow-methods, access-control-allow-origin");
$kerberos = $_POST["kerberos"];
$name = $_POST["name"];
$feedback = $_POST["feedback"];
$request=true;
if($feedback!=""&&$name!="")
$ip2=$_SERVER['HTTP_X_FORWARDED_FOR'];
$ip1=$_SERVER['REMOTE_ADDR'];
$request2=$con->query("SELECT * from `feedback` where feed='$feedback'");
$request3=$con->query("SELECT * from `feedback` where ip1='$ip1'");
if($request2->num_rows>0||$request3->num_rows>40)
	    die('{"success":true,"message":"Thanks for your feedback!"}');
$request=$con->query("INSERT INTO `feedback` (kerberos,name,feed,ip1,ip2) VALUES ('$kerberos','$name','$feedback','$ip1','$ip2')");
$qu="INSERT INTO `feedback` (kerberos,name,feed,ip1,ip2) VALUES ('$kerberos','$name','$feedback','$ip1','$ip2')";
if($request2->num_rows>5||$request3->num_rows>20)
	    die('{"success":true,"message":"Thanks for your feedback!"}');
if($request)
    die('{"success":true,"message":"Thanks for your feedback!"}');
else
    die('{"success":false,"message":"Duplicate request"}');

