<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Userlogins_model extends CI_Model {
    function __construct()
    {
        parent::__construct();
		$this->table_name='user_logins';
		$this->primary_key ='id';
    }
    public function insert($data){
        return $this->db->insert($this->table_name,$data);   
    }
}