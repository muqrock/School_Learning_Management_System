<?php 
session_start();
include "db_conn.php";

if (isset($_SESSION['id']) && isset($_SESSION['Email'])) {

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Tambah Kuiz</title>
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
float: left;
}
button:hover {
  background-color: #045F5F;
}
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
        <a href="kuizTambahSoalan.php" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-plus-square fa-fw w3-margin-right"></i>Tambah Soalan Kuiz</a>
        <a href="tambahSoalan.php" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-pencil fa-fw w3-margin-right"></i>Cipta Soalan/Kerja Rumah</a>
        <a href="MuatNaikNota.php" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-cloud-upload fa-fw w3-margin-right"></i>Muat Naik Nota</a></button>
        <a href="profilGuru.php" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-user-circle fa-fw w3-margin-right"></i>Profil</a>
        <br>
     
    <!-- End Left Column -->
    </div>

    <!-- Middle Column -->
    <div class="w3-col m7">

    <div class="w3-row-padding">
        <div class="w3-col m12">
          <div class="w3-card w3-round w3-white">
            <div class="w3-container w3-padding">
            <h3 class="w3-center">Tambah Kuiz</h3>
        <hr class="w3-clear">

<!-- CSS BAHAGIAN MUAT NAIK KUIZ -->
<style>
input[type=text],[type=number], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}
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
<!-- BAHAGIAN MUATNAIK KUIZ -->
  <form name="kuiz" action="" method="post">
      <label>Subjek</label>
      <!-- <input type="text" name="subjek"><br> -->

      <div>
        <select id="subjek" name="subjek" required>
          <option value="">--PILIH SUBJEK--</option>
          <option value="Bahasa Melayu">Bahasa Melayu</option>
          <option value="Bahasa Inggeris">Bahasa Inggeris</option>
          <option value="Matematik">Matematik</option>
          <option value="Sains">Sains</option>
        </select>
      </div>

      <label>Tajuk</label>
      <input type="text" name="tajuk" required>

      <label>Masa (Minit)</label>
      <input type="number" name="masa" required>

      <button type="submit" name="simpan">Tambah Kuiz</button>
  </form>

<!-- BAHAGIAN PHP MUATNAIK KUIZ -->
<?php
$namaGuru = $_SESSION['Nama'];
if(isset($_POST['simpan'])){
    mysqli_query($conn,"insert into kuiz_subjek values (NULL,'$namaGuru','$_POST[subjek]','$_POST[tajuk]','$_POST[masa]')") or die(mysqli_error($conn));

    ?>
    <script type="text/javascript">
        alert("Kuiz anda telah berjaya ditambah");
        window.location.href = window.location.href;
        </script>
        <?php
}
?>
        
            </div>
          </div>
        </div>
      </div>
      <br/>
            
      
    <!-- Middle Column -->

    <div class="w3-row-padding">
        <div class="w3-col m12">
          <div class="w3-card w3-round w3-white">     
            <div class="w3-container w3-padding">
            <h3 class="w3-center">Senarai Kuiz</h3>
            <hr class="w3-clear">
        
   
<!-- CSS TABLE KUIZ -->
<style>
#nota {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}
#nota td, #nota th {
  border: 1px solid #ddd;
  padding: 8px;
}
#nota tr:nth-child(even){background-color: #f2f2f2;}
#nota tr:hover {background-color: #ddd;}
#nota th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #34495E;
  color: white;
}
</style>

<!-- TABLE KUIZ -->
<table id="nota">
  <thead>
    <th></th>
    <th>Subjek</th>
    <th>Tajuk</th>
    <th>Masa</th>
    <th>Sunting</th>
    <th>Padam</th>
</thead>
<tbody>

<?php

//BAHAGIAN PHP PADAM KUIZ
if(isset($_GET['nota_id'])){
    $padam = $_GET['nota_id'];
      $sql2 = "DELETE FROM kuiz_subjek WHERE Tajuk = '$padam' AND Nama='$_SESSION[Nama]'";
      $result2 = mysqli_query($conn,$sql2);
      // $data = mysqli_fetch_assoc($result2);
      if($result2){ 
        //UNTUK PADAM SEKALI PADA TABLE SOALAN KUIZ INI
        $padamSoalan = "DELETE FROM soalan WHERE Tajuk = '$padam' AND Nama='$_SESSION[Nama]'";
        $selesai = mysqli_query($conn,$padamSoalan); 
          if($padamSoalan){
            $padamJawapanPelajar =  "DELETE FROM kuiz_result WHERE kuiz_type = '$padam' AND Nama='$_SESSION[Nama]'";
            $selesai2 = mysqli_query($conn,$padamJawapanPelajar); ?>

            <script type="text/javascript">
            alert("Kuiz berjaya dipadam");
            window.location="tambahKuiz.php";
            </script><?php
          } 


      }else{
        echo "<script language='javascript'>";
        echo 'alert("RALAT! Kuiz anda tidak berjaya dipadam. Sila cuba lagi.");';
        echo 'window.location.replace("tambahKuiz.php");';
        echo "</script>";
      }
    }

//Paparkan senarai kuiz dalam table
$count = 0;
    $res = mysqli_query($conn,"select * from kuiz_subjek where Nama='$namaGuru'");
    while($row=mysqli_fetch_array($res)){
        $count = $count + 1;
        ?>
    <tr>
        <th><?php echo $count; ?></th>
        <td><?php echo $row["Subjek"]; ?></td>
        <td><?php echo $row["Tajuk"]; ?></td>
        <td><?php echo $row["Masa"]; ?></td>
        <td><a href="kemaskiniKuiz.php?id=<?php echo $row["id"]; ?>"><button style="background-color:#228B22; width:100%">Sunting</button></td>
        <td><a href="tambahKuiz.php?nota_id=<?php echo$row["Tajuk"];?>"><button style="background-color:#B22222; width:100%">Padam</button></a></td>        
    </tr>
<?php
    }
?>






</table>

<!-- CSS BUTTON TAMBAH SOALAN -->
<style>
input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}
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
<br>
<a href="kuizTambahSoalan.php"><button type="submit" name="simpan" title="Tekan untuk tambah soalan pada kuiz">Tambah Soalan Kuiz</button></a>
     




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
 