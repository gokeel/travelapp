<?php

class Users extends CI_Model {
	public function __construct() {
        parent::__construct();
    }
	
	function login($username, $password) {

        $query = $this->db->get_where('users', array('user_name' => $username, 'password' => $password));
		foreach ($query->result() as $row){
			if (!empty($row->user_name)) {
				//setting new session
				$newdata = array(
					'account_id' => $row->account_id,
					//'kode_user' => $row->kode_user,
					'user_level' => $row->user_level,
					'user_name' => $row->user_name,
					'email' => $row->email_login,
					//'web_id' => $row->web_id,
					'user_IP' => $_SERVER['REMOTE_ADDR'],
					'logged_in' => TRUE
				);
				$this->session->set_userdata($newdata);

				$this->user_log('login', 'Login at '.date('d-M-Y').', IP address: '.$_SERVER['REMOTE_ADDR']);

				return true;
			} else {

				$this->session->sess_destroy();
				return false;
			}
		}
    }
	
	function user_log($type, $activity) {
		$data = array(
			'account_id' => $this->session->userdata('account_id'),
			'activity_type' => $type,
			'activity_log' => $activity
		);
		$this->db->insert('users_log_activities', $data);
		
		return true;
	}
	
	function add_user($data){
		$this->db->insert('users', $data);
		if ($this->db->affected_rows() > 0)
			return $this->db->insert_id();
		else return false;
	}
	
	function edit_user($id, $data){
		$this->db->where('account_id', $id);
		$upd = $this->db->update('users', $data);
		if ($this->db->affected_rows() > 0)
			return true;
		else return false;
	}
	
	function del_user($id){
		$this->db->delete('users', array('account_id' => $id));
		if ($this->db->affected_rows() > 0)
			return true;
		else return false;
	}
	
	function get_account_id_by_username($username){
		$this->db->select('account_id');
		$this->db->from('users');
		$this->db->where('user_name', $username);
		$get = $this->db->get();
		if ($get->num_rows() > 0)
		   foreach ($get->result() as $row)
			$result = $row->account_id;
		return $result;
	}
	
	function get_accounts_by_level($level){
		$this->db->select('*');
		$this->db->from('users');
		$this->db->join('cities', 'users.city_id = cities.id');
		$this->db->where('user_level', $level);
		$this->db->order_by('user_name asc');
		$get = $this->db->get();
		if ($get->num_rows() > 0)
			return $get;
		else
			return false;
	}
	
	function get_account_by_id($id){
		$this->db->select('*');
		$this->db->from('users');
		$this->db->join('cities', 'users.city_id = cities.id', 'left');
		$this->db->where('account_id', $id);
		$select = $this->db->get();
		if ($select->num_rows() > 0)
			return $select;
		else
			return false;
	}
	
	function get_password_by_id($id, $pass){
		$get = $this->db->get_where('users', array('account_id' => $id, 'password' => md5($pass)));
		if ($get->num_rows() > 0)
			return true;
		else
			return false;
	}
}

?>