<!DOCTYPE HTML>
<html>
<head>
	<title>Rendezvous'16 | IIT Delhi</title>
	<meta charset="utf-8"/>
	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<link rel="stylesheet" href="css/custom.css" />
	<link rel="icon" href="favicon.ico" type="image/x-icon"/>
	<script src="js/jquery.min.js"></script>
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
$timeSecret="omnitrix";
$allowedTime=$_GET["a"];
$nowTime=$_GET["n"];
$token=$_GET["token"];
$token=$_COOKIE["token"];
$allowedTime=$_COOKIE["allowedTime"];
$nowTime=$_COOKIE["nowTime"];
if($token!=md5($nowTime.".".$allowedTime.".".$timeSecret))
	die("Token mismatch");
else if($allowedTime>time())
	die("Too soon");

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
	header('Location: account2.php');
}
else {
?>
Got to <a href="http://rdv-iitd.com/pronites-reg-iitd">http://rdv-iitd.com/pronites-reg-iitd</a> at 10:00 pm 
<?php
}
?>