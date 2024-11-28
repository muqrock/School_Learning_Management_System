<?php
session_start();
include "../db_conn.php";


$kuiz_subjek=$_GET["kuiz_subjek"];
$_SESSION["kuiz_subjek"]=$kuiz_subjek;

$res=mysqli_query($conn,"select * from kuiz_subjek where Tajuk = '$kuiz_subjek' ");
while($row=mysqli_fetch_array($res)){
    $_SESSION["masa_jawab"]=$row["Masa"];
}

$date = date("Y-m-d H:i:s");

$_SESSION["end_time"]=date("Y-m-d H:i:s", strtotime($date . "+$_SESSION[masa_jawab] minutes"));
$_SESSION["kuiz_mula"]="yes";


?>