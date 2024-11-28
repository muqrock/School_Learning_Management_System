<?php 
session_start();
$date=date("Y-m-d H:i:s");
$_SESSION["end_time"]=date("Y-m-d H:i:s", strtotime($date."+ $_SESSION[masa_jawab] minutes"));
include "db_conn.php";

if (isset($_SESSION['id']) && isset($_SESSION['Email'])) {

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Hasil Kuiz</title>
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
        <a href="kuiz_old_result.php" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-save fa-fw w3-margin-right"></i>Hasil Kuiz Anda</a>
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
            <h3 class="w3-center">Hasil Kuiz Anda</h3>
        <hr class="w3-clear">
        
<?php
$correct=0;
$wrong=0;

if(isset($_SESSION["answer"])){
    for($i=1;$i<=sizeof($_SESSION["answer"]);$i++){
        $answer="";
        $res=mysqli_query($conn,"select * from soalan where Tajuk='$_SESSION[kuiz_subjek]' && no_soalan=$i");
        while($row=mysqli_fetch_array($res)){
            $answer=$row["answer"];
        }
        if(isset($_SESSION["answer"][$i])){
            if($answer==$_SESSION["answer"][$i]){
                $correct=$correct+1;
            }else{
                $wrong=$wrong+1;
            }
        }else{
            $wrong=$wrong+1;
        }
    }
}

$count=0;
$res=mysqli_query($conn,"select * from soalan where Tajuk='$_SESSION[kuiz_subjek]'");
$count=mysqli_num_rows($res);
$wrong=$count-$correct;
// echo "<br>";echo "<br>";
echo "<center>";
echo "<b>Jumlah Soalan: ".$count."</b>";
echo "<br><br>";
echo "<font color='green'><b>Jawapan betul: ".$correct."</b></font>";
echo "<br>";
echo "<font color='red'><b>Jawapan salah: ".$wrong."</b></font>";

echo "</center>";
$kuiz_tajuk = $_SESSION['kuiz_subjek'];
?>


<?php
//DAPATKAN NAMA GURU
    $arahan = mysqli_query($conn,"select * from soalan where Tajuk='$_SESSION[kuiz_subjek]'");
    while($row=mysqli_fetch_array($arahan)){
      $namaGuru = $row["Nama"] ; 

    }



if(isset($_SESSION["kuiz_mula"])){
    $date=date("Y-m-d");
    mysqli_query($conn,"insert into kuiz_result (id,nama_pelajar,kuiz_type,total_question,correct_answer,wrong_answer,kuiz_time,namaGuru) values(NULL,'$_SESSION[Nama]','$_SESSION[kuiz_subjek]','$count','$correct','$wrong','$date','$namaGuru')");
}

if(isset($_SESSION["kuiz_mula"])){
    unset($_SESSION["kuiz_mula"]);
    ?>
    <script type="text/javascript">
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
            <h3 class="w3-center">Jawapan <?php echo $kuiz_tajuk ?></h3>
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
</tr>

<?php


$res=mysqli_query($conn,"select * from soalan where Tajuk = '$kuiz_tajuk' order by no_soalan asc");
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
 