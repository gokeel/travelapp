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
		$query = 'select a.agent_id, a.agent_name, b.name as agent_type, a.join_date, a.agent_phone, c.city as agent_city, a.agent_email, d.agent_name as parent_agent, a.deposit_amount, a.voucher, a.approved from agents a join agent_types b on a.agent_type_id = b.id join cities c on a.agent_city = c.id join agents d on a.parent_agent_id = d.agent_id order by agent_id';
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
	
	/*function get_city_by_agent_id($id){
		$this->db->select('agent_city')->from('agents')->where('agent_id', $id);
		$query = $this->db->get();
		return $query;
	}
	
	function get_upline_by_agent_id($id){
		$this->db->select('parent_agent_id')->from('agents')->where('agent_id', $id);
		$query = $this->db->get();
		return $query;
	}
	
	function get_agent_type_by_agent_id($id){
		$this->db->select('agent_type_id')->from('agents')->where('agent_id', $id);
		$query = $this->db->get();
		return $query;
	}*/
}

?>