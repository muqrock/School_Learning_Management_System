<!DOCTYPE html>
<html>
<head>
	<title>Log Masuk Guru</title>
	<link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<body>
<div class="bg"></div>
	<h1> Web Pembelajaran Darjah 6 </h1>
     <form action="loginGuru.php" method="post">
     	<h2>LOG MASUK GURU</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
     	<label>E-mel</label>
     	<input type="text" name="uname" placeholder="E-mel Pengguna"><br>

     	<label>Kata Laluan</label>
     	<input type="password" name="password" placeholder="Kata Laluan Pengguna"><br>	

		 <p>Belum mempunyai akaun? <a href="signupGuru.php">Daftar Masuk</a></p><br>
     	<button type="submit">Log Masuk</button>
     </form>
</body>
</html>