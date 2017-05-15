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
$r1=$con->query("SELECT * from `".$category."javed`");
$num=($r1->num_rows);
if($num>$javedEntries)
    die('{"success":false,"message":"Entries full"}');
else
    $wait="CONFIRMED";
$request=$con->query("INSERT INTO `".$category."javed` (kerberos,name,time,status) VALUES ('$kerberos','$name',now(),'$wait')");
$q="INSERT INTO `".$category."javed` (kerberos,name,time,status) VALUES ('$kerberos','$name',now(),'$wait')";
if($request)
    die('{"success":true,"message":"Request added"}');
else
    die('{"success":false,"message":"Duplicate request"}');
