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
$r1=$con->query("SELECT * from `".$category."kaleidoscope`");
$num=($r1->num_rows);
if($_POST["ugToken"]==md5($kerberos."ug".$secret_word)){
    $wait="WAITLISTED";
}
else{
    if($num>$maxEntries)
        die('{"success":false,"message":"Entries full"}');
    if($num>$waitEntries)
        $wait="WAITLISTED";
    else
        $wait="CONFIRMED";
}
$r1=$con->query("SELECT * from `".$category."blitz` where kerberos='$kerberos' and time BETWEEN DATE_SUB(NOW(), INTERVAL 5 SECOND) AND NOW()");
$r2=$con->query("SELECT * from `".$category."kaleidoscope` where kerberos='$kerberos' and time BETWEEN DATE_SUB(NOW(), INTERVAL 5 SECOND) AND NOW()");
$r3=$con->query("SELECT * from `".$category."spectrum` where kerberos='$kerberos' and time BETWEEN DATE_SUB(NOW(), INTERVAL 5 SECOND) AND NOW()");
$r4=$con->query("SELECT * from `".$category."dhoom` where kerberos='$kerberos' and time BETWEEN DATE_SUB(NOW(), INTERVAL 5 SECOND) AND NOW()");
if($r1->num_rows>0||$r2->num_rows>0||$r3->num_rows>0||$r4->num_rows>0)
    die('{"success":false,"message":"Using multiple tabs? :("}');

$request=$con->query("INSERT INTO `".$category."kaleidoscope` (kerberos,name,time,status) VALUES ('$kerberos','$name',now(),'$wait')");
if($request){
    if($wait=="CONFIRMED") die('{"success":true,"message":"Request added"}');
    else die('{"success":true,"message":"Confirmed passes are over, we are opening 500 waitlisted passes"}');
}
else
    die('{"success":false,"message":"Duplicate request"}');
