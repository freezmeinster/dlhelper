<?php
class System_mod extends Controller {
        

        
	function System_mod()
	{
		parent::Controller();	
		
	}
	
	function index(){
	redirect('/');
	}
	
	function edit_setting($item){
	$this->user->cek_session('admin');
	$site = site_url();
	
	$this->db->reconnect();
	$query = $this->db->query("select * from setting where item like '$item'");
	$row = $query->row_array();
	$value = $row['value'];	
	echo "<h2>Atur nilai setting $item</h2><br/>\n";
	echo "Nilai lama dari setting $item adalah $value ";
	echo "<form action=\"$site/system_mod/set_setting\" method=\"POST\"><table>\n";
	echo "<tr><td>Nilai Baru</td><td><input type=\"text\" name=\"value\" value=\"$value\" size=\"60\"></td></tr>\n";
	echo "<input type=\"hidden\" value=\"$item\" name=\"item\">";
	echo "<tr><td colspan=\"2\"><input type=\"submit\" value=\"Edit\"></td></tr>\n";
	echo "</table></form>\n";


	
	}
	
	function set_setting(){
	$this->user->cek_session('admin');
	$value = $this->input->post('value');
	$item = $this->input->post('item');
	$this->db->reconnect();
	$this->db->query("update setting set value='$value' where item like '$item'");
	redirect('dlhelper/profile');
	}
	
	
	function template_setting(){
	$this->user->cek_session('admin');
	$view_dir = ''.APPPATH.'/views/template/';
	$dir = scandir($view_dir);
	$site = site_url();
	echo "<h2>Pilih Template mana yang akan digunakan sebagai template Utama</h2><br/>\n";
	echo "<ul>\n";
        foreach ($dir as $temp){
	  if ($temp != '.' && $temp != '..'){
	    if (is_file("$view_dir/$temp/template.php")){
	      echo "<li><a href=\"$site/system_mod/set_template/$temp\">$temp</a></li>\n";
	      
	    }
	 }
        }	
        echo "</ul>";
	}
	
	function set_template($template){
	$this->user->cek_session('admin');
	$this->db->reconnect();
	$this->db->query("update setting set value='$template' where item like 'template'");
	redirect('dlhelper/profile');
	}
	
	function edit_user($id){
	$this->user->cek_session('admin');
	$site = site_url();
	$this->db->reconnect();
	$query = $this->db->query("select * from user where id_user = $id");
	$row = $query->row_array();
	$username = $row['username'];
	$name = $row['name'];
	$email = $row['email'];
	$password = $row['password'];
	$level = $row['level'];
	if ($level == 'admin'){
	  $radio = "value=\"0\"> TIDAK";
	}else if ($level == 'user'){
	  $radio = "value=\"1\"> YA";
	}
	
	echo "<form action=\"$site/system_mod/set_user\" method=\"POST\"><table>\n";
	echo "<input type=\"hidden\" value=\"$id\" name=\"id\"\n>";
	echo "<tr><td>Name</td><td>:</td><td><input type=\"text\" name=\"name\" value=\"$name\" size=\"60\"></td></tr>\n";
	echo "<tr><td>Email</td><td>:</td><td><input type=\"text\" name=\"email\" value=\"$email\" size=\"60\"></td></tr>\n";
	echo "<tr><td>Password</td><td>:</td><td><input type=\"password\" name=\"password\" value=\"password\" size=\"60\"></td></tr>\n";
	echo "<tr><td>Jadikan admin</td><td>:</td><td><input type=\"radio\" name=\"admin\" $radio </td></tr>\n";
	echo "<tr><td colspan=\"2\"><input type=\"submit\" value=\"Edit\"></td></tr>\n";
	echo "</table></form>\n";
	}
	
	function set_user(){
	$name = $this->input->post('name');
	$id = $this->input->post('id');
	$email = $this->input->post('email');
	$password = $this->input->post('password');
	$admin = $this->input->post('admin');
	$enc = sha1($password);
	if ($admin == 0){
	  $level = "user";
	}else if ($admin = 1){
	  $level = "admin";
	}
	if ($password != 'password'){
	 $query = "update user set name='$name',email='$email',level = '$level',password = '$enc' where id_user=$id";
	}else if( $password == 'password'){
	  $query = "update user set name='$name',email='$email',level = '$level' where id_user=$id";
	}
	$this->db->reconnect();
	$this->db->query($query);
	redirect('dlhelper/profile');
	}
	
	function delete_user($id,$stat){
	$this->user->cek_session('admin');
	$site = site_url();
	$this->db->reconnect();
	$user_dir = $this->setting->get_setting('user_dir');
	$query = $this->db->query("select * from user where id_user = $id");
	$row = $query->row_array();
	$username = $row['username'];
	if ($stat == 0){
	 echo "<h3 style=\"color:#d4020f; font-size:13px;\">Benar anda ingin menghapus User $username beserta semua datanya dari server ?</h3>";
	 echo "<button onclick=\"window.location.replace('$site/system_mod/delete_user/$id/1');\">Hapus</button>";
	}else if($stat == 1){
	   $this->db->reconnect();
	   $this->db->query("delete from user where id_user = $id");
	   rmdir("$user_dir/$username");
	   redirect('dlhelper/profile');
	}
	}
}