
<!DOCTYPE html>
<html>
<head>
	<title>Kemaskini Profil Pelajar</title>
	<link rel="stylesheet" type="text/css" href="css/signup.css">
</head>

<body>

     <form action="kemaskiniPelajar-check.php" method="post">
     	<h2>Kemaskini Profil</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>

          <?php if (isset($_GET['success'])) { ?>
               <p class="success"><?php echo $_GET['success']; ?></p>
          <?php } ?>

       
          <!-- SUSUN INPUT DALAM TABLE -->
          <table style="width:100%">
          <tr>
               <!-- E-MEL -->             
               <td><label>Emel</label>
               <?php if (isset($_GET['email'])) { ?>
                    <input type="text" 
                         name="email" 
                         value="<?php echo $_GET['email']; ?>"><br>
               <?php }else{ ?>
                    <input type="text" 
                         name="email" 
                         placeholder="E-mel log masuk (huruf kecil)"><br>
               <?php }?></td>   


               <!-- NAMA PENUH -->
               <td><label>Nama Penuh</label>
               <?php if (isset($_GET['name'])) { ?>
                    <input type="text" 
                         name="name"                    
                         value="<?php echo $_GET['name']; ?>"><br>
               <?php }else{ ?>
                    <input type="text" 
                         name="name" 
                         placeholder=""><br>
               <?php }?></td>

                    
          </tr>

          <tr>
               <!-- KP/MYKID -->
               <td><label>KP/MyKid</label>
               <?php if (isset($_GET['kp'])) { ?>
                    <input type="text" 
                         name="kp" 
                         value="<?php echo $_GET['kp']; ?>"z><br>
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
                         placeholder=""><br>
               <?php }?></td>

               <!-- UMUR -->
               <td><label>Umur</label>
               <?php if (isset($_GET['umur'])) { ?>
                    <input type="text" 
                         name="umur" 
                         value="<?php echo $_GET['umur']; ?>"><br>
               <?php }else{ ?>
                    <input type="text" 
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
                 placeholder="Masukkan kata laluan"><br>

          <label>Sahkan Kata Laluan</label>
          <input type="password" 
                 name="re_password" 
                 placeholder="Masukkan semula kata laluan anda"><br>

     
                 
     	<button name="update_stud_data" type="submit">Kemaskini Data</button>
          <a href="logout.php" class="ca">Log Keluar</a>
     </form>
</body>
</html>

