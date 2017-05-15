<?php
$username="brca";
$password="94f3bdfb";
$database="brca";
$server="localhost";
$con=new mysqli($server,$username,$password,$database);
$secret_word = '~Kt9az.z*^w~M.Cd';
$maxEntries=2800;
$waitEntries=2400;
$firstDay="18";
$secondDay="19";
$thirdDay="20";
$tz = 'Asia/Kolkata';
$timestamp = time();
$dt = new DateTime("now", new DateTimeZone($tz)); //first argument "must" be a string
$dt->setTimestamp($timestamp); //adjust the object to correct timestamp
$td=$dt->format('d');
$th=$dt->format('G');
if($td==$firstDay)
    $maxEntries=600;
else if($td==$secondDay)
    $maxEntries=1300;
else if($td==$thirdDay)
    $maxEntries=2900;
else
    $maxEntries=0;
$javedEntries=10;
$category="student_";
$maxEntries=2000;
