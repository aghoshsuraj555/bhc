<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Permission extends Controller
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->model('Role_model');
        $this->load->model('Menu_model');
        $this->load->model('Permission_model');
        $this->load->model('Permission_role_model');
        $this->load->model('Menu_role_model');
    }

    public function index()
    {
        if ($this->form_validation->run() == FALSE) {
            $main['header'] = $this->header();
            $content['roles'] = $this->Role_model->get_cond(array('status' => 'Y'));
            $content['permissions'] = $this->Permission_model->get_cond(array('status' => 'Y'));
            $content['menus'] = $this->Menu_model->get_cond(array('status' => 'Y'));
            foreach ($content['roles'] as $role) {
                $content['access'][$role['id']] = $this->Permission_role_model->get_cond(array('role_id' => $role['id']));
            }
            foreach ($content['roles'] as $role) {
                $content['menu_access'][$role['id']] = $this->Menu_role_model->get_cond(array('role_id' => $role['id']));
            }
            $main['content'] = $this->load->view('permission/list', $content, true);
            $this->load->view('main', $main);
        }
        if ($this->input->post()) {
            $this->Permission_role_model->truncate();	
            $this->Menu_role_model->truncate();
			$result=false;
			foreach($content['roles'] as $key => $val):
			if(isset($_POST['roleid'.$val['id']])){ 
				foreach($_POST['roleid'.$val['id']] as $id => $access): 
					$data=array('role_id'=>$val['id'],'permission_id'=>$access); 
					$result=$this->Permission_role_model->insert($data);				
				endforeach;			
			}
            if(isset($_POST['menu_roleid'.$val['id']])){ 
				foreach($_POST['menu_roleid'.$val['id']] as $id => $access): 
					$data=array('role_id'=>$val['id'],'menu_id'=>$access); 
					$result=$this->Menu_role_model->insert($data);				
				endforeach;			
			}
			endforeach;
            if ($result) {
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Updated Successfully!.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>');
                redirect('permission');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong>Not Updated!.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>');
                redirect('permission');
            }
        }
    }
}
