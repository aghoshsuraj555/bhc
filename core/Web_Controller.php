<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class CRMAdmin_Controller extends CI_Controller {
	
    function __construct()
    {
        parent::__construct();
		date_default_timezone_set("Asia/Kolkata");
    }
	
	function header()
	{	
		return  $this->load->view('include/header');
	}
}