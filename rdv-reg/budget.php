<?php
include_once "navbar.php";
$title = "Create your budget!";
$q="SELECT * FROM cv_admins WHERE entryno='".$entry_no."'";
$r=$con->query($q);
$d=$r->fetch_assoc();
if($d["budget"]!=NULL)
{
    $title = "Update your budget!";
    $budget = unserialize($d["budget"]);
}
if(isset($_POST['budget'])&&!($budget[4]=='1')){
    $budget=serialize($_POST['budget']);
    $con->query("UPDATE cv_admins set budget='$budget' WHERE entryno='".$entry_no."'");
    $budget=unserialize($budget);
}
$total = 0;
for($i=0;$i<sizeof($budget[0]);$i++)
    for($j=0;$j<sizeof($budget[2][$i]);$j++)
        $total += $budget[3][$i][$j];
for($j=0;$j<sizeof($budget[6]);$j++)
    $total += $budget[7][$j];
if($budget[4]=='1'){
    $label = '';
    $labelin = 'Approved';
    $approved = 'disabled';
}
else{
    $label = '-warning';
    $approved = '';
    $labelin = 'Not Approved';
}
?>
<div class="uk-container uk-margin-medium">
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="uk-card uk-card-hover uk-card-default">
        <form id="form" action="" method="post">

        <div class="uk-card-header">
            <div class="uk-h3"><?=$title?></div>
        </div>
        <div class="uk-card-badge">
            <span class="uk-label uk-label<?=$label?>">
            <?=$labelin?>
            </span>
        </div>
            <div class="uk-card-body">
                <div id="card">
                    <?if($budget[5]!=""){?>
                        <span class="uk-label uk-label-danger">Faculty's Comment</span>
                        <span style="font-size: 12px;font-family: 'Roboto Mono',monospace;color: #f0506e;white-space: nowrap;padding: 2px 6px;background: #f8f8f8;"><?=$budget[5]?></span>
                    <?}?>
                <?
                for($i=0;$i<sizeof($budget[0]);$i++){
                ?>
                <div id="event<?=$i?>" class="uk-grid-small uk-margin" uk-grid>
                    <div class="uk-width-1-2@s uk-inline">
                        <span class="uk-form-icon uk-margin-left"><?=($i+1)?>) </span>
                        <input <?=$approved?> class="uk-input" type="text" name="budget[0][]" placeholder="Event Name" value="<?=$budget[0][$i]?>">
                    </div>
                    <div class="uk-width-1-4@s">
                        <input <?=$approved?> class="uk-input date" type="text" name="budget[1][]" placeholder="Date" value="<?=$budget[1][$i]?>">
                    </div>
                    <div class="uk-width-1-4@s">
                        <button <?=$approved?> type="button" class="uk-button uk-button-secondary " onclick="insertItem(<?=$i?>)">+ Item</button>
                        <button <?=$approved?> type="button" class="uk-button uk-margin-left uk-button-danger" onclick="deleteItem(<?=$i?>)">- Item</button>
                    </div>
                    <div id="item<?=$i?>"><?
                        for($j=0;$j<sizeof($budget[2][$i]);$j++){
                        ?>
                        <div id="item<?=$i?>_<?=$j?>" class="uk-margin">
                            <div class="uk-inline">
                                <span class="uk-form-icon">▣</span>
                                <input <?=$approved?> class="uk-input" placeholder="Name" value="<?=$budget[2][$i][$j]?>" name="budget[2][<?=$i?>][]" type="text">
                            </div>
                            <div class="uk-inline uk-margin-left">
                                <span class="uk-form-icon" uk-icon="">₹</span>
                                <input <?=$approved?> class="uk-input" placeholder="Amount" type="number" value="<?=$budget[3][$i][$j]?>" name="budget[3][<?=$i?>][]" type="text">
                            </div>
                        </div>
                        <?}?>
                    </div>
                </div>
                <?}?>
            </div>
        <button <?=$approved?> id="btnAdd" type="button" class="uk-margin uk-button uk-button-default" onClick="insertEvent()" >+ Event</button>
        <button <?=$approved?> id="btnRem" type="button" class="uk-margin uk-button uk-button-danger" onClick="deleteEvent()" >Remove</button>
        <hr class="uk-divider-icon">
            <div id="card2">
                <? for($i=0;$i<sizeof($budget[6]);$i++){
                ?>
                <div id="inv<?=$i?>" class="uk-grid-small uk-margin" uk-grid>
                    <div class="uk-inline uk-width-1-3@s">
                        <span class="uk-form-icon uk-margin-left"><?=$i+1?>) </span>
                        <input <?=$approved?> class="uk-input" name="budget[6][]" value="<?=$budget[6][$i]?>" type="text">
                    </div>
                    <div class="uk-inline uk-width-1-3@s uk-margin-left">
                        <span class="uk-form-icon uk-margin-left" uk-icon="">₹</span>
                        <input <?=$approved?> class="uk-input" type="number" value="<?=$budget[7][$i]?>" name="budget[7][]" type="text">
                    </div>
                </div>
                <?}?>
            </div>
        <button <?=$approved?> type="button" class="uk-margin uk-button uk-button-default" onClick="insertInvItem()" > + Inventory Item</button>
        <button <?=$approved?> id="btnRem" type="button" class="uk-margin uk-button uk-button-danger" onClick="deleteInvItem()" >Remove</button>
        <hr class="uk-divider-icon">
        <h1 class="uk-heading-line uk-text-center"><span>Total Budget : ₹ <?=$total?></span></h1>
        <div class="uk-card-footer">
        <button <?=$approved?>  type="button"  id="btnbudget" class="uk-button uk-button-primary" onClick="budget()" >Submit for Approval</button>
            </div>
        </form>
    </div>
    <footer style="text-align:center;font-size:2.5vh;padding-top:3vh;padding-bottom:3vh;" class="jumbotron">
        Implemented By BRCA team for IIT Delhi
    </footer>
</div>

<!-- Latest compiled and minified JavaScript -->
<link rel="stylesheet" href="css/jquery-ui.css">
<script src="js/jquery-ui.js"></script>

<script type="text/javascript">
    function logout() {
        document.cookie = 'login' +
            '=; expires=Thu, 01-Jan-70 00:00:01 GMT;';
        location.href='index.php';
    }
    $( function() {
        $( ".date" ).datepicker({  dateFormat: "yy-mm-dd"});
    } );
    function item(id,id2){
        i = '<div id="item'+id+'_'+id2+'" class="uk-margin">'+
        '<div class="uk-inline">'+
        '<span class="uk-form-icon">▣</span>'+
        '<input <?=$approved?> class="uk-input" placeholder="Item" name="budget[2]['+id+'][]" type="text">'+
        '</div>'+
        '<div class="uk-inline  uk-margin-left">'+
        '<span class="uk-form-icon" uk-icon="">₹</span>'+
        '<input <?=$approved?> class="uk-input" placeholder="Cost" type="number" name="budget[3]['+id+'][]" type="text">'+
        '</div>'+
        '</div>';
        return i;
    }
    function event(id){
        e = '<div id="event'+id+'" class="uk-grid-small" uk-grid>'+
            '<div class="uk-width-1-2@s uk-inline">'+
            '<span class="uk-form-icon uk-margin-left">'+(id+1)+') </span>'+
            '<input <?=$approved?> class="uk-input" type="text" name="budget[0][]" placeholder="Event Name">'+
            '</div>'+
            '<div class="uk-width-1-4@s">'+
            '<input <?=$approved?> class="uk-input date" type="text" name="budget[1][]" placeholder="Date">'+
            '</div>'+
            '<div class="uk-width-1-4@s">'+
            '<button <?=$approved?> type="button" class="uk-button uk-button-secondary " onclick="insertItem('+id+')">+ Item</button>'+
            '<button <?=$approved?> type="button" class="uk-button uk-margin-left uk-button-danger" onclick="deleteItem('+id+')">- Item</button>'+
            '</div>'+
            '<div id="item'+id+'">'+ item(id,0) +
            '</div>'+
            '</div>';
        return e;
    }
    function invItem(id){
        e = '<div id="event'+id+'" class="uk-grid-small" uk-grid>'+
            '<div class="uk-inline uk-width-1-3@s">'+
            '<span class="uk-form-icon uk-margin-left">'+(id+1)+') </span>'+
            '<input <?=$approved?> class="uk-input" placeholder="Inventory Item" name="budget[6][]" type="text">'+
            '</div>'+
            '<div class="uk-inline uk-width-1-3@s uk-margin-left">'+
            '<span class="uk-form-icon uk-margin-left" uk-icon="">₹</span>'+
            '<input <?=$approved?> class="uk-input" placeholder="Cost"type="number" name="budget[7][]" type="text">'+
            '</div>'+
            '</div>'+
        '</div>';
        return e;
    }

    function insertEvent(){
        id = card.childElementCount;
        $('#card').append($.parseHTML(event(id)));
        $( function() {
            $( ".date" ).datepicker({  dateFormat: "yy-mm-dd"});
        } );

    }

    function insertInvItem(){
        id = card2.childElementCount;
        $('#card2').append($.parseHTML(invItem(id)));
    }

    function deleteInvItem(){
        id = card2.childElementCount;
        if(id<1) return;
        $('#inv'+(id-1)).remove();
    }

    function deleteEvent(){
        id = card.childElementCount;
        if(id<1) return;
        $('#event'+(id-1)).remove();
    }

    function insertItem(id){
        id2 = document.getElementById('item'+id).childElementCount;
        $('#item'+id).append($.parseHTML(item(id,id2)));
    }

    function deleteItem(id){
        id2 = document.getElementById('item'+id).childElementCount;
        if(id2<2) return;
        $('#item'+id+"_"+(id2-1)).remove();
    }

    function budget(){
        UIkit.modal.confirm('If the budget is approved you will be <b>unable to edit</b> it again!<br> Any comment by faculty will be deleted!<br><b>Are you Sure?</b>').then(function() {
            form.submit();
        }, function () {
        });
    }


</script>

</body></html>
