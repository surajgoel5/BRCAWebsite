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
$request=$con->query("SELECT * from `blitz` where kerberos = '$kerberos'");
if($request->num_rows==1)
$res["blitz"]["reg"]=true;
else
$res["blitz"]["reg"]=false;
$request=$con->query("SELECT * from `dhoom` where kerberos = '$kerberos'");
$r1=$con->query("SELECT * from `blitz` where relation1='undefined'");
$r2=$con->query("SELECT * from `blitz` where relation1<>'undefined' and relation2='undefined'");
$r3=$con->query("SELECT * from `blitz` where relation1<>'undefined' and relation2<>'undefined' and relation3='undefined'");
$r4=$con->query("SELECT * from `blitz` where relation1<>'undefined' and relation2<>'undefined' and relation3<>'undefined'");
$res["blitz"]["num"]=($r1->num_rows)+($r2->num_rows)*2+($r3->num_rows)*3+($r4->num_rows)*4;
if($request->num_rows==1)
$res["dhoom"]["reg"]=true;
else
$res["dhoom"]["reg"]=false;
$request=$con->query("SELECT * from `kaleidoscope` where kerberos = '$kerberos'");
$r1=$con->query("SELECT * from `dhoom` where relation1='undefined'");
$r2=$con->query("SELECT * from `dhoom` where relation1<>'undefined' and relation2='undefined'");
$r3=$con->query("SELECT * from `dhoom` where relation1<>'undefined' and relation2<>'undefined' and relation3='undefined'");
$r4=$con->query("SELECT * from `dhoom` where relation1<>'undefined' and relation2<>'undefined' and relation3<>'undefined'");
$res["dhoom"]["num"]=($r1->num_rows)+($r2->num_rows)*2+($r3->num_rows)*3+($r4->num_rows)*4;
if($request->num_rows==1)
$res["kaleidoscope"]["reg"]=true;
else
$res["kaleidoscope"]["reg"]=false;
$request=$con->query("SELECT * from `spectrum` where kerberos = '$kerberos'");
$r1=$con->query("SELECT * from `kaleidoscope` where relation1='undefined'");
$r2=$con->query("SELECT * from `kaleidoscope` where relation1<>'undefined' and relation2='undefined'");
$r3=$con->query("SELECT * from `kaleidoscope` where relation1<>'undefined' and relation2<>'undefined' and relation3='undefined'");
$r4=$con->query("SELECT * from `kaleidoscope` where relation1<>'undefined' and relation2<>'undefined' and relation3<>'undefined'");
$res["kaleidoscope"]["num"]=($r1->num_rows)+($r2->num_rows)*2+($r3->num_rows)*3+($r4->num_rows)*4;
if($request->num_rows==1)
$res["spectrum"]["reg"]=true;
else
$res["spectrum"]["reg"]=false;
$r1=$con->query("SELECT * from `spectrum` where relation1='undefined'");
$r2=$con->query("SELECT * from `spectrum` where relation1<>'undefined' and relation2='undefined'");
$r3=$con->query("SELECT * from `spectrum` where relation1<>'undefined' and relation2<>'undefined' and relation3='undefined'");
$r4=$con->query("SELECT * from `spectrum` where relation1<>'undefined' and relation2<>'undefined' and relation3<>'undefined'");
$res["spectrum"]["num"]=($r1->num_rows)+($r2->num_rows)*2+($r3->num_rows)*3+($r4->num_rows)*4;
echo json_encode($res);