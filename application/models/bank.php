<?php

class Bank extends CI_Model {
	public function __construct() {
        parent::__construct();
    }
	
	function get_all_bank(){
		$this->db->order_by('bank_name asc');
		$query = $this->db->get('bank_accounts');
		return $query;
	}
	
	function get_all_bank_via(){
		$this->db->order_by('via asc');
		$query = $this->db->get('bank_via');
		return $query;
	}
	
	function add_to_table($table, $data){
		$insert = $this->db->insert($table, $data);
		if ($this->db->affected_rows() > 0)
			return true;
		else return false;
	}
	
	function delete_from_table_by_id($table, $field_id, $id){
		$this->db->delete($table, array($field_id => $id));
		if ($this->db->affected_rows() > 0)
			return true;
		else return false;
	}
	
	public function get_detail_by_id($table, $field_id, $id){
		$this->db->where($field_id, $id);
		$query = $this->db->get($table);
		return $query;
	}
	
	function upd_bank($table, $field_id, $id, $data){
		$this->db->where($field_id, $id);
		$this->db->update($table, $data);
		if ($this->db->affected_rows() > 0)
			return true;
		else return false;
	}
	
}