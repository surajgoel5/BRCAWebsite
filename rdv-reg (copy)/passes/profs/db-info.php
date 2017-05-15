<?php
$username="brca";
$password="94f3bdfb";
$database="brca";
$server="localhost";
$con=new mysqli($server,$username,$password,$database);
$secret_word = '~Kt9az.z*^w~M.Cd';
$maxEntries=1000;
$firstDay="18";
$secondDay="19";
$thirdDay="20";
$tz = 'Asia/Kolkata';
$timestamp = time();
$dt = new DateTime("now", new DateTimeZone($tz)); //first argument "must" be a string
$dt->setTimestamp($timestamp); //adjust the object to correct timestamp
$td=$dt->format('d');
$th=$dt->format('G');
if($td==$firstDay){
    $maxEntries=300;
    $javedEntries=60;
}
else if($td==$secondDay){
    $maxEntries=650;
    $javedEntries=130;
}else if($td==$thirdDay){
    $maxEntries=1000;
    $javedEntries=200;
}else{
    $maxEntries=0;
    $javedEntries=200;
}
if($th!="19"&&$th!="20") {
    $javedEntries=0;
    $maxEntries = 0;
}
$category="profs_";