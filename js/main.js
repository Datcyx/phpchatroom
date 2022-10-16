
$("body").fadeIn(3000);
function clearConsole() { 
    if(window.console || window.console.firebug) {
       console.clear();
    }
}
$(document).ready(function() {
   $("#visit").click(function(){
 $('#chat_inputp').show();


   });
  
   });


function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}


$(document).ready(function() {
setInterval(function(){geterr()},500);
function geterr()
{
jQuery.ajax({
type:"GET",
url: "function/error.php",
data:"",
 beforeSend: function() {

},
complete: function() {
},
success: function(data) {
//alert (data);

$("#err").text(data);
if(!data) {
    $("#mza").hide();
        return;
    }else{
        $("#mza").show();
        return;
    }


}
});
}

});

$(document).ready(function() {
setInterval(function(){getrooms()},4000);
function getrooms()
{
jQuery.ajax({
type:"GET",
url: "function/rooms.php",
data:"",
 beforeSend: function() {

},
complete: function() {
},
success: function(data) {
//alert (data);
 $("#loader").text("");
$("#right").html(data);
clearConsole();


}
});
}

});

$(document).ready(function(){
        $("#sendbtn").click(function(){
let d = $('textarea#messageholder').val().length;

    if(d <= 0){
$("#hshs").fadeIn();
    }else{
    $('#chatext').scrollTop(1000000);
  
      $('#chatext').scrollTop(1000000);
    jQuery.ajax({
    type:"POST",
    url: "function/sendmessage.php",
    data:{ name: "TEST USER", message: $('textarea#messageholder').val()},
    complete: function() {
       $('#chatext').scrollTop(4000000);
    }, error: function(xhr, status, error) {
 console.error(xhr);
},
    success: function(data) {
       $('#messageholder').val('');
 setTimeout(function() { 
         $('#chatext').scrollTop(1000000);
         console.log("tara");

         clearConsole();
    }, 4981);



    }
    });
   
  }
 });
});

$(document).ready(function(){
    $('#chatext').scrollTop(1000000);
      $("#sendmsglike").click(function(){
      $('#chatext').scrollTop(1000000);
    jQuery.ajax({
    type:"POST",
    url: "function/sendlike.php",
    data:{ name: "TEST USER"},
    complete: function() {
       $('#chatext').scrollTop(4000000);
    }, error: function(xhr, status, error) {
 console.error(xhr);
},
    success: function(data) {

 setTimeout(function() { 
         $('#chatext').scrollTop(1000000);
         console.log("tara");

         clearConsole();
    }, 4981);



    }
    });
    });

});

$(document).ready(function(){
    
      $("#uploadph").click(function(){
    $(".modalx1").slideDown();
    });

});


async function uploadFile() {
    $('#chatext').scrollTop(1000000);
    let formData = new FormData();           
    formData.append("file", fileupload.files[0]);
    formData.append("caption", document.getElementById("textcap").value);
    await fetch('function/resize.php', {
      method: "POST", 
      body: formData
    }); 
     
    const myTimeout = setTimeout(scrollx, 5000);
   $("#zz").prop('disabled', true);

    function scrollx() {
  $('#chatext').scrollTop(1000000);

   let xz = $("#err").text();
   if(xz ==""){
         $("#upimg").fadeOut();
            $("#zz").prop('disabled', false);
    }else{
           
       jQuery.ajax({
type:"GET",
url: "function/seterr.php",
data:{},
 beforeSend: function() {

},
complete: function() {
},
success: function(data) {
//alert (data);

}
});
    }

}

    
}

$(document).ready(function() {

setInterval(function(){get_data()},4000);
function get_data()
{
jQuery.ajax({
type:"GET",
url: "function/fetchchats.php",
data:{id:$("title").text()},
 beforeSend: function() {

},
complete: function() {
},
success: function(data) {
//alert (data);
 $("#loader").text("");
  
$("#chatext").html(data);
clearConsole();
}
});
}
});

$(document).ready(function(){

      $("#sendbtndisabled").click(function(){
        console.log("executes");
    });

});

$(document).ready(function() {
$("#joinbtn").click(function(){

 });

});

function joingroup(roomid){
  let x = roomid;
jQuery.ajax({
type:"GET",
url: "function/join.php",
data:{id:x},
 beforeSend: function() {

},
complete: function() {
},
success: function(data) {
//alert (data);
 $("#loader").text("");
  window.location.href = "index.php?id="+x;
$("#chatext").html(data);
clearConsole();
}
});
}

function leavegroup(roomid){
  let x = roomid;
jQuery.ajax({
type:"GET",
url: "function/leave.php",
data:{id:x},
 beforeSend: function() {
$("#chatext").html("<img style=' width: 293px;text-align: center;position: relative;right: -341px;top: 215px;'  src='img/loading.gif'>");
},
complete: function() {
    $("#chatext").html("<img style=' width: 293px;text-align: center;position: relative;right: -341px;top: 215px;'  src='img/loading.gif'>");
},
success: function(data) {
//alert (data);


 $("#loader").text("");
  
$("#chatext").html(data);

clearConsole();
}
});
}


function showPreview(event){
  if(event.target.files.length > 0){
    var src = URL.createObjectURL(event.target.files[0]);
    var preview = document.getElementById("file-ip-1-preview");
    preview.src = src;
    preview.style.display = "block";
  }
  }

  $(document).ready(function() {
$("#closerr").click(function(){
$("#hshs").slideUp();
 });

});
  $(document).ready(function() {
$("#closerr1").click(function(){

$("#upimg").fadeOut();
jQuery.ajax({
type:"GET",
url: "function/clearerr.php",
data:{},
 beforeSend: function() {

},
complete: function() {
},
success: function(data) {
//alert (data);

}
});
 });

});

 $(document).ready(function() {
$("#closerr1x").click(function(){

jQuery.ajax({
type:"GET",
url: "function/clearerr.php",
data:{},
 beforeSend: function() {

},
complete: function() {
},
success: function(data) {
$("#zz").prop('disabled', false);

}
});
 });

});

  const myTimeout = setTimeout(scrollxx, 7000);
   
    function scrollxx() {
  $('#chatext').scrollTop(1000000);
   
    }