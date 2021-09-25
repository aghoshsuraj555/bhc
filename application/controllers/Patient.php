<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Patient extends Controller
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->model('Patient_model');
        $this->load->model('Nationality_model');
        $this->load->model('Source_model');
        $this->load->model('Consultation_status_model');
    }

    public function index()
    {
        $main['header'] = $this->header();
        $config['base_url'] = site_url('patients');
		$config['total_rows'] = $this->Patient_model->get_pagination_count();
		$config['per_page'] = '20';
		$config['uri_segment'] = 4;
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
		$this->pagination->initialize($config);
        $content['enquiries']=$this->Patient_model->get_pagination($config['per_page'],$this->uri->segment($config['uri_segment']));
        $main['content'] = $this->load->view('patient/list');
        $this->load->view('main', $main);
    }

    public function add()
    {
        $main['header'] = $this->header();
        $content['nationality'] = $this->Nationality_model->get_all();
        $content['source'] = $this->Source_model->get_all();
        $main['content'] = $this->load->view('patient/add',$content,true);
        $this->load->view('main', $main);
    }

    public function edit($id)
    {
        $main['header'] = $this->header();
        $content['nationality'] = $this->Nationality_model->get_all();
        $content['enquiry'] = $this->Patient_model->get_one($id);
        $main['content'] = $this->load->view('patient/edit',$content);
        $this->load->view('main', $main);
    }
}
