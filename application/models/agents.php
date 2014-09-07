<?php

class Agents extends CI_Model {
	public function __construct() {
        parent::__construct();
    }
	
	function add_agent($data){
		$this->db->insert('agents', $data);
		if ($this->db->affected_rows() > 0)
			return TRUE;
		else return FALSE;
	}
	
	function edit_agent($id, $data){
		$this->db->where('agent_id', $id);
		$this->db->update('agents', $data);
		if ($this->db->affected_rows() > 0)
			return TRUE;
		else return FALSE;
	}
	
	function get_agent_types(){
		$sql = $this->db->get('agent_types');
		return $sql;
	}
	
	function get_agents(){
		$this->db->select('agent_id, agent_name');
		$sql = $this->db->get('agents');
		return $sql;
	}
	
	function get_cities(){
		$this->db->order_by('city asc');
		$sql = $this->db->get('cities');
		return $sql;
	}
	
	function get_all_agents(){
		$query = 'select a.agent_id, a.agent_username, a.agent_name, b.name as agent_type, a.join_date, a.agent_phone, c.city as agent_city, a.agent_email, d.agent_name as parent_agent, a.deposit_amount, a.voucher, a.approved from agents a join agent_types b on a.agent_type_id = b.id join cities c on a.agent_city = c.id join agents d on a.parent_agent_id = d.agent_id order by agent_id desc';
		$sql = $this->db->query($query);
		return $sql;
	}
	
	function del_agent($id){
		$this->db->delete('agents', array('agent_id' => $id));
		if ($this->db->affected_rows() > 0)
			return TRUE;
		else return FALSE;
	}
	
	function get_agent_by_id($id){
		$query = 'select a.*, b.name as agent_type, a.join_date, c.city as agent_city, d.agent_name as parent_agent from agents a join agent_types b on a.agent_type_id = b.id join cities c on a.agent_city = c.id join agents d on a.parent_agent_id = d.agent_id where a.agent_id = "'.$id.'" order by agent_id';
		$sql = $this->db->query($query);
		return $sql;
	}
	
	function get_agent_by_id_no_join($id){
		$this->db->where('agent_id', $id);
		$sql = $this->db->get('agents');
		return $sql;
	}
	
	function get_agent_by_name($name){
		$query = 'select a.*, b.name as agent_type, a.join_date, c.city as agent_city, d.agent_name as parent_agent from agents a join agent_types b on a.agent_type_id = b.id join cities c on a.agent_city = c.id join agents d on a.parent_agent_id = d.agent_id where a.agent_name like "%'.$name.'%" order by agent_id';
		$sql = $this->db->query($query);
		return $sql;
	}
	
	function get_agents_by_status($status){
		$query = 'select a.*, b.name as agent_type, a.join_date, c.city as agent_city, d.agent_name as parent_agent from agents a join agent_types b on a.agent_type_id = b.id join cities c on a.agent_city = c.id join agents d on a.parent_agent_id = d.agent_id where a.approved = "'.$status.'" order by agent_id';
		$sql = $this->db->query($query);
		return $sql;
	}
	
	function get_afield_by_agent_id($field, $id){
		$this->db->select($field)->from('agents')->where('agent_id', $id);
		$query = $this->db->get();
		return $query;
	}
	
	function add_deposit_request($data){
		$this->db->insert('deposit_requests', $data);
		if ($this->db->affected_rows() > 0)
			return true;
		else return false;
	}
	
	function add_withdraw_request($data){
		$this->db->insert('withdraw_requests', $data);
		if ($this->db->affected_rows() > 0)
			return true;
		else return false;
	}
	
	function get_topup_by_status($status){
		$this->db->select('deposit_requests.*, agents.agent_name, bank_accounts.bank_name');
		$this->db->from('deposit_requests');
		$this->db->join('agents', 'deposit_requests.agent_id = agents.agent_id');
		$this->db->join('bank_accounts', 'deposit_requests.bank_receiver_id = bank_accounts.bank_id');
		$this->db->where('deposit_requests.status', $status);
		$this->db->order_by('deposit_requests.id desc');
		$get = $this->db->get();
		return $get;
	}
	
	function get_withdraw_by_status($status){
		$this->db->select('withdraw_requests.*, agents.agent_name');
		$this->db->from('withdraw_requests');
		$this->db->join('agents', 'withdraw_requests.agent_id = agents.agent_id');
		$this->db->where('withdraw_requests.status', $status);
		$this->db->order_by('withdraw_requests.id desc');
		$get = $this->db->get();
		return $get;
	}
	
	function set_toptup_status($id, $status){
		$data = array('status' => $status);
		$this->db->where('id', $id);
		$this->db->update('deposit_requests', $data);
		if ($this->db->affected_rows() > 0)
			return true;
		else return false;
	}
	
	function set_withdraw_status($id, $status){
		$data = array('status' => $status);
		$this->db->where('id', $id);
		$this->db->update('withdraw_requests', $data);
		if ($this->db->affected_rows() > 0)
			return true;
		else return false;
	}
	
	function get_afield_in_topup($id, $field){
		$this->db->select($field);
		$this->db->from('deposit_requests');
		$this->db->where('id', $id);
		$get = $this->db->get();
		foreach ($get->result_array() as $row)
			$result = $row[$field];
			
		return $result;
	}
	
	function get_afield_in_withdraw($id, $field){
		$this->db->select($field);
		$this->db->from('withdraw_requests');
		$this->db->where('id', $id);
		$get = $this->db->get();
		foreach ($get->result_array() as $row)
			$result = $row[$field];
			
		return $result;
	}
	
	function add_nominal_into_account($agent_id, $nominal){
		$update = $this->db->query('update agents set deposit_amount = deposit_amount + '.$nominal.' where agent_id = '.$agent_id);
		if ($this->db->affected_rows() > 0)
			return true;
		else return false;
	}
	
	function substract_nominal_into_account($agent_id, $nominal){
		$update = $this->db->query('update agents set deposit_amount = deposit_amount - '.$nominal.' where agent_id = '.$agent_id);
		if ($this->db->affected_rows() > 0)
			return true;
		else return false;
	}
}

?>