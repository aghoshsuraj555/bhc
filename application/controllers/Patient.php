<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Patient extends Controller
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('Patient_model');
        $this->load->model('Nationality_model');
        $this->load->model('Source_model');
        $this->load->model('Enquiry_status_model');
        $this->load->model('Consultation_status_model');
    }

    public function index()
    {
        redirect('patient/lists');
    }
    public function lists()
    {
        $main['header'] = $this->header();
        $count = $this->Patient_model->get_pagination_count();
        $config = $this->pagination($count, 'enquiry');
        if ($_POST) {
            $searchparams = $_POST;
        } else {
            $searchparams = $_GET;
        }
        $config['suffix'] = '?' . http_build_query($searchparams, '', "&");
        $this->pagination->initialize($config);
        $content['patients'] = $this->Patient_model->get_pagination($config['per_page'], $this->uri->segment($config['uri_segment']));
        $main['content'] = $this->load->view('patient/list', $content, true);
        $this->load->view('main', $main);
    }
    public function add()
    {
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email ID', 'required');
        $this->form_validation->set_rules('contactno', 'Contact Number', 'required');
        $this->form_validation->set_rules('whatsappno', 'WhatsApp Number', 'required');
        $this->form_validation->set_rules('city', 'City', 'required');
        $this->form_validation->set_rules('state', 'State/Province', 'required');
        $this->form_validation->set_rules('pincode', 'Pincode', 'required');
        $this->form_validation->set_rules('nri', 'NRI', 'required');
        $this->form_validation->set_rules('enquirydate', 'Enquiry Date', 'required');
        $this->form_validation->set_rules('source', 'Source', 'required');
        $this->form_validation->set_message('required', 'required');
        $this->form_validation->set_message('valid_email', 'invalid email');
        $this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');
        if ($this->form_validation->run() == FALSE) {
            $main['header'] = $this->header();
            $content['nationality'] = $this->Nationality_model->get_active();
            $content['sources'] = $this->Source_model->get_active();
            $content['consultation_statuses'] = $this->Consultation_status_model->get_active();
            $content['refno'] = $this->Patient_model->get_last_code();
            $main['content'] = $this->load->view('patient/add', $content, true);
            $this->load->view('main', $main);
        } else {
            $data = array(
                'patient_id' => $this->input->post('patientid'),
                'name' => $this->input->post('name'),
                'email_id' => $this->input->post('email'),
                'city' => $this->input->post('city'),
                'state' => $this->input->post('state'),
                'pincode' => $this->input->post('pincode'),
                'nationality_id' => $this->input->post('nationality'),
                'contactno' => $this->input->post('contactno'),
                'whatsappno' => $this->input->post('whatsappno'),
                'dob' => date('Y-m-d', strtotime($this->input->post('dob'))),
                'gender' => $this->input->post('gender'),
                'profession' => $this->input->post('profession'),
                'enquiry_date' => date('Y-m-d', strtotime($this->input->post('enquirydate'))),
                'source_id' => $this->input->post('source'),
                'nri' => $this->input->post('nri'),
                'graft_plan' => $this->input->post('graftplan'),
                'method' => $this->input->post('method'),
                'graft_area' => $this->input->post('area'),
                'extracted_number' => $this->input->post('extractednumber'),
                'remarks' => $this->input->post('remarks'),
                'status' => $this->input->post('status')

            );
            $path = 'public/uploads/patient/';
            $config['upload_path'] = $path;
            $config['allowed_types'] = 'gif|jpg|png';
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('image')) {
                $image =  $this->upload->data();
                $data = $image['file_name'];
            }
            $result = $this->Patient_model->insert($data);
            if ($result) {
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> Added Successfully!.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>');
                redirect('patient/lists');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong>Not Added!.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>');
                redirect('patient/lists');
            }
        }
    }

    public function edit($id, $return = 0)
    {
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email ID', 'required');
        $this->form_validation->set_rules('contactno', 'Contact Number', 'required');
        $this->form_validation->set_rules('whatsappno', 'WhatsApp Number', 'required');
        $this->form_validation->set_rules('city', 'City', 'required');
        $this->form_validation->set_rules('state', 'State/Province', 'required');
        $this->form_validation->set_rules('pincode', 'Pincode', 'required');
        $this->form_validation->set_rules('nri', 'NRI', 'required');
        $this->form_validation->set_rules('enquirydate', 'Enquiry Date', 'required');
        $this->form_validation->set_rules('source', 'Source', 'required');
        $this->form_validation->set_message('required', 'required');
        $this->form_validation->set_message('valid_email', 'invalid email');
        $this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');
        if ($this->form_validation->run() == FALSE) {
            $main['header'] = $this->header();
            $content['return'] = $return;
            $content['patient'] = $this->Patient_model->get_one($id);
            $content['sources'] = $this->Source_model->get_active();
            $content['enquiry_statuses'] = $this->Enquiry_status_model->get_active();
            $content['users'] = $this->User_model->get_active();
            $content['nationality'] = $this->Nationality_model->get_active();
            $main['content'] = $this->load->view('patient/edit', $content, true);
            $this->load->view('main', $main);
        } else {
            $data = array(
                'patient_id' => $this->input->post('patientid'),
                'name' => $this->input->post('name'),
                'email_id' => $this->input->post('email'),
                'city' => $this->input->post('city'),
                'state' => $this->input->post('state'),
                'pincode' => $this->input->post('pincode'),
                'nationality_id' => $this->input->post('nationality'),
                'contactno' => $this->input->post('contactno'),
                'whatsappno' => $this->input->post('whatsappno'),
                'dob' => date('Y-m-d', strtotime($this->input->post('dob'))),
                'gender' => $this->input->post('gender'),
                'profession' => $this->input->post('profession'),
                'source_id' => $this->input->post('source'),
                'enquiry_date' => date('Y-m-d', strtotime($this->input->post('enquirydate'))),
                'nri' => $this->input->post('nri'),
                'graft_plan' => $this->input->post('graftplan'),
                'method' => $this->input->post('method'),
                'graft_area' => $this->input->post('area'),
                'extracted_number' => $this->input->post('extractednumber'),
                'remarks' => $this->input->post('remarks'),
                'status' => $this->input->post('status')

            );
            $path = 'public/uploads/patient/';
            $config['upload_path'] = $path;
            $config['allowed_types'] = 'gif|jpg|png';
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('image')) {
                $image =  $this->upload->data();
                $data = $image['file_name'];
            }
            $result = $this->Patient_model->update($data, $id);
            if ($result) {
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> Added Successfully!.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>');
                redirect('patient/lists/' . $return);
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong>Not Added!.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>');
                redirect('patient/lists/' . $return);
            }
        }
    }

    public function delete($id, $return = 0)
    {
        $result = $this->Patient_model->delete($id);
        if ($result) {
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> Deleted Successfully!.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>');
            redirect('patient/lists/' . $return);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong>Not Added!.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>');
            redirect('patient/lists/' . $return);
        }
    }
}
