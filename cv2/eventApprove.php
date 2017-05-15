<?php
/**
 * Created by PhpStorm.
 * User: mew
 * Date: 4/5/17
 * Time: 12:51 AM
 */
include_once('auth.php');
$_POST = getRealPOST();
$id = $_POST["id"];
$request=$con->query("SELECT * from `cv_events` where id='$id'");
$event = $request->fetch_assoc();
if($post[1]!=$event["club"]||!$faculty)
    die('{"success":false,"message":"Not authorized"}');
$con->query("UPDATE `cv_events` set approved='1' where id='$id'");
die('{"success":true,"message":"Approved"}');
