<?php
//LEAVE GROUP FUNCTION
include "connection.php";
session_start();
$user = $_SESSION["username"];
$room = trim($_GET['id']);
 $users="system";
 $type="systemg";
 $sql = "DELETE FROM room_member WHERE room ='".$room."' AND members_username ='".$user."'";
  $sql1 = "INSERT INTO messages(username, message, room, type) VALUES (?, ?, ?, ?)";
         
        if($stmtx = mysqli_prepare($conn, $sql1)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmtx, "ssss",$param_usernamex, $param_chatsx, $param_roomx, $param_typex);
            
                    $param_usernamex = $users;
            $param_roomx = $room;
            $param_typex = $type;
            $param_chatsx = "".$user." left The Group";
            if(mysqli_stmt_execute($stmtx)){
                
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmtx);
        }
if(mysqli_query($conn, $sql)){
    
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($conn);
?>