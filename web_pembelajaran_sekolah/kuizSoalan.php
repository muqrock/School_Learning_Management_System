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
    $namaGuru=$row["Nama"];
}

if (isset($_SESSION['id']) && isset($_SESSION['Email'])) {

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Tambah Soalan Kuiz</title>
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
            <h3 class="w3-center">Tambah Soalan: <?php echo "<font color='green'>" .$kuiz_tajuk. "</font>"; ?></h3>
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
  <form name="soalan" action="" method="post" enctype="multipart/form-data">
      <label>Soalan</label>
      <input type="text" name="soalan" required><br>

      <hr class="w3-clear">
      <label>Muat Naik Gambar</label><br><br>     
      <input type="file" name="gambar"><br>   
      <hr class="w3-clear">   

      <label>Pilihan 1</label>
      <input type="text" name="opt1" placeholder="Pilihan 1" required>

      <label>Pilihan 2</label>
      <input type="text" name="opt2" placeholder="Pilihan 2" required>

      <label>Pilihan 3</label>
      <input type="text" name="opt3" placeholder="Pilihan 3" required>

      <label>Pilihan 4</label>
      <input type="text" name="opt4" placeholder="Pilihan 4" required>

      <label>Jawapan</label>
      <input type="text" name="jawapan" required><br>

      <button type="submit" name="tambah">Tambah Soalan</button>
    </form>  

<!-- BAHAGIAN PHP MUATNAIK KUIZ -->
<?php
if(isset($_POST['tambah'])){
$loop=0;
$count=0;
$res=mysqli_query($conn,"select * from soalan where Tajuk = '$kuiz_tajuk' and Nama='$namaGuru' order by id asc") or die(mysqli_error($conn));
$count=mysqli_num_rows($res);
if($count==0){

}else{
    while($row=mysqli_fetch_array($res)){
        $loop = $loop + 1;
        mysqli_query($conn,"update soalan set no_soalan='$loop' where id =$row[id]");
    }
}

$loop=$loop+1;

//coding for upload images
$tm=md5(time());
$gambar=$_FILES["gambar"]["name"];

if($gambar!=""){
$dst="./images/".$tm.$gambar;
$dst_db="images/".$tm.$gambar;
move_uploaded_file($_FILES["gambar"]["tmp_name"],$dst);

  mysqli_query($conn,"insert into soalan values (NULL,'$loop','$_POST[soalan]','$dst_db','$_POST[opt1]','$_POST[opt2]','$_POST[opt3]','$_POST[opt4]','$_POST[jawapan]','$kuiz_tajuk','$_SESSION[Nama]')") or die(mysqli_error($conn));
}

else{
  mysqli_query($conn,"insert into soalan values (NULL,'$loop','$_POST[soalan]','','$_POST[opt1]','$_POST[opt2]','$_POST[opt3]','$_POST[opt4]','$_POST[jawapan]','$kuiz_tajuk','$_SESSION[Nama]')") or die(mysqli_error($conn));
}





?>
<script type="text/javascript">
alert("Soalan kuiz berjaya ditambah");
window.location.href=window.location.href;
</script>
<?php

    


}
?>
   
            </div>
          </div>
        </div>
      </div>
      <br/>
     
      <div class="w3-row-padding">
       <div class="w3-col m12">
       
            <h3 class="w3-center">Senarai Soalan</h3>
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
<tr>
    <th>No</th>
    <th>Soalan</th>
    <th>Gambar</th>
    <th>Pilihan 1</th>
    <th>Pilihan 2</th>
    <th>Pilihan 3</th>
    <th>Pilihan 4</th>
    <th>Jawapan</th>
    <th>Sunting</th>
    <th>Padam</th>
</tr>



<?php
$res=mysqli_query($conn,"select * from soalan where Tajuk = '$kuiz_tajuk' and Nama = '$_SESSION[Nama]' order by no_soalan asc");
while($row=mysqli_fetch_array($res)){
    echo "<tr>";
    echo "<td>"; echo $row["no_soalan"]; echo "</td>";
    echo "<td>"; echo $row["soalan"]; echo "</td>";

    echo "<td>"; 
    if(strpos($row["gambar"],'images/')!==false){
        ?>
        <img src="<?php echo $row["gambar"];?>" height="50" width="50">
        <?php
    }else{
        echo $row["gambar"];
    }
    echo "</td>";

    echo "<td>"; echo $row["opt1"]; echo "</td>";
    echo "<td>"; echo $row["opt2"]; echo "</td>";
    echo "<td>"; echo $row["opt3"]; echo "</td>";
    echo "<td>"; echo $row["opt4"]; echo "</td>";
    echo "<td>"; echo $row["answer"]; echo "</td>";

    //Sunting soalan/kemaskini soalan
    echo "<td>"; 
    if(strpos($row["gambar"],'images/')!==false){
        ?>
        <a href ="kuizSunting.php?id=<?php echo $row["id"]; ?>&id1=<?php echo $id;?>"><button style="background-color:#228B22; width:100%">Sunting</button></a>
        <?php
    }else{
        ?>
        <a href ="kuizSunting.php?id=<?php echo $row["id"]; ?>&id1=<?php echo $id;?>"><button style="background-color:#228B22; width:100%">Sunting</button></a>
        <?php
    }
    echo "</td>";

    //Padam soalan
    echo "<td>";
    ?>
    <a href="kuizPadam.php?id=<?php echo $row["id"]; ?>&id1=<?php echo $id;?>"><button style="background-color:#B22222; width:100%">Padam</button></a>
<?php

    echo "</td>";

    echo "</tr>";
}

?>

</table>
 
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
 