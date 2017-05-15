<?php
/**
 * Created by PhpStorm.
 * User: mew
 * Date: 4/21/17
 * Time: 6:37 PM
 */
include_once "auth.php";
if(!($gsec&&$faculty))
    die("<div class=\"uk-container uk-margin-top\">
    <div class=\"uk-card uk-card-default uk-card-hover uk-card-body\">Not for your eyes!</div></div>");
$date1 = date('Y-m-d', time());
$q="SELECT * FROM cv_events where approved='0' and club='General'";
$r1=$con->query($q);
$q="SELECT * FROM cv_events where approved='0' and club<>'General'";
$r2=$con->query($q);
$q="SELECT * FROM cv_events where date<'$date1'";
$r3=$con->query($q);
?>
<div class="uk-container uk-margin-top">
    <div class="uk-child-width-1-3@m uk-grid-margin-large uk-grid uk-grid-stack" uk-grid="">
        <div>
            <ul class="uk-card uk-card-default uk-card-hover">
                <div class="uk-card-header">
                Your Pending Approvals
                </div>
                <div class="uk-card-body">
                    <?php
                    $i=0;
                    while($d=$r1->fetch_assoc()){
                        $i++;
                        ?>
                        <div style="cursor: pointer" class="uk-margin-bottom" onclick="location.href='events.php?id=<?=$d["id"]?>'">
                            <div class="uk-flex">
                                <h4 class="uk-margin-remove">
                                    <span class="uk-label-danger uk-label">&nbsp</span>
                                    <?=$d["name"]?>
                                </h4>
                            </div>
                            <div class="uk-flex">
                                <div><?=modDate($d["date"])?></div>
                                <div class="uk-margin-auto"><?=($d["venue"])?></div>
                            </div>
                        </div>
                    <? } ?>
                </div>
            </ul>
        </div>
        <div>
            <ul class="uk-card uk-card-default uk-card-hover">
                <div class="uk-card-header">
                Other Clubs Pending Approvals
                </div>
                <div class="uk-card-body">
                    <?php
                    $i=0;
                    while($d=$r2->fetch_assoc()){
                        $i++;
                        ?>
                        <div style="cursor: pointer" class="uk-margin-bottom" onclick="location.href='events.php?id=<?=$d["id"]?>'">
                            <div class="uk-flex">
                                <h4 class="uk-margin-remove">
                                    <span class="uk-label-warning  uk-label">&nbsp</span>
                                    <?=$d["name"]?>
                                </h4>
                            </div>
                            <div class="uk-flex">
                                <div><?=modDate($d["date"])?></div>
                                <div class="uk-margin-auto"><?=($d["venue"])?></div>
                            </div>
                        </div>
                    <? } ?>
                </div>
            </ul>
        </div>
        <div>
            <ul class="uk-card uk-card-default uk-card-hover">
                <div class="uk-card-header">
                Completed Events
                </div>
                <div class="uk-card-body">
                    <?php
                    $i=0;
                    while($d=$r3->fetch_assoc()){
                        $i++;
                        ?>
                        <div style="cursor: pointer" class="uk-margin-bottom" onclick="location.href='events.php?id=<?=$d["id"]?>'">
                            <div class="uk-flex">
                                <h4 class="uk-margin-remove">
                                    <span class="uk-label-success uk-label">&nbsp</span>
                                    <?=$d["name"]?>
                                </h4>
                            </div>
                            <div class="uk-flex">
                                <div><?=modDate($d["date"])?></div>
                                <div class="uk-margin-auto"><?=($d["venue"])?></div>
                            </div>
                        </div>
                    <? } ?>
                </div>
            </ul>
        </div>
    </div>
</div>

