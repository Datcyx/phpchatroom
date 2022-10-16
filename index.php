<?php
//MADE BY CYBERX
session_start();
include "function/connection.php";
$_SESSION["error"] ="";
?>

 <?php 
 //IF LOGIN
  if (empty($_SESSION["username"])){
     header("location:./login.php");

 }else{


  $user = $_SESSION["username"];
}
//IF POST IS TRUE OR NOT
//NOT TRUE
if (empty($_GET['id'])) {
   $room= "LOBBY";
$rooms = htmlspecialchars($room);
$_SESSION["roomid"] = $rooms;
//CHECK IF MEMBER IF NOT THEN JOIN
$check = mysqli_query($conn, "select * from room_member WHERE room='LOBBY' AND members_username='".$user."'") ;
$result = mysqli_num_rows( $check);
        if($result == 0){
          $sql = "INSERT INTO room_member (members_username, room) VALUES ('".$user."', 'LOBBY')";
          if(mysqli_query($conn, $sql)){
 
      } else{

        }
    }else{
          header("Location:index.php?id=LOBBY");
        }

}else{

//POST IS TRUE
include 'function/wherechats.php';

$rooms = htmlspecialchars($room);
$table = mysqli_query($conn, "select * from rooms WHERE name='".$rooms."'");
$rowcount = mysqli_num_rows($table);
if($rowcount == 0){
$_SESSION["roomid"] = "LOBBY";
$room= "LOBBY";
$rooms = htmlspecialchars($room);
$_SESSION["roomid"] = $rooms;
$check = mysqli_query($conn, "select * from room_member WHERE room='LOBBY' AND members_username='".$user."'") ;
$result = mysqli_num_rows( $check);
        if($result == 0){
          $sql = "INSERT INTO room_member (members_username, room) VALUES ('".$user."', 'LOBBY')";
          if(mysqli_query($conn, $sql)){
 
      } else{

        }
    }
}else{
  //IF USER POST
  $rooms;

   $checkuser = mysqli_query($conn, "select * from room_member WHERE room='".$rooms."' AND members_username='".$user."'");

$checkiftrue = mysqli_num_rows($checkuser);
if($checkiftrue == 1){
  $_SESSION["roomid"] = $rooms;
  $room = $_SESSION["roomid"];
$_SESSION["messageread"] =1;



}else{
  $_SESSION["roomid"] = $rooms;
  $room = $_SESSION["roomid"];
}

}
}

 

   ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo$_SESSION["roomid"];?></title>
		<!-- CSS only -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
   <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
<link rel="stylesheet" href="style/style.css">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-light" style="z-index:0;">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">TalkAtik</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Features</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
  <div class="right-headm">
    <h4 class="chnm">Chatrooms</h4>
    <a><i class="ddsv large material-icons">add_circle</i></a>
<hr>

</div>

<div class="right" id="right">
<img src="img/loading.gif">


</div>

<div id="hshs" class="modalxerror card" style="display: none;background-color: rgb(227, 218, 218); width: 472px; top: 84px; left: 400px; z-index: 2; bottom: 825px; position: fixed; border-radius: 2px; box-shadow: rgb(204, 204, 204) 1px 0px 0px 0px; height: 100px;">
 <a id="closerr" style="
    position: relative;
    top: 5px;
    left: 450px;
">x</a><h5 style="
    top: -5px;
    position: relative;
    left: 31px;
">Eroor</h5>
  <p style="
    position: relative;
    top: 10px;
    left: 162px;
">Message not send</p>
   

  </div>
<div id="upimg" class="modalx1 card" style="display: none;background-color: rgb(227, 218, 218);width: 472px;height: 292px;top: 84px;left: 400px;z-index: 2;bottom: 825px;position: fixed;border-radius: 2px;box-shadow: rgb(204, 204, 204) 1px 0px 0px 0px;height: 600px;"><a id="closerr1" style="
    position: relative;
    top: 5px;
    left: 449px;
">x</a>
 <h5 style="
    top: 16px;
    position: relative;
    left: 31px;
">Send Photo</h5>
<article id="mza" class="message">

  <div class="message-header" style="
    position: relative;
    bottom: 99px;
">
    <p id="err"></p>
     <button class="delete" id="closerr1x" aria-label="delete"></button>

  </div>
  
</article>
<form action="" method="post"
   enctype="multipart/form-data">
  <label class="file-label" style="
    top: 25px;
">
    <input class="file-input" id="fileupload" accept="image" onchange="showPreview(event);" type="file" name="fileupload">
    <span class="file-cta">
      <span class="file-icon">
        <i class="fas fa-upload"></i>
      </span>
      <span class="file-label">
        Choose a file…
      </span>
    </span>
    <span class="file-name">
 
    </span>


  </label>
 <div class="preview" style="
    position: relative;
    width: 172px;
    top: 25px;
    z-index: 2;
    left: 134px;
">
   <img id="file-ip-1-preview" src="" style="display: none;">
 </div>
<textarea id="textcap" class="form-control " type="text" placeholder="Caption" style="text-indent: 10px;height: 209px;margin-left: 46px;margin-right: 48px;position: relative;top: 77px;resize: none;height: 150px;max-width: 396px;"></textarea>

  <input id="zz" onclick="uploadFile()" class="button is-primary" style="
    max-width: 72px;
    position: relative;
    left: 362px;
    top: 100px;
" value="Send" name="submit">
</form >
</div>
<!----HEAD OF CHAT-->
<div class="chats">
<div class="chathead">
  <h4 class="chatitle"><?php echo$_SESSION["roomid"];?></h4>
</div>
<div id="chatext" class="chatext">
   
<img style=" width: 293px;
    text-align: center;

    position: relative;
    right: -341px;
    top: 215px;"  src="img/loading.gif">



  </div>

  </div>


<!----END OF CHAT-->

<!----INPUTS OF CHAT-->
<div id="chat_inputp" class="chat_inputp" style="display:none;">
 <div class="form-group">

    <a id="uploadph"><i class="ripple ddsxs large material-icons">add_a_photo</i></a><textarea id="messageholder" placeholder="Aa" class="form-control xa"  id="exampleFormControlTextarea1" rows="3"></textarea>  <a id="sendbtn"><i class="ripple ddsx large material-icons">send</i></a>
<a class="" id="sendmsglike"><i class=" ripple ddsx1 large material-icons">thumb_up</i></a>
  </div>
</div>
   <script src="js/main.js"></script>
<script>

  </script>
</body>
</body>
</html>

