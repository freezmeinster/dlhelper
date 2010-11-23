  <?php 
  $username = $this->session->userdata('username');
$password = $this->session->userdata('password');
$id = $this->session->userdata('id');
$site = site_url();
$this->db->reconnect();
$query = $this->db->query("select * from user where id_user=$id");
$row = $query->row_array();
$name = $row['name'];
   echo "<h3>Selamat datang <strong style=\"color:blue;\"> $name</strong></h3><br>\n";
    echo "Setting Editor";
    echo "<table class=\"perlu\">\n";
    echo "<tr class=\"perlu\" ><th>Item</th><th>Value</th></tr>\n";
    $this->setting->list_setting();
    echo "</table>\n";
    
    echo "<br><a href=\"$site/dlhelper/user_admin\"><button>User Editor</button></a><br>";
    
    echo "<br><span rel=\"tooltip\" title=\"Anda dapat mengatur distro apa saja yang akan di support system dan juga versi release nya\">Distro & Release Editor</span>";
    echo "<table class=\"perlu\">\n";
    echo "<tr><th>Nama Distro</th><th>Pilihan</th></tr>\n";
    $this->setting->list_distro();
    echo "</table>\n";
    
    echo "<br><span rel=\"tooltip\" title=\"Anda dapat mengatur distro apa saja yang akan di support system dan juga versi release nya\">Repository Url</span>";
    echo "<table class=\"perlu\">\n";
    echo "<tr><th>Nama Distro</th><th>Pilihan</th></tr>\n";
    $this->setting->list_distro();
    echo "</table>\n";
    echo "<a href=\"$site/system_mod/add_repo\" rel=\"facebox\"><button rel=\"tooltip\" title=\"Tambah List repositori dengan mengklik ini \">Tambah List Repo</button></a>";
    ?>