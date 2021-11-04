<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Appointment_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->table_name = 'appointments';
        $this->primary_key = 'id';
    }

    function get_cond($cond=array())
    {
        $this->db->select("*,services.name as service_name,$this->table_name.id as appointment_id,$this->table_name.status as status");
        $this->db->from($this->table_name);
        $this->db->join('patients', "$this->table_name.patient_id = patients.id", "left");
        $this->db->join('users', "$this->table_name.user_id=users.id", "left");
        $this->db->join('services',"$this->table_name.service_id=services.id","left");
        $this->db->where($cond);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    function get_all($where=array(),$order='')
    {
        $this->db->select("*,$this->table_name.id as appointment_id,$this->table_name.status as status");
        $this->db->from($this->table_name);
        $this->db->join('users',"$this->table_name.user_id=users.id","left");
        $this->db->join('services',"$this->table_name.service_id=services.id","left");
        $this->db->where($where);
        $this->db->order_by($order);
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
    function get_active()
    {
        $this->db->select('*');
        $this->db->from($this->table_name);
        $this->db->where('status','Y');
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
