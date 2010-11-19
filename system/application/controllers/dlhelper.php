<?php

class Dlhelper extends Controller {

	function Dlhelper()
	{
		parent::Controller();	
	}
	
	function index()
	{
		redirect('/dlhelper/home/');
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
        
        function home(){
                $this->template->template_loader();
        }
        
        function profile(){
                $this->template->template_loader();
        }
        
        function admin(){
                $this->template->template_loader();
        }
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */