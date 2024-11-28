<!DOCTYPE html>
<html>
<head>
	<title>Daftar Masuk Pelajar</title>
	<link rel="stylesheet" type="text/css" href="css/signup.css">
</head>

<body>

     <form action="signup-check.php" method="post">
     	<h2>DAFTAR MASUK PELAJAR</h2>
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
               <td><label>Email</label>
               <?php if (isset($_GET['email'])) { ?>
                    <input type="text" 
                         name="email" 
                         value="<?php echo $_GET['email']; ?>"><br>
               <?php }else{ ?>
                    <input type="text" 
                         name="email" 
                         placeholder="Cth: abc@email.com (huruf kecil)"><br>
               <?php }?></td>        
          </tr>

          <tr>
               <!-- KP/MYKID -->
               <td><label>KP/MyKid (000000-00-0000)</label>
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
               <!-- KELAS -->
               <td><label>Kelas</label>
               <?php if (isset($_GET['kelas'])) { ?>
                    <input type="text" 
                         name="kelas" 
                         value="<?php echo $_GET['kelas']; ?>"><br>
               <?php }else{ ?>
                    <input type="text" 
                         name="kelas" 
                         placeholder="Cth: 6 Cemerlang"><br>
               <?php }?></td>

               <!-- UMUR -->
               <td><label>Umur</label>
               <?php if (isset($_GET['umur'])) { ?>
                    <input type="number" 
                         name="umur" 
                         value="<?php echo $_GET['umur']; ?>"><br>
               <?php }else{ ?>
                    <input type="number" 
                         name="umur" 
                         placeholder="Cth: 12"><br>
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
                 placeholder="Masukkan kata laluan anda"><br>

          <label>Sahkan Kata Laluan</label>
          <input type="password" 
                 name="re_password" 
                 placeholder="Masukkan semula kata laluan anda"><br>
                 
     	<button type="submit">Daftar</button>
          <a href="indexPelajar.php" class="ca">Sudah mempunyai akaun?</a>
     </form>
</body>
</html>