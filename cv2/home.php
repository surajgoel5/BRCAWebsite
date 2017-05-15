<?php
//session_start();
include_once "navbar.php";
$entry=$entry_no;
if($_GET["en"]) $entry=$_GET["en"];
$q="SELECT * FROM cv_events where createdby='$entry' order by date";
$r=$con->query($q);
$q="SELECT * FROM cv_participants where entryno='$entry'";
$r2=$con->query($q);
$q2="SELECT * FROM cv_por where entryno='$entry'";
$r5=$con->query($q2);

?>


    <div class="container">
        <div class="pull-right">
            <b>
        <span style="font-size: large;color: #d9534f" >◉</span> NOT APPROVED
        <span style="font-size: large;color:#5cb85c;">◉</span> APPROVED
        <span style="font-size: large;color:#f0ad4e">◉</span> COMPLETED</b>
        </div>
        <br>
        <br>
        <? if($secy){?>
        <div class="row">
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                <?php
                $i=0;
                while($d=$r->fetch_assoc()){
                    $i++;
                    $date1 = date('Y/m/d', time());
                    $tempArr=explode('/', $d["date"]);
                    $date2 = date("Y/m/d", mktime(0, 0, 0, $tempArr[1], $tempArr[0], $tempArr[2]));
                    $postEvent = !(($date1)<($date2));
                    ?>
                    <div id="panel<?=$i?>" class="panel <? if($postEvent) echo "panel-warning";else if($d["approved"]=='1') echo "panel-success";else echo "panel-danger";?>">
                        <div class="panel-heading" role="tab" id="heading<?=$i?>">
                            <h5 class="panel-title" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?=$i?>" aria-expanded="false" aria-controls="collapse<?=$i?>">
                                <?=$d["name"]?>
                                <span class="pull-right"><?=$d["date"]?></span><br>
                            </h5>
                        </div>
                        <div id="collapse<?=$i?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?=$i?>">
                            <div class="panel-body">
                                <?=$d["description"]?>
                                <br>
                            </div>
                            <div class="panel-body">
                                <span><?=$d["venue"]?></span>
                                <button class="btn btn-default right" onclick="location.href='events.php?id=<?=$d["id"]?>'">More Details</button>
                            </div>
                        </div>
                    </div>
                <?}?>
            </div>
        </div>
        <?php }
        if($r2->num_rows!=0){
            ?>
        <div class="jumbotron row">
            <h2>Participation:</h2>
            <table class="table table-responsive table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Event Name</th>
                    <th>Position</th>
                    <th>Level</th>
                    <th>No of teams</th>
                    <th>Audience size</th>

                </tr>
                </thead>
                <tbody>
                <?php
                $i=0;
                while($e=$r2->fetch_assoc()){
                    $i++;
                    ?>
                    <tr>
                        <td>
                            <?=$i?>
                        </td>
                        <td>
                            <?php
                            $eee="eventID";
                            $q="SELECT * FROM cv_events where id='$e[$eee]'";
                            $r3=$con->query($q);
                            $ee=$r3->fetch_assoc();
                            echo $ee["name"];
                            echo '<td>'.$e["position"].'</td>';
                            echo '<td>'.$ee["level"].'</td>';
                            echo '<td>'.$ee["noteams"].'</td>';
                            echo '<td>'.$ee["audience"].'</td>';
                            ?>
                        </td>
                    </tr>
                    <?php if(!empty($e["points"])){?>
                        <tr>
                            <td></td>
                            <td  colspan="5" style="width:100%"><?=nl2br($e["points"])?></td>
                        </tr>
                    <?}?>
                <?}?>
                </tbody>
            </table>
        </div>
        <?}if($r5->num_rows!=0){?>
        <div class="jumbotron row">
            <h2>Position of Responsibility:</h2>
            <table class="table table-responsive table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Event Name</th>
                    <th>Role</th>
                    <th>Level</th>
                <th>No of teams</th>
                    <th>Audience size</th>

                </tr>
                </thead>
                <tbody>
                <?
                $i=0;
                while($e=$r5->fetch_assoc()){
                    $i++;
                    ?>
                    <tr>
                        <td>
                            <?=$i?>
                        </td>
                        <td>
                            <?php
                            $eee="eventID";
                            $q="SELECT * FROM cv_events where id='$e[$eee]'";
                            $r3=$con->query($q);
                            $ee=$r3->fetch_assoc();
                            echo '<a href="events.php?id='.$e[$eee].'">'.$ee["name"].'</a>';
                            echo '<td>'.$e["role"].'</td>';
                            echo '<td>'.$ee["level"].'</td>';
                            echo '<td>'.$ee["noteams"].'</td>';
                            echo '<td>'.$ee["audience"].'</td>';
                            ?>
                        </td>
                    </tr>
                    <?php if(!empty($e["points"])){?>
                        <tr>
                            <td></td>
                            <td  colspan="5" style="width:100%"><?=nl2br($e["points"])?></td>
                        </tr>
                    <?}?>
                <?}?>
                </tbody>
            </table>
        </div>
        <?
        }?>
<footer style="text-align:center;font-size:2.5vh;padding-top:2vh;padding-bottom:2vh;" class="jumbotron">
        Implemented by BRCA for IIT Delhi
    </footer>
</div>
<!-- Latest compiled and minified JavaScript -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<script>$(document).ready(function(){
            $(".add-more").click(function(e) {
                e.preventDefault();
                var newIn = '<div class="input-group" style="margin-bottom: 5px">' +
                    '<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>' +
                    '<input type="text" class="form-control"  placeholder="Entry Number"/>' +
                    '<span class="input-group-addon" style="padding:0"><span class="btn btn-danger remove-me" onclick="this.parentElement.parentElement.remove();">-</span></span>' +
                    '</div>';
                var newInput = $(newIn);
                if(this.parentElement.childElementCount<5)
                    $(this).before(newInput);
            });
        $(".submit").click(function(e) {
            e.preventDefault();
            var eventID = $(this).attr("id").split("-")[1];
            var row = this.parentElement;

            var http = new XMLHttpRequest();
            var teams = $('#teams').val();
            var audience = $('#audience').val();
            var url = "addPart.php";
            var entryno = "<?php echo $entry_no ?>";
            var params = "entryno=" + entryno + "&id=" + eventID;
            for(i=0;i<3;i++){
                if(i<this.parentElement.childElementCount-2)
                    params += "&part" +(i+1) + "=" + row.children[i].children[1].value;
                else
                    params += "&part" +(i+1) + "=";
            };
            http.open("POST", url, true);
            http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            http.onreadystatechange = function () {//Call a function when the state changes.
                if (http.readyState == 4 && http.status == 200) {
//                    var reg = JSON.parse((http.responseText));
                    console.log(http.responseText);
//                    if (reg.success) {
//                        alert(reg.message);
//                    }
                }
            };
            http.send(params);
        });
        });
</script>
<script>
    function logout() {
        document.cookie = 'login' +
            '=; expires=Thu, 01-Jan-70 00:00:01 GMT;';
        location.href='index.php';
    }
    function openInNewTab(url) {
        startLoad();
//        var win = window.open(url, '_blank');
//        win.focus();
    }
    function startLoad(){
        document.getElementById('loading').style.display="block";
        setTimeout(endLoad,5000);
    }
    function redir(){
        document.getElementById('redir').style.display="block";

        setTimeout(function () {$('#time').text(4);},1000);
        setTimeout(function () {$('#time').text(3);},2000);
        setTimeout(function () {$('#time').text(2);},3000);
        setTimeout(function () {$('#time').text(1);},4000);
        setTimeout(logout,5000);
    }
    function endLoad(){
        document.getElementById('loading').style.display="none";
    }
    $(document).ready(function() {
        {
    var http = new XMLHttpRequest();
    var url = "passes/<?php echo $catT;?>check.php";
    var params = "kerberos=<?php echo $kerberos?>&token=<?php echo md5($kerberos.$secret_word)?>";
    http.open("POST", url, true);
    http.setRequestHeader('Access-Control-Allow-Headers', '*');
    http.setRequestHeader("Access-Control-Allow-Origin", "*");
    http.setRequestHeader("Access-Control-Allow-Credentials", "true");
    http.setRequestHeader("Access-Control-Allow-Methods", "GET,HEAD,OPTIONS,POST,PUT");
    http.setRequestHeader("Access-Control-Allow-Headers", "Access-Control-Allow-Headers, Origin,Accept, X-Requested-With, Content-Type, Access-Control-Request-Method, Access-Control-Request-Headers");//Send the proper header information along with the request
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.onreadystatechange = function() {//Call a function when the state changes.
        if(http.readyState == 4 && http.status == 0) {
            alert('You need a working internet to user this portal. Please check your internet connection and try again later.');
            logout();
        }
        if(http.readyState == 4 && http.status == 200) {
            var reg = JSON.parse(http.responseText);
            console.log(reg);
            var ug=<? if($ug) echo "true"; else echo "false";?>;
            if(reg.blitz.reg) {
                document.getElementById('field').style.display="none";
                document.getElementById('field-reg').style.display="block";
                document.getElementById('field-over').style.display="none";
            }
            else{
            	document.getElementById('field').style.display="block";
            }

            if(reg.kaleidoscope.reg) {
                document.getElementById('fieldb').style.display="none";
                document.getElementById('fieldb-reg').style.display="block";
                document.getElementById('fieldb-over').style.display="none";
            }
            else{
            	document.getElementById('fieldb').style.display="block";
            }

            if(reg.spectrum.reg) {
                document.getElementById('fieldc').style.display="none";
                document.getElementById('fieldc-reg').style.display="block";
                document.getElementById('fieldc-over').style.display="none";
            }
            else{
            	document.getElementById('fieldc').style.display="block";
            }

            if(reg.dhoom.reg) {
                document.getElementById('fieldd').style.display="none";
                document.getElementById('fieldd-reg').style.display="block";
                document.getElementById('fieldd-over').style.display="none";
            }
            else{
            	document.getElementById('fieldd').style.display="block";
            }
            if(reg.javed.reg) {
                document.getElementById('fielda').style.display="none";
                document.getElementById('fielda-reg').style.display="block";
                document.getElementById('fielda-over').style.display="none";
            }
            else{
            	document.getElementById('fielda').style.display="block";
            }
            if(reg.blitz.num>=reg.blitz.max&&!reg.blitz.reg&&!ug){
                document.getElementById('field').style.display="none";
                document.getElementById('field-over').style.display="block";
            }
            if(reg.kaleidoscope.num>=reg.kaleidoscope.max&&!reg.kaleidoscope.reg&&!ug){
                document.getElementById('fieldb').style.display="none";
                document.getElementById('fieldb-over').style.display="block";
            }
            if(reg.spectrum.num>=reg.spectrum.max&&!reg.spectrum.reg&&!ug){
                document.getElementById('fieldc').style.display="none";
                document.getElementById('fieldc-over').style.display="block";
            }
            if(reg.dhoom.num>=reg.dhoom.max&&!reg.dhoom.reg&&!ug){
                document.getElementById('fieldd').style.display="none";
                document.getElementById('fieldd-over').style.display="block";
            }
            if(reg.javed.num>=reg.javed.max&&!reg.javed.reg&&!ug){
                document.getElementById('fielda').style.display="none";
                document.getElementById('fielda-over').style.display="block";
            }
//            if(reg.javed.max==0&&reg.spectrum.max==0&&reg.blitz.max==0&&reg.dhoom.max==0&&reg.kaleidoscope.max==0)
//                redir();

        }
    };
    http.send(params);
}


        //
    });

</script>
</body></html>
