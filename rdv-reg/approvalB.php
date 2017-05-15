<?php
include_once "navbar.php";
if(!($gsec&&$faculty))
    die("<div class=\"uk-container uk-margin-top\"><div class=\"uk-card uk-card-default uk-card-hover uk-card-body\">Not for your eyes!</div></div>");
$q="SELECT entryno,name,assoc,position,budget FROM cv_admins WHERE position='Secretary'";
$r=$con->query($q);
?>
<div class="uk-container uk-margin-top">
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <ul class="uk-card uk-card-default uk-card-hover uk-card-body">
        <ul uk-accordion="multiple: true">
            <?php
            $i=-1;
            $totf = 0;
            while($d=$r->fetch_assoc()){
                $i++;
                $budget = unserialize($d["budget"]);
            ?>
                <li>
                    <h4 class="uk-accordion-title">
                        <?=$d["name"]?>, <?=$d["assoc"]?> <?=$d["position"]?><span id='panel<?=$i?>'  class="uk-align-right uk-label uk-label-<? if($budget[4]!='1') echo "warning";?>">&nbsp</span>
                    </h4>
                    <div class="uk-accordion-content">

                        <?if($budget!=""){?>
                        <?if($budget[5]!=""){?>
                                <div class="uk-label">Your comment</div><span style="font-size: 12px;font-family: 'Roboto Mono',monospace;color: #f0506e;white-space: nowrap;padding: 2px 6px;background: #f8f8f8;"><?=$budget[5]?></span>
                            <?}?>
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
                        <?}?>
                        <hr class="uk-divider-icon">
                            <? if($budget[4]!='1'){?>
                                <button id='approve<?=$i?>' class="uk-button uk-button-primary" onclick="approve('<?=$d["entryno"]."',".$i?>)">Approve</button>
                                <button id='reject<?=$i?>' class="uk-button uk-button-danger" onclick="reject('<?=$d["entryno"]."',".$i?>)">Reject</button>
                            <? }else{?>
                                <button disabled class="uk-button   ">Approved</button>
                            <?}?>
                            <hr class="uk-panel-divider">
                    </div>
                </li>
            <? } ?>
        </ul>
    </div>
    <div class="uk-margin uk-width-2-3 uk-align-center uk-card-default uk-card-hover ">
        <div class="uk-card-body uk-heading-hero uk-text-center">
        <span class="uk-label uk-align-right">total</span>
        ₹ <?=$totf?>
        </div>
    </div>
    <footer style="text-align:center;font-size:2.5vh;padding-top:3vh;padding-bottom:3vh;" class="jumbotron">
        Implemented By BRCA team for IIT Delhi
    </footer>	</div>

<script type="text/javascript">
    function logout() {
        document.cookie = 'login' +
            '=; expires=Thu, 01-Jan-70 00:00:01 GMT;';
        location.href='index.php';
    }

    function reject(id,i){
        UIkit.modal.prompt('Message:', '').then(function(msg) {
            if(msg!=null){
                var http = new XMLHttpRequest();
                var params = "id=" + id + "&msg=" + msg + "&a=0";
                var url = "budgetApprove.php";
                http.open("POST", url, true);
                http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                http.onreadystatechange = function () {//Call a function when the state changes.
                    if (http.readyState == 4 && http.status == 200) {
                        var reg = JSON.parse((http.responseText));
                        UIkit.notification({message:reg.message,pos: 'bottom-left',status:'primary'});
                    }
                };
                http.send(params);
            }
        });
    }
    function approve(id,i){
        var http = new XMLHttpRequest();
        var params = "id=" + id + "&a=1";
        var url = "budgetApprove.php";
        http.open("POST", url, true);
        http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        http.onreadystatechange = function () {//Call a function when the state changes.
            if (http.readyState == 4 && http.status == 200) {
                console.log(http.responseText);
                var reg = JSON.parse((http.responseText));
                if (reg.success) {
                    var button = document.getElementById('approve'+i);
                    var button2 = document.getElementById('reject'+i);
                    var panel = $('#panel'+i);
                    button.disabled=true;
                    button2.disabled=true;
                    button.innerHTML='Approved';
                    panel.removeClass('uk-label-warning');
                }
            }
        };
        http.send(params);
    }


</script>

</body></html>
