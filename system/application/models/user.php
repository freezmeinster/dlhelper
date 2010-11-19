<?php
class User extends Model {

    function User()
    {
        parent::Model();
    }
    
    function reg_user($username,$pass1,$pass2,$name,$email){
    if ($pass1 != $pass2){
     redirect('/dlhelper/error/password tidak sama');
    }
    
    $this->db->reconnect();
    $cek_user = $this->db->query("select * from user where username like '$username'");
    if ($cek_user->num_rows() > 0 ){
      redirect('/dlhelper/error/User sudah ada');
    }
    $user_dir = $this->config->item('user_dir');
    $pass = sha1($pass1);
    $this->db->reconnect();
    $query = $this->db->query("insert into user(username,password,email,name) values('$username','$pass','$email','$name')");
    mkdir("$user_dir/$username", 0700);
    redirect('/');
    }
    
    function list_user($limit=null,$kind){
      if ($limit != null){
          $query = "select * from user order by id_user desc limit $limit";
      }else if($limit == null){
          $query = "select * from order by id_user desc user ";
      }
      
      $this->db->reconnect();
      $result = $this->db->query($query);
      foreach ($result->result_array() as $row)
               {
                 $username = $row['username'];
                 $name = $row['name'];
                 $email = $row['email'];
                 echo "<tr><td>$username</td><td>$name</td><td>$email</td></tr>";
               } 
    
    }
    
    function edit_user(){
    
    }
    
    function del_user(){
    
    }
    
    function login($user,$pass){
     if ($user == '' || $pass == '' ){
      redirect('/dlhelper/error/Username atau Password kosong');
     }else if ($user != '' && $pass != ''){
        $encpass = sha1($pass);
        $this->db->reconnect();
        $login = $this->db->query("select * from user where username like '$user' and password like '$encpass'");
       
        if ($login->num_rows() > 0 ){
            $row = $login->row_array();
            $id = $row['id_user'];
            $newdata = array(
                   'username'  =>  $user,
                   'id'	       => $id,
                   'password'  => $encpass
               );
            $this->session->set_userdata($newdata);
            redirect('/dlhelper/profile');
        }
     }
    
    }
    
    function logout(){
    
    }
    
    function cek_session(){
    
    }
}