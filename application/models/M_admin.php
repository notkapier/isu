<?php

class M_admin extends CI_model {

	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	function getAllData($table){
		$query = $this->db->query("select * from $table order by id desc");
		return $query->result();
	}
	function display($data){
		echo '<pre>';
		print_r($data);
		echo '</pre>';
		exit();
	}
	function getAllDataJoin($table1,$table2){
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
		$query =  $this->db->get();
		return $query->result();
	}
	function insertData($table,$data){
		return $this->db->insert($table,$data);
	}
	function getData($table,$id,$array){
		$this->db->where('id',$id);
		$this->db->select($array);
		$this->db->from($table);
		return $this->db->get()->row();
	}
	function updateData($table,$id,$data){
		$this->db->where('id',$id);
		return $this->db->update($table,$data);
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
	function getRegistered(){
		$month = date('m');
		$query = $this->db->query("select count(id) as total, day(date_posted) as day from stat  where month(date_posted) = $month and user_id <> 0 group by day(date_posted) order by day(date_posted)");
		return $query->result();
	}
	function getVisitors(){
		$month = date('m');
		$query = $this->db->query("select count(id) as total, day(date_posted) as day from stat  where month(date_posted) = $month and user_id = 0 group by day(date_posted) order by day(date_posted)");
		return $query->result();
	}
}

?>