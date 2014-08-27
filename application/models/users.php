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
}

?>