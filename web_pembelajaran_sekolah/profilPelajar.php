<?php 
session_start(); 
include "db_conn.php";

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
        <a href="feedbackPelajar.php" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-commenting fa-fw w3-margin-right"></i>Maklum Balas</a>
      <br>
     
    <!-- End Left Column -->
    </div>
    
    <!-- Middle Column -->
    <div class="w3-col m7">
     
      <div class="w3-row-padding">
        <div class="w3-col m12">
          <div class="w3-card w3-round w3-white">
            <div class="w3-container w3-padding">
            <h3 class="w3-center">Profil Pelajar</h3>
            <hr class="w3-clear">

<?php
$uname = $_SESSION['Email'];
//select dari database based on email user
$sql = "SELECT Nama, Email, Kp_Mykid, Jantina, Kelas, Umur, Alamat FROM users WHERE Email='$uname' ";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) >0) {
// Keluarkan output
    while($row = mysqli_fetch_assoc($result)) {
echo "<table>";
  echo "<tr>";
    echo "<td>Nama Penuh</td>";
    echo "<td>: ".$row["Nama"]."</td>";
  echo "</tr>";

  echo "<tr>";
    echo "<td>Kp/Mykid</td>";
    echo "<td>: ".$row["Kp_Mykid"]."</td>";
  echo "</tr>";

  echo "<tr>";
    echo "<td>Jantina</td>";
    echo "<td>: ".$row["Jantina"]."</td>";
  echo "</tr>";

  echo "<tr>";
    echo "<td>Kelas</td>";
    echo "<td>: ".$row["Kelas"]."</td>";
  echo "</tr>";

  echo "<tr>";
    echo "<td>Umur</td>";
    echo "<td>: ".$row["Umur"]."</td>";
  echo "</tr>";

  echo "<tr>";
    echo "<td>Alamat</td>";
    echo "<td>: ".$row["Alamat"]."</td>";
  echo "</tr>";
echo "</table>";
    }
} else{
    echo "RALAT! memaparkan 0 hasil";
  }
mysqli_close($conn);
?>

<h3 style="background-color: #123456;color: white;">Kategori Pengguna: Pelajar</h3>
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
</style>
<a href="kemaskiniPelajar.php"><button type="submit" name="kemaskini">Kemaskini Profil</button></a>

</body>
</html>
 
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
 