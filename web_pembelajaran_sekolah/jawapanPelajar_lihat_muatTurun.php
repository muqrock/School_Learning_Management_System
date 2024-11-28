<?php
// HALAMAN INI UNTUK FUNGSI UNTUK GURU MUAT TURUN JAWAPAN PELAJAR
session_start();
include "db_conn.php";


//DOWNLOAD FILE
if(isset($_GET['muatTurun'])){
    $id = $_GET['muatTurun'];
    $sql2 = "SELECT * FROM jawapanpelajar WHERE id = $id";
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
?>