<?php
class Template extends Model {

    function Template()
    {
        parent::Model();
    }
    
    function template_loader($message = ''){
       $data['message'] = $message;
       $base_url = base_url();
       $current_template = $this->setting->get_setting('template');
       $this->load->view("template/$current_template/template.php",$data);
    }
    
    function title(){
       $title = $this->setting->get_setting('site_name');
       echo $title;
    }

    function slogan(){
       $slogan = $this->setting->get_setting('slogan');
       echo $slogan;
    }
 

    function menu(){
       $id = $this->session->userdata('id');
       $class = 'Dlhelper';
       $site = strtolower(site_url("$class"));
       $controller = new ReflectionClass($class);
       $block = array("Dlhelper","index","get_instance","CI_Base","Controller","_ci_scaffolding","_ci_initialize","error","profile","admin","home","Logout","user_admin");
       foreach($controller->getMethods() as $method){
          $name = $method->name;
          if ( !in_array($name,$block )){
           echo "<li><a href=$site/$name>$name</a></li>";
          }
        }
        if ($id != ''){
          echo "<li><a href=$site/Logout>Logout</a></li>";
          echo "<li><a href=$site/profile>Profile</a></li>";
        }
    }
   
    function content($url){
     $this->load->helper('file');
     $wew = strtolower($url);
     if ( $wew != ""){
       $comp = APPPATH."views/component/$wew.php";
       if (file_exists($comp)){
         $this->load->view("component/$wew");
       }
     }
    }    

    function template_base(){
       $base_url = base_url();
       $current_template = $this->setting->get_setting('template');
       echo "$base_url/system/application/views/template/$current_template/";
    }
    
    function template_add(){
      $this->load->view('component/js-style');
    }
}
?> 
