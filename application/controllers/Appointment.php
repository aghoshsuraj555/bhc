<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Appointment extends Controller
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->model('Appointment_model');
        $this->load->model('Service_model');
        $this->load->model('User_model');
    }

    public function lists($patient_id)
    {
        $content['appointments'] = $this->Appointment_model->get_all(array('patient_id' => $patient_id), 'appointments.id desc');
        $data['view'] = $this->load->view('appointment/list', $content, true);
        $data['type'] = '';
        echo json_encode($data);
        die();
    }
    public function index()
    {
        redirect('appointment/lists');
    }

    public function add($patient_id)
    {
        $this->form_validation->set_rules('assign_to', 'Assigned to', 'required');
        $this->form_validation->set_rules('appointmentdate', 'Appointment Date', 'required');
        $this->form_validation->set_rules('appointmenttime', 'Appointment Time', 'required');
        $this->form_validation->set_rules('service', 'Service', 'required');
        $this->form_validation->set_rules('message', 'Message', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_message('required', 'required');
        $this->form_validation->set_message('valid_email', 'invalid email');
        $this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');
        if ($this->form_validation->run() == FALSE) {
            $type = '';
            if (validation_errors()) {
                $type = 'error';
            }
            $content['services'] =  $this->Service_model->get_cond(array('status' => 'Y'));
            $content['users'] =  $this->User_model->get_cond(array('status' => 'Y'));
            $data['view'] = $this->load->view('appointment/add', $content, true);
            $data['type'] = $type;
            echo json_encode($data);
            die();
        } else {
            $data = array(
                'user_id' => $this->input->post('assign_to'),
                'patient_id' => $patient_id,
                'appointment_date' => date('Y-m-d', strtotime($this->input->post('appointmentdate'))),
                'appointment_time' =>  date('H:i', strtotime($this->input->post('appointmenttime'))),
                'service_id' => $this->input->post('service'),
                'message' => $this->input->post('message'),
                'status' => $this->input->post('status')
            );
            $result = $this->Appointment_model->insert($data);
            if ($result) {
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> Added Successfully!.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>');
                redirect('appointment/lists/' . $patient_id);
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong>Not Added!.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>');
                redirect('appointment/lists/' . $patient_id);
            }
        }
    }

    public function edit($id, $return = 0)
    {
        $content['services'] =  $this->Service_model->get_cond(array('status' => 'Y'));
        $content['users'] =  $this->User_model->get_cond(array('status' => 'Y'));
        $content['appointment'] = $this->Appointment_model->get_one($id);
        $content['return'] = $return;
        return $this->load->view('appointment/edit', $content);
    }

    public function update($patient_id,$id)
    {
        $this->form_validation->set_rules('assign_to', 'Assigned to', 'required');
        $this->form_validation->set_rules('appointmentdate', 'Appointment Date', 'required');
        $this->form_validation->set_rules('appointmenttime', 'Appointment Time', 'required');
        $this->form_validation->set_rules('service', 'Service', 'required');
        $this->form_validation->set_rules('message', 'Message', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_message('required', 'required');
        $this->form_validation->set_message('valid_email', 'invalid email');
        $this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');
        if ($this->form_validation->run() == FALSE) {
            $type = '';
            if (validation_errors()) {
                $type = 'error';
            }
            $content['appointment'] = $this->Appointment_model->get_one($id);
            $content['services'] =  $this->Service_model->get_cond(array('status' => 'Y'));
            $content['users'] =  $this->User_model->get_cond(array('status' => 'Y'));
            $data['view'] = $this->load->view('appointment/edit', $content, true);
            $data['type'] = $type;
            echo json_encode($data);
            die();
        } else {
            $data = array(
                'user_id' => $this->input->post('assign_to'),
                'appointment_date' => date('Y-m-d', strtotime($this->input->post('appointmentdate'))),
                'appointment_time' =>  date('H:i', strtotime($this->input->post('appointmenttime'))),
                'service_id' => $this->input->post('service'),
                'message' => $this->input->post('message'),
                'status' => $this->input->post('status')
            );
            $result = $this->Appointment_model->update($data, $id);
            if ($result) {
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> Updated Successfully!.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>');
                redirect('appointment/lists/'.$patient_id);
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong>Not Updated!.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>');
                redirect('appointment/lists/'.$patient_id);
            }
        }
    }

    public function delete($id, $return = 0)
    {
        $result = $this->Appointment_model->delete($id);
        if ($result) {
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> Deleted Successfully!.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>');
            redirect('appointment/lists/' . $return);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong>Not Added!.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>');
            redirect('appointment/lists/' . $return);
        }
    }
}
