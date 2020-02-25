<?php

class M_home extends CI_model {

	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	function display($data){
		echo '<pre>';
		print_r($data);
		echo '</pre>';
		exit();
	}
	
	function getSingleData($table,$where){
		$this->db->where($where);
		$query = $this->db->get($table);
		if($query->num_rows()>0){
			return $query->row();
		}
		else{
			return false;
		}
	}
	function getMultipleData($table,$where="",$limit=0){
		if($where!=""){
			$this->db->where($where);	
		}
		if($limit!=0){
			$this->db->limit($limit,0);
		}
		$this->db->order_by("id","desc");
		$query = $this->db->get($table);
		if($query->num_rows()>0){
			return $query->result();
		}
		else{
			return false;
		}
	}
	function getData($table,$order_by="",$order=""){
		if($order_by=""){
			$this->db->order_by("id","desc");	
		}
		else{
			$this->db->order_by($order_by,$order);	
		}
		return $this->db->get($table)->result();
	}
	function getColumnNamesWithoutID($table){
		$query = $this->db->query("SELECT
		        GROUP_CONCAT(
		        COLUMN_NAME
		    ORDER BY
		        ordinal_position
		    ) AS COLUMNS
		FROM
		    information_schema.columns
		WHERE  table_schema = 'isu' and TABLE_NAME
		    = '$table' AND COLUMN_NAME NOT IN('id','date_posted','description')");
		return $query->row()->COLUMNS;
	}
	function columnNames($table){
		$query = $this->db->query("SELECT
		        GROUP_CONCAT(
		        COLUMN_NAME
		    ORDER BY
		        ordinal_position
		    ) AS COLUMNS
		FROM
		    information_schema.columns
		WHERE  table_schema = 'isu' and TABLE_NAME
		    = '$table'");
		return $query->row()->COLUMNS;
	}
	function getAllDataJoin($table1,$table2,$where=""){
		$columnNames = $this->columnNames($table1);
		// $this->display($table1);
		$table1columns = $this->getColumnNamesWithoutID($table1);
		$table2columns = $this->getColumnNamesWithoutID($table2);
		if(strpos('description', $columnNames) !== false){
		    $table1columns = $table1columns.','.$table1.'.description as description';
		}
		$columns = $table1.'.id as id,'.$table1.'.date_posted as date_posted,'.$table1columns.','.$table2columns;
		// $this->display($columns);
		$string = $table2.'.id = '.$table1.'.'.$table2.'_id'; 
		$this->db->select($columns);
		$this->db->from($table1);
		$this->db->join($table2, $string, 'left');
		if($where!=""){
			$this->db->where($where);
		}
		$query =  $this->db->get();
		return $query->result();
	}
	function getForum($id=0){
		if($id==0){
			$query = $this->db->query("SELECT question.*,x.counter, user.fullname,user.username from question left join (select question_id, count(id) as counter from answer group by question_id)x  on x.question_id = question.id left join user on user.id = question.user_id order by question.date_posted desc");
			return $query->result();	
		}
		else{
			$query = $this->db->query("SELECT question.*,x.counter, user.fullname,user.username from question left join (select question_id, count(id) as counter from answer group by question_id)x  on x.question_id = question.id left join user on user.id = question.user_id  where question.id = $id order by question.date_posted desc");
			return $query->row();
		}
	}
	function getForumData($id){
		$query = $this->db->query("SELECT answer.*, user.fullname,user.username from answer left join user on user.id = answer.user_id where question_id = $id");
		return $query->result();
	}
	function getOneData($table,$id,$array){
		$this->db->where('id',$id);
		$this->db->select($array);
		$this->db->from($table);
		return $this->db->get()->row();
	}
}

?>