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
$token = $_POST["token"];
$name = $_POST["name"];
$relation1 = $_POST["relation1"];
$relation2 = $_POST["relation2"];
$relation3 = $_POST["relation3"];
if($token!=md5($kerberos.$secret_word))
    die('{"success":false,"message":"token mismatch"}');
$request=$con->query("INSERT INTO `dhoom` (kerberos,name,relation1,relation2,relation3,time) VALUES ('$kerberos','$name','$relation1','$relation2','$relation3',now())");
if($request)
    die('{"success":true,"message":"Request added"}');
else
    die('{"success":false,"message":"Duplicate request"}');
