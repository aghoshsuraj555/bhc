<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends Controller {
	function __construct()
    {
		// Call the Model constructor
		parent::__construct();
		$this->load->model('Enquiry_model');
		$this->load->model('Appointment_model'); 
	}
	public function index()
 	{
		$main['header']=$this->header();
		$content['followup'] = $this->Enquiry_model->get_cond(array('enquiry_status_id'=>1));
		$content['converted'] = $this->Enquiry_model->get_cond(array('enquiry_status_id'=>3));
		$content['total_enquiry'] = $this->Enquiry_model->get_cond();
		$content['appointment'] = $this->Appointment_model->get_cond();
		$content['appointments'] = $this->Appointment_model->get_cond(array('appointment_date'=>date('Y-m-d')));
		$content['enquiries'] = $this->Enquiry_model->get_cond(array('followup_date'=>date('Y-m-d')));
        $main['content']=$this->load->view('home', $content, true);
		$this->load->view('main',$main);
 	}
	
	public function set_branch()
	{
		$branch = $this->input->post('branch');
		$this->session->set_userdata('branch', $branch);
		$url = $this->input->post('url');
		redirect($url, 'refresh');
	}

	public function logout()
	{
 		$array_items =  array('user_id','username','name','branch','role','client_logged_in');
		$this->session->unset_userdata($array_items); 
		$this->session->sess_destroy();
		redirect('login');	
	}
}