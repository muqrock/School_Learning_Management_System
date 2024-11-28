<?php 
session_start();
include "db_conn.php";

if (isset($_SESSION['id']) && isset($_SESSION['Email'])) {

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Jawab Kuiz</title>
</head>
     <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
html, body, h1, h2, h3, h4, h5 {font-family: "Open Sans", sans-serif}
</style>

<body class="w3-theme-l5">

<!-- Navbar -->
<div class="w3-top">
 <div class="w3-bar w3-theme-d2 w3-left-align w3-large">
    <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-theme-d2" href="logout.php" title="Log Keluar"><i class="fa fa-sign-out"></i></a>
    <a href="homePelajar.php" class="w3-bar-item w3-button w3-padding-large w3-theme-d4" title="Halaman Utama"><i class="fa fa-home w3-margin-right"></i>Halaman Utama</a>
    <a href="profilPelajar.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="Profil Penguna"><i class="fa fa-user-circle"></i></a>
    <a href="logout.php" class="w3-bar-item w3-button w3-hide-small w3-right w3-padding-large w3-hover-white w3-theme-d4" title="Log Keluar"><i class="fa fa-sign-out w3-margin-right"></i>Log Keluar</a>
 </div>
</div>

<!-- Page Container -->
<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">    
  <!-- The Grid -->
  <div class="w3-row">
    <!-- Left Column -->
    <div class="w3-col m3">
      <!-- Profile -->
      <div class="w3-card w3-round w3-white">
        <div class="w3-container">
         <h4 class="w3-center"><?php echo $_SESSION['Nama']; ?></h4>
         <p class="w3-center"><img src="images/stud.png" class="w3-circle" style="height:106px;width:106px" alt="Avatar"></p>
         <hr>
         <p><i class="fa fa-id-badge fa-fw w3-margin-right w3-text-theme"></i>Pelajar</p>
         <p><i class="fa fa-institution fa-fw w3-margin-right w3-text-theme"></i>SEKOLAH KEBANGSAAN ASSUMPTION</p>
        </div>
      </div>
      <br>
      

     
    <!-- End Left Column -->
    </div>
    
    <!-- Middle Column -->
    <div class="w3-col m7">

    <div class="w3-row-padding">
      <div class="w3-col m12">
        <div class="w3-card w3-round w3-white">
          <div class="w3-container w3-padding">
            <center><div id="countdowntimer" style="display: block; font-size:30px;"></div></center>
            <hr class="w3-clear">
            <h3 class="w3-center" style="color:red; background-color:powderblue;"><?php echo "$_SESSION[kuiz_subjek]"?></h3>
          </div>
        </div>
      </div>
    </div>
    <br/>
     
      <div class="w3-row-padding">
        <div class="w3-col m12">
          <div class="w3-card w3-round w3-white">
            <div class="w3-container w3-padding">
              <!-- DISPLAY NO SOALAN/BILANGAN SOALAN -->
              <div id="total_que" style="float:right">0</div>
              <div style="float:right">/</div>
              <div id="current_que" style="float:right">0</div>
          
<div class="row" style="margin-top: 30px">
  <div class="row">
    <!-- PAPARKAN SOALAN -->
    <div class="col-lg-10 col-lg-push-1" style="min-height: 300px; " id="load_questions"></div>
  </div>
</div>

<div class="row" style="margin-top: 10px">
  <div class="col-lg-6 col-lg-push-3" style="min-height: 50px">
    <div class="col-lg-12 text-center">
      <input type="button" class="btn btn-warning" value="Sebelumnya" title="Soalan Sebelumnya" onclick="load_previous();">&nbsp;
      <input type="button" class="btn btn-success" value="Seterusnya" title="Soalan Seterusnya" onclick="load_next();">
    </div>
  </div>
</div>

            </div>
          </div>
        </div>
      </div>
      


      
    <!-- End Middle Column -->
    </div>
  
    
  <!-- End Grid -->
  </div>
  
<!-- End Page Container -->
</div>
<br>

<!-- Footer -->
<footer class="w3-container w3-theme-d3 w3-padding-16">
  <h6 class="w3-center">Dicipta oleh Muqri, Athirah, Nasuha @ Politeknik Seberang Perai</h6>
</footer>

<script type="text/javascript">
//JS UNTUK TIMER KUIZ - AJAX
setInterval(function(){
        timer();
    },1000);
    function timer()
    {
    var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function(){
        if(xmlhttp.readyState==4 && xmlhttp.status==200){
            if(xmlhttp.responseText=="00:00:01"){
                window.location="kuiz_result.php";
            }
            document.getElementById("countdowntimer").innerHTML=xmlhttp.responseText;
        }
    };
    xmlhttp.open("GET","forajax/load_timer.php",true);
    xmlhttp.send(null);
    }

//JS UNTUK SOALAN KUIZ
function load_total_que(){
  var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function(){
        if(xmlhttp.readyState==4 && xmlhttp.status==200){
            document.getElementById("total_que").innerHTML=xmlhttp.responseText;
        }
    };
    xmlhttp.open("GET","forajax/load_total_que.php",true);
    xmlhttp.send(null);
}

var questionno="1";
load_questions(questionno)
function load_questions(questionno){
  document.getElementById("current_que").innerHTML=questionno;
  var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function(){
        if(xmlhttp.readyState==4 && xmlhttp.status==200){
            
            if(xmlhttp.responseText=="over"){
              window.location="kuiz_result.php";
            }else{
              document.getElementById("load_questions").innerHTML=xmlhttp.responseText;
              load_total_que();
            }
        }
    };
    xmlhttp.open("GET","forajax/load_questions.php?questionno=" + questionno,true);
    xmlhttp.send(null);
}

//JS UNTUK SIMPAN PILIHAN JAWAPAN SEMASA JAWAB KUIZ
function radioclick(radiovalue,questionno){
var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function(){
        if(xmlhttp.readyState==4 && xmlhttp.status==200){
            
        }
    };
    xmlhttp.open("GET","forajax/save_answer_in_session.php?questionno="+ questionno +"&value1="+ radiovalue,true);
    xmlhttp.send(null);
  }

//JS UNTUK PREVIOUS & NEXT
function load_previous()
{
  if(questionno=="1"){
    load_questions(questionno);
  }else{
    questionno=eval(questionno) - 1;
    load_questions(questionno);
  }
}

function load_next()
{
  questionno=eval(questionno) + 1;
  load_questions(questionno);
}












// Accordion
function myFunction(id) {
  var x = document.getElementById(id);
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
    x.previousElementSibling.className += " w3-theme-d1";
  } else { 
    x.className = x.className.replace("w3-show", "");
    x.previousElementSibling.className = 
    x.previousElementSibling.className.replace(" w3-theme-d1", "");
  }
}


</script>
</body>
</html>

<?php 
// SET KALAU USER TAK LOGIN AKAN BAWA KE PAGE LOGIN
}else{
  header("Location: index.html");
  exit();
}
 ?>
 