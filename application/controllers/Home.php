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
        $main['content']=$this->load->view('home');
		$this->load->view('main',$main);
 	}
}