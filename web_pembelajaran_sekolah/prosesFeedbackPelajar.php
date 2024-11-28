<?php
include "db_conn.php";

$q_score = $_POST['quality'];
$feedback_txt = $_POST['suggestion'];
$pengguna = "Pelajar";

$query ="insert into feedback(quality_score, feedback, pengguna)values($q_score, '$feedback_txt', '$pengguna')";
$result = mysqli_query($conn, $query);
if($result){
echo "<script language='javascript'>";
echo 'alert("BERJAYA! Maklum Balas Anda Telah Dihantar");';
echo 'window.location.replace("feedbackPelajar.php");';
echo "</script>";
}else{
  echo "<script language='javascript'>";
  echo 'alert("RALAT! Maklum Balas Anda Tidak Dihantar");';
  echo 'window.location.replace("feedbackPelajar.php");';
  echo "</script>";

}
?>