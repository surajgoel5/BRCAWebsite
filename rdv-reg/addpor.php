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
$eventhead=false;
$coordinator=false;
$pp="SELECT * FROM cv_por WHERE eventID='$id' and entryno='$entry_no'";
$rr=$con->query($pp);
while($dd=$rr->fetch_assoc()){
    if($dd["role"]=='Event Head')
        $eventhead=true;
    if($dd["role"]=='Coordinator'&&$level==2)
        $coordinator=true;
}
$EH = $gsec;
$Coordi = $eventhead||$gsec;
$AH = $coordinator;


$points = addslashes($points);
$name = addslashes($name);



if($entry_no!="")
{
    echo "Participant already exists";
    $request2=$con->query("SELECT * from `cv_por` where entryno='$entry_no' and eventID='$id' and role='$role'");
    $request3=$con->query("SELECT * from `cv_por` where eventID='$id' and role='$role' and commit='$commit'");
    if($request2->num_rows>0)
        echo "Participant already exists";
    else if($role=='Activity Head'&&$request3->num_rows>2)
        echo "Participant already exists";
    else if(!($Coordi&&$role=='Coordinator'||$AH&&$role=='Activity Head'||$EH&&$role=='Event Head'))
        echo "Not authorized";
    else{
        $request=$con->query("INSERT INTO `cv_logs` (event,entryno,timestamp,type) VALUES ('$id','$commit',NOW(),2)");
        $request=$con->query("UPDATE `cv_logs` SET type=type+1 WHERE event='unread'");
        $request=$con->query("INSERT INTO `cv_por` (name,entryno,role,commit,eventID,points,lastupdated) VALUES ('$name','$entry_no','$role','$commit','$id','$points',NOW())");
        echo "You have successfully added the participant!";
    }
header('Location: events.php?id='.$id);
exit;
}