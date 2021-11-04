<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Calendar extends Controller
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->model('Enquiry_model');
        $this->load->model('Appointment_model');
    }

    public function index()
    {
        $main['header'] = $this->header();
        $content['enquiries'] = $this->Enquiry_model->get_cond(array('enquiry_status_id'=>1));
        foreach ($content['enquiries'] as $key => $value) {
            $main['calendar'][$key]['title'] = $value['name'].'(Enquiry)';
            $main['calendar'][$key]['start'] = $value['followup_date'];
            $main['calendar'][$key]['end'] = $value['followup_date'];
            $main['calendar'][$key]['backgroundColor'] = "#00a65a";
        }
        $content['appointments'] = $this->Appointment_model->get_cond();
        foreach ($content['appointments'] as $key => $value) {
            $main['calendar'][$key]['title'] = $value['name'].'(Appointment)';
            $main['calendar'][$key]['start'] = $value['appointment_date'];
            $main['calendar'][$key]['end'] = $value['appointment_date'];
            $main['calendar'][$key]['backgroundColor'] = "#ab334b";
        }
        $main['content'] = $this->load->view('calendar/list', $content, true);
        $this->load->view('main', $main);
    }
}
