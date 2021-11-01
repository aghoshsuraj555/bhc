<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends Controller {
	function __construct()
    {
		// Call the Model constructor
		parent::__construct(); 
	}
	public function index()
 	{
		$main['header']=$this->header();
		$content = ''; 
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
}