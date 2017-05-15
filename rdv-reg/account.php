<?php
//session_start();
include_once "navbar.php";
$q="SELECT * FROM cv_events";
$r=$con->query($q);
?>


    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="container">
    <?    while($d=$r->fetch_assoc()){
        ?>
    <div class="jumbotron row">
        <div class="col-sm-6">
        <h1 style="margin-bottom:0vh;"><?=$d["name"]?></h1>
        <h3 style="margin-top:0vh;"><?=$d["date"]?></h3>
        <p><?=$d["description"]?></p>
<!--        <div id="login-form" >-->
<!--            <form method="post" action="">-->
<!--                <div class="input-append form-group" style="width:50%;">-->
<!--                    <div style="display:none" id="field">-->
<!--                        --><?php //if(!$isStudent){?>
<!--                        <div class="input-group" id ="field1" name ="prof1" style="margin-bottom: 5px">-->
<!--                            <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>-->
<!--                            <input type="text" name="mem1" class="form-control"  placeholder="--><?php //echo $id->name; ?><!--" disabled />-->
<!--                        </div>-->
<!--                        <button id="b1" class="btn add-more right" type="button" >+ Add Guest</button>-->
<!--                        --><?php //}?>
<!--                        <button style="margin-left:130%" class="btn btn-success left" type="button" onclick="blitzReg()">Request Pass</button>-->
<!--                    </div>-->
<!--                    <div id="field-reg" style="display:none">-->
<!--                        <a target="_blank" href="passes.php?cat=--><?php //echo $catD;?><!--&e=b&kerberos=--><?php //echo $kerberos?><!--&token=--><?php //echo md5($kerberos.$secret_word)?><!--" class="btn btn-success" >Download pass</a>-->
<!--                    </div>-->
<!--                    <div id="field-over" style="display:none;width:150%">-->
<!--                                        Thanks for your overwhelming response!<br>-->
<!--                    All passes have been allocated. You can still register for other events at <a target="_blank" href="http://rdv-iitd.com/#/">@RDV</a>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </form>-->
<!--        </div>-->

    
    <!-- jnkljnfkvdjnfkvdnfkjvndkfsjdn -->
    <!-- jnkljnfkvdjnfkvdnfkjvndkfsjdn -->
    <!-- jnkljnfkvdjnfkvdnfkjvndkfsjdn -->
    <!-- jnkljnfkvdjnfkvdnfkjvndkfsjdn -->
        </div>
<!--        <div class="col-sm-6" style="min-height: 250px;background:#888">-->
<!--        </div>-->
    </div>
    <?}?>
    <footer style="text-align:center;font-size:2.5vh;padding-top:2vh;padding-bottom:2vh;" class="jumbotron">
        Implemented by BRCA for IIT Delhi
    </footer>   </div>

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<script>$(document).ready(function(){
            var next = 1;
            $(".add-more").click(function(e){
                e.preventDefault();
                var addto = "#b1";
                next = next + 1;
                if (next<5) {

                var newIn = '<div class="input-group" style="margin-top: 1vh; margin-bottom: 5px" id ="field' + next + '" name ="field' + next + '"><span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>  <select class="form-control"><option>Friend</option><option>Spouse</option><option>Child</option><option>Relative</option><option>Parent</option></select> ' +
                    '<span class="input-group-addon" style="padding:0"><span id="removea' + (next) + '" class="btn btn-danger remove-me"  >-</span></span></div>';
                var newInput = $(newIn);
                $(addto).before(newInput);
                $("#field" + next).attr('data-source',$(addto).attr('data-source'));
                $("#count").val(next);
                
                }

                $('.remove-me').click(function(e){
                    e.preventDefault();
                    var fieldNum = this.id.charAt(this.id.length-1);
                    var fieldID = "#field" + fieldNum;
//                    $(this).remove();
                    next--;
                    $(fieldID).remove();
//                    next--;
                });
            });
});</script>
<script>$(document).ready(function(){
            var next = 1;
            $(".add-more1").click(function(e){
                e.preventDefault();
                var addto = "#a1";
                next = next + 1;
                if (next<3) {

                var newIn = '<div class="input-group" style="margin-top: 1vh; margin-bottom: 5px" id ="field' + next + '" name ="field' + next + '"><span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>  <select class="form-control"><option>Friend</option><option>Spouse</option><option>Child</option><option>Relative</option><option>Parent</option></select> ' +
                    '<span class="input-group-addon" style="padding:0"><span id="removea' + (next) + '" class="btn btn-danger remove-me"  >-</span></span></div>';
                var newInput = $(newIn);
                $(addto).before(newInput);
                $("#fielda" + next).attr('data-source',$(addto).attr('data-source'));
                $("#count").val(next);

                }

                $('.remove-me').click(function(e){
                    $('#fielda > div:eq(1)').remove();
                    next--;
                });
            });
});</script>
<script>$(document).ready(function(){
            var next = 1;
            $(".add-more2").click(function(e){
                e.preventDefault();
                var addto = "#c1";
                next = next + 1;
                if (next<5) {

                var newIn = '<div class="input-group" style="margin-top: 1vh; margin-bottom: 5px" id ="fieldb' + next + '" name ="fieldb' + next + '"><span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>  <select class="form-control"><option>Friend</option><option>Spouse</option><option>Child</option><option>Relative</option><option>Parent</option></select> ' +
                    '<span class="input-group-addon" style="padding:0"><span id="removeb' + (next) + '" class="btn btn-danger remove-me"  >-</span></span></div>';
                var newInput = $(newIn);
                $(addto).before(newInput);
                $("#field" + next).attr('data-source',$(addto).attr('data-source'));
                $("#count").val(next);
                
                }

                $('.remove-me').click(function(e){
                    e.preventDefault();
                    var fieldNum = this.id.charAt(this.id.length-1);
                    var fieldID = "#fieldb" + fieldNum;
//                    $(this).remove();
                    next--;
                    $(fieldID).remove();
//                    next--;
                });
            });
});</script>
<script>
    function logout() {
        document.cookie = 'login' +
            '=; expires=Thu, 01-Jan-70 00:00:01 GMT;';
        location.href='index.php';
    }
    $(document).ready(function(){
            var next = 1;
            $(".add-more3").click(function(e){
                e.preventDefault();
                var addto = "#d1";
                next = next + 1;
                if (next<5) {
                var newIn = '<div class="input-group" style="margin-top: 1vh; margin-bottom: 5px" id ="fieldc' + next + '" name ="fieldc' + next + '"><span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>  <select class="form-control"><option>Friend</option><option>Spouse</option><option>Child</option><option>Relative</option><option>Parent</option></select> ' +
                    '<span class="input-group-addon" style="padding:0"><span id="removec' + (next) + '" class="btn btn-danger remove-me"  >-</span></span></div>';
                                var newInput = $(newIn);
                $(addto).before(newInput);
                $("#field" + next).attr('data-source',$(addto).attr('data-source'));
                $("#count").val(next);
                
                }

                $('.remove-me').click(function(e){
                    e.preventDefault();
                    var fieldNum = this.id.charAt(this.id.length-1);
                    var fieldID = "#fieldc" + fieldNum;
//                    $(this).remove();
                    next--;
                    $(fieldID).remove();
//                    next--;
                });
            });
});</script>
<script>
    function openInNewTab(url) {
        startLoad();
//        var win = window.open(url, '_blank');
//        win.focus();
    }
    $(document).ready(function(){
            var next = 1;
            $(".add-more4").click(function(e){
                e.preventDefault();
                var addto = "#e1";
                next = next + 1;
                if (next<5) {

var newIn = '<div class="input-group" style="margin-top: 1vh; margin-bottom: 5px" id ="fieldd' + next + '" name ="fieldd' + next + '"><span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>  <select class="form-control"><option>Friend</option><option>Spouse</option><option>Child</option><option>Relative</option><option>Parent</option></select> ' +
                    '<span class="input-group-addon" style="padding:0"><span id="removed' + (next) + '" class="btn btn-danger remove-me"  >-</span></span></div>';
                                var newInput = $(newIn);
                $(addto).before(newInput);
                $("#field" + next).attr('data-source',$(addto).attr('data-source'));
                $("#count").val(next);
                
                }

                $('.remove-me').click(function(e){
                    e.preventDefault();
                    var fieldNum = this.id.charAt(this.id.length-1);
                    var fieldID = "#fieldd" + fieldNum;
//                    $(this).remove();
                    next--;
                    $(fieldID).remove();
//                    next--;
                });
            });
});
function javedReg() {
    var http = new XMLHttpRequest();
    var url = "passes/<?php echo $catT;?>javed.php";
    var r1  = $('#fielda > div:eq(1) > select').val();
    var r2  = $('#fielda > div:eq(2) > select').val();
    var r3  = $('#fielda > div:eq(3) > select').val();
    var params = "kerberos=<?php echo $kerberos?>&token=<?php echo md5($kerberos.$secret_word)?>&ugToken=<?php if ($ug) echo md5($kerberos."ug".$secret_word);else echo "notug";?>&name=<?php echo $id->name?>&relation1="+r1+"&relation2="+r2+"&relation3="+r3;
    http.open("POST", url, true);
    http.setRequestHeader('Access-Control-Allow-Headers', '*');
    http.setRequestHeader("Access-Control-Allow-Origin", "*");
    http.setRequestHeader("Access-Control-Allow-Credentials", "true");
    http.setRequestHeader("Access-Control-Allow-Methods", "GET,HEAD,OPTIONS,POST,PUT");
    http.setRequestHeader("Access-Control-Allow-Headers", "Access-Control-Allow-Headers, Origin,Accept, X-Requested-With, Content-Type, Access-Control-Request-Method, Access-Control-Request-Headers");//Send the proper header information along with the request
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.onreadystatechange = function() {//Call a function when the state changes.
        if(http.readyState == 4 && http.status == 200) {
            var reg = JSON.parse((http.responseText));
            console.log(reg);
            if(reg.success){
                openInNewTab("passes.php?cat=<?php echo $catD;?>&e=j&kerberos=<?php echo $kerberos;?>&token=<?php echo md5($kerberos.$secret_word)?>");
                alert(reg.message);
                document.getElementById('fielda').style.display="none";
                document.getElementById('fielda-reg').style.display="block";
            }
            else{
                alert(reg.message);
            }
        }
    };
    http.send(params);
}
function blitzReg() {
    var http = new XMLHttpRequest();
    var url = "passes/<?php echo $catT;?>blitz.php";
    var r1  = $('#field > div:eq(1) > select').val();
    var r2  = $('#field > div:eq(2) > select').val();
    var r3  = $('#field > div:eq(3) > select').val();
    var params = "kerberos=<?php echo $kerberos?>&token=<?php echo md5($kerberos.$secret_word)?>&ugToken=<?php if ($ug) echo md5($kerberos."ug".$secret_word);else echo "notug";?>&name=<?php echo $id->name?>&relation1="+r1+"&relation2="+r2+"&relation3="+r3;
    http.open("POST", url, true);
    http.setRequestHeader('Access-Control-Allow-Headers', '*');
    http.setRequestHeader("Access-Control-Allow-Origin", "*");
    http.setRequestHeader("Access-Control-Allow-Credentials", "true");
    http.setRequestHeader("Access-Control-Allow-Methods", "GET,HEAD,OPTIONS,POST,PUT");
    http.setRequestHeader("Access-Control-Allow-Headers", "Access-Control-Allow-Headers, Origin,Accept, X-Requested-With, Content-Type, Access-Control-Request-Method, Access-Control-Request-Headers");//Send the proper header information along with the request
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.onreadystatechange = function() {//Call a function when the state changes.
        if(http.readyState == 4 && http.status == 200) {
            var reg = JSON.parse((http.responseText));
            console.log(reg);
            if(reg.success){
                openInNewTab("passes.php?cat=<?php echo $catD;?>&e=b&kerberos=<?php echo $kerberos;?>&token=<?php echo md5($kerberos.$secret_word)?>");
                alert(reg.message);
                document.getElementById('field').style.display="none";
                document.getElementById('field-reg').style.display="block";
            }
            else{
                alert(reg.message);
            }
        }
    };
    http.send(params);
}
function kaleidoReg() {
    var http = new XMLHttpRequest();
    var url = "passes/<?php echo $catT;?>kaleidoscope.php";
    var r1  = $('#fieldb > div:eq(1) > select').val();
    var r2  = $('#fieldb > div:eq(2) > select').val();
    var r3  = $('#fieldb > div:eq(3) > select').val();
    var params = "kerberos=<?php echo $kerberos?>&token=<?php echo md5($kerberos.$secret_word)?>&ugToken=<?php if ($ug) echo md5($kerberos."ug".$secret_word);else echo "notug";?>&name=<?php echo $id->name?>&relation1="+r1+"&relation2="+r2+"&relation3="+r3;
    http.open("POST", url, true);
    http.setRequestHeader('Access-Control-Allow-Headers', '*');
    http.setRequestHeader("Access-Control-Allow-Origin", "*");
    http.setRequestHeader("Access-Control-Allow-Credentials", "true");
    http.setRequestHeader("Access-Control-Allow-Methods", "GET,HEAD,OPTIONS,POST,PUT");
    http.setRequestHeader("Access-Control-Allow-Headers", "Access-Control-Allow-Headers, Origin,Accept, X-Requested-With, Content-Type, Access-Control-Request-Method, Access-Control-Request-Headers");//Send the proper header information along with the request
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.onreadystatechange = function() {//Call a function when the state changes.
        if(http.readyState == 4 && http.status == 200) {
            var reg = JSON.parse((http.responseText));
            console.log(reg);
            if(reg.success){
                openInNewTab("passes.php?cat=<?php echo $catD;?>&e=k&kerberos=<?php echo $kerberos;?>&token=<?php echo md5($kerberos.$secret_word)?>");
                alert(reg.message);
                document.getElementById('fieldb').style.display="none";
                document.getElementById('fieldb-reg').style.display="block";
            }
            else{
                alert(reg.message);
            }
        }
    };
    http.send(params);
}
function dhoomReg() {
    var http = new XMLHttpRequest();
    var url = "passes/<?php echo $catT;?>dhoom.php";
    var r1  = $('#fieldd > div:eq(1) > select').val();
    var r2  = $('#fieldd > div:eq(2) > select').val();
    var r3  = $('#fieldd > div:eq(3) > select').val();
    var params = "kerberos=<?php echo $kerberos?>&token=<?php echo md5($kerberos.$secret_word)?>&ugToken=<?php if ($ug) echo md5($kerberos."ug".$secret_word);else echo "notug";?>&name=<?php echo $id->name?>&relation1="+r1+"&relation2="+r2+"&relation3="+r3;
    http.open("POST", url, true);
    http.setRequestHeader('Access-Control-Allow-Headers', '*');
    http.setRequestHeader("Access-Control-Allow-Origin", "*");
    http.setRequestHeader("Access-Control-Allow-Credentials", "true");
    http.setRequestHeader("Access-Control-Allow-Methods", "GET,HEAD,OPTIONS,POST,PUT");
    http.setRequestHeader("Access-Control-Allow-Headers", "Access-Control-Allow-Headers, Origin,Accept, X-Requested-With, Content-Type, Access-Control-Request-Method, Access-Control-Request-Headers");//Send the proper header information along with the request
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.onreadystatechange = function() {//Call a function when the state changes.
        if(http.readyState == 4 && http.status == 200) {
            var reg = JSON.parse((http.responseText));
            console.log(reg);
            if(reg.success){
                openInNewTab("passes.php?cat=<?php echo $catD;?>&e=d&kerberos=<?php echo $kerberos;?>&token=<?php echo md5($kerberos.$secret_word)?>");
                alert(reg.message);
                document.getElementById('fieldd').style.display="none";
                document.getElementById('fieldd-reg').style.display="block";
            }
            else{
                alert(reg.message);
            }
        }
    };
    http.send(params);
}
function spectrumReg() {
    var http = new XMLHttpRequest();
    var url = "passes/<?php echo $catT;?>spectrum.php";
    var r1  = $('#fieldc > div:eq(1) > select').val();
    var r2  = $('#fieldc > div:eq(2) > select').val();
    var r3  = $('#fieldc > div:eq(3) > select').val();
    var params = "kerberos=<?php echo $kerberos?>&token=<?php echo md5($kerberos.$secret_word)?>&ugToken=<?php if ($ug) echo md5($kerberos."ug".$secret_word);else echo "notug";?>&name=<?php echo $id->name?>&relation1="+r1+"&relation2="+r2+"&relation3="+r3;
    http.open("POST", url, true);
    http.setRequestHeader('Access-Control-Allow-Headers', '*');
    http.setRequestHeader("Access-Control-Allow-Origin", "*");
    http.setRequestHeader("Access-Control-Allow-Credentials", "true");
    http.setRequestHeader("Access-Control-Allow-Methods", "GET,HEAD,OPTIONS,POST,PUT");
    http.setRequestHeader("Access-Control-Allow-Headers", "Access-Control-Allow-Headers, Origin,Accept, X-Requested-With, Content-Type, Access-Control-Request-Method, Access-Control-Request-Headers");//Send the proper header information along with the request
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.onreadystatechange = function() {//Call a function when the state changes.
        if(http.readyState == 4 && http.status == 200) {
            var reg = JSON.parse((http.responseText));
            console.log(reg);
            if(reg.success){
                document.getElementById('fieldc').style.display="none";
                document.getElementById('fieldc-reg').style.display="block";
                openInNewTab("passes.php?cat=<?php echo $catD;?>&e=s&kerberos=<?php echo $kerberos;?>&token=<?php echo md5($kerberos.$secret_word)?>");
                alert(reg.message);
            }
            else{
                alert(reg.message);
            }
        }
    };
    http.send(params);
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
