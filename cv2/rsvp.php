<?php
/**
 * Created by PhpStorm.
 * User: mew
 * Date: 2/18/17
 * Time: 9:24 PM
 */
include_once "auth.php";
$id=$_GET['id'];
$status=$_GET['status'];
if($status!='0'&&$status!='')
    $status=1;
else
    $status=0;
$q = $con->query("SELECT * from cv_rsvp where eventID='$id' and entryno='$entry_no'");
if($q->num_rows==0)
    $con->query("INSERT INTO cv_rsvp (eventID,entryno,status,lastupdated) VALUES ('$id','$entry_no','$status',NOW())");
else
    $con->query("UPDATE cv_rsvp SET status='$status' WHERE eventID='$id' and entryno='$entry_no'");
header('Location: events.php?id='.$id);
exit;
