<?php
 
/*
 * Following code will create a new user row
 * All user details are read from HTTP Post Request
 */

// $servername = "mysql11.000webhost.com";
// $username = "a6037690_iit";
// $password = "rdv-iit";
// $dbname = "a6037690_rdv";

   mysql_connect("localhost","brca","94f3bdfb") or die(mysql_error ());
   mysql_select_db("brca") or die(mysql_error());


// check for required fields
if (empty($_POST['clubname']) || empty($_POST['type'])) {

    // required field is missing
    $json='[{"success":"0"},{"message":"Required field(s) is(are) missing."}]';
    

    // echoing JSON response
    echo json_encode(json_decode($json));
} 

    else {
 
    $clubname = $_POST['clubname'];
    $type = $_POST['type'];
    
    

    if((strcmp($type,"events"))==0){

    // mysql selecting rows
    $sql = "SELECT * FROM events WHERE category='$clubname'";
    $result = mysql_query($sql);
    
    $return_arr = array();

    while($row=mysql_fetch_array($result)) {
        
         $json['event']=$row['name'];
         $json['description']=$row['description'];
         // echo "name: " . $row['name']. "<br>";
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