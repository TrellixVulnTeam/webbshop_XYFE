<?php

$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'ws2';

/*$servername = 'localhost';
$username = 'adm';
$password = 'myserverx';
$dbname = 'ws';*/

if (isset($_GET['productID'])) {
    $prodID = $_GET['productID'];
} else {
    exit("WARNING, No productID was gotten");
}

if ($prodID) {
  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $sql = "SELECT productID, name, description, price, filePath FROM products WHERE productID = '$prodID' AND hidden=0";
  $result = $conn->query($sql);

  echo json_encode($result -> fetch_all(MYSQLI_ASSOC));

  $conn->close();
}
?>
