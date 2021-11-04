<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Enquiry_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->table_name = 'enquiries';
        $this->primary_key = 'id';
    }

    function get_cond($cond = array())
    {
        $this->db->select("*,$this->table_name.id as id,$this->table_name.contactno as contactno,$this->table_name.whatsappno as whatsappno,$this->table_name.name as name");
        $this->db->from($this->table_name);
        $this->db->join('users', "$this->table_name.user_id=users.id", "left");
        $this->db->where($cond);
        if ($this->session->userdata('role') != 1) {
            $this->db->where("$this->table_name.user_id", $this->session->userdata('user_id'));
        }
        $this->db->where("$this->table_name.branch_id", $this->session->userdata('branch'));
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_pagination_count()
    {
        $this->db->select('*');
        $this->db->from($this->table_name);
        $this->db->join('enquiry_status', "$this->table_name.enquiry_status_id=enquiry_status.id", "left");
        $this->db->join('users', "$this->table_name.user_id=users.id", "left");
        $post = $this->input->post();
        if (!($post)) {
            $post = $this->input->get();
        }
        if (@$post['assign_to']) {
            $this->db->where('user_id', @$post['assign_to']);
        }
        if (@$post['name']) {
            $this->db->like("$this->table_name.name", @$post['name']);
        }
        if (@$post['contactno']) {
            $this->db->like("$this->table_name.contactno", @$post['contactno']);
        }
        if (@$post['whatsappno']) {
            $this->db->like("$this->table_name.whatsappno", @$post['whatsappno']);
        }
        if (@$post['enquirydate']) {
            $enquiryDate = explode('-', $post['enquirydate']);
            $this->db->where('enquiry_date >=', @$enquiryDate[0]);
            $this->db->where('enquiry_date <=', @$enquiryDate[1]);
        }
        if (@$post['followupdate']) {
            $followUpDate = explode('-', $post['followupdate']);
            $this->db->where('followup_date >=', @$followUpDate[0]);
            $this->db->where('followup_date <=', @$followUpDate[1]);
        }
        if ($this->session->userdata('role') != 1) {
            $this->db->where("$this->table_name.user_id", $this->session->userdata('user_id'));
        }
        $this->db->where("$this->table_name.branch_id", $this->session->userdata('branch'));
        $query = $this->db->get();
        return $query->num_rows();
    }

    function get_pagination($num, $offset)
    {
        $this->db->select("*,$this->table_name.id as id,$this->table_name.contactno as contactno,$this->table_name.whatsappno as whatsappno,$this->table_name.name as name,enquiry_status.name as enquiry_status");
        $this->db->limit($num, $offset);
        $this->db->from($this->table_name);
        $this->db->join('enquiry_status', "$this->table_name.enquiry_status_id=enquiry_status.id", "left");
        $this->db->join('users', "$this->table_name.user_id=users.id", "left");
        $post = $this->input->post();
        if (!($post)) {
            $post = $this->input->get();
        }
        if (@$post['assign_to']) {
            $this->db->where('user_id', @$post['assign_to']);
        }
        if (@$post['name']) {
            $this->db->like("$this->table_name.name", @$post['name']);
        }
        if (@$post['contactno']) {
            $this->db->like("$this->table_name.contactno", @$post['contactno']);
        }
        if (@$post['whatsappno']) {
            $this->db->like("$this->table_name.whatsappno", @$post['whatsappno']);
        }
        if (@$post['enquiry_status']) {
            $this->db->where('enquiry_status_id', @$post['enquiry_status']);
        }
        if (@$post['enquirydate']) {
            $enquiryDate = explode('-', $post['enquirydate']);
            $this->db->where('enquiry_date >=', @$enquiryDate[0]);
            $this->db->where('enquiry_date <=', @$enquiryDate[1]);
        }
        if (@$post['followupdate']) {
            $followUpDate = explode('-', $post['followupdate']);
            $this->db->where('followup_date >=', @$followUpDate[0]);
            $this->db->where('followup_date <=', @$followUpDate[1]);
        }
        if ($this->session->userdata('role') != 1) {
            $this->db->where("$this->table_name.user_id", $this->session->userdata('user_id'));
        }
        $this->db->where("$this->table_name.branch_id", $this->session->userdata('branch'));
        $query = $this->db->get();
        return $query->result_array();
    }

    function insert($data)
    {
        return $this->db->insert($this->table_name, $data);
    }

    function update($data, $id)
    {
        $cond[$this->primary_key] = $id;
        return $this->db->update($this->table_name, $data, $cond);
    }

    function get_one($id)
    {
        $cond[$this->primary_key] = $id;
        $this->db->select('*');
        $this->db->from($this->table_name);
        $this->db->where($cond);
        $query = $this->db->get();
        return $query->row();
    }

    function daily_report()
    {
        $date = date('Y-m-d');
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('status', 'Y');
        $users = $this->db->get()->result_array();
        $data = [];
        foreach ($users as $user) {
            $count = [];
            $this->db->select('*');
            $this->db->from('enquiry_status');
            $this->db->where('status', 'Y');
            $statuses = $this->db->get()->result_array();
            $this->db->select("count(id) as count");
            $this->db->from($this->table_name);
            $this->db->where('enquiry_status_id', 1);
            $this->db->where('user_id', $user['id']);
            $this->db->where('followup_date', $date);
            $this->db->where('updated_date <', $date);
            $result = $this->db->get()->row();
            array_push($count, $result->count);
            foreach ($statuses as $status) {
                $this->db->select("count(id) as count");
                $this->db->from($this->table_name);
                $this->db->where('enquiry_status_id', $user['id']);
                $this->db->where('user_id', $user['id']);
                $this->db->where('updated_date', $date);
                $result = $this->db->get()->row();
                array_push($count, $result->count);
            }
            $data[] = array(
                'name' => $user['fname'] . ' ' . $user['lname'],
                'count' => $count
            );
        }
        return $data;
    }
}
