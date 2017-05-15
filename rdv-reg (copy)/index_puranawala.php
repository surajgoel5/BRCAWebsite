<!DOCTYPE HTML>
<html>
<head>
	<title>Rendezvous'16 | IIT Delhi</title>
	<meta charset="utf-8"/>
	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<link rel="stylesheet" href="css/custom.css" />
	<link rel="icon" href="favicon.ico" type="image/x-icon"/>
	<script src="js/bootstrap.min.js"></script>
</head>
<?php
$client_id = "6Yilh2LhO1Bvg0YI8494RrVWDb0OXJu4";
$client_secret = "HMqYPcgEdR9tS8c1dm54N11qc2faMJft";
$secret_word = "~Kt9az.z*^w~M.Cd";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,"https://oauth.iitd.ac.in/token.php");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "client_id=".$client_id."&client_secret=".$client_secret."&grant_type=authorization_code&redirect_uri=http://brca.iitd.ac.in/rdv-reg&code=". $_GET["code"]);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$result = json_decode(curl_exec($ch));
curl_close($ch);

if (isset($result->access_token)){
	//Login Successful
	//Get user login id
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL,"https://oauth.iitd.ac.in/resource.php");
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, "access_token=".$result->access_token);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$result1 = json_decode(curl_exec($ch));
	curl_close($ch);
	$login_id = $result1->user_id;
	setcookie('login',serialize($result1).','.md5(serialize($result1).$secret_word));
	header('Location: account.php');
}
else {
$tz = 'Asia/Kolkata';
$timestamp = time();
$dt = new DateTime("now", new DateTimeZone($tz)); //first argument "must" be a string
$dt->setTimestamp($timestamp); //adjust the object to correct timestamp
$td=$dt->format('d');
$th=$dt->format('G');
$allowed=false;
if(($td=="18"||$td=="19"||$td=="20")&&($th=="13"||$th=="14"||$th=="19"||$th=="20"||$th=="22")) $allowed=true;
?>
<body cz-shortcut-listen="true">

<a style="position: absolute;text-decoration: none;display: block;margin-left: 3vw;
    margin-top: 1vh;
    font-size: 4vw;font-weight: lighter;">WELCOME,</a>
<div class="home_button">
	<button class="btn btn-primary" type="button" onclick="window.open('http://brca.iitd.ac.in/rdv-reg/contact.php', '_blank')">Contact Us</button>
</div>
<div class="hidden-print"><br><br><br><br><br></div><!--Hidden print because we don't want the default header to be printed-->
<!--Visible print because we want this header to be printed, but not displayed-->
<h2 class="panel-heading" style="padding:0px;margin-left:3vw;font-size:2.2vw;font-weight:bold;">to Rendezvous' 16 ONLINE PASS SYSTEM!</h2>
<div class="row" style="margin-left:3vw;margin-top:3vh;">
	<div class="col-md-7 col-sm-7">
		<h3 style="font-size:2.5vh;line-height:3.5vh">

			More than 300 events will be held during the 21st to 24th of October in IITD

			Campus (<a href="http://rdv-iitd.com" style="color: #73aae7" target="_blank">RDV &#39;16 website</a>). All the members of IITD community are heartily

			welcome at all the events. Your presence and participation will increase the

			enthusiasm of participating performers.
			<br>
			<br>
			All except 5 events do not require any passes. Due to limited capacity, OAT events

			will require you to book your pass in advance. Please Login into system to

			generate OAT event passes.
			<br>
			<br>
			Do not worry if you have not yet downloaded your pass,
			the system will open indefinitely after all passes have been allocated.
            <br>
			The System will open for STUDENTS AT 10:00 PM
            <br/>
<!--              Students at 10:00 PM<br />-->
	</div>
</div>
<?if($allowed){?>
<button type="submit" style="font-size: 2.5vh;margin-left:3vw;margin-top:2vh;background-color:#286090;border-color:#3870a0;" class="btn btn-success" onclick="window.location.assign('https://oauth.iitd.ac.in/authorize.php?response_type=code&amp;client_id=6Yilh2LhO1Bvg0YI8494RrVWDb0OXJu4&amp;state=xyz&amp;redirect_uri=http://brca.iitd.ac.in/rdv-reg')">L O G I N &nbsp; W I T H &nbsp; K E R B E R O S</button>
<?}else{?>
<button disabled type="submit" style="font-size: 2.5vh;margin-left:3vw;margin-top:2vh;background-color:#286090;border-color:#3870a0;" class="btn btn-success" >L O G I N &nbsp; W I T H &nbsp; K E R B E R O S</button>
<?}?>
<br>
<br>
<div style="padding-left:3vw">
Following students have been alloted the passes for
Mukhatib<a href="passes/student_javed.csv">@list</a>
Blitzrkrieg<a href="passes/student_blitz.csv">@list</a>
Kaleidoscope<a href="passes/student_kaleidoscope.csv">@list</a>
Spectrum<a href="passes/student_spectrum.csv">@list</a>
Dhoom<a href="passes/student_dhoom.csv">@list</a><br>
</div>
<script src="js/function.js"></script>
</body>
</html>

<?php
}
?>
