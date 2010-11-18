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
    
    $pass = sha1($pass1);
    $this->db->reconnect();
    $query = $this->db->query("insert into user(username,password,email,name) values('$username','$pass','$email','$name')");
    $this->db->close();
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
}