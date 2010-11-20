<script>
function hah(){
<?php 
$site = site_url();
echo "window.location = \"$site/dlhelper/register\"";
?>
}
</script>
<h3>Untuk menggunakan layanan ini silahkan anda login terlebih dahulu</h3>
<form action="<?php echo site_url();?>/user_mod/login" method="POST">
<table class="login">
<tr><td>Username</td><td>:</td><td><input type="text" name="username"></td></tr>
<tr><td>Password</td><td>:</td><td><input type="password" name="password"></td></tr>
<tr><td><input type="button" value="Register" onClick="hah()"></td><td></td><td><input type="submit" value="Login"></td></tr>
</table>
</form>
