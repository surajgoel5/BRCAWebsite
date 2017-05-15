<?php
 
// $servername = "mysql11.000webhost.com";
// $username = "a6037690_iit";
// $password = "rdv-iit";
// $dbname = "a6037690_rdv";

   mysql_connect("localhost","brca","94f3bdfb") or die(mysql_error ());
   mysql_select_db("brca") or die(mysql_error());


// check for required fields
if (empty($_POST['type'])) {

    // required field is missing
    $json='[{"success":"0"},{"message":"Required field(s) is(are) missing."}]';
    

    // echoing JSON response
    echo json_encode(json_decode($json));
} 

    else {
 
    $type = $_POST['type'];
    
    

    if((strcmp($type,"votingevents"))==0){

    // mysql selecting rows
    $sql = "SELECT * FROM events WHERE poling='yes' ORDER BY date";
    $result = mysql_query($sql);
    
    $return_arr = array();

    while($row=mysql_fetch_array($result)) {
        
         $json['event_name']=$row['name'];
	 $json['venue_name']=$row['venue'];
         $json['venue_lat']=$row['venue_lat'];
         $json['venue_lng']=$row['venue_lng'];
         $json['poling_range']=$row['poling_range'];
         $json['max_votes']=$row['poling_teams_number'];
         $json['voting_started']=$row['poling_start'];
         $eventname = $row['name'];
	 $team_type_event = $row['team_type'];

                                           $sql2 = "SELECT * FROM teams WHERE team_type='$team_type_event' ORDER BY team_name";
                                           $result2 = mysql_query($sql2);
    
                                           $return_teams = array();

                                           while($row=mysql_fetch_array($result2)) {
        
                                                 $json2['team_name']=$row['team_name'];
                                                 array_push($return_teams,$json2);
    
                                               }



         array_push($json,$return_teams);
         array_push($return_arr,$json);
    
      }

     echo json_encode($return_arr);
    }
     else{
          $json='[{"success":"0"},{"message":"INVALID TYPE"}]';
          echo json_encode(json_decode($json));
     }

    }
?>			