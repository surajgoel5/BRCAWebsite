<?php
include_once "navbar.php";
$title = "Create a new event!";
if(isset($_GET["id"]))
{
    $q="SELECT * FROM cv_events WHERE id='".$_GET["id"]."'";
    $r=$con->query($q);
    $d=$r->fetch_assoc();
    $title = "Update an event!";
    $date1 = date('Y/m/d', time());
    $tempArr=explode('/', $d["date"]);
    $date2 = date("Y/m/d", mktime(0, 0, 0, $tempArr[1], $tempArr[0], $tempArr[2]));
    $postTime = !(($date1)<($date2));
?>
<div class="uk-section uk-section-muted">
    <div class="uk-container uk-container-small">
        <form>
        Description:
        <textarea id ="desc" class="form-control" rows="3" placeholder="Description"><?=$d["description"]?></textarea>
        <br>
        <? if($postTime){?>
            No of Teams:
            <input type="text" id="teams" class="form-control" placeholder="Number of teams" value="<?=$d["noteams"]?>">
            <br>
            Audience:
            <input type="text" id="audience" class="form-control" placeholder="Audience Size" value="<?=$d["audience"]?>">
            <br>
        <?}else{?>
            <input type="hidden" id="audience" value="<?=$d["audience"]?>">
            <input type="hidden" id="teams" value="<?=$d["noteams"]?>">
        <?}?>
        <div class="btn btn-primary btn-success"  onclick="create()">Submit</div>
        </form>
<?}else{?>
<div class="uk-section uk-section-muted">
    <div class="uk-container uk-container-small">
        <div class="uk-card uk-card-hover uk-card-default ">
        <div class="uk-card-header">
            <legend class="uk-legend"><?=$title?></legend>
        </div>
        <!-- Main jumbotron for a primary marketing message or call to action -->
            <div class="uk-card-body">
                <form class="uk-form">
                    <fieldset class="uk-fieldset">
                        <div class="uk-margin">
                            <input type="text" id="name" class="uk-input" placeholder="Event name" value="<?=$d["name"]?>">
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
                            <input placeholder="Date" id="date" class="uk-input" type='text' data-uk-datepicker="{format:'DD.MM.YYYY'}" />
                        </div>
                    </fieldset>
                    <hr class="uk-divider-icon">
                <div class="uk-margin uk-grid-small uk-child-width-auto" uk-grid>
                    <span class="uk-h5">
                        Purchase Committee
                    </span>
                    <label><input id="radio1" class="uk-radio" type="radio" name="radio" checked> not required</label>
                    <label><input id="radio2" class="uk-radio" type="radio" name="radio"> required</label>
                </div>
                <div id="purchase" style="display: none">
                <input type="text" id="com_amount" class="uk-input uk-margin-small" placeholder="Amount"/>
                <br>
                <input type="text" id="com_desc" class="uk-input" placeholder="Committee description"/>
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
                        <td><input class="uk-input" name="item[]"  type="text" id="txtDesc0"  /></td>
                        <td><input class="uk-input" name="expenses[]" type="text" id="txtAmount0" /></td>
                    </tr>
                    <tr>
                    <td><button id="btnAdd" type="button" class="uk-button uk-button-default" onClick="insertRow()" >+ Add Item</button></td>
                    <td><button id="btnRem" type="button" class="uk-button uk-button-danger" onClick="deleteRow()" >Remove Item</button></td>
                    </tr>
                </table>
                </div>
                    <div class="uk-button uk-button-primary uk-button-large uk-width-1-1"  onclick="create()">Submit</div>
			</form>
            <?}?>
            </div>
        </div>
    </div>

    <br>
    <footer style="text-align:center;font-size:2.5vh;padding-top:3vh;padding-bottom:3vh;" class="jumbotron">
	Implemented By BRCA team for IIT Delhi
    </footer>
    </div>

	<!-- Latest compiled and minified JavaScript -->
	<script src="js/jquery.min.js"></script>

	<script type="text/javascript">    
        var index = 1;
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
        var coma = $('#com_amount').val();
        var comd = $('#com_desc').val();
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
