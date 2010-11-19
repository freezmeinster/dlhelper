<?php
class User_mod extends Controller {

	function User_mod()
	{
		parent::Controller();	
	}
	
	function index(){
	redirect('/');
	}
	
	function reg_user(){
	$username = $this->input->post('username');
	$pass1 = $this->input->post('pass1');
	$pass2 = $this->input->post('pass2');
	$name = $this->input->post('name');
	$email = $this->input->post('email');
	if ($username != '' && $pass1 != '' && $pass2 != '' && $name != '' && $email != ''){
	$this->user->reg_user($username,$pass1,$pass2,$name,$email);
	} else redirect('/dlhelper/error/Data pengguna kurang lengkap');
	} 
	
	function login(){
	$user = $this->input->post('username');
	$pass = $this->input->post('password');
	$this->user->login($user,$pass);
	}
	
	function upload(){
	$username = $this->session->userdata('username');
	$user_dir = $this->config->item('user_dir');
	
	$config['upload_path'] = "$user_dir/$username";
	$config['allowed_types'] = "text|txt";
	$this->load->library('upload', $config);
	  if ( ! $this->upload->do_upload())
		{
		       $error = $this->upload->display_errors('<p>', '</p>');
		       redirect("/dlhelper/error/$error");
		}	
		else
		{
			redirect('/dlhelper/profile/');
		}
	}
}
?>