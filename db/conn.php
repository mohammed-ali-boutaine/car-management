<?php


include "./config.php";

$tets = new mysqli();
$conn = new mysqli(DB_HOST,
     DB_USER,
     DB_PASSWORD,
     DB_NAME);

// Check connection
if ($conn -> connect_errno) {
     echo "Failed to connect to MySQL: " . $conn -> connect_error;
     exit();
}


// function getClients($conn){
//      $reslt = $conn->query("SELECT * FROM clients");
//      return $reslt;

// }

// if ($client = getClients($conn)->fetch_assoc()) {
//      echo "<pre>";
//      print_r($client);
//      echo "</pre>";
//  }
//  $reslt = getClients($conn);
// while ($row = $reslt->fetch_assoc()) {
//     echo $row['nom'] ;
//     echo "<br/>";
// }

