<?php
//Cindy Nordiansyah
class Yahoo_messenger extends CI_Model {
	public function __construct() {
        parent::__construct();
    }
	
	function add_ym($table, $data) {
		$insert = $this->db->insert($table, $data);
		if ($this->db->affected_rows() > 0)
			return true;
		else return false;
	}
	
	function get_yahoo(){
		$this->db->select('id,yahoo_account, functional_type');
		$sql = $this->db->get('yahoo_accounts');
		return $sql;
	}
	
	function upd_ym($table, $field_id, $id, $data){
		$this->db->where($field_id, $id);
		$this->db->update($table, $data);
		if ($this->db->affected_rows() > 0)
			return true;
		else return false;
	}
	
	function del_ym($id){
		$this->db->delete('yahoo_accounts', array('id' => $id));
		if ($this->db->affected_rows() > 0)
			return TRUE;
		else return FALSE;
	}
	
	public function get_detail_by_id($table, $field_id, $id){
		$this->db->where($field_id, $id);
		$query = $this->db->get($table);
		return $query;
	}
}