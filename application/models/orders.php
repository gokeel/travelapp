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
		$this->db->select('orders.*, agents.agent_name, payments.status');
		$this->db->from('orders');
		$this->db->join('agents', 'orders.account_id = agents.agent_id');
		$this->db->join('payments', 'orders.order_id = payments.order_id', 'left');
		$this->db->where("trip_category ='". $cat."' and (order_status = 'Registered' or order_status = 'Paid')");
		$this->db->order_by('orders.order_id desc');
		//$this->db->where("order_status = 'Registered' or order_status = 'Paid'");
		
		$query = $this->db->get();
		return $query;
	}
	
	function get_processed_order($cat){
		$this->db->select('orders.*, agents.agent_name, payments.status');
		$this->db->from('orders');
		$this->db->join('agents', 'orders.account_id = agents.agent_id');
		$this->db->join('payments', 'orders.order_id = payments.order_id', 'left');
		$this->db->where("trip_category ='". $cat."' and (order_status = 'Done' or order_status = 'Processing')");
		$this->db->order_by('orders.order_id desc');
		//$this->db->where("order_status = 'Registered' or order_status = 'Paid'");
		
		$query = $this->db->get();
		return $query;
	}
	
	function get_cancelled_order($cat){
		$this->db->select('orders.*, agents.agent_name, payments.status, reasons.reason');
		$this->db->from('orders');
		$this->db->join('agents', 'orders.account_id = agents.agent_id');
		$this->db->join('payments', 'orders.order_id = payments.order_id', 'left');
		$this->db->join('reasons', 'orders.order_id = reasons.order_id', 'left');
		$this->db->where("trip_category ='". $cat."' and (order_status = 'Cancelled' or order_status = 'Rejected')");
		$this->db->order_by('orders.order_id desc');
		//$this->db->where("order_status = 'Registered' or order_status = 'Paid'");
		
		$query = $this->db->get();
		return $query;
	}
	
	function get_order_list(){
		$this->db->select('orders.*, agents.agent_name, payments.status');
		$this->db->from('orders');
		$this->db->join('agents', 'orders.account_id = agents.agent_id');
		$this->db->join('payments', 'orders.order_id = payments.order_id', 'left');
		$this->db->order_by('orders.order_id desc');
		
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
	
	function update_order_status($id, $status){
		$data = array('order_status' => $status);
		$this->db->where('order_id', $id);
		$this->db->update('orders', $data);
		if ($this->db->affected_rows() > 0)
			return true;
		else return false;
	}
	
	function get_order_status($id){
		$this->db->select('order_status');
		$this->db->from('orders');
		$this->db->where('order_id', $id);
		$query = $this->db->get();
		if ($query->num_rows() > 0){
			foreach ($query->result_array() as $row)
				$result = $row['order_status'];
		}
		else	$result = 0;
			
		return $result;
	}
	
	function add_edit_reason($id, $reason){
		$data = array(
			'order_id' => $id,
			'reason' => $reason
		);
		//cek exist
		$this->db->select('id');
		$this->db->from('reasons');
		$this->db->where('order_id', $id);
		$check = $this->db->get();
		
		if ($check->num_rows() == 0)
			$this->db->insert('reasons', $data);
		else {
			foreach ($check->result_array() as $row)
				$get_id = $row['id'];
			$this->db->where('id', $get_id);
			$this->db->update('reasons', $data);
		}
	}
}

?>