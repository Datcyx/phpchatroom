<?php

session_start();
// Create connection
include "connection.php";
//INITIALIZATION
 $user = $_SESSION["username"];
$msgx = trim($_POST["message"]);
$name = $user;
$msg = htmlspecialchars($msgx);
 $room= $_SESSION["roomid"]; 

 $counttext = strlen($msg);
$type ="text";

//IF EMPTY MESSAGE
 if(empty($msgx)){


 }else{
    //CHECK IF JOIN
        $table2 = mysqli_query($conn, "select * from room_member WHERE room='".$room."' AND members_username='".$user."'");

$checkifjoin = mysqli_num_rows( $table2);
if($checkifjoin == 1){
    //INSERTION INTO MESSAGE
        // Prepare an insert statement
        $sql = "INSERT INTO messages(username, message, room, type) VALUES (?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssss", $param_username, $param_chats, $param_room, $param_type);
            
            // Set parameters
            $param_username = $name;
            $param_room = $room;
            $param_type = $type;
            $param_chats = $msg; // Creates a password hash
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $last_id = mysqli_insert_id($conn);
                $_SESSION["lasts$room"] = $last_id;

            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    
    
    // Close connection
    mysqli_close($conn);
    }else{
        //IF NOT JOINED
     echo "<div style='top:300px;right:120px;'class='bubble sender first chatmessages'>YOU DONT HAVE PERMISSION TO ACESS THIS GROUP OR MAYBE YOU ARE NOT PART OF THIS</div>";
  
 echo "<script>$('#chat_inputp').hide();</script>";

}
}


?>
