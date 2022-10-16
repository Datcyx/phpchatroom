<?php
session_start();
include "connection.php";

 $room= $_SESSION["roomid"]; 
  $user = $_SESSION["username"];
$type ="image";

    $maxsize    = 2097152;
/* Get the name of the uploaded file */
$filename = $_FILES['file']['name'];
 $file = $_FILES['file']['tmp_name'];
        $source_properties = getimagesize($file);
$file_size = $_FILES['filefile']['size'];
        if(($_FILES['file']['size'] >= $maxsize) || ($_FILES["file"]["size"] == 0)) {
        $_SESSION["error"] ="too large (maximum 2mb)";

        }if(($_FILES['file']['size'] >= $maxsize) || ($_FILES["file"]["size"] == 0) && $source_properties == null) {
        $_SESSION["error"] ="Not a valid image";

        }else if($source_properties == null){
            $_SESSION["error"] ="INVALID FILE";
        
     }else{
           $image_type = $source_properties[2];
        
        if ($image_type == IMAGETYPE_JPEG) {
            $image_resource_id = imagecreatefromjpeg($file);
            $target_layer = fn_resize($image_resource_id, $source_properties[0], $source_properties[1]);
            imagejpeg($target_layer, '../img/' .$_FILES['file']['name'] . "_takatik.jpg");
            //THIS



        // Prepare an insert statement
        $sql = "INSERT INTO messages(username, message, room, type, caption) VALUES (?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssss", $param_username, $param_chats, $param_room, $param_type, $param_caption);
            
            // Set parameters
            $param_username = $user;
            $param_room = $room;
            $param_type = $type;
            $param_chats = $_FILES['file']['name'] . "_takatik.jpg";
            $param_caption = trim($_POST['caption']);
            
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
     
            //END
        } elseif ($image_type == IMAGETYPE_GIF) {
            $image_resource_id = imagecreatefromgif($file);
            $target_layer = fn_resize($image_resource_id, $source_properties[0], $source_properties[1]);
            imagegif($target_layer, $_FILES['file']['name'] . "_takatik.gif");


        } elseif ($image_type == IMAGETYPE_PNG) {
            $image_resource_id = imagecreatefrompng($file);
            $target_layer = fn_resize($image_resource_id, $source_properties[0], $source_properties[1]);
            imagepng($target_layer, $_FILES['file']['name'] . "_takatik.png");
        }
    }


function fn_resize($image_resource_id, $width, $height)
{
    $target_width = 200;
    $target_height = 200;
    $target_layer = imagecreatetruecolor($target_width, $target_height);
    imagecopyresampled($target_layer, $image_resource_id, 0, 0, 0, 0, $target_width, $target_height, $width, $height);
    return $target_layer;
}

?>
