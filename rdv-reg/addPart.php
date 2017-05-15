<?php
/**
 * Created by PhpStorm.
 * User: anil
 * Date: 8/1/17
 * Time: 1:59 PM
 */
include_once('auth.php');
$commit = $entry_no;
$entry_no = $_POST["entryno"];
$id = $_POST["id"];
$points = $_POST["points"];
$role = $_POST["role"];
$name = $_POST["name"];
$position = $_POST["position"];

$request=$con->query("SELECT createdby from `cv_events` where id='$id'");
$createdBy = $request->fetch_array();
$createdBy = $createdBy[0];
$points = addslashes($points);
$position = addslashes($position);
$name = addslashes($name);



if($entry_no!="")
{
    $request2=$con->query("SELECT * from `cv_participants` where entryno='$entry_no' and eventID='$id' and position='$position'");
    if($request2->num_rows>0)
        echo "Participant already exists";
    else if(!($gsec||$commit==$createdBy))
        echo "Not authorized";
    else{
        $request=$con->query("INSERT INTO `cv_logs` (event,entryno,timestamp,type) VALUES ('$id','$commit',NOW(),2)");
        $request=$con->query("UPDATE `cv_logs` SET type=type+1 WHERE event='unread'");
        $request=$con->query("INSERT INTO `cv_participants` (name,entryno,role,commit,eventID,position,points,lastupdated) VALUES ('$name','$entry_no','$role','$commit','$id','$position','$points',NOW())");
        echo "You have successfully added the participant!";
    }
    header('Location: events.php?id='.$id);
    exit;
}