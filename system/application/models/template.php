<?php
class Template extends Model {

    function Template()
    {
        parent::Model();
    }
    
    function template_loader(){
       $base_url = base_url();
       $current_template = $this->config->item('template');
       $this->load->view("$current_template/template.php");
    }
    
    function title(){
       $title = $this->config->item('site_name');
       echo $title;
    }

    function slogan(){
       $slogan = $this->config->item('site_slogan');
       echo $slogan;
    }

    function menu(){
       $class = 'Dlhelper';
       $site = strtolower(site_url("$class"));
       $controller = new ReflectionClass($class);
       foreach($controller->getMethods() as $method)
        {
          $name = $method->name;
          if ($name != $class && $name != "index" && $name != "get_instance" && $name != "CI_Base" && $name != "Controller" && $name != "_ci_scaffolding" && $name != "_ci_initialize"){
          echo "<li><a href=\"$site/$name\">$name</a></li>";
          }
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
       $current_template = $this->config->item('template');
       echo "$base_url/system/application/views/$current_template/";
    }
}
?> 
