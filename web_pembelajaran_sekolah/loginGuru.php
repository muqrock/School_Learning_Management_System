<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['uname']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);

	if (empty($uname)) {
		header("Location: indexGuru.php?error=Sila masukkan e-mel pengguna");
	    exit();
	}else if(empty($pass)){
        header("Location: indexGuru.php?error=Sila masukkan kata laluan pengguna");
	    exit();
	}else{

		// unhash password
        $pass = md5($pass);

		$sql = "SELECT * FROM userguru WHERE Email='$uname' AND Password='$pass'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['Email'] === $uname && $row['Password'] === $pass) {
            	$_SESSION['Email'] = $row['Email'];
            	$_SESSION['Nama'] = $row['Nama'];
            	$_SESSION['id'] = $row['id'];
            	header("Location: homeCg.php");
		        exit();
            }else{
				header("Location: indexGuru.php?error=E-mel pengguna atau kata laluan salah");
		        exit();
			}
		}else{
			header("Location: indexGuru.php?error=E-mel pengguna atau kata laluan salah");
	        exit();
		}
	}
	
}else{
	header("Location: indexGuru.php");
	exit();
} ?>