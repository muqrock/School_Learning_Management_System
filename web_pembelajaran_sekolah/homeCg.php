<?php 
session_start();
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
  /* TABLE */
  #nota{
    font-family: Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
  }
  #nota td, #nota th{
    padding: 8px;
  }
  /* BUTTON */
  .block{
    display: block;
    width: 100%;
    border: none;
    background-color:#008080;
    color: white;
    padding: 20px 28px;
    font-size: 15px;
    cursor: pointer;
    text-align: center;
    border-radius:28px;
  }
  .block:hover{
    background-color: #ddd;
    color: black;
  }
</style>

<body class="w3-theme-l5">

<!-- Navbar -->
<div class="w3-top">
 <div class="w3-bar w3-theme-d2 w3-left-align w3-large">
      <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-theme-d2" href="logout.php" title="Log Keluar"><i class="fa fa-sign-out"></i></a>
      <a href="homeCg.php" class="w3-bar-item w3-button w3-padding-large w3-theme-d4" title="Halaman Utama"><i class="fa fa-home w3-margin-right"></i>Halaman Utama</a>
    <!-- QUIZ DROPDOWN -->
    <div class="w3-dropdown-hover w3-hide-small">
      <button class="w3-button w3-padding-large" title="Quiz"><i class="fa fa-puzzle-piece"></i></button>     
        <div class="w3-dropdown-content w3-card-4 w3-bar-block" style="width:300px">
          <a href="tambahKuiz.php" class="w3-bar-item w3-button">Cipta Kuiz</a>
          <a href="kuizTambahSoalan.php" class="w3-bar-item w3-button">Tambah Soalan Kuiz</a>
          <a href="keputusanKuiz.php" class="w3-bar-item w3-button">Keputusan Kuiz Pelajar</a>
        </div>
    </div>
    <!-- TUGASAN DROPDOWN -->
    <div class="w3-dropdown-hover w3-hide-small">
      <button class="w3-button w3-padding-large" title="Soalan/Kerja Rumah"><i class="fa fa-pencil"></i></button>     
        <div class="w3-dropdown-content w3-card-4 w3-bar-block" style="width:300px">
          <a href="tambahSoalan.php" class="w3-bar-item w3-button">Cipta Soalan/Kerja Rumah</a>
          <a href="jawapanPelajar.php" class="w3-bar-item w3-button">Lihat Jawapan Kerja Rumah Pelajar</a>
        </div>
    </div>
    <!-- NOTA DROPDOWN -->
    <div class="w3-dropdown-hover w3-hide-small">
      <button class="w3-button w3-padding-large" title="Nota"><i class="fa fa-cloud-upload"></i></button>     
        <div class="w3-dropdown-content w3-card-4 w3-bar-block" style="width:300px">
          <a href="MuatNaikNota.php" class="w3-bar-item w3-button">Muat Naik Nota</a>
          <a href="lihatnota.php" class="w3-bar-item w3-button">Lihat Nota</a>
        </div>
    </div>
      <a href="profilGuru.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="Profil Penguna"><i class="fa fa-user-circle"></i></a>
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
            <p class="w3-center"><img src="images/Cg.png" class="w3-circle" style="height:106px;width:106px" alt="Avatar"></p>
            <hr>
            <p><i class="fa fa-id-badge fa-fw w3-margin-right w3-text-theme"></i>Guru</p>
            <p><i class="fa fa-institution fa-fw w3-margin-right w3-text-theme"></i>SEKOLAH KEBANGSAAN ASSUMPTION</p>
          </div>
        </div>
        <br>
        
        <!-- Accordion -->
        <a href="tambahKuiz.php" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-puzzle-piece fa-fw w3-margin-right"></i>Cipta Kuiz</a>
        <a href="keputusanKuiz.php" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-archive fa-fw w3-margin-right"></i>Keputusan Kuiz Pelajar</a>
        <a href="tambahSoalan.php" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-pencil fa-fw w3-margin-right"></i>Cipta Soalan/Kerja Rumah</a>
        <a href="jawapanPelajar.php" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-folder-open fa-fw w3-margin-right"></i>Lihat Jawapan Kerja Rumah Pelajar</a>
        <a href="MuatNaikNota.php" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-cloud-upload fa-fw w3-margin-right"></i>Muat Naik Nota</a>
        <a href="profilGuru.php" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-user-circle fa-fw w3-margin-right"></i>Profil</a>
        <a href="feedbackGuru.php" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-commenting fa-fw w3-margin-right"></i>Maklum Balas</a>
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

  <table id="nota">
    <tr>
      <td><a href="tambahKuiz.php" style="text-decoration:none;"><button type="button" class="block" title="Cipta Kuiz"><i class="fa fa-puzzle-piece fa-fw w3-margin-right"></i>Cipta Kuiz</button></a></td>
      <td><a href="tambahSoalan.php" style="text-decoration:none;"><button type="button" class="block" title="Cipta Soalan/Kerja Rumah"><i class="fa fa-pencil fa-fw w3-margin-right"></i>Cipta Soalan/Kerja Rumah</button></a></td>
      <td><a href="MuatNaikNota.php" style="text-decoration:none;"><button type="button" class="block" title="Muat Naik Nota"><i class="fa fa-cloud-upload fa-fw w3-margin-right"></i>Muat Naik Nota</button></a></td>
    </tr>
  </table> 
<hr class="w3-clear">
  <table id="nota">
    <tr>
      <td><a href="keputusanKuiz.php" style="text-decoration:none;"><button type="button" class="block" title="Keputusan Kuiz Pelajar"><i class="fa fa-archive fa-fw w3-margin-right"></i>Keputusan Kuiz Pelajar</button></a></td>
      <td><a href="jawapanPelajar.php" style="text-decoration:none;"><button type="button" class="block" title="Lihat Jawapan Kerja Rumah Pelajar"><i class="fa fa-folder-open fa-fw w3-margin-right"></i>Lihat Jawapan Kerja Rumah Pelajar</button></a></td>
    </tr>
  </table>

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

      <a href="feedbackGuru.php" style="text-decoration: none;"><div class="w3-card w3-round w3-white w3-center" title="Hantar Maklum Balas">
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
</script>
</body>
</html>

<?php 
}else{?>
  <script type="text/javascript">
    window.location="index.html";
  </script>
<?php
}?>