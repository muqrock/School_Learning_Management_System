<?php 
session_start();
include "db_conn.php";
if (isset($_SESSION['id']) && isset($_SESSION['Email'])) {

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Cipta Soalan/Kerja Rumah</title>
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
color: white;
padding: 12px 20px;
border: none;
border-radius: 4px;
cursor: pointer;
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
          <a href="tambahKuiz.php" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-puzzle-piece fa-fw w3-margin-right"></i>Cipta Kuiz</a>
          <a href="jawapanPelajar.php" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-folder-open fa-fw w3-margin-right"></i>Lihat Jawapan Kerja Rumah Pelajar</a>
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
            <h3 class="w3-center">Tambah Soalan/Kerja Rumah/Tugasan Anda</h3>
        <hr class="w3-clear">

<!-- CSS BAHAGIAN TAMBAH SOALAN -->
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
input,textarea{
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
<!-- BAHAGIAN TAMBAH SOALAN -->
  <form action="tambahSoalan.php" method="post" enctype="multipart/form-data">
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

      <label>Soalan/Arahan/Penerangan</label>
      <textarea rows="4" name="soalan" placeholder="" required></textarea>

      <label>Masukkan fail jika ada (Format: pdf, doc, ppt dan lain-lain)</label>
      <input type = "file" name="myfile"><br>

      <button type="submit" name="save">Tambah Tugasan</button>
  </form>

<!-- BAHAGIAN PHP TAMBAH SOALAN -->
<?php
$namaGuru = $_SESSION['Nama'];
$sql = "SELECT * FROM tugasan WHERE Nama='$namaGuru' ORDER BY id DESC";
$result = mysqli_query($conn,$sql);
$files = mysqli_fetch_all($result,MYSQLI_ASSOC);

if(isset($_POST['save'])){
  $filename = $_FILES['myfile']['name'];
  $destination = 'uploads/' . $filename;
  $extension = pathinfo($filename,PATHINFO_EXTENSION);
  $file = $_FILES['myfile']['tmp_name'];
  $size = $_FILES['myfile']['size'];

  //DAPATKAN TARIKH:MASA
  date_default_timezone_set('Asia/Kuala_Lumpur');
  $date = date('F d, Y, g:i a');

 
  $subjek = $_POST["subjek"];
  $tajuk = $_POST["tajuk"];
  $soalan = $_POST["soalan"];

  // if(!in_array($extension,['zip','pdf','png'])){
  //     echo"Fail anda tidak sepadan";
  // }
  if($_FILES['myfile']['size'] > 500000000){
    echo"Fail anda terlalu besar";
  }
  else{
    if(move_uploaded_file($file,$destination)){
      $sql = "INSERT INTO tugasan (tarikh, Nama, Subjek, Tajuk, Soalan, Fail, size)
      VALUES('$date','$namaGuru','$subjek','$tajuk','$soalan','$filename','$size')";

      if(mysqli_query($conn,$sql)){      
        echo "<script language='javascript'>";
        echo 'alert("BERJAYA! Soalan/Kerja Rumah anda telah ditambah");';
        echo 'window.location.replace("tambahSoalan.php");';
        echo "</script>";
      }else{
        echo "<script language='javascript'>";
        echo 'alert("RALAT! Soalan/Kerja Rumah anda tidak berjaya ditambah");';
        echo 'window.location.replace("tambahSoalan.php");';
        echo "</script>";
      }
    }else{ //JIKA TIADA FAIL DIMASUKKAN
      $filename2="Tiada fail dimasukkan";
      $size2="0";
      $sqlno = "INSERT INTO tugasan (tarikh, Nama, Subjek, Tajuk, Soalan, Fail, size)
      VALUES('$date','$namaGuru','$subjek','$tajuk','$soalan','$filename2','$size2')";
            if(mysqli_query($conn,$sqlno)){      
              echo "<script language='javascript'>";
              echo 'alert("BERJAYA! Soalan/Kerja Rumah anda telah ditambah. Sila tekan OK");';
              echo 'window.location.replace("tambahSoalan.php");';
              echo "</script>";
            }else{
              echo "<script language='javascript'>";
              echo 'alert("RALAT! Soalan/Kerja Rumah anda tidak berjaya ditambah");';
              echo 'window.location.replace("tambahSoalan.php");';
              echo "</script>";
            }
    }
  }
}

//BAHAGIAN PHP PADAM SOALAN
if(isset($_GET['file_id'])){
$padam = $_GET['file_id'];
  $sql2 = "DELETE FROM tugasan WHERE id = $padam";
  $result2 = mysqli_query($conn,$sql2);
  // $data = mysqli_fetch_assoc($result2);
  if($result2){
    echo "<script language='javascript'>";
    echo 'alert("BERJAYA! Soalan/Kerja Rumah anda telah dipadam.");';
    echo 'window.location.replace("tambahSoalan.php");';
    echo "</script>";
  }else{
    echo "<script language='javascript'>";
    echo 'alert("RALAT! Soalan/Kerja Rumah anda tidak berjaya dipadam. Sila cuba lagi.");';
    echo 'window.location.replace("tambahSoalan.php");';
    echo "</script>";
  }
}

?>
        
            </div>
          </div>
        </div>
      </div>
      <br/>
      <div class="w3-row-padding">
              
            <div class="w3-container w3-padding">
            <h3 class="w3-center">Padam Soalan</h3>

            <hr class="w3-clear">

<!-- CSS TABLE SOALAN -->
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
<!-- CSS TABLE SOALAN -->
<table id="nota">
  <thead>
    <th>Tarikh</th>
    <th>Nama Guru</th>
    <th>Subjek</th>
    <th>Tajuk</th>
    <th>Soalan</th>
    <th>Fail</th> 
    <th>Tindakan</th>
</thead>
<tbody>
<?php foreach($files as $data): ?>
<tr>
  <td><?php echo $data['tarikh'];?></td>
  <td><?php echo $data['Nama'];?></td>
  <td><?php echo $data['Subjek'];?></td>
  <td><?php echo $data['Tajuk'];?></td>
  <td><?php echo $data['Soalan'];?></td>
  <td><?php echo $data['Fail'];?></td>
  <td><a href = "tambahSoalan.php?file_id=<?php echo$data['id']?>"><button style="background-color:#B22222; width:100%">Padam</button></a></td>
</tr>
<?php endforeach; ?>


  

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
 