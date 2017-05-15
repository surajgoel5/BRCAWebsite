<?php
/**
 * Created by PhpStorm.
 * User: anil
 * Date: 8/1/17
 * Time: 4:44 PM
 */
include_once "navbar.php";
$pid = $_GET["id"];
$q = "SELECT * from cv_judge where id='$pid'";
$r = $con->query($q);
$d = $r->fetch_assoc();
$id = $d["eventID"];

$commit = $entry_no;
$name = $_POST["name"];
$phone = $_POST["phone"];
$email = $_POST["email"];
$organisation = $_POST["organisation"];

$request=$con->query("SELECT createdby from `cv_events` where id='$id'");
$createdBy = $request->fetch_array();
$createdBy = $createdBy[0];


$name = addslashes($name);
$organisation = addslashes($organisation);



if($name!="")
{
    if(!($gsec||$commit==$createdBy))
        echo "Not authorized";
    else{   
        $request=$con->query("INSERT INTO `cv_logs` (event,entryno,timestamp,type) VALUES ('$id','$commit',NOW(),3)");
        $request=$con->query("UPDATE `cv_logs` SET type=type+1 WHERE event='unread'");
        $request=$con->query("UPDATE `cv_judge` SET name='$name',phone='$phone',email='$email',organisation='$organisation',commit='$commit',lastupdated=NOW() WHERE id='$pid'");
        echo "You have successfully edited the judge!";
    }
    header('Location: events.php?id='.$id);
    exit;
}
?>
<div class="container jumbotron">
<form action="" method="post">
    <div class="form-group">
        <label for="recipient-name" class="form-control-label">Name:</label>
        <input type="text" class="form-control" name="name" id="recipient-name" value="<?=$d["name"]?>">
    </div>
    <div class="form-group">
        <label for="recipient-org" class="form-control-label">Organisation:</label>
        <input type="text" class="form-control" name="organisation" id="recipient-org" value="<?=$d["organisation"]?>">
    </div>
    <div class="form-group">
        <label for="recipient-phone" class="form-control-label">Contact No:</label>
        <input type="text" class="form-control" name="phone" id="recipient-phone" value="<?=$d["phone"]?>">
    </div>
    <div class="form-group">
        <label for="recipient-email" class="form-control-label">Email:</label>
        <input type="email" class="form-control" name="email" id="recipient-email" value="<?=$d["email"]?>">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</div>
</form>
</div>