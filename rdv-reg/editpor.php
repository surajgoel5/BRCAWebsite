<?php
/**
 * Created by PhpStorm.
 * User: anil
 * Date: 8/1/17
 * Time: 4:44 PM
 */
include_once "navbar.php";
$pid = $_GET["id"];
$q = "SELECT * from cv_por where id='$pid'";
$r = $con->query($q);
$d = $r->fetch_assoc();
$id = $d["eventID"];
$commit = $entry_no;
$entry_no = $_POST["entryno"];
$points = $_POST["points"];
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
    if(!($Coordi&&$role=='Coordinator'||$AH&&$role=='Activity Head'||$EH&&$role=='Event Head'))
    echo "Not authorized";
    else {
        $request = $con->query("INSERT INTO `cv_logs` (event,entryno,timestamp,type) VALUES ('$id','$commit',NOW(),3)");
        $request = $con->query("UPDATE `cv_logs` SET type=type+1 WHERE event='unread'");
        $request = $con->query("UPDATE `cv_por` SET name='$name',entryno='$entry_no',commit='$commit',points='$points',lastupdated=NOW() WHERE id='$pid'");
    }
    echo "You have successfully added the participant!";
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
        <label for="message-text" class="form-control-label">Points:</label>
        <textarea name="points" class="form-control" id="message-text"> <?=$d["points"]?></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</div>
</form>
</div>