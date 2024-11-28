<?php 
// UNTUK PADAM KUIZ PADA HALAMAN TAMBAH SOALAN KUIZ
include "db_conn.php";
$id=$_GET["id"];
$id1=$_GET["id1"];

mysqli_query($conn,"delete from soalan where id = $id");
?>

<script type = "text/javascript">
alert("Soalan kuiz berjaya dipadam");
  window.location="kuizSoalan.php?id=<?php echo $id1 ?>";
</script>