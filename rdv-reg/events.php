<?php
/**
 * Created by PhpStorm.
 * User: anil
 * Date: 8/1/17
 * Time: 2:18 PM
 */
include_once "navbar.php";
$eventID = $_GET["id"];
$date1 = date('Y-m-d', time());
$q="SELECT * FROM cv_events WHERE id='$eventID'";
$r=$con->query($q);
if($r->num_rows==0)
{
    header('Location: home.php');
    exit;
}
$p="SELECT * FROM cv_participants WHERE eventID='$eventID'";
$r2=$con->query($p);
$p="SELECT * FROM cv_judge WHERE eventID='$eventID'";
$r3=$con->query($p);
$d=$r->fetch_assoc();
if($d["noteams"]=="undefined")
    $d["noteams"] = "To be updated post event";
if($d["audience"]=="undefined")
    $d["audience"] = "To be updated post event";
$creator = false;
$eventhead=false;
$coordinator=false;
$level=0;
$q = $con->query("SELECT path from cv_images where eventID = '$eventID'");
$pics = $q->num_rows!=0;
$date2 = $d["date"];
$post = !(($date1)<($date2));

if('Inter College'==$d['level']) $level=1;
if('Festival'==$d['level']) $level=2;
if($entry_no==$d['createdby'])
    $creator=true;
if($level>0)
{
    $pp="SELECT * FROM cv_por WHERE eventID='$eventID' and entryno='$entry_no'";
    $rr=$con->query($pp);
    while($dd=$rr->fetch_assoc()){
        if($dd["role"]=='Event Head')
            $eventhead=true;
        if($dd["role"]=='Coordinator'&&$level==2)
            $coordinator=true;
    }
}
$showPart = $creator||$gsec;
$showEH = $gsec&&$level==1;
$showCoordi = $eventhead||$gsec&&$level>0;
$showAH = $coordinator;
?>
<div class="uk-container uk-margin-large">
    <div class="uk-card uk-card-default uk-card-hover">
    <div class="uk-card-badge">
        <?php
        $que = $con->query("SELECT status from cv_rsvp where eventID='$eventID' and entryno='$entry_no'");
        $s=$que->fetch_array();
        if($faculty){
            if($d["approved"]=='1')
                echo '<button class="uk-button uk-button-primary" disabled type="button" > Approved </button>';
            else{
                echo '<button class="uk-button uk-button-primary" id="approve" onclick="approve('.$d["id"].')" type="button" > Approve </button>';
                echo '<button class="uk-margin-left uk-button uk-button-danger" id="reject" onclick="reject('.$d["id"].')" type="button" > Reject </button>';
            }
        }
        if($s[0]=='1')
            echo '<button class="uk-button uk-button-primary uk-margin-left" onclick="attend(0)" type="button" > Attending </button>';
        else
            echo '<button class="uk-button uk-button-secondary uk-margin-left" onclick="attend(1)" type="button" > Not attending </button>';
        ?>
    </div>
        <div class="uk-card-header uk-h1">
            <?=$d["name"]?>
        </div>
    <div class="uk-card-body">
        <h3 class="uk-heading-bullet">General Information</h3>
        <div class="uk-flex">
            <div class="uk-first-column">
            <dt>Date</dt>
            <dd></dd><?=$d["date"]?></dd>
            </div>
            <div class="uk-margin-auto-left">
            <dt>Venue</dt>
            <dd></dd><?=$d["venue"]?></dd>
            </div>
            <div class="uk-margin-auto-left">
            <dt>Level</dt>
            <dd></dd><?=$d["level"]?></dd>
            </div>
            <div class="uk-margin-auto-left">
            <dt>Number of Teams</dt>
            <dd></dd><?=$d["noteams"]?></dd>
            </div>
            <div class="uk-margin-auto-left">
            <dt>Audience</dt>
            <dd></dd><?=$d["audience"]?></dd>
            </div>
        </div>
        <hr class="uk-divider-icon">
            <? $ex = unserialize($d["extras"]);
                if($faculty){
                    echo "<h3 class=\"uk-heading-bullet\">Expenses</h3>
";
                    if(strlen($d["comd"])>0){
                        ?>
                        <h5><span uk-icon="icon: grid"></span> Purchase committee expenses</h5>
                        <dl class="uk-h4">
                               <?=$d["comd"]?> :
                                ₹ <?=$d["coma"]?>
                        </dl>
                        <?
                    }
                    if(sizeof($ex["item"])>0){
                    ?>
                        <h5><span uk-icon="icon: grid"></span> Non purchase committee expenses</h5>
                        <?
                    echo "<dl class=\"uk-description-list\">";
                    for($i=0;$i<sizeof($ex["item"]);$i++)
                    {
                    ?>
                        <dt>
                            <?=$ex["item"][$i]?>
                        </dt>
                        <dd>
                            ₹ <?=$ex["expense"][$i]?>
                        </dd>
                    <?
                    }
                    echo "</dl><hr class='uk-divider-icon'>";
                    }
                }
            ?>
        <h3 class="uk-heading-bullet">Description</h3>
            <p><?=$d["description"]?></p>
        <?if($pics){?>
        <iframe class="uk-width-1-1" scrolling="no" style="height: 480px" src="http://brca.iitd.ac.in/rdv-reg/slideshow.php?id=<?=$d["id"]?>">
        </iframe><?}?>
        <div class="uk-margin-top">
            <?php if($showPart&&$post){?>
            <button uk-toggle="target: #partModal" class="uk-button uk-button-primary uk-align-right" type="button" >+ Acknowledgement</button>
            <button uk-toggle="target: #judgeModal" class="uk-button uk-button-primary uk-align-right" type="button" >+ Judge</button>
            <?php }if($showEH&&$post){?>
            <button uk-toggle="target: #headModal" class="uk-button uk-button-primary uk-align-right" type="button" >+ Event Head</button>
            <?php }if($showCoordi&&$post){?>
        <button uk-toggle="target: #coordiModal" class="uk-button uk-button-primary uk-align-right" type="button" >+ Coordinator</button>
            <?php }if($showAH&&$post){?>
        <button uk-toggle="target: #acheadModal" class="uk-button uk-button-primary uk-align-right" type="button" >+ Activity Head</button>
            <?php }if($creator){?>
            <?php if($d["approved"]!='1'){?>
            <button class="uk-button uk-align-right uk-button-danger" onclick="del(<?=$eventID?>)">Delete</button>
            <?}?>
            <a class="uk-button uk-align-right uk-button-default uk-margin-left" href="createevent.php?id=<?=$eventID?>"><span class="uk-margin-right" uk-icon="icon: pencil"></span>Edit</a>
                <?if($post){?>
                <form id="picUpload" action="imageUpload.php?id=<?=$eventID?>" method="POST" enctype="multipart/form-data">
                    <div uk-form-custom>
                        <input id="src" name="image" type="file">
                        <button type="button" class="uk-button uk-button-default uk-transparent">Select Image</button>
                    </div>
                    <button type="submit" class="uk-button uk-button-primary">Upload Image</button>
                </form>
            <?} }?>
<!--        </div>-->
        </div>
        </div>
        </div>
<div class="uk-container-center">
<?php if($r2->num_rows!=0){?>
<div class="uk-card uk-card-default uk-card-hover uk-margin-top">
        <div class="uk-card-header uk-h2">Acknowledgements</div>
        <div class="uk-card-body">
        <table class="uk-table">
            <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Entry No</th>
                <th>Role</th>
                <th>Position</th>
                <th>Points</th>
            </tr>
            </thead>
            <tbody>
            <?php $i=0;while($s=$r2->fetch_assoc()){$i++;?>
        <tr>
                <td><?=$i?></td>
                <td><?=$s["name"]?></td>
                <td><?=$s["entryno"]?></td>
                <td><?=$s["role"]?></td>
                <td><?=$s["position"]?></td>
                <td><?=$s["points"]?></td>
                <?if($showPart){?>
                <td><a class="uk-button uk-button-default uk-align-right" href="editPart.php?id=<?=$s["id"]?>">Edit</a></td>
                    <?}?>
        </tr>
    <?}?>
                </tbody>
            </table>
    </div>
    </div>
<?php }if($r3->num_rows!=0){?>
<div class="uk-card uk-card-default uk-card-hover uk-margin-top">
        <div class="uk-card-header uk-h2">Judges</div>
        <div class="uk-card-body">
        <table class="uk-table">
            <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Organisation</th>
                <th>Phone</th>
                <th>Email</th>
            </tr>
            </thead>
            <tbody>
            <?php $i=0;;
            while($s=$r3->fetch_assoc()){$i++;?>
        <tr>
                <td><?=$i?></td>
                <td><?=$s["name"]?></td>
                <td><?=$s["organisation"]?></td>
                <td><?=$s["phone"]?></td>
                <td><?=$s["email"]?></td>
                <?if($showPart){?>
                <td><a class="uk-button uk-button-default uk-align-right" href="editJudge.php?id=<?=$s["id"]?>">Edit</a></td>
                    <?}?>
        </tr>
    <?}?>
                </tbody>
            </table>
    </div>
    </div>
<?php }if($showEH){?>
<div class="uk-card uk-card-default uk-card-hover uk-margin-top">
        <div class="uk-card-header uk-h2">Event Heads</div>
        <div class="uk-card-body">
        <table class="uk-table">
            <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Entry No</th>
                <th>Points</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $p="SELECT * FROM cv_por WHERE eventID='$eventID' and role='Event Head'";
            $r2=$con->query($p);
            $i=0;
            while($s=$r2->fetch_assoc()){$i++;?>
        <tr>
                <td><?=$i?></td>
                <td><?=$s["name"]?></td>
                <td><?=$s["entryno"]?></td>
                <td><?=$s["points"]?></td>
                <td><a class="uk-button uk-button-default uk-align-right" href="editpor.php?id=<?=$s["id"]?>">Edit</a></td>
        </tr>
    <?}?>
                </tbody>
            </table>
    </div>
    </div>
<?php }if($showCoordi){?>
<div class="uk-card uk-card-default uk-card-hover uk-margin-top">
        <div class="uk-card-header uk-h2">Coordinators</div>
        <div class="uk-card-body">
        <table class="uk-table">
            <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Entry No</th>
                <th>Points</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $p="SELECT * FROM cv_por WHERE eventID='$eventID' and role='Coordinator'";
            $r2=$con->query($p);
            $i=0;
            while($s=$r2->fetch_assoc()){$i++;?>
        <tr>
                <td><?=$i?></td>
                <td><?=$s["name"]?></td>
                <td><?=$s["entryno"]?></td>
                <td><?=$s["points"]?></td>
                <td><a class="uk-button uk-button-default uk-align-right" href="editpor.php?id=<?=$s["id"]?>">Edit</a></td>
        </tr>
    <?}?>
                </tbody>
            </table>
    </div>
    </div>
<?php }if($showAH){?>
    <div class="uk-card uk-card-default uk-card-hover uk-margin-top">
        <div class="uk-card-header uk-h2">Activity Heads</div>
            <div class="uk-card-body">
        <table class="uk-table">
            <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Entry No</th>
                <th>Points</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $p="SELECT * FROM cv_por WHERE eventID='$eventID' and role='Activity Head' and commit='$entry_no'";
            $r2=$con->query($p);
            $i=0;
            while($s=$r2->fetch_assoc()){$i++;?>
                <tr>
                    <td><?=$i?></td>
                    <td><?=$s["name"]?></td>
                    <td><?=$s["entryno"]?></td>
                    <td><?=$s["points"]?></td>
                    <td><a class="uk-button uk-button-default uk-align-right" href="editpor.php?id=<?=$s["id"]?>">Edit</a></td>
                </tr>
            <?}?>
            </tbody>
        </table>
    </div>
<?php }?>
</div>
<?php if($showPart){?>
<div id="partModal" uk-modal>
    <div class="uk-modal-dialog">
        <div class="modal-content">
            <div class="uk-modal-header">
                <span class="uk-modal-title" id="exampleModalLabel">Add Acknowledgement</span>
                <button class="uk-modal-close-default" type="button" uk-close></button>
            </div>
            <div class="uk-modal-body">
                <form action="addPart.php" method="post">
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Entry No:</label>
                        <input type="text" class="uk-input" name="entryno" id="recipient-name">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Name:</label>
                        <input type="text" class="uk-input" name="name" id="recipient-name">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Position:</label>
                        <input type="text" class="uk-input" name="position" id="recipient-name">
                    </div>
                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <input class="uk-radio" type="radio" name="role" id="inlineRadio1" value="Participant"> Participant
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <input class="uk-radio" type="radio" name="role" id="inlineRadio2" value="Director"> Director
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <input class="uk-radio" type="radio" name="role" id="inlineRadio3" value="Other"> Other
                            </label>
                        </div>
                    <input type="hidden" value="<?=$eventID?>" name="id">
                    <input type="hidden" value="<?=$entry_no?>" name="commit">
                    <div class="form-group">
                        <label for="message-text" class="form-control-label">Points:</label>
                        <textarea class="uk-textarea" name="points" id="message-text"></textarea>
                    </div>
            </div>
            <div class="uk-modal-footer uk-text-right">
                <button type="button" class="uk-button uk-button-default uk-modal-close" data-dismiss="modal">Cancel</button>
                <button type="submit" class="uk-button uk-button-primary">Add</button>
            </div>
        </div>
        </form>
    </div>
</div>
<div id="judgeModal" uk-modal>
    <div class="uk-modal-dialog">
        <div class="modal-content">
            <div class="uk-modal-header">
                <span class="uk-modal-title" id="exampleModalLabel">Add Judge</span>
                <button class="uk-modal-close-default" type="button" uk-close></button>
            </div>
            <div class="uk-modal-body">
                <form action="addJudge.php" method="post">
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Name:</label>
                        <input type="text" class="uk-input" name="name" id="recipient-name">
                    </div>
                    <div class="form-group">
                        <label for="recipient-org" class="form-control-label">Organisation:</label>
                        <input type="text" class="uk-input" name="organisation" id="recipient-org">
                    </div>
                    <div class="form-group">
                        <label for="recipient-phone" class="form-control-label">Contact No:</label>
                        <input type="text" class="uk-input" name="phone" id="recipient-phone">
                    </div>
                    <div class="form-group">
                        <label for="recipient-email" class="form-control-label">Email:</label>
                        <input type="email" class="uk-input" name="email" id="recipient-email">
                    </div>
                    <input type="hidden" value="<?=$eventID?>" name="id">
            </div>
            <div class="uk-modal-footer uk-text-right">
                <button type="button" class="uk-button uk-button-default uk-modal-close" data-dismiss="modal">Cancel</button>
                <button type="submit" class="uk-button uk-button-primary">Add</button>
            </div>
        </div>
        </form>
    </div>
</div>
    <?php }if($showEH){?>
<div id="headModal" uk-modal>
    <div class="uk-modal-dialog">
        <div class="modal-content">
            <div class="uk-modal-header">
                <span class="uk-modal-title" id="exampleModalLabel">New Event Head</span>
                <button class="uk-modal-close-default" type="button" uk-close></button>
            </div>
            <div class="uk-modal-body">
                <form action="addpor.php" method="post">
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Entry No:</label>
                        <input type="text" class="uk-input" name="entryno" id="recipient-name">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Name:</label>
                        <input type="text" class="uk-input" name="name" id="recipient-name">
                    </div>
                    <input type="hidden" value="Event Head" name="role">
                    <input type="hidden" value="<?=$eventID?>" name="id">
                    <input type="hidden" value="<?=$entry_no?>" name="commit">
                    <div class="form-group">
                        <label for="message-text" class="form-control-label">Points:</label>
                        <textarea class="uk-textarea" name="points" id="message-text"></textarea>
                    </div>
            </div>
            <div class="uk-modal-footer uk-text-right">
                <button type="button" class="uk-button uk-button-default uk-modal-close" data-dismiss="modal">Cancel</button>
                <button type="submit" class="uk-button uk-button-primary">Add</button>
            </div>
        </div>
        </form>
    </div>
</div>
    <?php }if($showCoordi){?>
<div id="coordiModal" uk-modal>
    <div class="uk-modal-dialog">
        <div class="modal-content">
            <div class="uk-modal-header">
                <span class="uk-modal-title" id="exampleModalLabel">New Coordinator</span>
                <button class="uk-modal-close-default" type="button" uk-close></button>
            </div>
            <div class="uk-modal-body">
                <form action="addpor.php" method="post">
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Entry No:</label>
                        <input type="text" class="uk-input" name="entryno" id="recipient-name">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Name:</label>
                        <input type="text" class="uk-input" name="name" id="recipient-name">
                    </div>
                    <input type="hidden" value="Coordinator" name="role">
                    <input type="hidden" value="<?=$eventID?>" name="id">
                    <input type="hidden" value="<?=$entry_no?>" name="commit">
                    <div class="form-group">
                        <label for="message-text" class="form-control-label">Points:</label>
                        <textarea class="uk-textarea" name="points" id="message-text"></textarea>
                    </div>
            </div>
            <div class="uk-modal-footer uk-text-right">
                <button type="button" class="uk-button uk-button-default uk-modal-close" data-dismiss="modal">Cancel</button>
                <button type="submit" class="uk-button uk-button-primary">Add</button>
            </div>
        </div>
        </form>
    </div>
</div>
    <?php }if($showAH){?>
<div id="acheadModal" uk-modal>
    <div class="uk-modal-dialog">
        <div class="modal-content">
            <div class="uk-modal-header">
                <span class="uk-modal-title" id="exampleModalLabel">New Activity Head</span>
                <button class="uk-modal-close-default" type="button" uk-close></button>
            </div>
            <div class="uk-modal-body">
                <form action="addpor.php" method="post">
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Entry No:</label>
                        <input type="text" class="uk-input" name="entryno" id="recipient-name">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Name:</label>
                        <input type="text" class="uk-input" name="name" id="recipient-name">
                    </div>
                    <input type="hidden" value="Activity Head" name="role">
                    <input type="hidden" value="<?=$eventID?>" name="id">
                    <input type="hidden" value="<?=$entry_no?>" name="commit">
                    <div class="form-group">
                        <label for="message-text" class="form-control-label">Points:</label>
                        <textarea class="uk-textarea" name="points" id="message-text"></textarea>
                    </div>
            </div>
            <div class="uk-modal-footer uk-text-right">
                <button type="button" class="uk-button uk-button-default uk-modal-close" data-dismiss="modal">Cancel</button>
                <button type="submit" class="uk-button uk-button-primary">Add</button>
            </div>
        </div>
        </form>
    </div>
</div>
    <?php }?>
<script type="text/javascript">
    function attend(status) {
        window.location =("/rdv-reg/rsvp.php?id=<?=$eventID?>&status="+status);
    }
    function approve(id){
        UIkit.modal.confirm('Please note that this approves funds for the requested event!').then(function () {
            var http = new XMLHttpRequest();
            var params = "id=" + id;
            var url = "eventApprove.php";
            http.open("POST", url, true);
            http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            http.onreadystatechange = function () {//Call a function when the state changes.
                if (http.readyState == 4 && http.status == 200) {
                    console.log(http.responseText);
                    var reg = JSON.parse((http.responseText));
                    if (reg.success) {
                        var button = document.getElementById('approve');
                        $('#reject').remove();
                        button.disabled=true;
                        button.innerHTML='Approved';
                    }
                }
            };
            http.send(params);
        });
    }
    function reject(id) {
        UIkit.modal.prompt('Message:', '').then(function(msg) {
            if(msg!=null){
                var http = new XMLHttpRequest();
                var params = "id=" + id + "&msg=" + msg + "&a=0";
                var url = "eventApprove.php";
                http.open("POST", url, true);
                http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                http.onreadystatechange = function () {//Call a function when the state changes.
                    if (http.readyState == 4 && http.status == 200) {
                        var reg = JSON.parse((http.responseText));
                        UIkit.notification({message:reg.message,pos: 'top',status:'primary'});

                    }
                };
                http.send(params);
            }
        });
    }
    function del(id) {
        UIkit.modal.confirm('You sure?').then(function () {
            var http = new XMLHttpRequest();
            var params = "id=" + id;
            var url = "eventDel.php";
            http.open("POST", url, true);
            http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            http.onreadystatechange = function () {//Call a function when the state changes.
                if (http.readyState == 4 && http.status == 200) {
                    location.reload();
                }
            };
            http.send(params);
        });
    }
</script>