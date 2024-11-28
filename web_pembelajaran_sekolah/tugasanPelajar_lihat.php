<?php 
session_start();
include "db_conn.php";

$id=$_GET["id"];
$tajuk='';
$subjek='';

$res=mysqli_query($conn,"select * from tugasan where id = $id");
while($row=mysqli_fetch_array($res)){
    $tajuk=$row["Tajuk"];
    $subjek=$row["Subjek"];
    $arahan=$row["Soalan"];
    $cikgu=$row["Nama"];
    $tarikh=$row["tarikh"];
    $fail=$row["Fail"];
    $saiz=$row["size"];
}


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

/* CSS UNTUK TABLE */
#jadual {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}
#jadual td, #jadual th {
  border: 1px solid #ddd;
  padding: 8px;
}

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

/* CSS UNTUK FORM PELAJAR JAWAB */
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
      <br>
     
    <!-- End Left Column -->
    </div>
    
    <!-- Middle Column -->
    <div class="w3-col m7">
     
      <div class="w3-row-padding">
        <div class="w3-col m12">
          <div class="w3-card w3-round w3-white">
            <div class="w3-container w3-padding">
            <h4 style="background-color: #123456;color: white;">Daripada: Cikgu <?php echo $cikgu; ?></h4>
            <h3 style="color: green;">Subjek: <?php echo $subjek; ?></h3>
            <h4 style="color: green;">Tarikh: <?php echo $tarikh; ?></h4>
            <hr class="w3-clear">
            
            <h3 class="w3-center"><?php echo $tajuk; ?></h3>


<b>Arahan/Soalan:</b>
<p><?php echo $arahan; ?></p>

<b>Fail:</b>

<?php
  $sql = "SELECT * FROM tugasan WHERE id = $id";
  $result = mysqli_query($conn,$sql);
  $files = mysqli_fetch_all($result,MYSQLI_ASSOC);

  //DOWNLOAD FILE
  if(isset($_GET['file_id'])){
      $id = $_GET['file_id'];
      $sql2 = "SELECT * FROM tugasan WHERE id = $id";
      $result2 = mysqli_query($conn,$sql2);
      $file = mysqli_fetch_assoc($result2);
      $filepath = 'uploads/' . $file['Fail'];
      if(file_exists($filepath)){
          header('Content-type: application/octet-stream');
          header('Content-Description: File Transfer');
          header('Content-Disposition: attachment; filename=' . basename($filepath));
          header('Expires:0');
          header('Cache-Control: must-revalidate');
          header('Pragma:public');
          header('Content-Length:' . filesize('uploads/'.$file['Fail']));
          readfile('uploads/' . $file['Fail']);
          // $newCount = $file['downloads'] + 1;
          // $updateQuery = "UPDATE nota SET downloads = $newCount WHERE id=$id";
          // mysqli_query($con,$updateQuery);
          exit;
      }
  }

  ?><table id="jadual"><?php
    foreach($files as $file): ?>
      <tr>
       <td><?php echo $file['Fail'];?></td>
       <td><?php echo $file['size'] / 1000 . "KB" ;?></td>
       <td><a href="tugasanPelajar_lihat_muatTurun.php?file_id=<?php echo $file['id']?>"><button>Muat Turun</button></a></td>
       <?php endforeach;?>
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
            <h3 class="w3-center">Jawapan Pelajar</h3>
            <hr class="w3-clear">
        
<!-- BAHAGIAN TAMBAH JAWAPAN -->
<form action="" method="post" enctype="multipart/form-data">

      <label>Mesej</label>
      <textarea rows="4" name="jawapan" placeholder="" required></textarea>

      <label>Masukkan fail anda (Format: pdf, doc, ppt dan lain-lain)</label>
      <input type = "file" name="myfile" required><br>

      <button type="submit" name="save">Tambah Tugasan</button>
  </form>


<!-- BAHAGIAN PHP TAMBAH JAWAPAN -->
<?php
$namaPelajar = $_SESSION['Nama'];
$sql5 = "SELECT * FROM jawapanpelajar WHERE Nama='$namaPelajar' ORDER BY id DESC";
$result5 = mysqli_query($conn,$sql5);
$files = mysqli_fetch_all($result5,MYSQLI_ASSOC);

if(isset($_POST['save'])){
  $filename = $_FILES['myfile']['name'];
  $destination = 'uploads/' . $filename;
  $extension = pathinfo($filename,PATHINFO_EXTENSION);
  $file = $_FILES['myfile']['tmp_name'];
  $size = $_FILES['myfile']['size'];

  //DAPATKAN TARIKH:MASA
date_default_timezone_set('Asia/Kuala_Lumpur');
$date = date('F d, Y, g:i a');

  $kelas = $_SESSION['Kelas'];
  $jawapan = $_POST["jawapan"];

  // if(!in_array($extension,['zip','pdf','png'])){
  //     echo"Fail anda tidak sepadan";
  // }
  if($_FILES['myfile']['size'] > 500000000){
    echo"Fail anda terlalu besar";
  }
  else{
    if(move_uploaded_file($file,$destination)){
      $sql10 = "INSERT INTO jawapanpelajar (namaGuru,Nama,Kelas, Subjek, Tajuk,Jawapan, Fail, size,tarikh)
      VALUES('$cikgu','$namaPelajar','$kelas','$subjek','$tajuk','$jawapan','$filename','$size','$date')";

      if(mysqli_query($conn,$sql10)){   ?>   
        <script type = "text/javascript">
        alert("BERJAYA! Soalan/Kerja Rumah anda telah dihantar");
        window.location="tugasanPelajar_lihat.php?id=<?php echo $id ?>";
        </script><?php
      }else{
        echo "<script language='javascript'>";
        echo 'alert("RALAT! Soalan/Kerja Rumah anda tidak berjaya dihantar");';
        echo 'window.location.replace("tugasanPelajar_lihat.php");';
        echo "</script>";
      }
    }
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
            <h3 class="w3-center">Padam Jawapan Anda</h3>

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
    <th>Nama</th>
    <th>Kelas</th>
    <th>Subjek</th>
    <th>Tajuk</th>
    <th>Mesej</th>
    <th>Fail</th>
    <th>Tindakan</th>
</thead>
<tbody>
<?php foreach($files as $data): ?>
<tr>
  <td><?php echo $data['tarikh'];?></td>
  <td><?php echo $data['Nama'];?></td>
  <td><?php echo $data['Kelas'];?></td>
  <td><?php echo $data['Subjek'];?></td>
  <td><?php echo $data['Tajuk'];?></td>
  <td><?php echo $data['Jawapan'];?></td>
  <td><?php echo $data['Fail'];?></td>
  
<td><a href = "tugasanPelajar_lihat_muatTurun.php?padam_id=<?php echo$data['id']?>"><button style="background-color:#B22222; width:100%">Padam</button></a></td>
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
 