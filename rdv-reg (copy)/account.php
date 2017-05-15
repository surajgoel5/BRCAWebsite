<?php
//session_start();
/* Define how long the maximum amount of time the session can be inactive. */
//define("MAX_IDLE_TIME", 3);
//echo "INSERT INTO users_online (sessionID,datetime) VALUES(".session_id().",NOW())";
//$con->query("SELECT DISTINCT(sessionID) from users_online WHERE datetime BETWEEN DATE_SUB(NOW(), INTERVAL 5 MINUTE) AND NOW()");

/*
$timeSecret="omnitrix";
$token=$_COOKIE["token"];
$allowedTime=$_COOKIE["allowedTime"];
$nowTime=$_COOKIE["nowTime"];
if($token!=md5($nowTime.".".$allowedTime.".".$timeSecret))
    die("Token mismatch, get your token from <a href='http://rdv-iitd.com/pronites-reg-iitd/'>rdv-iitd.com/pronites-reg-iitd/</a>");
else if($allowedTime>time())
    die("Too soon");
*/
$ug=false;
list($c_username,$cookie_hash) = explode(',',$_COOKIE['login']);
$secret_word='~Kt9az.z*^w~M.Cd';
if (md5($c_username.$secret_word) == $cookie_hash) {
    $id = unserialize($c_username);
    $cat=$id->category;
    $kerberos=$id->user_id;
    $entry_no=$id->uniqueiitdid;
    if($entry_no=="2014CS10252") {
        $entry_no="2016CS10252";
        $kerberos="cs1160252";
    }
//    include_once('db-info.php');
//    $con->query("INSERT INTO users_online (sessionID,datetime) VALUES('".$entry_no."',NOW())");
    if(
        $cat=="faculty"||
        $cat=="emeritus"||
        $cat=="doctor"||
        ($cat=="staff"&&!strpos($kerberos, 'cstaff'))
    ){
        if($cat=="doctor"||($cat=="staff"&&!strpos($kerberos, 'cstaff'))) {
            $catT = "staff/";
            $catD = "_";
        }
        else{
        $catT = "profs/";
        $catD = "~";
    }
        $isStudent=false;
    }
    $y=$entry_no[3];
    if(
        ($cat=="phd"&&$y>1)||//4
        ($cat=="mba"&&$y>4)||//2
        ($cat=="msr"&&$y>4)||//2
        ($cat=="msc"&&$y>4)||//2
        ($cat=="mdes"&&$y>4)||//2
        ($cat=="btech"&&$y>2)||//4
        ($cat=="mtech"&&$y>4)||//2
        ($cat=="dual"&&$y>1)||//5
        ($cat=="diit"&&$y>4)||//2
        ($cat=="integrated"&&$y>1)//5
    ){

        $catT = "student/";
        $catD = "*";
        $isStudent=true;
        if(($cat=="integrated"||
            $cat=="btech"||
            $cat=="dual")&&$y=="6"
        )
            $ug=true;
    }
    if(!isset($isStudent)){
        header('Location: index.php');
        exit;
    }
}
else {
     header('Location: index.php');
     exit;
}
$tz = 'Asia/Kolkata';
$timestamp = time();
$dt = new DateTime("now", new DateTimeZone($tz)); //first argument "must" be a string
$dt->setTimestamp($timestamp); //adjust the object to correct timestamp
$td=$dt->format('d');
$th=$dt->format('G');
$allowed=true;
if($th!="09") $ug=false;
?>

<!DOCTYPE html>
<!-- saved from url=(0034)https://oauth.iitd.ac.in/index.php -->
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="https://oauth.iitd.ac.in/favicon.ico" type="image/x-icon">
    <title><?=$catD?>Rendezvous' 16</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/custom.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

</head>

<body style="background:#286090" cz-shortcut-listen="true">
<div id="loading" style="display:none;position:fixed;left:0;top:0;width: 100%;height:100%;background: rgba(255,255,255,.8);z-index: 100;text-align: center">
    <br>
    <br>
    <br>
    <br>
    <h1>Generating Pass</h1>
    <h2>Please wait</h2>
    <img src="loading.gif">
</div>
<div id="redir" style="display:none;position:fixed;left:0;top:0;width: 100%;height:100%;background: rgba(255,255,255,1);z-index: 100;text-align: center">
    <br>
    <br>
    <br>
    <br>
    <h1>This portal is not open for you now</h1>
    <h2>Try again later</h2>
    <h3>Redirecting you in <span id="time">5</span> seconds</h3>
</div>
<div class="container">

    <!-- Static navbar -->
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" target="_blank" href="http://rdv-iitd.com/">Rendezvous' 16</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li><a href="javascript:location.href='account.php'">Home</a></li>
                    <li><a href="javascript:location.href='contact.php'">Contact Us</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <div class="navbar-form navbar-right"  >
                        <div style="float: left;padding-right:2vw;padding-top: 0vh;font-size:1.5vw;">
                            Hi <?php echo $id->name; ?>,
                        </div>
                        <button type="button" class="btn btn-success" name="doit" onclick="logout()">Logout</button>
                    </div>                  </ul>
            </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
    </nav>
<style>#SELECT_1 {
        background-position: 92% 50%;
        height: 40px;
        vertical-align: middle;
        width: 165px;
        -webkit-appearance: none;
        -webkit-background-clip: padding-box;
        -webkit-locale: en;
        -webkit-perspective-origin: 80px 20px;
        -webkit-transform-origin: 80px 20px;
        background: rgb(255, 255, 255) url(http://dominiquedecooman.com/sites/all/themes/ddc/images/select-arrow.png) no-repeat scroll 92% 50% / auto padding-box padding-box;
        border: 3px solid rgb(239, 239, 239);
        font: normal normal normal 13px/normal Arial, sans-serif;
        margin: 0px;
        padding: 5px 25px 5px 15px;
        -webkit-border-after: 3px solid rgb(239, 239, 239);
        -webkit-border-before: 3px solid rgb(239, 239, 239);
        -webkit-border-end: 3px solid rgb(239, 239, 239);
        -webkit-border-start: 3px solid rgb(239, 239, 239);
    }</style>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <?php if($isStudent){?>
    <div class="jumbotron" style="font-size:2.2vh;padding-top:3vh;padding-bottom:3vh;" >
        <b>Welcome to the IIT Delhi Online Pass System:</b>
        <ul>
            <li>
        Due to the limited capacity of Dogra Hall, the online system will automatically close registrations once we’ve received a specified number of entries from students.
            </li><li>A pdf invitation will be generated in case your request has been accepted by the system. We request you to go through the Instructions on the PDF that would be generated post registration.
            </li><li>The PDF pass is valid only with your IIT Delhi Identity Card.
            </li><li>Please note that this invitation guarantees your entry into Dogra Hall.
            </li><li>All invitations generated are non-transferable
        </li>
        </ul>
        </div>
    <? }else{ ?>
    <div class="jumbotron" style="font-size:2.2vh;padding-top:3vh;padding-bottom:3vh;" >
        <b>Thank you</b> for logging into our online pass system. We invite all our esteemed faculty and staff members to our OAT events and one Dogra Hall event. You may bring with yourself up to 3 of your family members/guests for OAT and up to 1 more for Mukhatib. Please make note of the following information:
<ul>
<li> The total seats available in OAT is roughly 1/6 of our campus population. It is <b>not

possible to accommodate all</b>. We have created this first come first serve online system

to help distribution of the passes. The list of registered entries will be displayed on this

site one day before the event for information to all.
</li>
<li> The pass details for each OAT event, once submitted, is considered final and is<b> not

available for modifications.</b>
</li>
<li> Due to the limited capacity of OAT,<b> the online system will automatically close

registrations once we’ve received 2000 entries </b> from faculty and staff together.
</li>
<li> <b>A pdf pass will be generated</b> in case your request has been accepted by the system.

We request you to go through the Instructions on the PDF that would be generated post

registration.
</li>
<li> <b>The PDF pass is valid only with your Identity Card.</b>
</li>
<li> Please select below your choice of events along with family members/guests. As you are

aware of, children below 12 years are not allowed at the OAT venue.
        </li>
        </ul>
    </div>
    <? }?>
    <div class="jumbotron row" id="eventa" style="background: rgba(255,255,255,0.8)">
        <div class="col-md-6 col-sm-6" style=";">
            <h1 style="margin-bottom:0vh;">Mukhatib</h1>
            <h3 style="margin-top:0vh;">(22/10/16)</h3>
            <p>Javed Akhtar</p>
            <div id="login-form" >
                <form method="post" action="">
                    <div class="input-append form-group" style="width:50%;">
                        <div style="display:none" id="fielda">
                            <?php if(!$isStudent){?>
                                <div class="input-group" id ="field1" name ="prof1" style="margin-bottom: 5px">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                                    <input type="text" name="mem1" class="form-control"  placeholder="<?php echo $id->name; ?>" disabled />
                                </div>
                                <button id="a1" class="btn add-more1 right" type="button" >+ Add Guest</button>
                            <?php }?>
                            <button style="margin-left:130%" class="btn btn-success left" type="button" onclick="javedReg()">Request Pass</button>
                        </div>
                        <div id="fielda-reg" style="display:none">
                            <a target="_blank" href="passes.php?cat=<?php echo $catD;?>&e=j&kerberos=<?php echo $kerberos?>&token=<?php echo md5($kerberos.$secret_word)?>" class="btn btn-success" >Download pass</a>
                        </div>
                        <div id="fielda-over" style="display:none;width:150%">
                            Thanks for your overwhelming response!<br>
                            All passes have been allocated. You can still register for other events at <a target="_blank" href="http://rdv-iitd.com/#/">@RDV</a><br>
                        </div>
                    </div>
                </form>
            </div>

        </div>
        <div class="col-md-6 col-sm-6" style="min-height: 250px;max-width: 400px;background:#888">
        </div>
    </div>
    <div class="jumbotron row"  id="event" style="<?php if($td=="17") echo"display:none;";?>background: rgba(255,255,255,0.8)">
        <div class="col-sm-6">
        <h1 style="margin-bottom:0vh;">Blitzkrieg</h1>
        <h3 style="margin-top:0vh;">(21/10/16)</h3>
        <p>The English Rock Night</p>
        <div id="login-form" >
            <form method="post" action="">
                <div class="input-append form-group" style="width:50%;">
                    <div style="display:none" id="field">
                        <?php if(!$isStudent){?>
                        <div class="input-group" id ="field1" name ="prof1" style="margin-bottom: 5px">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                            <input type="text" name="mem1" class="form-control"  placeholder="<?php echo $id->name; ?>" disabled />
                        </div>
                        <button id="b1" class="btn add-more right" type="button" >+ Add Guest</button>
                        <?php }?>
                        <button style="margin-left:130%" class="btn btn-success left" type="button" onclick="blitzReg()">Request Pass</button>
                    </div>
                    <div id="field-reg" style="display:none">
                        <a target="_blank" href="passes.php?cat=<?php echo $catD;?>&e=b&kerberos=<?php echo $kerberos?>&token=<?php echo md5($kerberos.$secret_word)?>" class="btn btn-success" >Download pass</a>
                    </div>
                    <div id="field-over" style="display:none;width:150%">
                                        Thanks for your overwhelming response!<br>
                    All passes have been allocated. You can still register for other events at <a target="_blank" href="http://rdv-iitd.com/#/">@RDV</a>
                    </div>
                </div>
            </form>
        </div>

    
    <!-- jnkljnfkvdjnfkvdnfkjvndkfsjdn -->
    <!-- jnkljnfkvdjnfkvdnfkjvndkfsjdn -->
    <!-- jnkljnfkvdjnfkvdnfkjvndkfsjdn -->
    <!-- jnkljnfkvdjnfkvdnfkjvndkfsjdn -->
        </div>
        <div class="col-sm-6" style="min-height: 250px;background:#888">
        </div>
    </div>
    <div class="jumbotron row"  id="eventc" style="<?php if($td=="17") echo"display:none;";?>background: rgba(255,255,255,0.8)">
    <div class="col-md-6 col-sm-6" style=";">
        <h1 style="margin-bottom:0vh;">Spectrum</h1>
        <h3 style="margin-top:0vh;">(22/10/16)</h3>
        <p>The Indian Fusion Night</p>
        <div id="login-form" >
            <form method="post" action="">
                <div class="input-append form-group" style="width:50%;">
                    <div style="display:none" id="fieldc">
                        <?php if(!$isStudent){?>
                        <div class="input-group" id ="field1" name ="prof1" style="margin-bottom: 5px">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                            <input type="text" name="mem1" class="form-control"  placeholder="<?php echo $id->name; ?>" disabled />
                        </div>
                        <button id="d1" class="btn add-more3 right" type="button" >+ Add Guest</button>
                        <?php }?>
                        <button style="margin-left:130%" class="btn btn-success left" type="button" onclick="spectrumReg()">Request Pass</button>
                    </div>
                    <div id="fieldc-reg" style="display:none">
                        <a target="_blank" href="passes.php?cat=<?php echo $catD;?>&e=s&kerberos=<?php echo $kerberos?>&token=<?php echo md5($kerberos.$secret_word)?>" class="btn btn-success" >Download pass</a>
                    </div>
                    <div id="fieldc-over" style="display:none;width:150%">
                                        Thanks for your overwhelming response!<br>
                    All passes have been allocated. You can still register for other events at <a target="_blank" href="http://rdv-iitd.com/#/">@RDV</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
        <div class="col-md-6 col-sm-6" style="min-height: 250px;background:#888">
        </div>
    </div>
    <div class="jumbotron row"  id="eventb" style="<?php if($td=="17") echo"display:none;";?>background: rgba(255,255,255,0.8)">
        <div class="col-md-6 col-sm-6" style=";">
        <h1 style="margin-bottom:0vh;">Kaliedoscope</h1>
        <h3 style="margin-top:0vh;">(23/10/16)</h3>
        <p>The Dance Night</p>
        <div id="login-form" >
            <form method="post" action="">
                <div class="input-append form-group" style="width:50%;">
                    <div style="display:none" id="fieldb">
                        <?php if(!$isStudent){?>
                        <div class="input-group" id ="field1" name ="prof1" style="margin-bottom: 5px">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                            <input type="text" name="mem1" class="form-control"  placeholder="<?php echo $id->name; ?>" disabled />
                        </div>
                        <button id="c1" class="btn add-more2 right" type="button" >+ Add Guest</button>
                        <?php }?>
                        <button style="margin-left:130%" class="btn btn-success left" type="button" onclick="kaleidoReg()">Request Pass</button>
                    </div>
                    <div id="fieldb-reg" style="display:none">
                        <a target="_blank" href="passes.php?cat=<?php echo $catD;?>&e=k&kerberos=<?php echo $kerberos?>&token=<?php echo md5($kerberos.$secret_word)?>" class="btn btn-success" >Download pass</a>
                    </div>
                    <div id="fieldb-over" style="display:none;width:150%">
                                        Thanks for your overwhelming response!<br>
                    All passes have been allocated. You can still register for other events at <a target="_blank" href="http://rdv-iitd.com/#/">@RDV</a>
                    </div>
                </div>
            </form>
        </div>

        </div>
        <div class="col-md-6 col-sm-6" style="min-height: 250px;background:#888">
        </div>
    </div>
    <div class="jumbotron row"  id="eventd" style="<?php if($td=="17") echo"display:none;";?>background: rgba(255,255,255,0.8)">
    <div class="col-md-6 col-sm-6" style=";">
        <h1 style="margin-bottom:0vh;">Dhoom</h1>
        <h3 style="margin-top:0vh;">(24/10/16)</h3>
        <p>The Bollywood Night</p>
        <div id="login-form" >
            <form method="post" action="">
                <div class="input-append form-group" style="width:50%;">
                    <div style="display:none" id="fieldd">
                        <?php if(!$isStudent){?>
                        <div class="input-group" id ="field1" name ="prof1" style="margin-bottom: 5px">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                            <input type="text" name="mem1" class="form-control"  placeholder="<?php echo $id->name; ?>" disabled />
                        </div>
                        <button id="e1" class="btn add-more4 right" type="button" >+ Add Guest</button>
                        <?php }?>
                        <button style="margin-left:130%" class="btn btn-success left" type="button" onclick="dhoomReg()">Request Pass</button>
                    </div>
                    <div id="fieldd-reg" style="display:none">
                        <a target="_blank" href="passes.php?cat=<?php echo $catD;?>&e=d&kerberos=<?php echo $kerberos?>&token=<?php echo md5($kerberos.$secret_word)?>" class="btn btn-success" >Download pass</a>
                    </div>
                    <div id="fieldd-over" style="display:none;width:150%">
                                        Thanks for your overwhelming response!<br>
                    All passes have been allocated. You can still register for other events at <a target="_blank" href="http://rdv-iitd.com/#/">@RDV</a>
                    </div>
                </div>
            </form>
        </div>

    </div>
        <div class="col-md-6 col-sm-6" style="min-height: 250px;background:#888">
        </div>
    </div>
    <footer style="text-align:center;font-size:2.5vh;padding-top:3vh;padding-bottom:3vh;" class="jumbotron">
        Implemented By Rendezvous' 16 team for IIT Delhi
    </footer>   </div>

<!-- Latest compiled and minified JavaScript -->
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
