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
	
	function add_confirm_payment($data){
		$this->db->insert('payments', $data);
		if ($this->db->affected_rows() > 0)
			return true;
		else return false;
	}
	
	function get_payment_id($id){
		$this->db->select('order_id, status');
		$this->db->from('payments');
		$this->db->where('order_id', $id);
		$query = $this->db->get();
		if ($query->num_rows() > 0){
			foreach ($query->result_array() as $row)
				$result = array ($row['order_id'], $row['status']);
		}
		else	$result = array(0, 0);
			
		return $result;
	}
	
	function get_order_id($id){
		$this->db->select('order_id');
		$this->db->from('payments');
		$this->db->where('payment_id', $id);
		$query = $this->db->get();
		if ($query->num_rows() > 0){
			foreach ($query->result_array() as $row)
				$result = $row['order_id'];
		}
		else	$result = '';
			
		return $result;
	}
	
	function get_payment_list(){
		$this->db->select('trip_category, payments.*, bank_name, bank_account_number, orders.total_price');
		$this->db->from('orders');
		$this->db->join('payments', 'orders.order_id = payments.order_id');
		$this->db->join('bank_accounts', 'payments.bank_receiver_id = bank_accounts.bank_id');
		$this->db->where('payments.status', 'requested');
		$this->db->order_by('orders.order_id asc');
		$query = $this->db->get();
		return $query;
	}
	
	function update_payment_status($id, $status){
		$data = array('status' => $status);
		$this->db->where('payment_id', $id);
		$this->db->update('payments', $data);
		if ($this->db->affected_rows() > 0)
			return true;
		else return false;
	}
}