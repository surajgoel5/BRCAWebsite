<?php
include_once "navbar.php";
$title = "Create a new event!";
$budget = unserialize($post[2]);
$d["name"]="";
if(isset($_GET["id"]))
{
    $q="SELECT * FROM cv_events WHERE id='".$_GET["id"]."'";
    $r=$con->query($q);
    $d=$r->fetch_assoc();
    $ex = unserialize($d["extras"]);
    $title = "Update an event!";
    $date1 = date('Y-m-d', time());
    $date2 = $d["date"];
    $postTime = !(($date1)<($date2));
    if($d["approved"]=="1"){
?>
    <div class="uk-section uk-section-muted">
    <div class="uk-container uk-container-small">
    <div class="uk-card uk-card-body uk-card-hover uk-card-default">
        <form>
        Description
        <textarea id ="desc" class="uk-textarea uk-margin" rows="3" placeholder="Description"><?=$d["description"]?></textarea>
        <br>
        <? if($postTime){?>
            No of Teams:
            <input type="text" id="teams" class="uk-input uk-margin" placeholder="Number of teams" value="<?=$d["noteams"]?>">
            <br>
            Audience:
            <input type="text" id="audience" class="uk-input uk-margin" placeholder="Audience Size" value="<?=$d["audience"]?>">
        <?}else{?>
            <input type="hidden" id="audience" value="<?=$d["audience"]?>">
            <input type="hidden" id="teams" value="<?=$d["noteams"]?>">
        <?}?>
        <div class="uk-button uk-button-primary"  onclick="create()">Submit</div>
        </form>
        </div>
        </div>
        </div>
<?}}if($d["approved"]=="1"){}else{?>
<link rel="stylesheet" href="css/jquery-ui.css">
<script src="js/jquery-ui.js"></script>
<script>
    $( function() {
        $( "#date" ).datepicker({
            dateFormat: "yy-mm-dd",
            minDate: 1
        });
    } );
</script>
<div class="uk-width-* uk-grid-margin-large uk-grid uk-grid-stack" uk-grid=""">
    <div class="uk-width-2-3">
        <div class="uk-margin-large-left uk-card uk-card-hover uk-card-default">
        <div class="uk-card-header">
            <legend class="uk-legend"><?=$title?></legend>
        </div>
        <!-- Main jumbotron for a primary marketing message or call to action -->
            <div class="uk-card-body">
                <form class="uk-form">
                    <fieldset class="uk-fieldset">
                        <div class="uk-margin">
                            <input type="text" id="name" class="uk-input" value="<?=$d["name"]?>" placeholder="Event name">
                        </div>
                        <div class="uk-margin">
                            <textarea id ="desc" class="uk-textarea" rows="3" placeholder="Description"><?=$d["description"]?></textarea>
                        </div>

                        <div class="uk-margin">
                        <select class="uk-select" id="level">
                            <option <?if($d["level"]=="LEVEL") echo "selected"?>>LEVEL</option>
                            <option <?if($d["level"]=="Informal") echo "selected"?>>Informal</option>
                            <option <?if($d["level"]=="Intra College") echo "selected"?>>Intra College</option>
                            <?if($gsec){?><option <?if($d["level"]=="Inter College") echo "selected"?>>Inter College</option>
                            <option <?if($d["level"]=="Festival") echo "selected"?>>Festival</option><?}?>
                        </select>
                        </div>
                        <div class="uk-margin">
                            <input type="text" id="venue" class="uk-input" placeholder="Venue" value="<?=$d["venue"]?>" >
                        </div>
                        <div class="uk-margin">
                            <input placeholder="Date" value="<?=$d["date"]?>" id="date" class="uk-input" type='text' data-uk-datepicker="{format:'DD.MM.YYYY'}" />
                        </div>
                    </fieldset>
                    <hr class="uk-divider-icon">
                <div class="uk-margin uk-grid-small uk-child-width-auto" uk-grid>
                    <span class="uk-h5">
                        Purchase Committee
                    </span>
                    <label><input id="radio1" <?if(strlen($d["coma"])==0) echo "checked"?> class="uk-radio" type="radio" name="radio" checked> not required</label>
                    <label><input id="radio2" <?if(strlen($d["coma"])>0) echo "checked"?> class="uk-radio" type="radio" name="radio"> required</label>
                </div>
                <div id="purchase" style="<?if(strlen($d["coma"])==0) echo "display: none"?>">
                <input type="text" id="com_amount"  value="<?=$d["coma"]?>" class="uk-input uk-margin-small" placeholder="Amount"/>
                <br>
                <input type="text" id="com_desc"  value="<?=$d["comd"]?>" class="uk-input" placeholder="Committee description"/>
                <br>
                </div>
                <hr class="uk-divider-icon">
                <span class="uk-h5">
                    Non purchase committee expenses
                </span>
                <table id="myTable" class="uk-table uk-table-hover uk-table-middle">
                    <thead>
                    <tr>
                    <th>Item</th>
                    <th>Expenses(in ₹)</th>
                    </tr>
                    </thead>
                    <tr>
                        <td><input class="uk-input" name="item[]" value="<?=$ex["item"][0]?>" type="text" id="txtDesc0"  /></td>
                        <td><input class="uk-input" name="expenses[]"  value="<?=$ex["expense"][0]?>" type="text" id="txtAmount0" /></td>
                    </tr>
                    <?
                    for($i=1;$i<sizeof($ex["item"]);$i++)
                    {
                    ?>
                    <tr>
                        <td><input class="uk-input" name="item[]"  value="<?=$ex["item"][$i]?>"  type="text" id="txtDesc0"  /></td>
                        <td><input class="uk-input" name="expenses[]" value="<?=$ex["expense"][$i]?>"  type="text" id="txtAmount0" /></td>
                    </tr>
                    <?}?>
                    <tr>
                    <td><button id="btnAdd" type="button" class="uk-button uk-button-default" onClick="insertRow()" >+ Add Item</button></td>
                    <td><button id="btnRem" type="button" class="uk-button uk-button-danger" onClick="deleteRow()" >Remove Item</button></td>
                    </tr>
                </table>
                </div>
                    <div class="uk-button uk-button-primary uk-button-large uk-width-1-1"  onclick="create()">Submit</div>
			</form>
            </div>
        </div>
    <div class="uk-width-1-3">
        <div class="uk-card uk-card-hover uk-card-default uk-card-body">
            <table class="uk-table uk-table-hover">
                <thead>
                <tr>
                    <td>Name</td>
                    <td>Expense</td>
                </tr>
                </thead>
                <? $tots=0;
                for($ii=0;$ii<sizeof($budget[0]);$ii++){
                    $toti=0;
                    for($j=0;$j<sizeof($budget[2][$ii]);$j++){
                        $toti+=$budget[3][$ii][$j];
                        echo "<tr><td>".$budget[2][$ii][$j]."</td><td>".$budget[3][$ii][$j]."</td></tr>";
                    }
                    echo "<tr><td><span class='uk-h3'>".$budget[0][$ii]."</span></td><td><span class='uk-h3'>₹ ".$toti."</b></td></tr>";
                    $tots+=$toti;
                }
                for($ii=0;$ii<sizeof($budget[6]);$ii++){
                    echo "<tr><td><span class='uk-h4'>".$budget[6][$ii]."</span></td><td><span class='uk-h4'>₹ ".$budget[7][$ii]."</b></td></tr>";
                    $tots+=$budget[7][$ii];
                }
                $totf += $tots;
                ?>
            </table>
            <hr class="uk-divider-icon">
            <h1 class="uk-heading-line uk-text-center"><span>Total Budget : ₹ <?=$tots?></span></h1>

        </div>
    </div>
</div>

    <footer style="text-align:center;font-size:2.5vh;padding-top:3vh;padding-bottom:3vh;" class="jumbotron">
	Implemented By BRCA team for IIT Delhi
    </footer>
    </div>
<?}?>
	<!-- Latest compiled and minified JavaScript -->

	<script type="text/javascript">    
        var index = <?if(sizeof($ex["item"])>0) echo sizeof($ex["item"]); else echo 1;?>;
        function insertRow() {
            var table = document.getElementById("myTable");
            var row = table.insertRow(table.rows.length - 1);
            var cell1 = row.insertCell(0);
            var t1 = document.createElement("input");
            t1.className = "uk-input";
            t1.name = "item[]";
            cell1.appendChild(t1);
            var cell2 = row.insertCell(1);
            var t2 = document.createElement("input");
            t2.className = "uk-input";
            t2.name = "expenses[]";
            cell2.appendChild(t2);
            index++;
        }

        function deleteRow() {
            if (index < 2)return;
            document.getElementById("myTable").deleteRow(index);
            index--;
        }
    $(function(){
        $('#radio1').click(function(){
            if ($(this).is(':checked'))
            {
                $('#purchase').hide();
            }
        });
        $('#radio2').click(function(){
            if ($(this).is(':checked'))
            {
                $('#purchase').show();
            }
        });
    });
	function create() {
    var level  = $('#level').val();
    if(level=="LEVEL")alert("Please select a level for the event");
    else {
        var http = new XMLHttpRequest();
        var name = $('#name').val();
        var desc = $('textarea#desc').val();
        var venue = $('#venue').val();
        var teams = $('#teams').val();
        var audience = $('#audience').val();
        var date = $('#date').val();
        if($('#radio2').prop("checked")){
            var coma = $('#com_amount').val();
            var comd = $('#com_desc').val();
        }else{
            var coma = "";
            var comd = "";
            var comd = "";
        }
        var url = "createeventback.php";
        var entryno = "<?php echo $entry_no ?>";
        var id="<?=$_GET["id"];?>";
        var params = "entryno=" + entryno + "&name=" + name + "&desc=" + desc + "&level=" + level + "&venue=" + venue + "&teams=" + teams + "&audience=" + audience + "&date=" + date + "&id=" + id + "&coma=" + coma + "&comd=" + comd;
        var table=document.getElementById("myTable");
        if(table)
        for(i=1;i<table.rows.length-1;i++)
            params+="&item[]="+table.rows[i].cells.item(0).firstChild.value+"&expense[]="+table.rows[i].cells.item(1).firstChild.value;
        http.open("POST", url, true);
        http.setRequestHeader('Access-Control-Allow-Headers', '*');
        http.setRequestHeader("Access-Control-Allow-Origin", "*");
        http.setRequestHeader("Access-Control-Allow-Credentials", "true");
        http.setRequestHeader("Access-Control-Allow-Methods", "GET,HEAD,OPTIONS,POST,PUT");
        http.setRequestHeader("Access-Control-Allow-Headers", "Access-Control-Allow-Headers, Origin,Accept, X-Requested-With, Content-Type, Access-Control-Request-Method, Access-Control-Request-Headers");//Send the proper header information along with the request
        http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        http.onreadystatechange = function () {//Call a function when the state changes.
            if (http.readyState == 4 && http.status == 200) {
                console.log(http.responseText);
                var reg = JSON.parse((http.responseText));
                if (reg.success) {
                    alert(reg.message);
                }
            }
        };
        http.send(params);
    }
	}

    </script>

</body></html>
