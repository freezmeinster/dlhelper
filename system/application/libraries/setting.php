<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Setting {

    function get_setting($item)
    { 
     $CI =& get_instance();
     $CI->load->database();
     $CI->db->reconnect();
     $query = $CI->db->query("select value from setting where item like '$item'");
     $row = $query->row_array();
     $data = $row['value'];
     return($data);
    }
    
    function edit_setting($item,$value){
     $CI =& get_instance();
     $CI->load->database();
     $CI->db->reconnect();
     $query = $CI->db->query("update setting set(value = $value) where item like '$item'");
    }
    
    function list_setting(){
     $CI =& get_instance();
     $site = site_url();
     $CI->load->database();
     $CI->db->reconnect();
     $query = $CI->db->query("select * from setting");
     foreach ($query->result_array() as $row){
      $item = $row['item'];
      $value = $row['value'];
      $hint = $row['hint'];
       if ($item == 'template'){
         $url = "$site/system_mod/template_setting/";
       }else $url = "$site/system_mod/edit_setting/$item";
      echo "<tr><td rel=\"tooltip\" title=\"$hint\" ><a href=\"$url\" rel=\"facebox\">$item</a></td><td>$value</td></tr>\n";
     }
    }
    
    function list_user(){
     $CI =& get_instance();
     $site = site_url();
     $CI->load->database();
     $CI->db->reconnect();
     $url = "$site/system_mod";
     $query = $CI->db->query("select * from user where username not like 'admin' ");
     foreach ($query->result_array() as $row){
      $username = $row['username'];
      $email = $row['email'];
      $name = $row['name'];
      $id = $row['id_user'];
      $level = $row['level'];
      echo "<tr><td>$username</td><td>$name</td><td>$email</td><td>$level</td><td><a href=\"$url/edit_user/$id\" rel=\"facebox\">Edit</a>||<a href=\"$url/delete_user/$id/0\" rel=\"facebox[.bolder]\">Hapus</a></td><tr> \n";
     }
     }
     
     function list_distro(){
     $CI =& get_instance();
     $site = site_url();
     $CI->load->database();
     $CI->db->reconnect();
     $url = "$site/system_mod/template_setting/";
     $query = $CI->db->query("select * from distro ");
     foreach ($query->result_array() as $row){
      $name = $row['name'];
      $id = $row['id_distro'];
      echo "<tr><td><a href=\"\" rel=\"facebox\">$name</a></td><td><a href=\"\" rel=\"facebox\">Edit</a> || <a href=\"\" rel=\"facebox\">Tambah Release</a> || <a href=\"\" rel=\"facebox\">Hapus</a></td><tr>";
     }
    }
    
    function distro(){
     $CI =& get_instance();
     $site = site_url();
     $CI->load->database();
     $CI->db->reconnect();
     $query = $CI->db->query("select * from distro ");
      foreach($query->result_array() as $row){
        $id = $row['id_distro'];
        $name = $row['name'];
        echo "<option value=\"$id\">$name</option>";
      }
    }

    
    function release(){
     $CI =& get_instance();
     $site = site_url();
     $CI->load->database();
     $CI->db->reconnect();
     $i=1;
     $query = $CI->db->query("select * from distro ");
      foreach($query->result_array() as $row){
         $id = $row['id_distro'];
         echo "cities[$i]=[";
          $CI->db->reconnect();
          $a=1;
          $que = $CI->db->query("select * from distro d,release r where d.id_distro = r.id_distro and d.id_distro = $id ");
           foreach($que->result_array() as $ro){
            if ($a ==1 ){
             $koma = '';
             }else $koma = ',';
            $code = $ro['r.kode'];
            echo "$koma\"$code|$code\"";
            $a++;
           }
         echo "]\n";
         $i++;
      }
    }
    
}

?>