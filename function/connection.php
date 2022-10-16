<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "chatroom";




// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

mysqli_select_db( $conn, $dbname);

?>