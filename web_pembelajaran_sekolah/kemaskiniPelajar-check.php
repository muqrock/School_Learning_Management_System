<?php
ob_start();
session_start(); 
include "db_conn.php";

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
		header("Location: kemaskiniPelajar.php?error=Sila masukkan nama penuh anda&$user_data");
	    exit();
	}else if(!preg_match("/^[a-zA-Z ]*$/",$namapenuh)) {
		header("Location:kemaskiniPelajar.php?error=Masukkan perkataan sahaja bagi nama&$user_data");
	    exit();
	}else if (empty($uname)) {
		header("Location: kemaskiniPelajar.php?error=Sila masukkan e-mel anda&$user_data");
	    exit();
	}else if (!filter_var($uname, FILTER_VALIDATE_EMAIL))  {
		header("Location: kemaskiniPelajar.php?error=Sila masukkan format e-mel yang betul&$user_data");
	    exit();
	}else if (empty($mykid)) {
		header("Location: kemaskiniPelajar.php?error=Sila masukkan Kad pengenalan / MyKid anda&$user_data");
	    exit();
		
	}else if (!preg_match('/^[0-9]{6}-[0-9]{2}-[0-9]{4}$/',$mykid)) {
		header("Location: kemaskiniPelajar.php?error=Format Kad Pengenalan / Mykid salah&$user_data");
	    exit();
	}else if (empty($jantina)) {
		header("Location: kemaskiniPelajar.php?error=Sila masukkan jantina anda&$user_data");
	    exit();
	}else if (empty($kelas)) {
		header("Location: kemaskiniPelajar.php?error=Sila masukkan kelas anda&$user_data");
	    exit();
	}else if (empty($umur)) {
		header("Location: kemaskiniPelajar.php?error=Sila masukkan umur anda&$user_data");
	    exit();
	}else if (!preg_match ("/^[0-9]*$/", $umur)){
		header("Location: kemaskiniPelajar.php?error=Sila masukkan nilai digit sahaja bagi umur&$user_data");
	    exit();
	
	}else if (empty($alamat)) {
		header("Location: kemaskiniPelajar.php?error=Sila masukkan alamat anda&$user_data");
	    exit();
	}else if(empty($pass)){
        header("Location: kemaskiniPelajar.php?error=Sila masukkan kata laluan anda&$user_data");
	    exit();
	}
	// else if(!preg_match("#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$#", $pass)){
    //     header("Location: signup.php?error=Kata laluan sekurang-kurangnya 8 aksara, satu huruf besar, satu nombor, dan satu simbol&$user_data");
	//     exit();
    // }
	else if(empty($re_pass)){
        header("Location: kemaskiniPelajar.php?error=Sila masukkan semula kata laluan anda&$user_data");
	    exit();
	}
	// else if(!preg_match("#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$#", $re_pass)){
    //     header("Location: signup.php?error=Kata laluan sekurang-kurangnya 8 aksara, satu huruf besar, satu nombor, dan satu simbol&$user_data");
	//     exit();
	// }
	else if($pass !== $re_pass){
        header("Location: kemaskiniPelajar.php?error=Pengesahan kata laluan anda tidak sepadan&$user_data");
	    exit();
	}
	else{




		session_start();

		
		if(isset($_POST['update_stud_data']))
		{
			
	
			$uname = $_POST['email'];
		
			$namapenuh = $_POST['name'];
			$mykid = $_POST['kp'];
			$jantina = $_POST['jantina'];
			$kelas = $_POST['kelas'];
			$umur = $_POST['umur']; 
			$alamat = $_POST['alamat']; 
			$pass = $_POST['password'];

			// hashing the password
			$pass = md5($pass);

			$query = "UPDATE users SET Nama='$namapenuh', Kp_Mykid='$mykid', Jantina='$jantina', Kelas='$kelas', Umur='$umur', Alamat='$alamat', Password='$pass' WHERE Email='$uname' ";
			$query_run = mysqli_query($conn, $query);
		
			if($query_run)
			{
				header("Location: kemaskiniPelajar.php?success=Berjaya Dikemaskini !");
			}
			else
			{
				header("Location: kemaskiniPelajar.php?error=Ralat Berlaku&$user_data");
				                exit();
			}
		}
	}
}

else{
	header("Location: kemaskiniPelajar.php");
	exit();
	}