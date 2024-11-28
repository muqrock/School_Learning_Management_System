<?php
session_start();
include "db_conn.php";

$sql = "SELECT * FROM nota ORDER BY id DESC";
$result = mysqli_query($conn,$sql);
$files = mysqli_fetch_all($result,MYSQLI_ASSOC);

//DOWNLOAD FILE
if(isset($_GET['file_id'])){
    $id = $_GET['file_id'];
    $sql2 = "SELECT * FROM nota WHERE id = $id";
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
        $newCount = $file['downloads'] + 1;
        $updateQuery = "UPDATE nota SET downloads = $newCount WHERE id=$id";
        mysqli_query($conn,$updateQuery);
        exit;
    }
}
?>