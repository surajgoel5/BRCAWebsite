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
if(!$gsec||!$faculty)
    die('{"success":false,"message":"Not authorized"}');
$d = $con->query("Select budget from `cv_admins` where entryno='$id'");
$budget = $d->fetch_row();
$budget = unserialize($budget[0]);
if($a=='1'){
    $budget[4] = '1';
    $budget = serialize($budget);
    $con->query("UPDATE `cv_admins` set budget='$budget' where entryno='$id'");
    die('{"success":true,"message":"Approved"}');
}
else{
    $budget[5] = $msg;
    $budget = serialize($budget);
    $con->query("UPDATE `cv_admins` set budget='$budget' where entryno='$id'");
    die('{"success":true,"message":"The proposal has been rejected"}');
}
