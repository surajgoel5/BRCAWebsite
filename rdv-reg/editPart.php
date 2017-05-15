<?php
/**
 * Created by PhpStorm.
 * User: anil
 * Date: 8/1/17
 * Time: 4:44 PM
 */
include_once "navbar.php";
$pid = $_GET["id"];
$q = "SELECT * from cv_participants where id='$pid'";
$r = $con->query($q);
$d = $r->fetch_assoc();
$id = $d["eventID"];

$commit = $entry_no;
$entry_no = $_POST["entryno"];
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
    if(!($gsec||$commit==$createdBy))
        echo "Not authorized";
    else{   
        $request=$con->query("INSERT INTO `cv_logs` (event,entryno,timestamp,type) VALUES ('$id','$commit',NOW(),3)");
        $request=$con->query("UPDATE `cv_logs` SET type=type+1 WHERE event='unread'");
        $request=$con->query("UPDATE `cv_participants` SET name='$name',entryno='$entry_no',role='$role',commit='$commit',position='$position',points='$points',lastupdated=NOW() WHERE id='$pid'");
        echo "You have successfully edited the participant!";
    }
    header('Location: events.php?id='.$id);
    exit;
}
?>
<div class="container jumbotron">
<form action="" method="post">
    <div class="form-group">
        <label for="recipient-name" class="form-control-label">Entry No:</label>
        <input type="text" class="form-control" name="entryno" id="recipient-name" value="<?=$d["entryno"]?>">
    </div>
    <div class="form-group">
        <label for="recipient-name" class="form-control-label">Name:</label>
        <input type="text" class="form-control" name="name" id="recipient-name"  value="<?=$d["name"]?>">
    </div>
    <div class="form-group">
        <label for="recipient-name" class="form-control-label">Position:</label>
        <input type="text" class="form-control" name="position" id="recipient-name"  value="<?=$d["position"]?>">
    </div>
    <div class="form-check form-check-inline">
        <label class="form-check-label">
            <input class="form-check-input" <?if($d["role"]=="Participant") echo "checked"?> type="radio" name="role" id="inlineRadio1" value="Participant"> Participant
        </label>
    </div>
    <div class="form-check form-check-inline">
        <label class="form-check-label">
            <input class="form-check-input" <?if($d["role"]=="Director") echo "checked"?> type="radio" name="role" id="inlineRadio2" value="Director"> Director
        </label>
    </div>
    <div class="form-check form-check-inline">
        <label class="form-check-label">
            <input class="form-check-input" <?if($d["role"]=="Other") echo "checked"?> type="radio" name="role" id="inlineRadio3" value="Other"> Other
        </label>
    </div>
    <div class="form-group">
        <label for="message-text" class="form-control-label">Points:</label>
        <textarea name="points" class="form-control" id="message-text"> <?=$d["points"]?></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</div>
</form>
</div>