<?php

class M_login extends CI_model {

	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function find_user($username){
		$this->db->where('status',1);
		$this->db->where('approved',1);
		$query = $this->db->where('username',$username)->get('user');
		if (!$query->result()){
			return false;
		}
		else{
			return $query->row();
		}
	}
	public function insertData($data,$table){
		$this->db->where($data);
		$res = $this->db->get($table);
		if($res->num_rows()==0){
			$this->db->insert($table,$data);
		}
		return TRUE;
	}

}

?>