<?php
/**
 * Created by PhpStorm.
 * User: anil
 * Date: 8/1/17
 * Time: 1:59 PM
 */
include_once('auth.php');
$commit = $entry_no;
$id = $_POST["id"];
$name = $_POST["name"];
$phone = $_POST["phone"];
$email = $_POST["email"];
$organisation = $_POST["organisation"];

$request=$con->query("SELECT createdby from `cv_events` where id='$id'");
$createdBy = $request->fetch_array();
$createdBy = $createdBy[0];

$name = addslashes($name);
$organisation = addslashes($organisation);



if($entry_no!="")
{
    $request2=$con->query("SELECT * from `cv_judge` where name='$name' and eventID='$id'");
    if($request2->num_rows>0)
        echo "Judge already exists";
    else if(!($gsec||$commit==$createdBy))
        echo "Not authorized";
    else{
        $request=$con->query("INSERT INTO `cv_logs` (event,entryno,timestamp,type) VALUES ('$id','$commit',NOW(),2)");
        $request=$con->query("UPDATE `cv_logs` SET type=type+1 WHERE event='unread'");
        $request=$con->query("INSERT INTO `cv_judge` (name,phone,email,organisation,commit,eventID,lastupdated) VALUES ('$name','$phone','$email','$organisation','$commit','$id',NOW())");
        echo "You have successfully added the Judge!";
    }
    header('Location: events.php?id='.$id);
    exit;
}