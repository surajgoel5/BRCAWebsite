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
	header('Location: home.php');
}
else {
//$aa = mt_rand(0,10);
//if($aa!=1) die(' 500: server died');

$tz = 'Asia/Kolkata';
$timestamp = time();
$dt = new DateTime("now", new DateTimeZone($tz)); //first argument "must" be a string
$dt->setTimestamp($timestamp); //adjust the object to correct timestamp
$td=$dt->format('d');
$th=$dt->format('G');
$allowed=false;
$allowed=true;
?>
	<!DOCTYPE html>
	<!-- saved from url=(0021)https://getuikit.com/ -->
	<html lang="en-gb" dir="ltr"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>BRCA</title>
		<link rel="stylesheet" href="css/theme.css">
	</head>

	<body>
	<style>
		html, body{
			height:100%;
		}
	</style>
	<div style="height:100%" class="uk-offcanvas-content"><div style="height:100%"  class="uk-section-primary tm-section-texture"><div uk-sticky="media: 960" class="uk-navbar-container tm-navbar-container uk-navbar-transparent uk-sticky uk-sticky-fixed" style="position: fixed; top: 0px; width: 1351px;"><div class="uk-container uk-container-expand"><nav class="uk-navbar"><div class="uk-navbar-left"><a href="http://brca.iitd.ac.in/" class="uk-navbar-item uk-logo uk-active"><canvas width="28" height="34" uk-svg="" src="" class="uk-margin-small-right" hidden="hidden"></canvas> <b>BRCA</b>
							</a></div> <div class="uk-navbar-right"><div class="uk-navbar-item uk-visible@m"><a href="contact.php" class="uk-button uk-button-default tm-button-default uk-icon">Contact Us</a></div> <a uk-navbar-toggle-icon="" href="https://getuikit.com/#offcanvas" uk-toggle="" class="uk-navbar-toggle uk-hidden@m uk-navbar-toggle-icon uk-icon"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" icon="navbar-toggle-icon" ratio="1"><rect y="9" width="20" height="2"></rect><rect y="3" width="20" height="2"></rect><rect y="15" width="20" height="2"></rect></svg></a></div></nav></div></div><div class="uk-sticky-placeholder" style="height: 80px; margin: 0px;"></div> <div uk-height-viewport="offset-top: true; offset-bottom: true" class="uk-section uk-section-small uk-flex uk-flex-middle uk-text-center" style="box-sizing: border-box; min-height: calc(100vh - 183px); height: calc(100vh - 183px);"><div class="uk-width-1-1"><div class="uk-container"><p><img style="max-height:40vh" src="./images/iitd.png"></p> <p class="uk-margin-medium uk-text-lead">
							A lightweight and elegant interface<br class="uk-visible@s">
							for BRCA event management
						</p> <div uk-grid="" class="uk-child-width-auto uk-grid-medium uk-flex-inline uk-flex-center uk-grid"><div class="uk-first-column"><a class="uk-button uk-button-primary tm-button-primary uk-button-large tm-button-large uk-visible@s" href="https://oauth.iitd.ac.in/authorize.php?response_type=code&amp;client_id=6Yilh2LhO1Bvg0YI8494RrVWDb0OXJu4&amp;state=xyz&amp;redirect_uri=http://brca.iitd.ac.in/rdv-reg"> LogIn with kerberos</a><div>

	</body></html>

<?php
}
?>
