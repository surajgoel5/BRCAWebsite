<?php
include_once "navbar.php";
$title = "Create your budget!";
$club = $post[1];
$q="SELECT * FROM cv_events WHERE club='".$club."'";
$r=$con->query($q);
?>
<div class="container">
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
            <?php
            $i=0;
            while($d=$r->fetch_assoc()){
                $i++;
                $ca = unserialize($d["extras"]);
            ?>
                <div id="panel<?=$i?>" class="panel <? if($d["approved"]=='1') echo "panel-success";else echo "panel-default";?>">
                    <div class="panel-heading" role="tab" id="heading<?=$i?>">
                        <h4 class="panel-title" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?=$i?>" aria-expanded="false" aria-controls="collapse<?=$i?>">
                            <?=$d["name"]?>
                        </h4>
                    </div>
                    <div id="collapse<?=$i?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?=$i?>">
                        <div class="panel-body">
                            <?=$d["description"]?>
                            <br>
                            <? $j=0; foreach($ca["item"] as $item){if(!($item==""||$ca["expense"][$j]=="")){?>
                                <b><?=$item?></b>: ₹<?=$ca["expense"][$j]?><br>
                            <?}$j++;}?>
                        </div>
                        <div class="panel-body">
                            <? if(($d["approved"]=='0')){?>
                                <button id='approve<?=$i?>' class="btn btn-primary" onclick="approve(<?=$d["id"].",".$i?>)">Approve</button>
                            <? }else{?>
                                <button disabled class="btn btn-primary">Approved</button>
                            <?}?>
                            <button class="btn btn-default right" onclick="location.href='events.php?id=<?=$d["id"]?>'">More Details</button>
                        </div>
                    </div>
                </div>
            <? } ?>
        </div>
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

    function approve(id,i){
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
//                    alert(reg.message);
                    var button = document.getElementById('approve'+i);
                    var panel = $('#panel'+i);
                    button.disabled=true;
                    button.innerHTML='Approved';
                    panel.removeClass('panel-default');
                    panel.addClass('panel-success');
                }
            }
        };
        http.send(params);
    }


</script>

</body></html>
