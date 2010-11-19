<?php 
$username = $this->session->userdata('username');
$password = $this->session->userdata('password');
$id = $this->session->userdata('id');

$this->db->reconnect();
$query = $this->db->query("select * from user where id_user=$id");
$row = $query->row_array();
$name = $row['name'];
$email = $row['email'];

$user_dir = $this->config->item('user_dir');
if (is_file("$user_dir/$username/package_list.txt")){
    $pkg_list = 1;
  }else if(!is_file("$user_dir/$username/package_list.txt")){ $pkg_list = 0;}

echo "<h3>Selamat datang <strong style=\"color:blue;\"> $name</strong></h3>";

if ($pkg_list == 1){
 echo "Anda sudah mengupload package list anda. Anda dapat mulai mencari paket\n";
 echo "Anda dapat menganti package list system anda, hapus untuk mengantinya";
}else if ($pkg_list == 0){
  $site = site_url();
  echo "<br> Anda belum memiliki package List system operasi yang digunakan , silahkan upload <br>\n";
  echo "<form method=\"post\" action=\"$site/user_mod/upload\" enctype=\"multipart/form-data\" />\n";
  echo "<input type=\"file\" name=\"userfile\">\n";
  echo "<input type=\"submit\" value=\"Upload\">\n";
  echo "<form>\n";
} 
?>
