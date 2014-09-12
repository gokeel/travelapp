<?php
//Cindy Nordiansyah
class Cities extends CI_Model {
	public function __construct() {
        parent::__construct();
    }
	
	public function add_city($table, $data) {
		$insert = $this->db->insert($table, $data);
		if ($this->db->affected_rows() > 0)
			return true;
		else return false;
	}
	
	function upd_city($table, $field_id, $id, $data){
		$this->db->where($field_id, $id);
		$this->db->update($table, $data);
		if ($this->db->affected_rows() > 0)
			return true;
		else return false;
	}
	
	public function get_detail_by_id($table, $field_id, $id){
		$this->db->where($field_id, $id);
		$query = $this->db->get($table);
		return $query;
	}
}