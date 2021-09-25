<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Users_model extends CI_Model {
    function __construct()
    {
        parent::__construct();
		$this->table_name='users';
		$this->primary_key ='id';
    }
	public function get_row_userdetails($user,$pass){
        $this->db->from($this->table_name);        
		$this->db->where('username',$user);
        $this->db->where('password',$pass);
		$query = $this->db->get();
        return $query->row();
    }
    public function insert($data){
        return $this->db->insert($this->table_name,$data);        
    }
}