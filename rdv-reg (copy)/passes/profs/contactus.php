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
$request=$con->query("INSERT INTO `feedback` (kerberos,name,feed) VALUES ('$kerberos','$name','$feedback')");
if($request)
    die('{"success":true,"message":"Request added"}');
else
    die('{"success":false,"message":"Duplicate request"}');

