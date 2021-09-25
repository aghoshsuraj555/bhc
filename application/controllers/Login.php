<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct()
    {
		// Call the Model constructor
		parent::__construct(); 
		$this->load->model('Users_model');
		$this->load->model('Userlogins_model');
	}
	public function index()
 	{
		$this->load->model('Users_model');
		$this->load->model('Userlogins_model');
 		$this->form_validation->set_rules('username', 'Username', 'required');
 		$this->form_validation->set_rules('password', 'Password', 'required');
 		$this->form_validation->set_message('required', 'required');
  		$this->form_validation->set_error_delimiters('<span class="text-danger">(', ')</span>');
		if ($this->form_validation->run() == FALSE)
 		{
 		$this->load->view('login');
 		} else {
 			$username=$this->db->escape_str($this->input->post('username'));
 			$password=$this->db->escape_str($this->input->post('password'));
 			$password=md5($password);
			$userdata=$this->Users_model->get_row_userdetails($username,$password);
 			if($userdata){
 				$logindata=array('user_id'=>$userdata->id,
 								'login_date'=>date('Y-m-d H:i:s'),
 								'login_ip'=>$this->input->ip_address());
 				$loginid=$this->Userlogins_model->insert($logindata);	
				$newdata = array();
  				$newdata = array(
 					   'user_id' => $userdata->id,
 					   'username' => $userdata->username,
                       'role'=> $userdata->role,
 					   'client_logged_in' => TRUE,
 				); 
				
  				$this->session->set_userdata($newdata); 
 			}
 			redirect('home');
 		}
 	}
}