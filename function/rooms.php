





 <?php 
 include "connection.php";
session_start();

 $room1= $_SESSION["roomid"]; 
  $user = $_SESSION["username"];
$table = mysqli_query($conn, "select * from rooms");

while ($row = mysqli_fetch_array($table))
{

  $roomn = $row["name"];
   $_SESSION["$roomn"] = "unread";
  $table2 = mysqli_query($conn, "select * from room_member WHERE room='".$roomn."'");

$count = mysqli_num_rows( $table2);
  $table3 = mysqli_query($conn, "select * from room_member WHERE room='".$roomn."' AND members_username ='".$user."'");

$checkifisjoin = mysqli_num_rows( $table3);

if($_SESSION["roomid"] ==  $row["name"]){
  ?>

  <div class="card w-101"  style="background-color: #c1c1c1;">
  <div class="card-body">




 
    <h5 class="card-title"> <a title="<?php echo $row["name"];?>" style="cursor: pointer; text-decoration: none;" href="index.php?id=<?php echo $row["name"]; ?>"><?php echo  $row["name"]; ?></h5></a><p><?php echo $count;?> member</p><img class="roomavatar"  src="image.jpg">
    <p title="<?php echo $row["description"];?>"  style="    font-size: 12px" class="card-text"><?php echo  $row["description"]; ?></p>
    <?php
    if($checkifisjoin == 1){
      ?>
      <button title="Leave <?php echo $row["name"];?>" onclick="leavegroup('<?php echo $row["name"];?>')" class="button is-link is-rounded">Leave</button>
    <?php
  }else{
    ?>
     <button title="Join <?php echo $row["name"];?>" onclick="joingroup('<?php echo $row["name"];?>')" class="button is-link is-rounded">Join</button>
     <?php
  }
  ?>
  </div>
</div>
<?php 
}else{
?>

<div class="card w-101"  style="">
  <div class="card-body">




 
    <h5 class="card-title"> <a title="<?php echo $row["name"];?>" style="cursor: pointer; text-decoration: none;" href="index.php?id=<?php echo $row["name"]; ?>"><?php echo  $row["name"]; ?></h5></a><p><?php echo $count;?> member</p><img class="roomavatar"  src="image.jpg">
    <p title="<?php echo $row["description"];?>"  style="    font-size: 12px" class="card-text"><?php echo  $row["description"]; ?></p>
    <?php
   if($checkifisjoin == 1){
      ?>
      <button title="Leave <?php echo $row["name"];?>" onclick="leavegroup('<?php echo $row["name"];?>')" class="button is-link is-rounded">Leave</button>
    <?php
  }else{
    ?>
     <button title="Join <?php echo $row["name"];?>" onclick="joingroup('<?php echo $row["name"];?>')" class="button is-link is-rounded">Join</button>
     <?php
  }
  ?>
  </div>
</div>

 <?php
}
}
?>