<script>
function hah(){
<?php 
$site = site_url();
echo "window.location = \"$site/dlhelper/register\"";
?>
}
</script>
<form action="" method="POST">
<table class="login">
<tr><td>Username</td><td>:</td><td><input type="text"></td></tr>
<tr><td>Password</td><td>:</td><td><input type="text"></td></tr>
<tr><td><input type="button" value="Register" onClick="hah()"></td><td></td><td><input type="submit" value="Login"></td></tr>
</table>
</form>
