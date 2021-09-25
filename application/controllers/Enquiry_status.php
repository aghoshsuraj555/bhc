<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Enquiry_status extends Controller
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->model('Enquiry_status_model');
    }

    public function lists()
    {
        $main['header'] = $this->header();
        $count = $this->Enquiry_status_model->get_pagination_count();
        $config = $this->pagination($count,'Consultation_status');
        $this->pagination->initialize($config);
        $content['enquiry_statuses'] = $this->Enquiry_status_model->get_pagination($config['per_page'], $this->uri->segment($config['uri_segment']));
        $main['content'] = $this->load->view('enquiry_status/list', $content, true);
        $this->load->view('main', $main);
    }
    public function index()
    {
        redirect('enquiry_status/lists');
    }

    public function add()
    {
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_message('required', 'required');
        $this->form_validation->set_message('valid_email', 'invalid email');
        $this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message', '<div class="alert alert-secondary alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Validation error!.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>');
            redirect('enquiry_status/lists');
        } else {
            $data = array(
                'name' => $this->input->post('name'),
                'status' => $this->input->post('status')
            );
            $result = $this->Enquiry_status_model->insert($data);
            if ($result) {
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> Added Successfully!.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>');
                redirect('enquiry_status/lists');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong>Not Added!.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>');
                redirect('enquiry_status/lists');
            }
        }
    }

    public function edit($id, $return = 0)
    {
        $content['enquiry_status'] = $this->Enquiry_status_model->get_one($id);
        $content['return'] = $return;
        return $this->load->view('enquiry_status/edit', $content);
    }

    public function update($id, $return = 0)
    {
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_message('required', 'required');
        $this->form_validation->set_message('valid_email', 'invalid email');
        $this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message', '<div class="alert alert-secondary alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Validation error!.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>');
            redirect('enquiry_status/lists/' . $return);
        } else {
            $data = array(
                'name' => $this->input->post('name'),
                'status' => $this->input->post('status')
            );
            $result = $this->Enquiry_status_model->update($data, $id);
            if ($result) {
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> Added Successfully!.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>');
                redirect('enquiry_status/lists/' . $return);
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong>Not Added!.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>');
                redirect('enquiry_status/lists/' . $return);
            }
        }
    }

    public function delete($id, $return = 0)
    {
        $result = $this->Enquiry_status_model->delete($id);
        if ($result) {
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> Deleted Successfully!.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>');
            redirect('enquiry_status/lists/' . $return);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong>Not Added!.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>');
            redirect('enquiry_status/lists/' . $return);
        }
    }
}
