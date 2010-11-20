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
	echo "<h2>Atur Settingan Webasssssssssf $item</h2><br/>\n";
	$this->db->reconnect();
	$query = $this->db->query("select * from setting where item like '$item'");
	$row = $query->row_array();
	$value = $row['value'];	
	echo "<table><form action=\"$site/system_mod/set_setting\" method=\"POST\">\n";
	echo "<tr><td>Nilai Baru</td><td><input type=\"text\" name=\"value\"></td></tr>\n";
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
}