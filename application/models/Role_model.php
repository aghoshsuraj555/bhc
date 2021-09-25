<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Role_model extends CI_Model {
     function __construct()
     {
        parent::__construct();
 		$this->table_name='sources';
 		$this->primary_key ='id';
     }

 	function get_all()
    {
        $this->db->select('*');
        $this->db->from($this->table_name);
		$query = $this->db->get();
        return $query->result_array();
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
    function insert($data)
    {
        return $this->db->insert($this->table_name, $data);
    }

    function update($data,$id)
	{
		$cond[$this->primary_key]=$id;
		return $this->db->update($this->table_name,$data,$cond);
	}

    function delete($id)
	{
		$cond[$this->primary_key]=$id;
		return $this->db->delete($this->table_name,$cond);
	}
	
}