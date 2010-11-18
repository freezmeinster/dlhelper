<?php

class Dlhelper extends Controller {

	function Dlhelper()
	{
		parent::Controller();	
	}
	
	function index()
	{
		$this->template->template_loader();
	}
         
        function Available_packages(){
                $this->template->template_loader();
        } 
                     
        function Get_packages(){
                $this->template->template_loader();
        }

        function Login(){
                $this->template->template_loader();
        }

        function Logout(){
                $this->template->template_loader();
        }

        function Register(){
                $this->template->template_loader();
        }
        
        function Latest_User(){
                $this->template->template_loader();
        }
        
        function error($message){
                $this->template->template_loader($message);
        }
        
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */