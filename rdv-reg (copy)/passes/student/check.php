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
if($token!=md5($kerberos.$secret_word))
    die('{"success":false,"message":"token mismatch"}');
$res=array();
$request=$con->query("SELECT * from `".$category."javed` where kerberos = '$kerberos'");
if($request->num_rows==1)
$res["javed"]["reg"]=true;
else
$res["javed"]["reg"]=false;
$r1=$con->query("SELECT * from `".$category."javed`");
$res["javed"]["num"]=($r1->num_rows);
$request=$con->query("SELECT * from `".$category."blitz` where kerberos = '$kerberos'");
if($request->num_rows==1)
$res["blitz"]["reg"]=true;
else
$res["blitz"]["reg"]=false;
$r1=$con->query("SELECT * from `".$category."blitz`");
$res["blitz"]["num"]=($r1->num_rows);
$request=$con->query("SELECT * from `".$category."dhoom` where kerberos = '$kerberos'");
if($request->num_rows==1)
$res["dhoom"]["reg"]=true;
else
$res["dhoom"]["reg"]=false;
$request=$con->query("SELECT * from `".$category."kaleidoscope` where kerberos = '$kerberos'");
$r1=$con->query("SELECT * from `".$category."dhoom`");
$res["dhoom"]["num"]=($r1->num_rows);
if($request->num_rows==1)
$res["kaleidoscope"]["reg"]=true;
else
$res["kaleidoscope"]["reg"]=false;
$request=$con->query("SELECT * from `".$category."spectrum` where kerberos = '$kerberos'");
$r1=$con->query("SELECT * from `".$category."kaleidoscope`");
$res["kaleidoscope"]["num"]=($r1->num_rows);
if($request->num_rows==1)
$res["spectrum"]["reg"]=true;
else
$res["spectrum"]["reg"]=false;
$r1=$con->query("SELECT * from `".$category."spectrum`");
$res["spectrum"]["num"]=($r1->num_rows);
$res["spectrum"]["max"]=$maxEntries;
$res["kaleidoscope"]["max"]=$maxEntries;
$res["dhoom"]["max"]=$maxEntries;
$res["javed"]["max"]=$javedEntries;
$res["blitz"]["max"]=$maxEntries;
echo json_encode($res);