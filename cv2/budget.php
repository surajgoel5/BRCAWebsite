<?php
include_once "navbar.php";
$title = "Create your budget!";
$q="SELECT * FROM cv_admins WHERE entryno='".$entry_no."'";
$r=$con->query($q);
$d=$r->fetch_assoc();
if($d["budget"]!=NULL)
{
    $title = "Update your budget!";
}
if(isset($_POST['event'])){
    $budget=serialize($_POST);
    $con->query("UPDATE cv_admins set budget='$budget' WHERE entryno='".$entry_no."'");
    $budget=unserialize($budget);
}
$total = 0;
?>
<style>

    table{
        border-collapse: collapse;
        width:100%;
        /*table-layout: fixed;*/
        border-radius:10px ;
    }
    th{
        text-align: center ;
        font-size: 20px;
        color: #eee;
        padding-top: 10px;
        padding-bottom: 10px;
        background-color: #31B0D5;
    }
    td{
        overflow: hidden;
        vertical-align: middle;
        text-align: center;
        font-size: 20px;
        color: #000;
        border-right: solid 2px rgba(255,255,255,0.1);
        border-bottom: solid 2px rgba(255,255,255,0.1);
    }
    input{
        padding: 5px;
        text-align: center;
        border: 0px;
        font-size: 20px;
        border-radius: 5px;
    }
    .pinput{
        padding: 5px;
        text-align: center;
        border: 0px;
        font-size: 20px;
        border-radius: 5px;
    }
    .desc{
        padding: 5px;
        border: 0px;
        width: 30vw;
    }
    .others{
        padding: 5px;
        border: 0px;
        width: 15vw;
    }
</style>
<div class="container">
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
        <form  action="" method="post">
        <h1><?=$title?></h1>
        <br>
        <table id="myTable">
            <th>Event Name</th>
            <th>Date</th>
            <th>Description of Expense</th>
            <th>Amount(in ₹)</th>
<!--            <th>P/NP</th>-->
            <?php
            if(sizeof($budget["event"])>0){
                for($i = 0;$i<sizeof($budget["event"]);$i++){
                    $total = $total  + $budget["amount"][$i];
                ?>
            <tr>
                <td><input name="event[]" placeholder="Event name here" class="others" type="text" id="txtName0" value="<?=$budget["event"][$i]?>"/></td>
                <td><input name="date[]" placeholder="Date (eg: May 2018)" class="others" type="text" id="txtDate0"  value="<?=$budget["date"][$i]?>"/></td>
                <td><input name="description[]" placeholder="Guitar, Keyboard, Synth" class="desc" type="text" id="txtDesc0"  value="<?=$budget["description"][$i]?>"/></td>
                <td><input name="amount[]" placeholder="(eg: 22000)" class="others" type="text" id="txtAmount0"  value="<?=$budget["amount"][$i]?>"/></td>
            </tr>
            <? }} else{ ?>
            <tr>
                <td><input name="event[]" placeholder="Event name here" class="others" type="text" id="txtName0" /></td>
                <td><input name="date[]" placeholder="Date (eg: May 2018)" class="others" type="text" id="txtDate0" /></td>
                <td><input name="description[]" placeholder="Guitar, Keyboard, Synth" class="desc" type="text" id="txtDesc0" /></td>
                <td><input name="amount[]" placeholder="(eg: 22000)" class="others" type="text" id="txtAmount0" /></td>
            </tr>
            <? } ?>
        </table>
        <br>
        <br>
        <button id="btnAdd" type="button" class="btn btn-primary btn-success" onClick="insertRow()" >+ Add Event</button>
        <button id="btnRem" type="button" class="btn btn-primary btn-success" onClick="deleteRow()" >Remove Event</button>
        <br>
        <br>
        <div class="pinput">Total Budget : ₹ <?=$total?></div>
        <br>
        <br>
        <button  type="submit"  id="btnbudget" class="btn btn-primary btn-success" onClick="budget()" >Submit for Approval</button>
        </form>
    </div>
    <footer style="text-align:center;font-size:2.5vh;padding-top:3vh;padding-bottom:3vh;" class="jumbotron">
        Implemented By BRCA team for IIT Delhi
    </footer>	</div>

<!-- Latest compiled and minified JavaScript -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<script type="text/javascript">
    function logout() {
        document.cookie = 'login' +
            '=; expires=Thu, 01-Jan-70 00:00:01 GMT;';
        location.href='index.php';
    }

    var index = <? if(sizeof($budget["event"])>0) echo sizeof($budget["event"]); else echo 1;?>;
    function insertRow(){
        var table=document.getElementById("myTable");
        var row=table.insertRow(table.rows.length);
        var cell1=row.insertCell(0);
        var t1=document.createElement("input");
        t1.id = "txtName"+index;
        t1.className="others";
        t1.name="event[]";
        cell1.appendChild(t1);
        var cell2=row.insertCell(1);
        var t2=document.createElement("input");
        t2.id = "txtDate"+index;
        t2.className="others";
        t2.name="date[]";
        cell2.appendChild(t2);
        var cell3=row.insertCell(2);
        var t3=document.createElement("input");
        t3.id = "txtDesc"+index;
        t3.className="desc";
        t3.name="description[]";
        cell3.appendChild(t3);
        var cell4=row.insertCell(3);
        var t4=document.createElement("input");
        t4.id = "txtAmount"+index;
        t4.className="others";
        t4.name="amount[]";
        cell4.appendChild(t4);
//        var cell5=row.insertCell(4);
//        var t5=document.createElement("input");
//        t5.id = "txtPnp"+index;
//        cell5.appendChild(t5);
        index++;
    }

    function deleteRow(){
        if(index<2)return;
        document.getElementById("myTable").deleteRow(index);
        index--;
    }


</script>

</body></html>
