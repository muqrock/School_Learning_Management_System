<?php
session_start();
include "../db_conn.php";

$total_que=0;
$res1=mysqli_query($conn,"select * from soalan where Tajuk = '$_SESSION[kuiz_subjek]'");
$total_que=mysqli_num_rows($res1);
echo $total_que;


?>