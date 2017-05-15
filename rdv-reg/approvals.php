<?php
include_once "navbar.php";
if(!($faculty))
    die("<div class=\"uk-container uk-margin-top\">
    <div class=\"uk-card uk-card-default uk-card-hover uk-card-body\">Not for your eyes!</div></div>");
$club = $post[1];
$date1 = date('Y-m-d', time());
$q="SELECT * FROM cv_events WHERE club='".$club."' and approved='0' order by approvedmsg";
$r1=$con->query($q);
$q="SELECT * FROM cv_events WHERE club='".$club."' and approved='1' and date>'$date1'";
$r2=$con->query($q);
$q="SELECT * FROM cv_events WHERE club='".$club."' and date<='$date1'";
$r3=$con->query($q);
?>
<div class="uk-container uk-margin-top">
    <div class="uk-child-width-1-3@m uk-grid-margin-large uk-grid uk-grid-stack" uk-grid="">
        <div>
            <ul class="uk-card uk-card-default uk-card-hover uk-card-body">
        <div class="uk-card-header">
            Pending Approvals
        </div>
        <div class="uk-card-body">
            <?php
            $i=0;
            $f=0;
            while($d=$r1->fetch_assoc()){
                $i++;
                if(strlen($d["approvedmsg"])>0&&$f==0)
                    echo "<h5 class='uk-heading-line'><span>Rejected</span></h5>";
                if(strlen($d["approvedmsg"])>0) $f=1;
                else $f=0;
            ?>
                <div style="cursor: pointer" class="uk-margin-bottom" onclick="location.href='events.php?id=<?=$d["id"]?>'">
                    <div class="uk-flex">
                        <h4 class="uk-margin-remove">
                            <span class="uk-label-warning uk-label">&nbsp</span>
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
            <ul class="uk-card uk-card-default uk-card-hover uk-card-body">
        <div class="uk-card-header">
            Approved Events
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
                            <span class="uk-label uk-label">&nbsp</span>
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
            <ul class="uk-card uk-card-default uk-card-hover uk-card-body">
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


<script type="text/javascript">
    function logout() {
        document.cookie = 'login' +
            '=; expires=Thu, 01-Jan-70 00:00:01 GMT;';
        location.href='index.php';
    }

//    function approve(id,i){
//        var http = new XMLHttpRequest();
//        var params = "id=" + id;
//        var url = "eventApprove.php";
//        http.open("POST", url, true);
//        http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
//        http.onreadystatechange = function () {//Call a function when the state changes.
//            if (http.readyState == 4 && http.status == 200) {
//                console.log(http.responseText);
//                var reg = JSON.parse((http.responseText));
//                if (reg.success) {
////                    alert(reg.message);
//                    var button = document.getElementById('approve'+i);
//                    var panel = $('#panel'+i);
//                    button.disabled=true;
//                    button.innerHTML='Approved';
//                    panel.removeClass('uk-label-warning');
//                }
//            }
//        };
//        http.send(params);
//    }


</script>

</body></html>
