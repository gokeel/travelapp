<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct() {

        parent::__construct();

        $this->load->helper('form');
        $this->load->model('users');
		$this->load->model('agents');
		$this->load->model('bank');
		
	}
	
	public function index() {
		if ($this->session->userdata('logged_in')) {
			if ($this->session->userdata('user_level')=='administrator')
				redirect(base_url('index.php/admin/admin_page'));
			else if ($this->session->userdata('user_level')=='agent')
				redirect(base_url('index.php/agent/home'));
		} else {
			$this->login();
		}
	}
	
	function login() {
		$this->warning = '';
		$this->load->view('admin_login');
	}
	
	public function logout() {
		$this->session->sess_destroy();
		redirect(base_url('index.php/admin'));
	}

	function cek_login(){
		$data['warning'] = '';
        if ($this->input->post('username') and $this->input->post('password')) {

            if ($this->users->login($this->input->post('username'), md5($this->input->post('password'))) ){
				if ($this->session->userdata('user_level')=='administrator')
					redirect(base_url('index.php/admin/admin_page'));
				else if ($this->session->userdata('user_level')=='agent')
					redirect(base_url('index.php/agent/home'));
			}
				
            else $this->warning = '<p style="color:#f30;">Username atau Password Anda Salah..! Silahkan ulangi lagi </p>';
		}
		$this->load->view('admin_login',$data);
	}
	
	function page($page_request, $additional=null){
		$data = array(
			'user_name' => $this->session->userdata('user_name'),
			'ip_address' => $this->session->userdata('ip_address')
		);
		if ($additional != null)
			$data['by_status'] = $additional;
		$this->load->view('admin_page_header', $data);
		if (strpos($page_request, 'admin_agent') !== false)
			$this->load->view('admin_agent_header');
		if (strpos($page_request, 'admin_setting') !== false)
			$this->load->view('admin_setting_header');
		$this->load->view($page_request, $data);
		$this->load->view('admin_page_footer', $data);
	}
	
	public function admin_page(){
		$this->page('admin_page');
	}
	
	public function agent_page(){
		$this->page('admin_agent');
	}
	
	public function setting_page(){
		$this->page('admin_setting');
	}
	
	public function agent_page_by_status(){
		$status = $this->uri->segment(3);
		$this->page('admin_agent_by_status', $status);
	}
	
	public function setting_bank_page(){
		//$status = $this->uri->segment(3);
		$this->page('admin_setting_bank');
	}
	
	public function setting_user_page(){
		$uri3= $this->uri->segment(3);
		if ($uri3=='office')
			$this->page('admin_setting_user_office');
		else if ($uri3=='tiket')
			$this->page('admin_setting_user_tiket');
		else if ($uri3=='uas')
			$this->page('admin_setting_user_uas');
	}
	
	public function agent_data_page(){
		$this->page('admin_agent_data_modify');
	}
	public function edit_agent(){
		$this->page('admin_agent_data_modify');
	}
	
	public function delete_agent(){
		$id = $this->uri->segment(3);
		$query = $this->agents->del_agent($id);
		redirect(base_url('index.php/admin/agent_page'));
	}
	
	public function detail_agent(){
		$this->page('admin_agent_data_detail');
	}
	
	public function agent_add(){
		$config['upload_path'] = './assets/uploads/agent_license_files';
		$config['file_name'] = $this->input->post('lisensi_number',TRUE);
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '1000';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
		
		
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('lisensi_file'))
			print_r($this->upload->display_errors());
		else {
			$upload_data = $this->upload->data(); 
			$file_name =   $upload_data['file_name'];
		}
		
		$data = array(
			'agent_name' => $this->input->post('company_name', TRUE),
			'agent_type_id' => $this->input->post('member_type',TRUE),
			'join_date' => $this->input->post('join_date',TRUE),
			'agent_address' => $this->input->post('address',TRUE),
			'agent_phone' => $this->input->post('telp_no',TRUE),
			'agent_city' => $this->input->post('id_kota',TRUE),
			'agent_fax' => $this->input->post('fax',TRUE),
			'agent_yahoo' => $this->input->post('yahoo_account',TRUE),
			'agent_website' => $this->input->post('website',TRUE),
			'agent_email' => $this->input->post('email',TRUE),
			'license_number' => $this->input->post('lisensi_number',TRUE),
			'license_file' => $file_name,
			'agent_manager_name' => $this->input->post('manager_name',TRUE),
			'agent_manager_phone' => $this->input->post('manager_phone',TRUE),
			'agent_manager_email' => $this->input->post('manager_email',TRUE),
			'parent_agent_id' => $this->input->post('id_agen_upline',TRUE),
			'password' => $this->input->post('password',TRUE),
			'deposit_amount' => $this->input->post('deposit_amount',TRUE),
			'voucher' => $this->input->post('voucher',TRUE),
			'approved' => $this->input->post('approve',TRUE),
			'point_reward' => $this->input->post('point_reward',TRUE)
		);
		$add = $this->agents->add_agent($data);
		//$response[] = array('response' => $add);
		//echo json_encode($response);
		redirect(base_url('index.php/admin/agent_page'));
	}
	
	public function agent_edit(){
		$id = $this->uri->segment(3);
		
		$config['upload_path'] = './assets/uploads/agent_license_files';
		$config['file_name'] = $this->input->post('lisensi_number',TRUE);
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '1000';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
		
		$file_name = '';
		if (isset($_FILES['lisensi_file'])){
			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload('lisensi_file'))
				print_r($this->upload->display_errors());
			else {
				$upload_data = $this->upload->data(); 
				$file_name =   $upload_data['file_name'];
			}
		}
		
		$data = array(
			'agent_name' => $this->input->post('company_name', TRUE),
			'agent_type_id' => $this->input->post('member_type',TRUE),
			'join_date' => $this->input->post('join_date',TRUE),
			'agent_address' => $this->input->post('address',TRUE),
			'agent_phone' => $this->input->post('telp_no',TRUE),
			'agent_city' => $this->input->post('id_kota',TRUE),
			'agent_fax' => $this->input->post('fax',TRUE),
			'agent_yahoo' => $this->input->post('yahoo_account',TRUE),
			'agent_website' => $this->input->post('website',TRUE),
			'agent_email' => $this->input->post('email',TRUE),
			'license_number' => $this->input->post('lisensi_number',TRUE),
			'agent_manager_name' => $this->input->post('manager_name',TRUE),
			'agent_manager_phone' => $this->input->post('manager_phone',TRUE),
			'agent_manager_email' => $this->input->post('manager_email',TRUE),
			'parent_agent_id' => $this->input->post('id_agen_upline',TRUE),
			'password' => $this->input->post('password',TRUE),
			'deposit_amount' => $this->input->post('deposit_amount',TRUE),
			'voucher' => $this->input->post('voucher',TRUE),
			'approved' => $this->input->post('approve',TRUE),
			'point_reward' => $this->input->post('point_reward',TRUE)
		);
		if ($file_name <> '')
			$data['license_file'] = $file_name;
			
		$edit = $this->agents->edit_agent($id, $data);
		//$response[0]['response'] = $edit;
		//$response[] = array('response' => $add);
		//echo json_encode($response);
		redirect(base_url('index.php/admin/agent_page'));
	}
	
	public function get_agents(){
		$query = $this->agents->get_agents();
		foreach ($query->result_array() as $row){
			$data[] = array(
				'value' => $row['agent_id'],
				'name' => $row['agent_name']
			);
		}
		echo json_encode($data);
	}
	
	public function get_cities(){
		$query = $this->agents->get_cities();;
		foreach ($query->result_array() as $row){
			$data[] = array(
				'value' => $row['id'],
				'name' => $row['city']
			);
		}
		echo json_encode($data);
	}
	
	public function get_agent_types(){
		$query = $this->agents->get_agent_types();;
		foreach ($query->result_array() as $row){
			$data[] = array(
				'value' => $row['id'],
				'name' => $row['name']
			);
		}
		echo json_encode($data);
	}
	
	function do_upload()
	{
		$config['upload_path'] = './assets/uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '1000';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());

			//$this->load->view('upload_form', $error);
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());

			//$this->load->view('upload_success', $data);
		}
	}
	
	public function get_all_agents(){
		$query = $this->agents->get_all_agents();
		$number_row = 0;
		foreach ($query->result_array() as $row){
			$number_row++;
			$data[] = array(
				'number_row' => $number_row,
				'agent_id' => $row['agent_id'],
				'agent_name' => $row['agent_name'],
				'agent_type' => $row['agent_type'],
				'join_date' => $row['join_date'],
				'agent_phone' => $row['agent_phone'],
				'agent_city' => $row['agent_city'],
				'agent_email' => $row['agent_email'],
				'parent_agent' => $row['parent_agent'],
				'deposit_amount' => $row['deposit_amount'],
				'voucher' => $row['voucher'],
				'approved' => $row['approved']
			);
		}
		echo json_encode($data);
	}
	
	public function get_agent_by_id(){
		$id = $this->uri->segment(3);
		$query = $this->agents->get_agent_by_id($id);
		
		foreach ($query->result_array() as $row){
			$data[] = array(
				'agent_id' => $row['agent_id'],
				'agent_name' => $row['agent_name'],
				'agent_type' => $row['agent_type'],
				'join_date' => $row['join_date'],
				'address' => $row['agent_address'],
				'agent_phone' => $row['agent_phone'],
				'city' => $row['agent_city'],
				'agent_email' => $row['agent_email'],
				'agent_fax' => $row['agent_fax'],
				'agent_yahoo' => $row['agent_yahoo'],
				'website' => $row['agent_website'],
				'license_number' => $row['license_number'],
				'license_file' => $row['license_file'],
				'manager_name' => $row['agent_manager_name'],
				'manager_phone' => $row['agent_manager_phone'],
				'manager_email' => $row['agent_manager_email'],
				'password' => $row['password'],
				'parent_agent' => $row['parent_agent'],
				'deposit_amount' => $row['deposit_amount'],
				'point_reward' => $row['point_reward'],
				'voucher' => $row['voucher'],
				'approved' => $row['approved']
			);
		}
		echo json_encode($data);
	}
	
	public function get_agents_by_status(){
		$status = $this->uri->segment(3);
		$query = $this->agents->get_agents_by_status($status);
		
		foreach ($query->result_array() as $row){
			$data[] = array(
				'agent_id' => $row['agent_id'],
				'agent_name' => $row['agent_name'],
				'agent_type' => $row['agent_type'],
				'join_date' => $row['join_date'],
				'address' => $row['agent_address'],
				'agent_phone' => $row['agent_phone'],
				'agent_city' => $row['agent_city'],
				'agent_email' => $row['agent_email'],
				'agent_fax' => $row['agent_fax'],
				'agent_yahoo' => $row['agent_yahoo'],
				'website' => $row['agent_website'],
				'license_number' => $row['license_number'],
				'license_file' => $row['license_file'],
				'manager_name' => $row['agent_manager_name'],
				'manager_phone' => $row['agent_manager_phone'],
				'manager_email' => $row['agent_manager_email'],
				'password' => $row['password'],
				'parent_agent' => $row['parent_agent'],
				'deposit_amount' => $row['deposit_amount'],
				'point_reward' => $row['point_reward'],
				'voucher' => $row['voucher'],
				'approved' => $row['approved']
			);
		}
		echo json_encode($data);
	}
	
	public function get_agent_by_name(){
		$name = $this->input->get('search', TRUE);
		$query = $this->agents->get_agent_by_name($name);
		
		foreach ($query->result_array() as $row){
			$data[] = array(
				'agent_id' => $row['agent_id'],
				'agent_name' => $row['agent_name'],
				'agent_type' => $row['agent_type'],
				'join_date' => $row['join_date'],
				'address' => $row['agent_address'],
				'agent_phone' => $row['agent_phone'],
				'city' => $row['agent_city'],
				'agent_email' => $row['agent_email'],
				'agent_fax' => $row['agent_fax'],
				'agent_yahoo' => $row['agent_yahoo'],
				'website' => $row['agent_website'],
				'license_number' => $row['license_number'],
				'license_file' => $row['license_file'],
				'manager_name' => $row['agent_manager_name'],
				'manager_phone' => $row['agent_manager_phone'],
				'manager_email' => $row['agent_manager_email'],
				'password' => $row['password'],
				'parent_agent' => $row['parent_agent'],
				'deposit_amount' => $row['deposit_amount'],
				'point_reward' => $row['point_reward'],
				'voucher' => $row['voucher'],
				'approved' => $row['approved']
			);
		}
		echo json_encode($data);
	}
	
	public function get_city_by_agent_id(){
		$id = $this->uri->segment(3);
		$query = $this->agents->get_afield_by_agent_id('agent_city', $id);
		
		foreach ($query->result_array() as $row){
			$data[] = array(
				'id' => $row['agent_city']
			);
		}
		echo json_encode($data);
	}
	
	public function get_upline_by_agent_id(){
		$id = $this->uri->segment(3);
		$query = $this->agents->get_afield_by_agent_id('parent_agent_id', $id);
		
		foreach ($query->result_array() as $row){
			$data[] = array(
				'id' => $row['parent_agent_id']
			);
		}
		echo json_encode($data);
	}
	
	public function get_agent_type_by_agent_id(){
		$id = $this->uri->segment(3);
		$query = $this->agents->get_afield_by_agent_id('agent_type_id',$id);
		
		foreach ($query->result_array() as $row){
			$data[] = array(
				'id' => $row['agent_type_id']
			);
		}
		echo json_encode($data);
	}
	
	public function get_all_banks(){
		$query = $this->bank->get_all_bank();
		$number_row = 0;
		foreach ($query->result_array() as $row){
			$number_row++;
			$data[] = array(
				'number_row' => $number_row,
				'id' => $row['bank_id'],
				'name' => $row['bank_name'],
				'account_number' => $row['bank_account_number'],
				'holder_name' => $row['bank_holder_name'],
				'branch' => $row['bank_branch'],
				'city' => $row['bank_city']
			);
		}
		echo json_encode($data);
	}
	
	public function get_all_bank_via(){
		$query = $this->bank->get_all_bank_via();
		$number_row = 0;
		foreach ($query->result_array() as $row){
			$number_row++;
			$data[] = array(
				'number_row' => $number_row,
				'id' => $row['id'],
				'via' => $row['via'],
				'via_code' => $row['via_code']
			);
		}
		echo json_encode($data);
	}
	
	public function bank_add(){
		$data = array(
			'bank_name' => $this->input->get('bank-name', TRUE),
			'bank_account_number' => $this->input->get('account-no',TRUE),
			'bank_holder_name' => $this->input->get('holder',TRUE),
			'bank_branch' => $this->input->get('branch',TRUE),
			'bank_city' => $this->input->get('city',TRUE)
		);
		$add = $this->bank->add_to_table('bank_accounts',$data);
		$response[] = array('response' => $add);
		echo json_encode($response);
		//redirect(base_url('index.php/admin/agent_page'));
	}
	
	public function bank_via_add(){
		$data = array(
			'via' => $this->input->get('via', TRUE),
			'via_code' => $this->input->get('via-code',TRUE)
		);
		$add = $this->bank->add_to_table('bank_via',$data);
		$response[] = array('response' => $add);
		echo json_encode($response);
		//redirect(base_url('index.php/admin/agent_page'));
	}
	
	public function bank_delete(){
		$id = $this->uri->segment(3);
		$del = $this->bank->delete_from_table_by_id('bank_accounts', 'bank_id', $id);
		redirect(base_url('index.php/admin/setting_bank_page/bank_list'));
	}
	
	public function bank_via_delete(){
		$id = $this->uri->segment(3);
		$del = $this->bank->delete_from_table_by_id('bank_via', 'id', $id);
		redirect(base_url('index.php/admin/setting_bank_page/bank_list'));
	}
	
	public function bank_details(){
		$id = $this->uri->segment(3);
		$query = $this->bank->get_detail_by_id('bank_accounts', 'bank_id', $id);
		foreach ($query->result_array() as $row){
			$data[] = array(
				'name' => $row['bank_name'],
				'account_number' => $row['bank_account_number'],
				'holder_name' => $row['bank_holder_name'],
				'branch' => $row['bank_branch'],
				'city' => $row['bank_city']
			);
		}
		echo json_encode($data);
	}
	
	public function bank_via_details(){
		$id = $this->uri->segment(3);
		$query = $this->bank->get_detail_by_id('bank_via', 'id', $id);
		foreach ($query->result_array() as $row){
			$data[] = array(
				'via' => $row['via'],
				'via_code' => $row['via_code']
			);
		}
		echo json_encode($data);
	}
	
	public function bank_edit(){
		$this->page('admin_setting_bank_modify');
	}
	
	public function bank_via_edit(){
		$this->page('admin_setting_bank_modify');
	}
	
	public function bank_edit_by_id(){
		$id = $this->uri->segment(3);
		$data = array(
			'bank_name' => $this->input->get('bank_name', TRUE),
			'bank_account_number' => $this->input->get('account_number',TRUE),
			'bank_holder_name' => $this->input->get('holder',TRUE),
			'bank_branch' => $this->input->get('branch',TRUE),
			'bank_city' => $this->input->get('city',TRUE)
		);
		$upd = $this->bank->upd_bank('bank_accounts', 'bank_id', $id, $data);
	}
	
	public function bank_via_edit_by_id(){
		$id = $this->uri->segment(3);
		$data = array(
			'via' => $this->input->get('via', TRUE),
			'via_code' => $this->input->get('via_code',TRUE)
		);
		$upd = $this->bank->upd_bank('bank_via', 'id', $id, $data);
	}
}