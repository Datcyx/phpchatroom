<?php

//JOIN GROUP FUNCTION

include "connection.php";
session_start();
 $user = $_SESSION["username"];
 $room = trim($_GET['id']);
 $users="system";
 $type="systemg";


  $sql = "INSERT INTO room_member (members_username, room)  VALUES (?, ?)";
         
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss",$param_username, $param_room);
            
            // Set parameters
            $param_username = $user;
            $param_room = $room;
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
               $sql1 = "INSERT INTO messages(username, message, room, type) VALUES (?, ?, ?, ?)";
         
        if($stmtx = mysqli_prepare($conn, $sql1)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmtx, "ssss",$param_usernamex, $param_chatsx, $param_roomx, $param_typex);
            
                    $param_usernamex = $users;
            $param_roomx = $room;
            $param_typex = $type;
            $param_chatsx = "".$user." Join The Group";
            if(mysqli_stmt_execute($stmtx)){
                
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmtx);
        }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    
    
    // Close connection

?>