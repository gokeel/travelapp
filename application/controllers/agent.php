<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Agent extends CI_Controller {
	public function __construct() {
		parent::__construct();

        $this->load->helper('form');
        $this->load->model('users');
		$this->load->model('agents');
		$this->load->model('bank');	
	}
	
	public function home(){
		$this->page('agent_home');
		
	}
	
	/**********************************/
	/**			PAGES				 **/
	/**********************************/
	function page($page_request, $additional=null){
		//get data of current user logged in
		$id = $this->session->userdata('account_id');
		$get = $this->agents->get_agent_by_id_no_join($id);
		foreach ($get->result_array() as $row){
			$data_money['deposit'] = $row['deposit_amount'];
			$data_money['voucher'] = $row['voucher'];
			$data_money['point_reward'] = $row['point_reward'];
		}
		//get bank accounts
		$bank = $this->bank->get_all_bank();
		
		$data = array('money' => $data_money, 'bank' => $bank);
		$this->load->view('agent_header');
		$this->load->view($page_request, $additional);
		$this->load->view('agent_navigation', $data);
		$this->load->view('agent_footer');
	}
	
	public function order_page(){
		$this->page('agent_add_order');
	}
	
	public function topup_page(){
		$data = array('response'=>'');
		$this->page('agent_deposit_topup', $data);
	}
	
	public function withdraw_page(){
		$agent_id = $this->session->userdata('account_id');
		$get_deposit = $this->agents->get_afield_by_agent_id('deposit_amount', $agent_id);
		foreach($get_deposit->result_array() as $row)
			$deposit_amount = $row['deposit_amount'];
		$data = array('response'=>'', 'deposit_amount'=>$deposit_amount);
		$this->page('agent_deposit_withdraw', $data);
	}
	
	/**********************************/
	/**			END-OF-PAGES				 **/
	/**********************************/
	
	public function add_deposit_request(){
		foreach ($this->input->post(NULL, TRUE) as $key => $value)
			$data[$key] = $value;
		$ins = $this->agents->add_deposit_request($data);
		if ($ins)
			$resp['response'] = 'Data berhasil dimasukkan, kami akan segera memasukkan deposit ke akun anda.';
		else
			$resp['response'] = 'Data tidak berhasil dimasukkan, mohon hubungi agen pusat / administrator.';
		$this->page('agent_deposit_topup', $resp);
	}
	
	public function add_withdraw_request(){
		// compare the deposit amount with the nominal request
		$nominal = $this->input->post('nominal', TRUE);
		$agent_id = $this->session->userdata('account_id');
		$get_deposit = $this->agents->get_afield_by_agent_id('deposit_amount', $agent_id);
		foreach($get_deposit->result_array() as $row)
			$deposit_amount = $row['deposit_amount'];
		if ($nominal <= $deposit_amount){
			foreach ($this->input->post(NULL, TRUE) as $key => $value)
				$data[$key] = $value;
			$ins = $this->agents->add_withdraw_request($data);
			if ($ins)
				$resp['response'] = 'Data berhasil dimasukkan, kami akan segera memasukkan deposit ke akun anda.';
			else
				$resp['response'] = 'Data tidak berhasil dimasukkan, mohon hubungi agen pusat / administrator.';
		}
		else
			$resp['response'] = 'Nominal yang anda inginkan tidak boleh melebihi maksimal penarikan.';
		
		$resp['deposit_amount'] = $deposit_amount;
		$this->page('agent_deposit_withdraw', $resp);
	}
	
}
?>