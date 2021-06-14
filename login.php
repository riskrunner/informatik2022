<?php
  
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "logins";
$mail = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $mail = test_input($_POST["mail"]);
  $password = test_input($_POST["password"]);
}

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT n, mail, username, psk FROM logindaten WHERE mail = $mail & psk = $password";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();


?>