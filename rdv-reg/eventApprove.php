<?php
/**
 * Created by PhpStorm.
 * User: mew
 * Date: 4/5/17
 * Time: 12:51 AM
 */
include_once('auth.php');
$id = $_POST["id"];
$a = $_POST["a"];
$msg = $_POST["msg"];
$msg = addslashes($msg);
$request=$con->query("SELECT * from `cv_events` where id='$id'");
$event = $request->fetch_assoc();
if(!($post[1]==$event["club"]||$gsec) && $faculty)
    die('{"success":false,"message":"Not authorized"}');
if($a=='0'){
    $con->query("UPDATE `cv_events` set approvedmsg='$msg', approved='0'  where id='$id'");
    die('{"success":true,"message":"Rejected the proposal"}');
}
else{
    $con->query("UPDATE `cv_events` set approvedmsg='', approved='1' where id='$id'");
    die('{"success":true,"message":"Approved"}');
}

