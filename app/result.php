<?php
 

// $servername = "mysql11.000webhost.com";
// $username = "a6037690_iit";
// $password = "rdv-iit";
// $dbname = "a6037690_rdv";

		date_default_timezone_set("Asia/Calcutta");
		$date=date_create();
		$vote_date = date_format($date,"Y/m/d H:i:s");
   mysql_connect("localhost","brca","94f3bdfb") or die(mysql_error ());
   mysql_select_db("brca") or die(mysql_error());

    
    $query1 = "SELECT imei from voting where team='Aravali'";
    $query2 = "SELECT imei from voting where team='Girnar'";
    $query3 = "SELECT imei from voting where team='Himadri'";
    $query4 = "SELECT imei from voting where team='Jwalamukhi'";
    $query5 = "SELECT imei from voting where team='Kailash'";
    $query6 = "SELECT imei from voting where team='Karakoram'";
    $query7 = "SELECT imei from voting where team='Kumaon'";
    $query8 = "SELECT imei from voting where team='Nilgiri'";
    $query9 = "SELECT imei from voting where team='Satpura'";
    $query10 = "SELECT imei from voting where team='Shivalik'";
    $query11 = "SELECT imei from voting where team='Udaigiri'";
    $query12 = "SELECT imei from voting where team='Vindhyachal'";
    $query13 = "SELECT imei from voting where team='Zanskar'";
    $query14 = "SELECT imei from voting";
    


    $result1 = mysql_query($query1);
    $result2 = mysql_query($query2);
    $result3 = mysql_query($query3);
    $result4 = mysql_query($query4);
    $result5 = mysql_query($query5);
    $result6 = mysql_query($query6);
    $result7 = mysql_query($query7);
    $result8 = mysql_query($query8);
    $result9 = mysql_query($query9);
    $result10 = mysql_query($query10);
    $result11 = mysql_query($query11);
    $result12 = mysql_query($query12);
    $result13 = mysql_query($query13);
    $result14 = mysql_query($query14);
    
     $votes1 = mysql_num_rows($result1);
     $votes2 = mysql_num_rows($result2);
     $votes3 = mysql_num_rows($result3);
     $votes4 = mysql_num_rows($result4);
     $votes5 = mysql_num_rows($result5);
     $votes6 = mysql_num_rows($result6);
     $votes7 = mysql_num_rows($result7);
     $votes8 = mysql_num_rows($result8);
     $votes9 = mysql_num_rows($result9);
     $votes10 = mysql_num_rows($result10);
     $votes11 = mysql_num_rows($result11);
     $votes12 = mysql_num_rows($result12);
     $votes13 = mysql_num_rows($result13);
     $votes14 = mysql_num_rows($result14);
     
     echo "<font size=20>VOTE COUNT</font><br><br>";


     echo "Aravali : ".$votes1."<br>Girnar : ".$votes2."<br>Himadri : ".$votes3."<br>Jwala : ".$votes4."<br>Kailash : ".$votes5."<br>Karakoram : ".$votes6."<br>Kumaon : ".$votes7."<br>Nilgiri : ".$votes8."<br>Satpura : ".$votes9."<br>Shivalik : ".$votes10."<br>Udaigiri : ".$votes11."<br>Vindhyachal : ".$votes12."<br>Zanskar : ".$votes13."<br><br>Total : ".$votes14."<br>";                   


?>		