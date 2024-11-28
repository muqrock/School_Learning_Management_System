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
	$kp = validate($_POST['kp']);
	$jantina = validate($_POST['jantina']);
	$umur = validate($_POST['umur']);
	$alamat = validate($_POST['alamat']);
	$pass = validate($_POST['password']);
	$re_pass = validate($_POST['re_password']);

	$user_data = 'email='. $uname. '&name='. $name;

	if (empty($namapenuh)) {
		header("Location:signupGuru.php?error=Sila masukkan nama penuh anda&$user_data");
	    exit();
	}else if(!preg_match("/^[a-zA-Z ]*$/",$namapenuh)) {
		header("Location:signupGuru.php?error=Masukkan perkataan sahaja bagi nama&$user_data");
	    exit();
	}else if (empty($uname)) {
		header("Location:signupGuru.php?error=Sila masukkan e-mel anda&$user_data");
	    exit();
	}else if (!filter_var($uname, FILTER_VALIDATE_EMAIL))  {
		header("Location:signupGuru.php?error=Sila masukkan format e-mel yang betul&$user_data");
	    exit();
	}else if (empty($kp)) {
		header("Location:signupGuru.php?error=Sila masukkan Kad pengenalan / MyKid anda&$user_data");
	    exit();
		
	}else if (!preg_match('/^[0-9]{6}-[0-9]{2}-[0-9]{4}$/',$kp)) {
		header("Location:signupGuru.php?error=Format Kad pengenalan / Mykid salah&$user_data");
	    exit();
	}else if (empty($jantina)) {
		header("Location:signupGuru.php?error=Sila masukkan jantina anda&$user_data");
	    exit();
	}else if (empty($umur)) {
		header("Location:signupGuru.php?error=Sila masukkan umur anda&$user_data");
	    exit();
	}else if (!preg_match ("/^[0-9]*$/", $umur)){
		header("Location:signupGuru.php?error=Sila masukkan nilai digit sahaja bagi umur&$user_data");
	    exit();
	
	}else if (empty($alamat)) {
		header("Location: signupGuru.php?error=Sila masukkan alamat anda&$user_data");
	    exit();
	}else if(empty($pass)){
        header("Location:signupGuru.php?error=Sila masukkan kata laluan anda&$user_data");
	    exit();
	}else if(!preg_match("#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$#", $pass)){
        header("Location:signupGuru.php?error=Kata laluan sekurang-kurangnya 8 aksara, satu huruf besar, satu nombor, dan satu simbol&$user_data");
	    exit();
	}else if(empty($re_pass)){
        header("Location:signupGuru.php?error=Sila masukkan semula kata laluan anda&$user_data");
	    exit();
	}else if(!preg_match("#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$#", $re_pass)){
        header("Location:signupGuru.php?error=Kata laluan sekurang-kurangnya 8 aksara, satu huruf besar, satu nombor, dan satu simbol&$user_data");
	    exit();
	}else if($pass !== $re_pass){
        header("Location:signupGuru.php?error=Pengesahan kata laluan anda tidak sepadan&$user_data");
	    exit();
	}

	else{

		// hashing the password
        $pass = md5($pass);

	    $sql = "SELECT * FROM userguru WHERE Email='$uname' ";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			header("Location:signupGuru.php?error=E-mel ini telah digunakan&$user_data");
	        exit();
		}else {
           $sql2 = "INSERT INTO userguru (Nama, Email, Kp_MyKid, Jantina, Umur, Alamat, Password) 
		   VALUES('$namapenuh', '$uname', '$kp', '$jantina', '$umur', '$alamat', '$pass')";
           $result2 = mysqli_query($conn, $sql2);
           if ($result2) {
           	 header("Location:signupGuru.php?success=Akaun anda telah berjaya didaftarkan!");
	         exit();
           }else {
	           	header("Location:signupGuru.php?error=RALAT BERLAKU: Kad Pengenalan anda mungkin telah didaftarkan.&$user_data");
		        exit();
           }
		}
	}
	
}else{
	header("Location:signupGuru.php");
	exit();
}