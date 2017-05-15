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

   $success = 1;

   if($success==0){

        $json='[{"success":"0"},{"message":"Voting Closed."}]';
    

           // echoing JSON response
                  echo json_encode(json_decode($json));
      
   }

    // check for required fields
      else if (empty($_POST['eventname']) || empty($_POST['teamname1']) || empty($_POST['imei']) || empty($_POST['range'])) {

          // required field is missing
               $json='[{"success":"0"},{"message":"Required field(s) is(are) missing."}]';
    

           // echoing JSON response
                  echo json_encode(json_decode($json));
          } 

           else {
 
                     $eventname = $_POST['eventname'];
                     $teamname1 = $_POST['teamname1'];
                     $teamname2 = $_POST['teamname2'];
                     $teamname3 = $_POST['teamname3'];
                     $imei = $_POST['imei'];
                     $range= $_POST['range'];

                              $query = "SELECT imei from voting where imei='$imei'";
                              $result = mysql_query($query);

                              if(mysql_num_rows($result) > 0)
                               {
                                    
                                          $json='[{"success":"0"},{"message":"ALREADY VOTED"}]';
                                          echo json_encode(json_decode($json));
                                    
                               }
                              else{
                                    $insert = "INSERT INTO voting (event,team,imei,in_range,timestamp) VALUES ('$eventname','$teamname1','$imei','$range','$vote_date')";
                                    $result = mysql_query($insert);
					if ($teamname2 != ""){
						$insert = "INSERT INTO voting (event,team,imei,in_range,timestamp) VALUES ('$eventname','$teamname2','$imei','$range','$vote_date')";
						$result = mysql_query($insert);
					}
					if ($teamname3 != ""){
						$insert = "INSERT INTO voting (event,team,imei,in_range,timestamp) VALUES ('$eventname','$teamname3','$imei','$range','$vote_date')";
						$result = mysql_query($insert);
					}
                                    if($result){
                                          $json='[{"success":"1"},{"message":"VOTE SUCCESSFUL"}]';
                                          echo json_encode(json_decode($json));
                                    }
                                    else{
                                          $json='[{"success":"0"},{"message":"FAILED TO VOTE"}]';
                                          echo json_encode(json_decode($json));
                                    }
                               }

                     

     }
?>	