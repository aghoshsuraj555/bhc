<?php
defined('BASEPATH') or exit('No direct script access allowed');
class User extends Controller
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('Role_model');
    }

    public function lists()
    {
        $main['header'] = $this->header();
        $count = $this->User_model->get_pagination_count();
        $config = $this->pagination($count, 'user');
        $this->pagination->initialize($config);
        $content['users'] = $this->User_model->get_pagination($config['per_page'], $this->uri->segment($config['uri_segment']));
        $main['content'] = $this->load->view('user/list', $content, true);
        $this->load->view('main', $main);
    }
    public function index()
    {
        redirect('user/lists');
    }

    public function add()
    {
        $this->form_validation->set_rules('fname', 'First Name', 'required');
        $this->form_validation->set_rules('lname', 'Last Name', 'required');
        $this->form_validation->set_rules('contactno', 'Contact Number', 'required|min_length[8]|max_length[15]|regex_match[/^[+0-9]/]');
        $this->form_validation->set_rules('whatsappno', 'WhatsApp Number', 'required|min_length[8]|max_length[15]|regex_match[/^[+0-9]/]');
        $this->form_validation->set_rules('email', 'Email Id', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('role', 'Role', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');
        $this->form_validation->set_message('required', 'required');
        $this->form_validation->set_message('valid_email', 'invalid email');
        $this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');
        if ($this->form_validation->run() == FALSE) {
            $main['header'] = $this->header();
            $content['roles'] = $this->Role_model->get_cond(array('status' => 'Y'));
            $main['content'] = $this->load->view('user/add', $content, true);
            $this->load->view('main', $main);
        } else {
            $data = array(
                'fname' => $this->input->post('fname'),
                'lname' => $this->input->post('lname'),
                'job_title' => $this->input->post('jobtitle'),
                'status' => $this->input->post('status'),
                'contactno' => $this->input->post('contactno'),
                'whatsappno' => $this->input->post('whatsappno'),
                'email_id' => $this->input->post('email'),
                'username' => $this->input->post('username'),
                'password' => md5($this->input->post('password')),
                'role_id' => $this->input->post('role'),
                'branch_id' => $this->input->post('branch'),
                'status' => $this->input->post('status')
            );
            $path = 'public/uploads/user/';
            $config['upload_path'] = $path;
            $config['allowed_types'] = 'gif|jpg|png';
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('image')) {
                $image =  $this->upload->data();
                $data = $image['file_name'];
            }
            $result = $this->User_model->insert($data);
            if ($result) {
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> Added Successfully!.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>');
                redirect('user/lists');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong>Not Added!.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>');
                redirect('user/lists');
            }
        }
    }

    public function edit($id, $return = 0)
    {
        $this->form_validation->set_rules('fname', 'First Name', 'required');
        $this->form_validation->set_rules('lname', 'Last Name', 'required');
        $this->form_validation->set_rules('contactno', 'Contact Number', 'required|min_length[8]|max_length[15]|regex_match[/^[+0-9]/]');
        $this->form_validation->set_rules('whatsappno', 'WhatsApp Number', 'required|min_length[8]|max_length[15]|regex_match[/^[+0-9]/]');
        $this->form_validation->set_rules('email', 'Email Id', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|callback_username_exists');
        $this->form_validation->set_rules('role', 'Role', 'required');
        $this->form_validation->set_message('required', 'required');
        $this->form_validation->set_message('valid_email', 'invalid email');
        $this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');
        if ($this->form_validation->run() == FALSE) {
            $main['header'] = $this->header();
            $content['roles'] = $this->Role_model->get_cond(array('status' => 'Y'));
            $content['user'] = $this->User_model->get_one($id);
            $main['content'] = $this->load->view('user/edit', $content, true);
            $this->load->view('main', $main);
        } else {
            $data = array(
                'fname' => $this->input->post('fname'),
                'lname' => $this->input->post('lname'),
                'job_title' => $this->input->post('jobtitle'),
                'status' => $this->input->post('status'),
                'contactno' => $this->input->post('contactno'),
                'whatsappno' => $this->input->post('whatsappno'),
                'email_id' => $this->input->post('email'),
                'username' => $this->input->post('username'),
                'role_id' => $this->input->post('role'),
                'branch_id' => $this->input->post('branch'),
                'status' => $this->input->post('status')
            );
            $path = 'public/uploads/user/';
            $config['upload_path'] = $path;
            $config['allowed_types'] = 'gif|jpg|png';
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if($this->input->post('password')){
                $data['password'] = md5($this->input->post('password'));
            }
            if ($this->upload->do_upload('image')) {
                $image =  $this->upload->data();
                $data = $image['file_name'];
            }
            $result = $this->Patient_model->update($data,$id);
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
                redirect('user/lists');
            }
        }
    }
    public function delete($id, $return = 0)
    {
        $result = $this->User_model->delete($id);
        if ($result) {
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> Deleted Successfully!.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>');
            redirect('user/lists/' . $return);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong>Not Deleted!.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>');
            redirect('user/lists/' . $return);
        }
    }

    function username_exists($code)
	{
		$id = $this->input->post('id');
		if ($this->User_model->username_exists($code,$id))
		{
			$this->form_validation->set_message('username_exists', 'already exists');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
}
