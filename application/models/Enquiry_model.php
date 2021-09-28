<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Enquiry_model extends CI_Model {
     function __construct()
     {
        parent::__construct();
 		$this->table_name='enquiries';
 		$this->primary_key ='id';
     }
 	
 	function get_pagination_count()
    {
        $this->db->select('*');
        $this->db->from($this->table_name);
        $this->db->join('enquiry_status',"$this->table_name.enquiry_status_id=enquiry_status.id","left");
		$query = $this->db->get();
        return $query->num_rows();
    }
	
	function get_pagination($num, $offset)
    {
        $this->db->select("*,$this->table_name.id as id,$this->table_name.name as name,enquiry_status.name as enquiry_status");
		$this->db->limit($num, $offset);
        $this->db->from($this->table_name);
        $this->db->join('enquiry_status',"$this->table_name.enquiry_status_id=enquiry_status.id","left");
		$query = $this->db->get();
        return $query->result_array();
    }

    function insert($data)
    {
        return $this->db->insert($this->table_name,$data);
    }

    function update($data,$id)
	{
		$cond[$this->primary_key]=$id;
		return $this->db->update($this->table_name,$data,$cond);
	}
	
    function get_one($id)
	{
		$this->db->select('*');
        $this->db->from($this->table_name);
		$query = $this->db->get();
        return $query->row();
	}
}