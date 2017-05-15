<?php
/**
 * Created by PhpStorm.
 * User: mew
 * Date: 10/11/16
 * Time: 8:59 PM
 */
include_once('auth.php');
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: access-control-allow-credentials, access-control-allow-headers, access-control-allow-methods, access-control-allow-origin");
$entryno= $entry_no;
$name = $_POST["name"];
$desc = $_POST["desc"];
$level = $_POST["level"];
$club = $post[1];
$audience = $_POST["audience"];
$teams = $_POST["teams"];
$date = $_POST["date"];
$venue = $_POST["venue"];
$id = $_POST["id"];
$coma = $_POST["coma"];
$comd = $_POST["comd"];
$extras["item"] = $_POST["item"];
$extras["expense"] = $_POST["expense"];
$extras=serialize($extras);
$request=true;

$name = addslashes($name);
$desc = addslashes($desc);
$venue = addslashes($venue);

if($id==""){
if($name!="")
    $request2=$con->query("SELECT * from `cv_events` where name='$name'");
if($request2->num_rows>0)
    die('{"success":false,"message":"Event already exists"}');
if(!$secy)
    die('{"success":false,"message":"Not  authorized"}');
while(true){
    $id = rand(10000, 99999);
    $request2=$con->query("SELECT * from `cv_events` where id='$id'");
    if($request2->num_rows==0) break;
}

$request=$con->query("INSERT INTO `cv_logs` (event,entryno,timestamp,type) VALUES ('$id','$entryno',NOW(),1)");
$request=$con->query("UPDATE `cv_logs` SET type=type+1 WHERE event='unread'");
$request=$con->query("INSERT INTO `cv_events` (id,name,description,level,club,noteams,venue,audience,date,coma,comd,extras,createdby,created,lastupdated) VALUES ('$id','$name','$desc','$level','$club','$teams','$venue','$audience','$date','$coma','$comd','$extras','$entryno',NOW(),NOW())");
die('{"success":true,"message":"You have successfully created the event!"}');
}
else{
    $request=$con->query("SELECT createdby, approved from `cv_events` where id='$id'");
    $createdBy = $request->fetch_array();
    $approved = $createdBy[1];
    $createdBy = $createdBy[0];
    if($createdBy!=$entry_no)
        die('{"success":false,"message":"not authorized to update the event!"}');
    $request=$con->query("INSERT INTO `cv_logs` (event,entryno,timestamp,type) VALUES ('$id','$entryno',NOW(),4)");
    $request=$con->query("UPDATE `cv_logs` SET type=type+1 WHERE event='unread'");
    if($approved=='0')
        $request=$con->query("UPDATE `cv_events` set approvedmsg='',name='$name',description='$desc',level='$level',club='$club',noteams='$teams',venue='$venue',audience='$audience',date='$date',coma='$coma',comd='$comd',extras='$extras',lastupdated=NOW() where id='$id'");
    else
        $request=$con->query("UPDATE `cv_events` set description='$desc',noteams='$teams',audience='$audience',lastupdated=NOW() where id='$id'");
    die("{\"success\":true,\"message\":\"You have successfully updated the event!\"}");
}