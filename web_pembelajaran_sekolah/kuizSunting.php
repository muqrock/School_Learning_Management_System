<?php 
session_start();
include "db_conn.php";
$id=$_GET["id"];
$id1=$_GET["id1"];

$soalan="";
$gambar="";
$opt1="";
$opt2="";
$opt3="";
$opt4="";
$jawapan="";

$kuiz_tajuk='';
$kuiz_subjek='';

$res=mysqli_query($conn,"select * from soalan where id=$id");
while($row=mysqli_fetch_array($res)){
  $soalan=$row["soalan"];
  $gambar=$row["gambar"];
  $opt1=$row["opt1"];
  $opt2=$row["opt2"];
  $opt3=$row["opt3"];
  $opt4=$row["opt4"];
  $jawapan=$row["answer"];
}

$res=mysqli_query($conn,"select * from kuiz_subjek where id=$id");
while($row=mysqli_fetch_array($res)){
  $kuiz_tajuk=$row["Tajuk"];
  $kuiz_subjek=$row["Subjek"];
}

if (isset($_SESSION['id']) && isset($_SESSION['Email'])) {

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Sunting Soalan</title>
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
            <h3 class="w3-center">Sunting Soalan</h3>
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
<!-- BAHAGIAN HTML KEMASKINI SOALAN -->
  <form name="soalan" action="" method="post" enctype="multipart/form-data">
      <label>Soalan</label>
      <input type="text" name="soalan" value="<?php echo $soalan; ?>"><br>

      <hr class="w3-clear">
      <label>Muat Naik Gambar</label><br><br>
          
      <input type="file" name="gambar"><br>   
      <hr class="w3-clear">   

      <label>Pilihan 1</label>
      <input type="text" name="opt1" placeholder="Pilihan 1" value="<?php echo $opt1; ?>">

      <label>Pilihan 2</label>
      <input type="text" name="opt2" placeholder="Pilihan 2" value="<?php echo $opt2; ?>">

      <label>Pilihan 3</label>
      <input type="text" name="opt3" placeholder="Pilihan 3" value="<?php echo $opt3; ?>">

      <label>Pilihan 4</label>
      <input type="text" name="opt4" placeholder="Pilihan 4" value="<?php echo $opt4; ?>">

      <label>Jawapan</label>
      <input type="text" name="jawapan" value="<?php echo $jawapan; ?>"><br>

      <button type="submit" name="sunting">Kemas Kini Soalan</button>
    </form>  

<!-- BAHAGIAN PHP KEMASKINI SOALAN -->
<?php
if(isset($_POST["sunting"])){

  $pic=$_FILES["gambar"]["name"];

  $tm = md5(time());

  if($pic!=""){
    $dst1 = "./images/" . $tm . $pic;
    $dst_db = "images/" . $tm . $pic;
    move_uploaded_file($_FILES["gambar"]["tmp_name"], $dst1);

    mysqli_query($conn,"update soalan set soalan='$_POST[soalan]',gambar='$dst_db',opt1='$_POST[opt1]',opt2='$_POST[opt2]',opt3='$_POST[opt3]',opt4='$_POST[opt4]',answer='$_POST[jawapan]' where id = $id");
  }else{
    mysqli_query($conn,"update soalan set soalan='$_POST[soalan]',gambar='',opt1='$_POST[opt1]',opt2='$_POST[opt2]',opt3='$_POST[opt3]',opt4='$_POST[opt4]',answer='$_POST[jawapan]' where id = $id");
  }
  



  ?>
  <script type = "text/javascript">
  window.location="kuizSoalan.php?id=<?php echo $id1 ?>";
  </script>
  <?php
}
?>
   
            </div>
          </div>
        </div>
      </div>
      <br/>
     
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
 