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
       if ($item == 'template'){
         $url = "$site/system_mod/template_setting/";
       }else $url = "$site/system_mod/edit_setting/$item";
      echo "<tr><td><a href=\"$url\" rel=\"facebox\">$item</a></td><td>$value</td></tr>\n";
     }
    }
}

?>