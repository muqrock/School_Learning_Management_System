<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['Email'])) {

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Maklum Balas</title>
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
    <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-theme-d2" href="logout.php"><i class="fa fa-sign-out"></i></a>
    <a href="homeCg.php" class="w3-bar-item w3-button w3-padding-large w3-theme-d4" title="Halaman Utama"><i class="fa fa-home w3-margin-right"></i>Halaman Utama</a>
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
          <a href="tambahSoalan.php" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-pencil fa-fw w3-margin-right"></i>Cipta Soalan/Kerja Rumah</a>
          <a href="MuatNaikNota.php" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-cloud-upload fa-fw w3-margin-right"></i>Muat Naik Nota</a>
          <a href="profilGuru.php" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-user-circle fa-fw w3-margin-right"></i>Profil</a>
          <a href="homeCg.php" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-home fa-fw w3-margin-right"></i>Halaman Utama</a>
      <br>
     
    <!-- End Left Column -->
    </div>
    
    <!-- Middle Column -->
    <div class="w3-col m7">
      <div class="w3-row-padding">
        <div class="w3-col m12">
          <div class="w3-card w3-round w3-white">
            <div class="w3-container w3-padding">
            <h3 class="w3-center">Maklum Balas Pengguna</h3>
            <hr class="w3-clear">
        


            <form method="post" action="prosesFeedbackGuru.php">
 <div class="heading">
 </div>

 <p>Nyatakan tahap kepuasan anda menggunakan sistem ini.</p>
 
 <div>
   <div class="pic">
     <img src="images/teruk.png" alt="" width="50px" height="50px"> &nbsp <input type="radio" name="quality" value="0"> Teruk <br/>
   </div>
   <br>
   <div class="pic">
     <img src="images/baik.png" alt="" width="50px" height="50px"> &nbsp <input type="radio" name="quality" value="1"> Baik<br/>
   </div>
   <br>
   <div class="pic">
     <img src="images/sangatbaik.png" alt="" width="50px" height="50px"> &nbsp <input type="radio" name="quality" value="2"> Sangat Baik <br/>
   </div>
 </div>
<br>
<p>Nyatakan cadangan/komen atau masalah ketika menggunakan sistem ini (jika ada). </p>
 <textarea name=" suggestion" rows="8" cols="70"></textarea>&nbsp
 <style>
button[type=submit] {
background-color: #008080;
color: white;
padding: 12px 20px;
border: none;
border-radius: 4px;
cursor: pointer;
float: right;
}
button[type=submit]:hover {
  background-color: #045F5F;
}
button[type=reset] {
background-color: #008080;
color: white;
padding: 12px 20px;
border: none;
border-radius: 4px;
cursor: pointer;
float: left;
}
button[type=reset]:hover {
  background-color: #045F5F;
}
</style>
  <div>
    <br>
  <button type="submit" name="submit" title="Tekan untuk hantar maklum balas anda">Hantar</button></a><button type="reset" name="reset" title="Tekan untuk bersihkan maklum balas anda">Bersihkan</button></a><br>
</div>
</form>
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