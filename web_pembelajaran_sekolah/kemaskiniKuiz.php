<?php 
session_start();
include "db_conn.php";

$id=$_GET["id"];
$kuiz_tajuk='';
$kuiz_subjek='';
$res=mysqli_query($conn,"select * from kuiz_subjek where id = $id");
while($row=mysqli_fetch_array($res)){
    $kuiz_tajuk=$row["Tajuk"];
    $kuiz_subjek=$row["Subjek"];
}

$id = $_GET["id"];
$res=mysqli_query($conn,"select * from kuiz_subjek where id = $id");
while($row=mysqli_fetch_array($res)){
    $subjek = $row["Subjek"];
    $tajuk = $row["Tajuk"];
    $masa = $row["Masa"];
}

if (isset($_SESSION['id']) && isset($_SESSION['Email'])) {

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Kemas Kini Kuiz</title>
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
        <a href="kuizTambahSoalan.php" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-plus-square fa-fw w3-margin-right"></i>Tambah Soalan Kuiz</a>
        <a href="tambahSoalan.php" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-pencil fa-fw w3-margin-right"></i>Cipta Soalan/Kerja Rumah</a>
          <a href="MuatNaikNota.php" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-cloud-upload fa-fw w3-margin-right"></i>Muat Naik Nota</a>
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
            <h3 class="w3-center">Kemas Kini Kuiz</h3>
        <hr class="w3-clear">
        <label>Kemas kini Subjek, Tajuk dan Masa (Minit)</label>


        
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
            <h3 class="w3-center">Tajuk: <?php echo "<font color='green'>" .$kuiz_tajuk. "</font>"; ?></h3>
            <p class="w3-center">Subjek: <?php echo "<font color='green'>" .$kuiz_subjek. "</font>"; ?></p>
            <hr class="w3-clear">
        
<!-- CSS BAHAGIAN MUAT NAIK KUIZ -->
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
<!-- BAHAGIAN MUATNAIK KUIZ -->
  <form name="kuiz" action="" method="post">
      <label>Subjek</label>
      <!-- <input type="text" name="subjek"><br> -->

      <div>
        <select id="subjek" name="subjek">
          <option value="">--PILIH SUBJEK--</option>
          <option value="Bahasa Melayu">Bahasa Melayu</option>
          <option value="Bahasa Inggeris">Bahasa Inggeris</option>
          <option value="Matematik">Matematik</option>
          <option value="Sains">Sains</option>
        </select>
      </div>

      <label>Tajuk</label>
      <input type="text" name="tajuk" value="<?php echo $tajuk; ?>">

      <label>Masa (Minit)</label>
      <input type="text" name="masa" value="<?php echo $masa; ?>">

      <button type="submit" name="simpan">Kemas Kini</button>
    
  </form>

<!-- BAHAGIAN PHP KEMAS KINI KUIZ -->
<?php
if(isset($_POST['simpan'])){
    mysqli_query($conn,"update kuiz_subjek set Subjek='$_POST[subjek]',Tajuk='$_POST[tajuk]',Masa='$_POST[masa]' where id = $id") or die(mysqli_error($conn));

    ?>
    <script type="text/javascript">
        
        window.location.href = "tambahKuiz.php" ;
        </script>
        <?php
}
?>



     




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
 