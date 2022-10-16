<?php
session_start();
include "connection.php";
?>

 <?php 
 if (empty($_SESSION["username"])){
     header("location:../login.php");

 }else{
     $user = $_SESSION["username"];
 }
 if (empty($_GET['id'])){
     header("location:../index.php");

 }else{
$room= trim($_GET['id']);

$rooms = htmlspecialchars($room);

$table = mysqli_query($conn, "select * from messages WHERE room='".$rooms."'");
$rowcount = mysqli_num_rows( $table );

$table2 = mysqli_query($conn, "select * from room_member WHERE room='".$rooms."' AND members_username='".$user."'");

$checkifjoin = mysqli_num_rows( $table2);
if($checkifjoin == 1){
if($rowcount == 0){

$_SESSION["$room"] = "read";

  echo "<div style='top:300px;right:380px;'class='bubble sender first chatmessages'>BE FIRST TO CHAT HERE</div>";
 
     echo "<script>$('#chat_inputp').show();</script>";



}else{

    echo "<script>$('#chat_inputp').show();</script>";
while ($row = mysqli_fetch_array($table))
{
   //USER MESSAGE
   if($row["username"]== $_SESSION["username"] && $row["message"] !=":like:" && $row["type"] !="image"){
      ?>

     <section class="discussion">

</p>
   <div  style ="background-color:#538701;margin-bottom: 9px;left:380px;border-bottom-left-radius: 2.0999999999999943em;" class="bubble sender first chatmessages"><?php echo  $row["message"]; ?></div>
   
     <i style="
    float: right;
    position: relative;
    right: 325px;
    top: -59px;
    font-size: 40px;
    width: 30px;
" class=""></i>


</section>

   <?php
   //USER MESSAGE LIKE MESSAGE
}else if($row["username"]== $_SESSION["username"] && $row["message"] ==":like:"){
      ?>

    <section class="discussion">

    <div  style ="background-color:#538701;margin-bottom: 9px;left:380px;border-bottom-left-radius: 2.0999999999999943em;" class=" first chatmessages"><img src="img/like.gif" loop=infinite /></div>
   
     <i style="
    float: right;
    position: relative;
    right: 325px;
    top: -59px;
    font-size: 40px;
    width: 30px;
" class=""></i>


</section>

   <?php
   //USER MESSAGE IMAGE WITH CAPTION
}else if($row["username"]== $_SESSION["username"] && $row["type"] == "image" && $row["caption"] == ""){
      ?>

    <section class="discussion">

    <div  style ="background-color:#538701;margin-bottom: 9px;left:380px;border-bottom-left-radius: 2.0999999999999943em;" class=" first chatmessages"><img src="img/<?php echo $row["message"]; ?>"  /></div>
   
     <i style="
    float: right;
    position: relative;
    right: 325px;
    top: -59px;
    font-size: 40px;
    width: 30px;
" class=""></i>


</section>

   <?php
   //USER MESSAGE IMAGE WITHOUT CAPTION
}else if($row["username"]== $_SESSION["username"] && $row["type"] == "image" && $row["caption"] != ""){
      ?>

    <section class="discussion">

    <div  style ="background-color:#538701;margin-bottom: 9px;left:380px;border-bottom-left-radius: 2.0999999999999943em;" class="bubble sender first chatmessages"><img src="img/<?php echo $row["message"]; ?>"  /><?php echo $row["caption"]; ?></div>
   
     <i style="
    float: right;
    position: relative;
    right: 325px;
    top: -59px;
    font-size: 40px;
    width: 30px;
" class=""></i>


</section>

   <?php
   //MEMBER MESSAGE IMAGEE WITH CAPTION
}else if($row["username"] != $_SESSION["username"] && $row["type"] == "image" && $row["caption"] == ""){
      ?>

    <section class="discussion">
<p class="usernac"><?php echo  $row["username"]; ?></p>
    <div class="bubble sender first chatmessages"><img src="img/<?php echo $row["message"]; ?>"  /><?php echo $row["caption"]; ?></div>
   
       <i style="
    float: right;
    position: relative;
    right: 325px;
    top: -59px;
    font-size: 40px;
    width: 30px;
" class=""><img class="avatar" src="image.jpg"></i>


</section>

   <?php
   //MEMBER IMAGE MESSAGE WITHOUT CAPTION
}else if($row["username"] != $_SESSION["username"] && $row["type"] == "image" && $row["caption"] != ""){
      ?>

    <section class="discussion">
<p class="usernac"><?php echo  $row["username"]; ?></p>
    <div class="bubble sender first chatmessages"><img src="img/<?php echo $row["message"]; ?>"  /><?php echo $row["caption"]; ?></div>
   
         <i style="
    float: right;
    position: relative;
    right: 325px;
    top: -59px;
    font-size: 40px;
    width: 30px;
" class=""><img class="avatar" src="image.jpg"></i>


</section>

   <?php
   //FETCH LIKE MESSAGE
}else if($row["message"] ==":like:"){
  

   

?>






<section class="discussion">

<p class="usernac"><?php echo  $row["username"]; ?></p>
   <div class=" first chatmessages"><img src="img/like.gif" loop=infinite /></div>
   
     <i style="
    float: right;
    position: relative;
    right: 325px;
    top: -59px;
    font-size: 40px;
    width: 30px;
" class=""><img class="avatar" src="image.jpg"></i>


</section>
 <?php
 //SYSTEM MESSAGES ANNOUNCEMENT
 }else if($row["username"] =="system" && $row["type"] == "systemg"){
      ?>

    <section class="discussion">
    <div style="left: -45px;border-bottom-left-radius: 2.0999999999999943em;margin-bottom:90px;" class="first chatmessages"><?php  echo $row["message"]; ?></div>
   



</section>

   <?php
}else{
   //NORMAL MESSAGE
   ?>
   <section class="discussion">

<p class="usernac"><?php echo  $row["username"]; ?></p>
   <div class="bubble sender first chatmessages"><?php echo  $row["message"]; ?></div>
   
     <i style="
    float: right;
    position: relative;
    right: 325px;
    top: -59px;
    font-size: 40px;
    width: 30px;
" class=""><img class="avatar" src="image.jpg"></i>


</section>
<?php
}
$tablex = mysqli_query($conn, "SELECT * FROM messages WHERE room ='".$rooms."' order by id DESC LIMIT 1
");

while ($row1 = mysqli_fetch_array($tablex))
{
  $_SESSION["IDS"] = $row1["id"];

$tabley = mysqli_query($conn, "SELECT * FROM `seem` WHERE room = '".$rooms."' AND who ='".$user."' AND messages_id ='".$row1["id"]."'");
$checkifseen = mysqli_num_rows( $tabley);

         
        
    ?>

<?php

}
 
}
}
}else{
   echo "<div style='top:300px;right:120px;'class='bubble sender first chatmessages'>YOU DONT HAVE PERMISSION TO ACESS THIS GROUP OR MAYBE YOU ARE NOT PART OF THIS</div>";
  
 echo "<script>$('#chat_inputp').hide();</script>";



}
}

?>