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
$request=$con->query("SELECT * from `".$category."blitz` where kerberos = '$kerberos'");
if($request->num_rows==1)
$res["blitz"]["reg"]=$request->fetch_assoc();
else
$res["blitz"]["reg"]=false;
$request=$con->query("SELECT * from `".$category."dhoom` where kerberos = '$kerberos'");
$r1=$con->query("SELECT * from `".$category."blitz` where relation1='undefined'");
$r2=$con->query("SELECT * from `".$category."blitz` where relation1<>'undefined' and relation2='undefined'");
$r3=$con->query("SELECT * from `".$category."blitz` where relation1<>'undefined' and relation2<>'undefined' and relation3='undefined'");
$r4=$con->query("SELECT * from `".$category."blitz` where relation1<>'undefined' and relation2<>'undefined' and relation3<>'undefined'");
$res["blitz"]["num"]=($r1->num_rows)+($r2->num_rows)*2+($r3->num_rows)*3+($r4->num_rows)*4;
if($request->num_rows==1)
$res["dhoom"]["reg"]=$request->fetch_assoc();
else
$res["dhoom"]["reg"]=false;
$request=$con->query("SELECT * from `".$category."kaleidoscope` where kerberos = '$kerberos'");
$r1=$con->query("SELECT * from `".$category."dhoom` where relation1='undefined'");
$r2=$con->query("SELECT * from `".$category."dhoom` where relation1<>'undefined' and relation2='undefined'");
$r3=$con->query("SELECT * from `".$category."dhoom` where relation1<>'undefined' and relation2<>'undefined' and relation3='undefined'");
$r4=$con->query("SELECT * from `".$category."dhoom` where relation1<>'undefined' and relation2<>'undefined' and relation3<>'undefined'");
$res["dhoom"]["num"]=($r1->num_rows)+($r2->num_rows)*2+($r3->num_rows)*3+($r4->num_rows)*4;
if($request->num_rows==1)
$res["kaleidoscope"]["reg"]=$request->fetch_assoc();
else
$res["kaleidoscope"]["reg"]=false;
$r1=$con->query("SELECT * from `".$category."kaleidoscope` where relation1='undefined'");
$r2=$con->query("SELECT * from `".$category."kaleidoscope` where relation1<>'undefined' and relation2='undefined'");
$r3=$con->query("SELECT * from `".$category."kaleidoscope` where relation1<>'undefined' and relation2<>'undefined' and relation3='undefined'");
$r4=$con->query("SELECT * from `".$category."kaleidoscope` where relation1<>'undefined' and relation2<>'undefined' and relation3<>'undefined'");
$res["kaleidoscope"]["num"]=($r1->num_rows)+($r2->num_rows)*2+($r3->num_rows)*3+($r4->num_rows)*4;
$request=$con->query("SELECT * from `".$category."spectrum` where kerberos = '$kerberos'");
if($request->num_rows==1)
$res["spectrum"]["reg"]=$request->fetch_assoc();
else
$res["spectrum"]["reg"]=false;
$r1=$con->query("SELECT * from `".$category."spectrum` where relation1='undefined'");
$r2=$con->query("SELECT * from `".$category."spectrum` where relation1<>'undefined' and relation2='undefined'");
$r3=$con->query("SELECT * from `".$category."spectrum` where relation1<>'undefined' and relation2<>'undefined' and relation3='undefined'");
$r4=$con->query("SELECT * from `".$category."spectrum` where relation1<>'undefined' and relation2<>'undefined' and relation3<>'undefined'");
$res["spectrum"]["num"]=($r1->num_rows)+($r2->num_rows)*2+($r3->num_rows)*3+($r4->num_rows)*4;
$res["spectrum"]["max"]=$maxEntries;
$res["kaleidoscope"]["max"]=$maxEntries;
$res["dhoom"]["max"]=$maxEntries;
$res["blitz"]["max"]=$maxEntries;
$request=$con->query("SELECT * from `".$category."javed` where kerberos = '$kerberos'");
if($request->num_rows==1)
    $res["javed"]["reg"]=$request->fetch_assoc();
else
    $res["javed"]["reg"]=false;
$r1=$con->query("SELECT * from `".$category."javed` where relation1='undefined'");
$r2=$con->query("SELECT * from `".$category."javed` where relation1<>'undefined' and relation2='undefined'");
$r3=$con->query("SELECT * from `".$category."javed` where relation1<>'undefined' and relation2<>'undefined' and relation3='undefined'");
$r4=$con->query("SELECT * from `".$category."javed` where relation1<>'undefined' and relation2<>'undefined' and relation3<>'undefined'");
$res["javed"]["num"]=($r1->num_rows)+($r2->num_rows)*2+($r3->num_rows)*3+($r4->num_rows)*4;
$res["javed"]["max"]=$javedEntries;

echo json_encode($res);