<?php
/**
 * Created by PhpStorm.
 * User: mew
 * Date: 10/11/17
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
$r1=$con->query("SELECT * from `".$category."spectrum` where relation1='undefined'");
$r2=$con->query("SELECT * from `".$category."spectrum` where relation1<>'undefined' and relation2='undefined'");
$r3=$con->query("SELECT * from `".$category."spectrum` where relation1<>'undefined' and relation2<>'undefined' and relation3='undefined'");
$r4=$con->query("SELECT * from `".$category."spectrum` where relation1<>'undefined' and relation2<>'undefined' and relation3<>'undefined'");
$num=($r1->num_rows)+($r2->num_rows)*2+($r3->num_rows)*3+($r4->num_rows)*4;
if($num>$maxEntries)
    die('{"success":false,"message":"Entries full"}');

$request=$con->query("INSERT INTO `".$category."spectrum` (kerberos,name,relation1,relation2,relation3,time) VALUES ('$kerberos','$name','$relation1','$relation2','$relation3',now())");
if($request)
    die('{"success":true,"message":"Request added"}');
else
    die('{"success":false,"message":"Duplicate request"}');
