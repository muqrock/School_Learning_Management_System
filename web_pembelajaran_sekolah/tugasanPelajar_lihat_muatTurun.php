<?php
// PAGE INI UNTUK FUNGSI DOWNLOAD FAIL KERJA RUMAH PADA HALAMAN Kerja Rumah/Tugasan/Soalan (tugasanPelajar_lihat.php)
session_start();
include "db_conn.php";

$sql = "SELECT * FROM tugasan";
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


//BAHAGIAN PHP PADAM SOALAN
if(isset($_GET['padam_id'])){
    $padam = $_GET['padam_id'];
      $sql3 = "DELETE FROM jawapanpelajar WHERE id = $padam";
      $result3 = mysqli_query($conn,$sql3);
      // $data = mysqli_fetch_assoc($result2);
      if($result3){ ?>
        <script type = "text/javascript">
        alert("BERJAYA! Soalan/Kerja Rumah anda telah dipadam");
        window.location="tugasanPelajar.php";
        </script><?php
      }
      else{ ?>
        <script type = "text/javascript">
        alert("RALAT! Soalan/Kerja Rumah anda tidak berjaya dipadam");
        window.location="tugasanPelajar.php";
        </script><?php 
        }
    }
?>
