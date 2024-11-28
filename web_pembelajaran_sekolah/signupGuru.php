<!DOCTYPE html>
<html>
<head>
	<title>Daftar Masuk Guru</title>
	<link rel="stylesheet" type="text/css" href="css/signup.css">
</head>

<body>

     <form action="signupGuru-check.php" method="post">
     	<h2>DAFTAR MASUK GURU</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>

          <?php if (isset($_GET['success'])) { ?>
               <p class="success"><?php echo $_GET['success']; ?></p>
          <?php } ?>

       
          <!-- SUSUN INPUT DALAM TABLE -->
          <table style="width:100%">
          <tr>
               <!-- NAMA PENUH -->
               <td><label>Nama Penuh</label>
               <?php if (isset($_GET['name'])) { ?>
                    <input type="text" 
                         name="name"                    
                         value="<?php echo $_GET['name']; ?>"><br>
               <?php }else{ ?>
                    <input type="text" 
                         name="name" 
                         placeholder="Cth: MUHAMMAD BIN MUHAMMAD"><br>
               <?php }?></td>

               <!-- E-MEL -->             
               <td><label>E-mel</label>
               <?php if (isset($_GET['email'])) { ?>
                    <input type="text" 
                         name="email" 
                         value="<?php echo $_GET['email']; ?>"><br>
               <?php }else{ ?>
                    <input type="text" 
                         name="email" 
                         placeholder="Cth: abc@gmail.com (huruf kecil)"><br>
               <?php }?></td>        
          </tr>

          <tr>
               <!-- KAD PENGENALAN -->
               <td><label>No. Kad Pengenalan (000000-00-0000)</label>
               <?php if (isset($_GET['kp'])) { ?>
                    <input type="text" 
                         name="kp" 
                         value="<?php echo $_GET['kp']; ?>"><br>
               <?php }else{ ?>
                    <input type="text" 
                         name="kp" 
                         placeholder="Cth: 000000-00-0000" maxlength="14"><br>
               <?php }?></td>

     

               <!-- JANTINA -->
               <td><label>Jantina</label>
               <?php if (isset($_GET['jantina'])) { ?>
                    <select name="jantina" value="<?php echo $_GET['jantina']; ?>">
                         <option value="lelaki">Lelaki</option>
                         <option value="perempuan">Perempuan</option> 
                         </select><br>
               <?php }else{ ?>
                    <select name="jantina">
                         <option value="">--PILIH JANTINA--</option>
                         <option value="LELAKI">Lelaki</option>
                         <option value="PEREMPUAN">Perempuan</option> 
                         </select><br>
               <?php }?></td>     
          </tr>       
          
          <tr>

               <!-- UMUR -->
               <td><label>Umur</label>
               <?php if (isset($_GET['umur'])) { ?>
                    <input type="number" 
                         name="umur" 
                         value="<?php echo $_GET['umur']; ?>"><br>
               <?php }else{ ?>
                    <input type="number" 
                         name="umur" 
                         placeholder=""><br>
               <?php }?></td>    
          </tr>
          </table>
          
          <!-- ALAMAT -->
          <label>Alamat</label>
          <?php if (isset($_GET['alamat'])) { ?>
               <textarea 
                      name="alamat" 
                      value="<?php echo $_GET['alamat']; ?>"></textarea><br>
          <?php }else{ ?>
               <textarea rows="4"
                      name="alamat" 
                      placeholder=""></textarea><br>
          <?php }?>

          <!-- KATA LALUAN -->
     	<label>Kata Laluan</label>
     	<input type="password" 
                 name="password" 
                 placeholder="Sekurang-kurangnya 8 aksara, satu huruf besar, satu nombor, dan satu simbol"><br>

          <label>Sahkan Kata Laluan</label>
          <input type="password" 
                 name="re_password" 
                 placeholder="Masukkan semula kata laluan anda"><br>

                 
     	<button type="submit">Daftar</button>
          <a href="indexGuru.php" class="ca">Sudah mempunyai akaun?</a>
     </form>
</body>
</html>