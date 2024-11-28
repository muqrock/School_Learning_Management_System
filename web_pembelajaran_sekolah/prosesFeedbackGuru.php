<?php
include "db_conn.php";

$q_score = $_POST['quality'];
$feedback_txt = $_POST['suggestion'];
$pengguna = "Guru";

$query ="insert into feedback(quality_score, feedback, pengguna)values($q_score, '$feedback_txt', '$pengguna')";
$result = mysqli_query($conn, $query);
if($result){
echo "<script language='javascript'>";
echo 'alert("Terima kasih atas maklum balas anda. Maklum balas anda telah berjaya dihantar.");';
echo 'window.location.replace("feedbackGuru.php");';
echo "</script>";
}else{
  echo "<script language='javascript'>";
  echo 'alert("RALAT! Maklum Balas Anda Tidak Dihantar");';
  echo 'window.location.replace("feedbackGuru.php");';
  echo "</script>";

}
?>