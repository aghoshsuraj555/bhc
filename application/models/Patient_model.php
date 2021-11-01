<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Patient_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->table_name = 'patients';
        $this->primary_key = 'id';
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

    function get_pagination_count()
    {
        $this->db->select('*');
        $this->db->from($this->table_name);
        $post = $this->input->post();
        if (!($post)) {
            $post = $this->input->get();
        }
        if (@$post['patient_id']) {
            $this->db->like('patient_id', @$post['patient_id']);
        }
        if (@$post['name']) {
            $this->db->like('name', @$post['name']);
        }
        if (@$post['contactno']) {
            $this->db->like('contactno', @$post['contactno']);
        }
        if (@$post['whatsappno']) {
            $this->db->like('whatsappno', @$post['whatsappno']);
        }
        if (@$post['daterange']) {
            $daterange = explode('-', $post['daterange']);
            $this->db->where('enquiry_date >=', @$daterange[0]);
            $this->db->where('enquiry_date <=', @$daterange[1]);
        }
        $this->db->where('branch_id', $this->session->userdata('branch'));
        $query = $this->db->get();
        return $query->num_rows();
    }

    function get_pagination($num, $offset)
    {
        $this->db->select('*');
        $this->db->limit($num, $offset);
        $this->db->from($this->table_name);
        $post = $this->input->post();
        if (!($post)) {
            $post = $this->input->get();
        }
        if (@$post['patient_id']) {
            $this->db->like('patient_id', @$post['patient_id']);
        }
        if (@$post['name']) {
            $this->db->like('name', @$post['name']);
        }
        if (@$post['contactno']) {
            $this->db->like('contactno', @$post['contactno']);
        }
        if (@$post['whatsappno']) {
            $this->db->like('whatsappno', @$post['whatsappno']);
        }
        if (@$post['daterange']) {
            $daterange = explode('-', $post['daterange']);
            $this->db->where('enquiry_date >=', @$daterange[0]);
            $this->db->where('enquiry_date <=', @$daterange[1]);
        }
        $this->db->where('branch_id', $this->session->userdata('branch'));
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

    function get_last_code()
    {
        $this->db->from($this->table_name);
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();
        $last = $query->row();
        if ($last) {
            $code = explode('-', $last->patient_id);
            $num = $code[1] + 1;
            return 'PTN-' . $num;
        } else {
            return 'PTN-1';
        }
    }
}
