<p>
Sebelum dapat menggunaka aplikasi ini anda diharuskan untuk melakukan registrasi terlebih dahulu
</p>
<p>
 <form action="<?php echo site_url();?>/user_mod/reg_user" method="POST">
  <table>
   <tr><td>Nama Pengguna</td><td>:</td><td><input type="text" name="username"></td></tr>
   <tr><td>Email</td><td>:</td><td><input type="text" name="email"></td></tr>
   <tr><td>Nama Panjang</td><td>:</td><td><input type="text" name="name"></td></tr>
   <tr><td>Kata sandi</td><td>:</td><td><input type="password" name="pass1"></td></tr>
   <tr><td>Ulangi Kata sandi</td><td>:</td><td><input type="password" name="pass2"></td></tr>
   <tr><td colspan="3" align="center"><input type="reset" value="Reset"/> <input type="submit" value="Daftar"/></td></tr>
  </table>
 </form>
</p> 
