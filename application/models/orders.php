<?php

class Orders extends CI_Model {
	public function __construct() {
        parent::__construct();
    }
	
	function add_order($data){
		$id_inserted = 0;
		$ins = $this->db->insert('orders', $data);
		if ($this->db->affected_rows() > 0)
			$id_inserted = $this->db->insert_id();
		return $id_inserted;
	}
	
	function add_passenger($data){
		$this->db->insert('passenger_lists', $data);
		if ($this->db->affected_rows() > 0)
			return true;
		else return false;
	}
	
	function get_registered_order($cat){
		$this->db->select('*');
		$this->db->from('orders');
		$this->db->join('agents', 'orders.account_id = agents.agent_id');
		$this->db->where('trip_category', $cat);
		$this->db->where('order_status', 'Registered');
		
		$query = $this->db->get();
		return $query;
	}
	
	function get_order_by_id($id){
		$this->db->select('*');
		$this->db->from('orders');
		$this->db->join('agents', 'orders.account_id = agents.agent_id');
		$this->db->where('orders.order_id', $id);
		
		$query = $this->db->get();
		return $query;
	}
	
	function get_passenger($id, $level){
		$this->db->select('*');
		$this->db->from('passenger_lists');
		$this->db->where('order_id', $id);
		$this->db->like('passenger_level', $level);
		$this->db->order_by('order_list asc');
		
		$query = $this->db->get();
		return $query;
	}
}

?>