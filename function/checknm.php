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
 
$table2 = mysqli_query($conn, "select room from room_member WHERE members_username='test user'");
while ($row8 = mysqli_fetch_array($table2))
{

$table = mysqli_query($conn, "SELECT COUNT(room) AS 'all' FROM messages WHERE  room='".$row8["room"]."'");

while ($row9 = mysqli_fetch_array($table))
{
$x1 = $row8["room"];
$x = $row9["all"];


$table = mysqli_query($conn, "select value from countmessage where room= '".$x1."'");

while ($row10 = mysqli_fetch_array($table))
{
if($row10["value"] < $x){
   $xaa = $x - $row3["value"];
   echo "new messages:".$xaa."<br>";

}else if($row10["value"] == $x){
    echo "No new messages<br>";
}
/*
$sql = "UPDATE countmessage SET value='".$x."' WHERE room ='".$x1."'";
if(mysqli_query($conn, $sql)){
    echo "Records were updated successfully.";
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}

*/
}
 }}


?>


 

   
 