<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Nationality_model extends CI_Model {
     function __construct()
     {
        parent::__construct();
 		$this->table_name='nationalities';
 		$this->primary_key ='id';
     }

 	function get_all()
    {
        $this->db->select('*');
        $this->db->from($this->table_name);
		$query = $this->db->get();
        return $query->result_array();
    }
 	function get_pagination_count()
    {
        $this->db->select('*');
        $this->db->from($this->table_name);
		$query = $this->db->get();
        return $query->num_rows();
    }
	
	function get_pagination($num, $offset)
    {
        $this->db->select('*');
		$this->db->limit($num, $offset);
        $this->db->from($this->table_name);
		$query = $this->db->get();
        return $query->result_array();
    }
	
}