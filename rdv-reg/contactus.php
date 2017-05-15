<?php
/**
 * Created by PhpStorm.
 * User: mew
 * Date: 4/12/17
 * Time: 3:51 PM
 */
include_once "auth.php";
$feed = $_POST["feedback"];
$feed = addslashes($feed);

$d = $con->query("SELECT name from cv_feed where feed='$feed'");
if($d->num_rows==0)
    $con->query("INSERT INTO cv_feed (entryno, name, feed, date) VALUES ('$entry_no', '$id->name','$feed',NOW())");
$res["success"]=true;
$res["message"]="Thanks for your feedback. <br>We'll get back to you asap.";
die(json_encode($res));