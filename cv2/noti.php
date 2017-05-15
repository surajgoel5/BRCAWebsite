<?php
/**
 * Created by PhpStorm.
 * User: mew
 * Date: 12/24/16
 * Time: 5:59 PM
 */
include_once "navbar.php";
if (is_null($post)||!$gsec)
{
    header('Location: home.php');
    exit;
}
$q="SELECT entryno,event,timestamp,type FROM cv_logs ORDER BY TIMESTAMP DESC";
$r=$con->query($q);
$request=$con->query("UPDATE `cv_logs` SET type=0 WHERE event='unread'");
$rr = array("","created ","added participant to ","updated participant ","updated event ");
?>
<div class="container">
    <div class="jumbotron">
        <h1>Ding ding!</h1>
        <ol>
            <?php
                while($d=$r->fetch_row()){
            ?>
            <li>
                <a>@<?=$d[0]?></a> <?=$rr[$d[3]]?><a href="events.php?id=<?=$d[1]?>">@<?=$d[1]?></a> at <?=$d[2]?>
            </li>
            <?}?>
        </ol>
    </div>
</div>

