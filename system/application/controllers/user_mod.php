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
	$this->user->reg_user($username,$pass1,$pass2,$name,$email);
	}
}
?>