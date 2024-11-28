<?php 
session_start();

//isset untuk cek jika user login, paparan akan muncul jika tidak user akan ke halaman login
if (isset($_SESSION['id']) && isset($_SESSION['Email'])) {

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Halaman Utama</title>
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
      
      <!-- Accordion -->
        <a href="kuiz_Pelajar.php" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-puzzle-piece fa-fw w3-margin-right"></i>Kuiz</a>
        <a href="tugasanPelajar.php" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-pencil fa-fw w3-margin-right"></i>Kerja Rumah/Tugasan/Soalan</a>
        <a href="lihatnotaPelajar.php" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-pencil-square-o fa-fw w3-margin-right"></i>Nota</a>
        <a href="profilPelajar.php" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-user-circle fa-fw w3-margin-right"></i>Profil</a>
        <a href="feedbackPelajar.php" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-commenting fa-fw w3-margin-right"></i>Maklum Balas</a>
        <a href="logout.php" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-sign-out fa-fw w3-margin-right"></i>Log Keluar</a>
      <br>
     
    <!-- End Left Column -->
    </div>
    
    <!-- Middle Column -->
    <div class="w3-col m7">

    <div class="w3-row-padding">
        <div class="w3-col m12">
          <div class="w3-card w3-round w3-white">
            <div class="w3-container w3-padding">
            <h3 class="w3-center">Menu Utama</h3>
            <hr class="w3-clear">
        

<!-- CSS TABLE KUIZ -->
<style>
#nota {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}
#nota td, #nota th {
  padding: 8px;
}


.block {
  display: block;
  width: 100%;
  border: none;
  background-color:#008080;
  color: white;
  padding: 20px 28px;
  font-size: 18px;
  cursor: pointer;
  text-align: center;
  border-radius:28px;
}

.block:hover {
  background-color: #ddd;
  color: black;
}
</style>

<table id="nota">
  <tr>
        <td><a href="kuiz_Pelajar.php" style="text-decoration:none;"><button type="button" class="block" title="Lihat Kuiz"><i class="fa fa-puzzle-piece fa-fw w3-margin-right"></i>Kuiz</button></a></td>
        <td><a href="tugasanPelajar.php" style="text-decoration:none;"><button type="button" class="block" title="Lihat Kerja Rumah/Tugasan/Soalan"><i class="fa fa-pencil fa-fw w3-margin-right"></i>Kerja Rumah/Tugasan/Soalan</button></a></td>
        <td><a href="lihatnotaPelajar.php" style="text-decoration:none;"><button type="button" class="block" title="Lihat Nota"><i class="fa fa-pencil-square-o fa-fw w3-margin-right"></i>Nota</button></a></td>
</tr>
      </table>
         
            </div>
          </div>
        </div>
      </div>
      <br>

    <div class="w3-row-padding">
        <div class="w3-col m12">
          <div class="w3-card w3-round w3-white">
            <div class="w3-container w3-padding">
            <h3 class="w3-center">Kata-Kata Hikmah</h3>
            <hr class="w3-clear">
              <!-- CSS Code -->
<style>
.GeneratedMarquee {
font-family:Verdana, sans-serif;
font-size:1.5em;
line-height:1.3em;
text-align:center;
color:#000000;
padding:1.5em;

}
</style>

<!-- HTML Code -->
<marquee class="GeneratedMarquee" direction="up" scrollamount="3" behavior="scroll">
"Orang yang pandai tidak semestinya berjaya. Tetapi, orang yang rajin dan sabar, pasti berjaya."
<br><br>
"Raihlah ilmu. Dan untuk meraih ilmu, belajarlah untuk tenang dan sabar."
<b>(Umar bin Khattab)</b>
<br><br>
"Ciri orang yang beradab ialah dia sangat rajin dan suka belajar, dia tidak malu belajar
daripada orang yang berkedudukan lebih rendah darinya."
<br><br>
"Bukan ilmu yang seharusnya mendatangimu, tapi kamu yang seharusnya mendatangi ilmu."
<b>(Imam Malik)</b>
<br><br>
"Jika kamu berhasrat untuk berjaya, jangan hanya memandang
ke tangga tetapi belajarlah untuk menaiki tangga tersebut."</marquee>
            </div>
          </div>
        </div>
      </div>
      <br/>
     

      


      
    <!-- End Middle Column -->
    </div>

        <!-- Right Column -->
        <div class="w3-col m2">
      <div class="w3-card w3-round w3-white w3-center">
        <div class="w3-container">

        <!-- MASA DAN TARIKH -->
        <div class="cleanslate w24tz-current-time w24tz-small" style="display: inline-block !important; visibility: hidden !important; min-width:200px !important; min-height:100px !important;">
          <p><a href="//24timezones.com/current_time/malaysia_butterworth_clock.php" style="text-decoration: none" 
          class="clock24" id="tz24-1629636790-c214059-eyJob3VydHlwZSI6IjEyIiwic2hvd2RhdGUiOiIxIiwic2hvd3NlY29uZHMiOiIxIiwiY29udGFpbmVyX2lkIjoiY2xvY2tfYmxvY2tfY2I2MTIyNDhiNjA2YmNhIiwidHlwZSI6ImRiIiwibGFuZyI6ImVuIn0=" 
          title="World Time :: Butterworth" target="_blank" rel="nofollow">Butterworth</a></p>
          <div id="clock_block_cb612248b606bca"></div>
        </div>
<script type="text/javascript" src="//w.24timezones.com/l.js" async></script>
        
        </div>
      </div>
      <br>

       
      <div class="w3-card w3-round w3-white w3-center">
        <div class="w3-container">
          <img src="./images/sk_assumption.jpg" alt="Logo Sekolah" style="width:100%;">
          <p><strong>SEKOLAH KEBANGSAAN ASSUMPTION</strong></p>
          <p>Jalan Bagan Dalam, Bagan Dalam, 12000 Butterworth, Pulau Pinang</p>
        </div>
      </div>
      <br>

      <a href="feedbackPelajar.php" style="text-decoration: none;"><div class="w3-card w3-round w3-white w3-center" title="Hantar Maklum Balas">
      <div class="w3-container">
        <p>Hantar maklum balas anda atau laporkan sekiranya berlaku masalah</p>
        <p><i class="fa fa-bug w3-xxlarge"></i></p>
        </div>
      </div></a>

          <!-- End Right Column -->
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
 
<script>
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

// Used to toggle the menu on smaller screens when clicking on the menu button
function openNav() {
  var x = document.getElementById("navDemo");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else { 
    x.className = x.className.replace(" w3-show", "");
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
 