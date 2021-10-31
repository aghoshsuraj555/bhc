<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Controller extends CI_Controller {
	
    function __construct()
    {
        parent::__construct();
        $this->load->model('Menu_model');
        $this->load->model('Branch_model');
    }
	
	public function header()
	{
        $header['branches'] = $this->Branch_model->get_active();
        $header['menu'] = $this->Menu_model->get_role_menu();
		return $this->load->view('include/header',$header,true);
	}

    public function pagination($count, $controller)
	{
        $config['base_url'] = site_url($controller.'/lists');
        $config['total_rows'] = $count;
        $config['per_page'] = '10';
        $config['uri_segment'] = 3;
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['next_link'] = '<i class="fa fa-angle-right"></i>';
        $config['prev_link'] = '<i class="fa fa-angle-left"></i>';
        $config['cur_tag_open'] = '<li class="active"><a>';
        $config['cur_tag_close'] = '</a></li>';
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li class="right">';
        $config['next_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li class="left">';
        $config['prev_tag_close'] = '</li>';
        return $config;
	}

}