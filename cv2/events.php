<?php
/**
 * Created by PhpStorm.
 * User: anil
 * Date: 8/1/17
 * Time: 2:18 PM
 */
include_once "navbar.php";
$eventID = $_GET["id"];
$q="SELECT * FROM cv_events WHERE id='$eventID'";
$r=$con->query($q);
$p="SELECT * FROM cv_participants WHERE eventID='$eventID'";
$r2=$con->query($p);
$d=$r->fetch_assoc();
$creator = false;
$eventhead=false;
$coordinator=false;
$level=0;

$date1 = date('Y/m/d', time());
$tempArr=explode('/', $d["date"]);
$date2 = date("Y/m/d", mktime(0, 0, 0, $tempArr[1], $tempArr[0], $tempArr[2]));
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
<div class="container">
    <div class="jumbotron row">
        <?php
        $que = $con->query("SELECT status from cv_rsvp where eventID='$eventID' and entryno='$entry_no'");
        $s=$que->fetch_array();
        if($s[0]=='1')
            echo '<button class="btn btn-success right" onclick="attend(0)" type="button" > Attending </button>';
        else
            echo '<button class="btn btn-default right" onclick="attend(1)" type="button" > Not attending </button>';
        ?>
    <div class="col-sm-12">
            <h1 style="margin-bottom:0vh;"><?=$d["name"]?></h1>
            <h3 style="margin-top:0vh;">Date: <?=$d["date"]?></h3>
            <h3 style="margin-top:0vh;">Venue: <?=$d["venue"]?></h3>
            <h3 style="margin-top:0vh;">Level: <?=$d["level"]?></h3>
            <h3 style="margin-top:0vh;">Number of Teams: <?=$d["noteams"]?></h3>
            <h3 style="margin-top:0vh;">Audience: <?=$d["audience"]?></h3>
            <p><?=$d["description"]?></p>
            <?php
            $q = $con->query("SELECT path from cv_images where eventID = '$eventID'");
            while($val=$q->fetch_array()){
                echo "<a href='".$val[0]."'>image</a><br>";
            }
            ?>
            <?php if($showPart&&$post){?>
            <button data-toggle="modal" data-whatever="meh" data-target="#partModal" class="btn btn-primary add-more right" type="button" >+ Add Acknowledgement</button>
            <button data-toggle="modal" data-whatever="meh" data-target="#judgeModal" class="btn btn-primary add-more right" type="button" >+ Add Judge</button>
            <?php }if($showEH&&$post){?>
            <button data-toggle="modal" data-whatever="meh" data-target="#headModal" class="btn btn-primary add-more right" type="button" >+ Add Event Head</button>
            <?php }if($showCoordi&&$post){?>
        <button data-toggle="modal" data-whatever="meh" data-target="#coordiModal" class="btn btn-primary add-more right" type="button" >+ Add Coordinator</button>
            <?php }if($showAH&&$post){?>
        <button data-toggle="modal" data-whatever="meh" data-target="#acheadModal" class="btn btn-primary add-more right" type="button" >+ Add Activity Head</button>
            <?php }if($creator){?>
            <button class="btn btn-default edit" type="button" ><span class="glyphicon glyphicon-pencil">.</span><a href="createevent.php?id=<?=$eventID?>">Edit</a></button>
                <?if($post){?>
                <form action="imageUpload.php?id=<?=$eventID?>" method="POST" enctype="multipart/form-data">
                    <input type="file" name="image" />
                    <input type="submit" value="Upload Image"/>
                </form>
            <?} }?>
<!--        </div>-->
        </div>
        </div>
<br>
<br>
<br>
<div class="container">
<div class="jumbotron row">
        <h2 style="margin-bottom:2vh;">Acknowledgements:</h2>
        <table class="table table-responsive table-hover">
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
                <td><button class="btn btn-default add-more right" type="button" ><a href="editPart.php?id=<?=$s["id"]?>">Edit Acknowledgement</a></button></td>
                    <?}?>
        </tr>
    <?}?>
                </tbody>
            </table>
    </div>
<div class="jumbotron row">
        <h2 style="margin-bottom:2vh;">Judges:</h2>
        <table class="table table-responsive table-hover">
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
            <?php $i=0;$p="SELECT * FROM cv_judge WHERE eventID='$eventID'";
            $r2=$con->query($p);
            while($s=$r2->fetch_assoc()){$i++;?>
        <tr>
                <td><?=$i?></td>
                <td><?=$s["name"]?></td>
                <td><?=$s["organisation"]?></td>
                <td><?=$s["phone"]?></td>
                <td><?=$s["email"]?></td>
                <?if($showPart){?>
                <td><button class="btn btn-default add-more right" type="button" ><a href="editJudge.php?id=<?=$s["id"]?>">Edit Judge</a></button></td>
                    <?}?>
        </tr>
    <?}?>
                </tbody>
            </table>
    </div>
<?php if($showEH){?>
<div class="jumbotron row">
        <h2 style="margin-bottom:2vh;">Event Heads:</h2>
        <table class="table table-responsive table-hover">
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
                <td><button class="btn btn-default add-more right" type="button" ><a href="editpor.php?id=<?=$s["id"]?>">Edit</a></button></td>
        </tr>
    <?}?>
                </tbody>
            </table>
    </div>
<?php }if($showCoordi){?>
<div class="jumbotron row">
        <h2 style="margin-bottom:2vh;">Coordinators:</h2>
        <table class="table table-responsive table-hover">
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
                <td><button class="btn btn-default add-more right" type="button" ><a href="editpor.php?id=<?=$s["id"]?>">Edit</a></button></td>
        </tr>
    <?}?>
                </tbody>
            </table>
    </div>
<?php }if($showAH){?>
    <div class="jumbotron row">
        <h2 style="margin-bottom:2vh;">Activity Heads:</h2>
        <table class="table table-responsive table-hover">
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
                    <td><button class="btn btn-default add-more right" type="button" ><a href="editpor.php?id=<?=$s["id"]?>">Edit</a></button></td>
                </tr>
            <?}?>
            </tbody>
        </table>
    </div>
<?php }?>
</div>
<?php if($showPart){?>
<div class="modal fade" id="partModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <span class="modal-title" id="exampleModalLabel">Add Acknowledgement</span>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="addPart.php" method="post">
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Entry No:</label>
                        <input type="text" class="form-control" name="entryno" id="recipient-name">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Name:</label>
                        <input type="text" class="form-control" name="name" id="recipient-name">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Position:</label>
                        <input type="text" class="form-control" name="position" id="recipient-name">
                    </div>
                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="role" id="inlineRadio1" value="Participant"> Participant
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="role" id="inlineRadio2" value="Director"> Director
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="role" id="inlineRadio3" value="Other"> Other
                            </label>
                        </div>
                    <input class="hidden" value="<?=$eventID?>" name="id">
                    <input class="hidden" value="<?=$entry_no?>" name="commit">
                    <div class="form-group">
                        <label for="message-text" class="form-control-label">Points:</label>
                        <textarea name="points" class="form-control" id="message-text"></textarea>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Add</button>
            </div>
        </div>
        </form>
    </div>
</div>
<div class="modal fade" id="judgeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <span class="modal-title" id="exampleModalLabel">Add Judge</span>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="addJudge.php" method="post">
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Name:</label>
                        <input type="text" class="form-control" name="name" id="recipient-name">
                    </div>
                    <div class="form-group">
                        <label for="recipient-org" class="form-control-label">Organisation:</label>
                        <input type="text" class="form-control" name="organisation" id="recipient-org">
                    </div>
                    <div class="form-group">
                        <label for="recipient-phone" class="form-control-label">Contact No:</label>
                        <input type="text" class="form-control" name="phone" id="recipient-phone">
                    </div>
                    <div class="form-group">
                        <label for="recipient-email" class="form-control-label">Email:</label>
                        <input type="email" class="form-control" name="email" id="recipient-email">
                    </div>
                    <input class="hidden" value="<?=$eventID?>" name="id">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Add</button>
            </div>
        </div>
        </form>
    </div>
</div>
    <?php }if($showEH){?>
<div class="modal fade" id="headModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <span class="modal-title" id="exampleModalLabel">New Event Head</span>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="addpor.php" method="post">
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Entry No:</label>
                        <input type="text" class="form-control" name="entryno" id="recipient-name">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Name:</label>
                        <input type="text" class="form-control" name="name" id="recipient-name">
                    </div>
                    <input class="hidden" value="Event Head" name="role">
                    <input class="hidden" value="<?=$eventID?>" name="id">
                    <input class="hidden" value="<?=$entry_no?>" name="commit">
                    <div class="form-group">
                        <label for="message-text" class="form-control-label">Points:</label>
                        <textarea name="points" class="form-control" id="message-text"></textarea>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Add</button>
            </div>
        </div>
        </form>
    </div>
</div>
    <?php }if($showCoordi){?>
<div class="modal fade" id="coordiModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <span class="modal-title" id="exampleModalLabel">New Coordinator</span>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="addpor.php" method="post">
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Entry No:</label>
                        <input type="text" class="form-control" name="entryno" id="recipient-name">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Name:</label>
                        <input type="text" class="form-control" name="name" id="recipient-name">
                    </div>
                    <input class="hidden" value="Coordinator" name="role">
                    <input class="hidden" value="<?=$eventID?>" name="id">
                    <input class="hidden" value="<?=$entry_no?>" name="commit">
                    <div class="form-group">
                        <label for="message-text" class="form-control-label">Points:</label>
                        <textarea name="points" class="form-control" id="message-text"></textarea>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Add</button>
            </div>
        </div>
        </form>
    </div>
</div>
    <?php }if($showAH){?>
<div class="modal fade" id="acheadModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <span class="modal-title" id="exampleModalLabel">New Activity Head</span>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="addpor.php" method="post">
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Entry No:</label>
                        <input type="text" class="form-control" name="entryno" id="recipient-name">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Name:</label>
                        <input type="text" class="form-control" name="name" id="recipient-name">
                    </div>
                    <input class="hidden" value="Activity Head" name="role">
                    <input class="hidden" value="<?=$eventID?>" name="id">
                    <input class="hidden" value="<?=$entry_no?>" name="commit">
                    <div class="form-group">
                        <label for="message-text" class="form-control-label">Points:</label>
                        <textarea name="points" class="form-control" id="message-text"></textarea>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Add</button>
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
</script>