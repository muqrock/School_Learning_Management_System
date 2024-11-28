<?php
ob_start();
include "db_conn.php";

session_start();

if (isset($_POST['email']) && isset($_POST['password'])
    && isset($_POST['name']) && isset($_POST['re_password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$namapenuh = validate($_POST['name']);
	$uname = validate($_POST['email']);
	$mykid = validate($_POST['kp']);
	$jantina = validate($_POST['jantina']);
	$kelas = validate($_POST['kelas']);
	$umur = validate($_POST['umur']);
	$alamat = validate($_POST['alamat']);
	$pass = validate($_POST['password']);
	$re_pass = validate($_POST['re_password']);

	$user_data = 'email='. $uname. '&name='. $name;
	if (empty($namapenuh)) {
		header("Location:signup.php?error=Sila masukkan nama penuh anda&$user_data");
	    exit();
	}else if(!preg_match("/^[a-zA-Z ]*$/",$namapenuh)) {
		header("Location:signup.php?error=Masukkan perkataan sahaja bagi nama&$user_data");
	    exit();
	}else if (empty($uname)) {
		header("Location:signup.php?error=Sila masukkan e-mel anda&$user_data");
	    exit();
	}else if (!filter_var($uname, FILTER_VALIDATE_EMAIL))  {
		header("Location:signup.php?error=Sila masukkan format e-mel yang betul&$user_data");
	    exit();
	}else if (empty($mykid)) {
		header("Location:signup.php?error=Sila masukkan Kad pengenalan / MyKid anda&$user_data");
	    exit();
	}else if (!preg_match('/^[0-9]{6}-[0-9]{2}-[0-9]{4}$/',$mykid)) {
		header("Location:signup.php?error=Format Kad pengenalan / Mykid salah&$user_data");
	    exit();
	}else if (empty($jantina)) {
		header("Location:signup.php?error=Sila masukkan jantina anda&$user_data");
	    exit();
	}else if (empty($kelas)) {
		header("Location:signup.php?error=Sila masukkan kelas anda&$user_data");
	    exit();
	}else if (empty($umur)) {
		header("Location:signup.php?error=Sila masukkan umur anda&$user_data");
	    exit();
	}else if (!preg_match ("/^[0-9]*$/", $umur)){
		header("Location:signup.php?error=Sila masukkan nilai digit sahaja bagi umur&$user_data");
	    exit();
	}else if (empty($alamat)) {
		header("Location:signup.php?error=Sila masukkan alamat anda&$user_data");
	    exit();
	}else if(empty($pass)){
        header("Location:signup.php?error=Sila masukkan kata laluan anda&$user_data");
	    exit();
	}
	else if(empty($re_pass)){
        header("Location:signup.php?error=Sila masukkan semula kata laluan anda&$user_data");
	    exit();
	}
	else if($pass !== $re_pass){
        header("Location:signup.php?error=Pengesahan kata laluan anda tidak sepadan&$user_data");
	    exit();
	}

	else{

		// hashing the password
        $pass = md5($pass);

	    $sql = "SELECT * FROM users WHERE Email='$uname' ";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			header("Location:signup.php?error=E-mel ini telah digunakan&$user_data");
	        exit();
		}else {
           $sql2 = "INSERT INTO users(Nama, Email, Kp_MyKid, Jantina, Kelas, Umur, Alamat, Password) 
		   VALUES('$namapenuh', '$uname', '$mykid', '$jantina', '$kelas', '$umur', '$alamat', '$pass')";
           $result2 = mysqli_query($conn, $sql2);
           if ($result2) {
           	 header("Location:signup.php?success=Akaun anda telah berjaya didaftarkan!");
	         exit();
           }else {
	       header("Location:signup.php?error=RALAT BERLAKU: Kad Pengenalan atau Mykid anda mungkin telah didaftarkan&$user_data");
		        exit();
           }
		}
	}
}else{
	header("Location:signup.php");
	exit();
}