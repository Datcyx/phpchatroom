<?php
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

$allroom = mysqli_query($conn, "select * from rooms");
while ($execute = mysqli_fetch_array($allroom))
{
$table = mysqli_query($conn, "SELECT COUNT(room) AS 'all' FROM messages WHERE  room='".$execute['name']."'");

while ($row9 = mysqli_fetch_array($table))
{

$old = $row9["all"];



}
}

?>


 

   
 