<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Enquiry extends Controller
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->model('Enquiry_model');
        $this->load->model('Enquiry_status_model');
        $this->load->model('Source_model');
        $this->load->model('Nationality_model');
        $this->load->model('User_model');
    }

    public function lists()
    {
        $main['header'] = $this->header();
        $count = $this->Enquiry_model->get_pagination_count();
        $config = $this->pagination($count,'enquiry');
        $this->pagination->initialize($config);
        $content['enquiries'] = $this->Enquiry_model->get_pagination($config['per_page'], $this->uri->segment($config['uri_segment']));
        $main['content'] = $this->load->view('enquiry/list', $content, true);
        $this->load->view('main', $main);
    }
    public function index()
    {
        redirect('enquiry/lists');
    }

    public function add()
    {
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('contactno', 'Contact Number', 'required');
        $this->form_validation->set_rules('whatsappno', 'WhatsApp Number', 'required');
        $this->form_validation->set_rules('enquirydate', 'Enquiry Date', 'required');
        $this->form_validation->set_rules('enquiry_status', 'Enquiry Status', 'required');
        $this->form_validation->set_message('required', 'required');
        $this->form_validation->set_message('valid_email', 'invalid email');
        $this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');
        if ($this->form_validation->run() == FALSE) {
          $main['header'] = $this->header();
          $content['sources'] = $this->Source_model->get_active();
          $content['enquiry_statuses'] = $this->Enquiry_status_model->get_active();
          $content['users'] = $this->User_model->get_active();  
          $content['nationality'] = $this->Nationality_model->get_active();  
          $main['content'] = $this->load->view('enquiry/add', $content, true);
          $this->load->view('main', $main);
        } else {
            $data = array(
                'name' => $this->input->post('name'),
                'email_id' => $this->input->post('email'),
                'contactno' => $this->input->post('contactno'),
                'whatsappno' => $this->input->post('whatsappno'),
                'nationality_id' => $this->input->post('nationality'),
                'enquiry_date' => date('Y-m-d',strtotime($this->input->post('enquirydate'))),
                'source_id' => $this->input->post('source'),
                'enquiry_status_id' => $this->input->post('enquiry_status'),
                'user_id' => $this->input->post('assign_to'),
                'remarks' => $this->input->post('remarks')
            );
            $result = $this->Enquiry_model->insert($data);
            if ($result) {
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> Added Successfully!.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>');
                redirect('enquiry/lists');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong>Not Added!.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>');
                redirect('enquiry/lists');
            }
        }
    }

    public function edit($id, $return = 0)
    {
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('contactno', 'Contact Number', 'required');
        $this->form_validation->set_rules('whatsappno', 'WhatsApp Number', 'required');
        $this->form_validation->set_rules('enquirydate', 'Enquiry Date', 'required');
        $this->form_validation->set_rules('enquiry_status', 'Enquiry Status', 'required');
        $this->form_validation->set_message('required', 'required');
        $this->form_validation->set_message('valid_email', 'invalid email');
        $this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');
        if ($this->form_validation->run() == FALSE) {
          $main['header'] = $this->header();
          $content['return'] = $return;
          $content['enquiry'] = $this->Enquiry_model->get_one($id);
          $content['sources'] = $this->Source_model->get_active();
          $content['enquiry_statuses'] = $this->Enquiry_status_model->get_active();
          $content['users'] = $this->User_model->get_active();  
          $content['nationality'] = $this->Nationality_model->get_active();  
          $main['content'] = $this->load->view('enquiry/edit', $content, true);
          $this->load->view('main', $main);
        } else {
            $data = array(
                'name' => $this->input->post('name'),
                'email_id' => $this->input->post('email'),
                'contactno' => $this->input->post('contactno'),
                'whatsappno' => $this->input->post('whatsappno'),
                'nationality_id' => $this->input->post('nationality'),
                'enquiry_date' => date('Y-m-d',strtotime($this->input->post('enquirydate'))),
                'source_id' => $this->input->post('source'),
                'enquiry_status_id' => $this->input->post('enquiry_status'),
                'user_id' => $this->input->post('assign_to'),
                'remarks' => $this->input->post('remarks')
            );
            $result = $this->Enquiry_model->update($data,$id);
            if ($result) {
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> Added Successfully!.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>');
                redirect('enquiry/lists/'.$return);
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong>Not Added!.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>');
                redirect('enquiry/lists/'.$return);
            }
        }
    }

    public function delete($id, $return = 0)
    {
        $result = $this->Enquiry_model->delete($id);
        if ($result) {
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> Deleted Successfully!.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>');
            redirect('enquiry/lists/' . $return);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong>Not Added!.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>');
            redirect('enquiry/lists/' . $return);
        }
    }
}
