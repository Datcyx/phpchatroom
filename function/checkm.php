<?php

//UNDER DEVELOPMENT 
session_start();
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "chatroom";

   $conn = mysqli_connect($hostname, $username, $password);


if(!$conn) {
die("Connection failed: ");
}
mysqli_select_db( $conn, $dbname);
?>

 <?php 
 
$table2 = mysqli_query($conn, "select name from rooms");
while ($row1 = mysqli_fetch_array($table2))
{

$table = mysqli_query($conn, "SELECT COUNT(room) AS 'all' FROM messages WHERE  room='".$row1["name"]."'");

while ($row = mysqli_fetch_array($table))
{
$x1 = $row1["name"];
$x = $row["all"];




$sql = "INSERT INTO countmessage (room, value) VALUES ('".$x1."', '".$x."')";
if(mysqli_query($conn, $sql)){
    echo "Records were updated successfully.";
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}



 }}


?>


 

   
 