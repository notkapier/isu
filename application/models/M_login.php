<?php

class M_login extends CI_model {

	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function find_user($username){
		$query = $this->db->where('username',$username)->get('user');
		if (!$query->result()){
			return false;
		}
		else{
			return $query->row();
		}
	}
	public function insertData($data){
		$this->db->where($data);
		$res = $this->db->get('stat');
		if($res->num_rows()==0){
			$this->db->insert('stat',$data);
		}
		return TRUE;
	}

}

?>