<?php 
session_start();
include "db_conn.php";
if (isset($_SESSION['id']) && isset($_SESSION['Email'])) {

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Kerja Rumah/Tugasan/Soalan</title>
</head>
     <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
html, body, h1, h2, h3, h4, h5 {font-family: "Open Sans", sans-serif}

/* CSS UNTUK BUTTON */
button{
background-color: #008080;
color: white;
padding: 12px 20px;
border: none;
border-radius: 4px;
cursor: pointer;
float: right;
}
button:hover {
  background-color: #045F5F;
}
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
        <a href="lihatnotaPelajar.php" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-pencil-square-o fa-fw w3-margin-right"></i>Nota</a>
        <a href="profilPelajar.php" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-user-circle fa-fw w3-margin-right"></i>Profil</a>
      <br>
     
    <!-- End Left Column -->
    </div>
    
    <!-- Middle Column -->
    <div class="w3-col m7">
     
      <div class="w3-row-padding">
        <div class="w3-col m12">
          <div class="w3-card w3-round w3-white">
            <div class="w3-container w3-padding">
            <h3 class="w3-center">Senarai Kerja Rumah/Tugasan/Soalan</h3>
            <hr class="w3-clear">

<!-- CSS TABLE TUGASAN -->
<style>
#jadual {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}
#jadual td, #jadual th {
  border: 1px solid #ddd;
  padding: 8px;
}
#jadual tr:nth-child(even){background-color: #f2f2f2;}
#jadual tr:hover {background-color: #ddd;}
#jadual th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #34495E;
  color: white;
}
</style>

<!-- TABLE KUIZ -->
<table id="jadual">
  <thead>
    <th></th>
    <th>Tarikh</th>
    <th>Nama Guru</th>
    <th>Subjek</th>
    <th>Tajuk</th>
    <th>Tindakan</th>
  
</thead>
<tbody>

<?php

//Paparkan senarai kuiz dalam table
$count = 0;
    $res = mysqli_query($conn,"select * from tugasan order by id desc");
    while($row=mysqli_fetch_array($res)){
        $count = $count + 1;
        ?>
    <tr>
        <th><?php echo $count; ?></th>
        <td><?php echo $row["tarikh"]; ?></td>
        <td><?php echo $row["Nama"]; ?></td>
        <td><?php echo $row["Subjek"]; ?></td>
        <td><?php echo $row["Tajuk"]; ?></td>
        <td><a href="tugasanPelajar_lihat.php?id=<?php echo $row["id"]; ?>"><button>Lihat Tugasan</button></td>
 
    </tr>

<?php
    }
?>
</table> 

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
 