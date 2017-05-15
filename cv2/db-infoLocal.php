<?php
$username="root";
$password="gauntlets";
$database="brca";
$server="localhost";
$con=new mysqli($server,$username,$password,$database);
$secret_word = '~Kt9az.z*^w~M.Cd';
$maxEntries=100;
$waitEntries=50;
$tz = 'Asia/Kolkata';
$timestamp = time();
$dt = new DateTime("now", new DateTimeZone($tz)); //first argument "must" be a string
$dt->setTimestamp($timestamp); //adjust the object to correct timestamp
$td=$dt->format('G');
// if($td!="23") {
    // $maxEntries = 0;
    // $waitEntries = 0;
// }