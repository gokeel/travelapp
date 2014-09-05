<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Order extends CI_Controller {
	public function __construct() {

        parent::__construct();

    	$this->load->model('orders');
		$this->load->model('bank');
	}
	
	function get_lion_captcha()
	{	
		$getdata = file_get_contents($this->config->item('api_server').'/flight_api/getLionCaptcha?token='.$this->session->userdata('token').'&output=json');
		$json = json_decode($getdata);
		$lion_captcha = $json->lioncaptcha;
		$lion_session_id = $json->lionsessionid;
		
		return array ($lion_captcha, $lion_session_id);
	}
	
	public function get_token()
	{
		$getdata = file_get_contents($this->config->item('api_server').'/apiv1/payexpress?method=getToken&secretkey=' . $this->config->item('api_key').'&output=json');
		$json = json_decode($getdata);
		$token = $json->token;
		// set session token
		$this->session->set_userdata('active_token', $token);
		return $token;
	}
	
	public function price_passenger()
	{
		$this->load->view('header');
		$this->load->view('price_passenger');
		$this->load->view('footer');
	}
	
	public function order_page()
	{
		$data = array(
			'title' => 'Form Pemesanan Tiket',
			'sub_title' => 'Cara mudah pesan tiket'
			);
		$this->load->view('header');
		$this->load->view('page_nav_header', $data);
		$this->load->view('order_page');
		$this->load->view('footer');
	}
	
	public function success()
	{	$order_id = $this->uri->segment(3);
		$data = array(
			'title' => 'Pemesanan Selesai dan Info Pembayaran',
			'sub_title' => '',
			'order_id' => $order_id
			);
		$this->load->view('header');
		$this->load->view('page_nav_header', $data);
		$this->load->view('order_success', $data);
		$this->load->view('footer');
	}
	
	public function failed()
	{
		$data = array(
			'title' => 'Proses Order Gagal',
			'sub_title' => 'Harap cek kembali input anda atau hubungi administrator web anda'
			);
		$this->load->view('header');
		$this->load->view('page_nav_header', $data);
		$this->load->view('footer');
	}
	
	public function add_flight_order()
	{
		$response = '';
		$flight_id = $this->input->post('id', TRUE);
		//$ret_flight_id = $this->input->post('ret_flight_id', TRUE);
		$airline_name = $this->input->post('airlines_name', TRUE);
		$depart_date = $this->input->post('departing_date', TRUE);
		$route = $this->input->post('route', TRUE);
		$time_travel = $this->input->post('time_travel', TRUE);
		$tot_price = $this->input->post('total_price', TRUE);
		$price_adult = $this->input->post('price_adult', TRUE);
		$price_child = $this->input->post('price_child', TRUE);
		$price_infant = $this->input->post('price_infant', TRUE);
		$tot_child = $this->input->post('tot_child', TRUE);
		$tot_adult = $this->input->post('tot_adult', TRUE);
		$tot_infant = $this->input->post('tot_infant', TRUE);
		$conSalutation = $this->input->post('conSalutation', TRUE);
		$conFirstName = $this->input->post('conFirstName', TRUE);
		$conLastName = $this->input->post('conLastName', TRUE);
		$conPhone = $this->input->post('conPhone', TRUE);
		$conEmailAddress = $this->input->post('conEmailAddress', TRUE);
		$conOtherPhone = $this->input->post('conOtherPhone', TRUE);
		$time_stamp = date ('Y-m-d H:i:s');
		
		if ($airline_name == 'LION')
			list ($lioncaptcha, $lionsessionid) = $this->get_lion_captcha();
		$token = $this->session->userdata('token');
		$account_id = $this->config->item('account_id');
		//$account_id = $this->session->userdata('akun_id');
		
		/*inserting the general info*/
		$data = array(
			'account_id' => $account_id,
			'token' => $token,
			'trip_category' => 'flight',
			'airline_name' => $airline_name,
			'flight_id' => $flight_id,
			'route' => $route,
			'departing_date' => $depart_date,
			'time_travel' => $time_travel,
			'total_price' => $tot_price,
			'adult' => $tot_adult,
			'price_adult' => $price_adult,
			'child' => $tot_child,
			'price_child' => $price_child,
			'infant' => $tot_infant,
			'price_infant' => $price_infant,
			'order_status' => 'Registered',
			'lion_captcha' => (isset($lioncaptcha) ? $lioncaptcha : ''),
			'lion_session_id' => (isset($lionsessionid) ? $lionsessionid : ''),
			'registered_date' => $time_stamp
		);
		
		$this->load->model('orders');
		$order_id = $this->orders->add_order($data);
		//print_r($id);
		
		if ($order_id > 0){
			/*inserting the passenger info*/
			$passenger = array();
			$contact_person = array(
				'order_id' => $order_id,
					'passenger_level' => 'contact',
					'title' => $this->input->post('conSalutation', TRUE),
					'first_name' => $this->input->post('conFirstName', TRUE),
					'last_name' => $this->input->post('conLastName', TRUE),
					'identity_number' => $this->input->post('conid', TRUE),
					'email' => $this->input->post('conEmailAddress', TRUE),
					'phone_1' => $this->input->post('conPhone', TRUE)
			);
			array_push($passenger, $contact_person);
			for($i=1; $i<=$tot_adult; $i++){
				$adult = array(
					'order_id' => $order_id,
					'passenger_level' => 'adult'.$i,
					'title' => $this->input->post('titlea'.$i, TRUE),
					'first_name' => $this->input->post('firstnamea'.$i, TRUE),
					'last_name' => $this->input->post('lastnamea'.$i, TRUE),
					'identity_number' => $this->input->post('ida'.$i, TRUE),
					'birthday' => $this->input->post('birthdatea'.$i, TRUE),
					'order_list' => $i
				);
				array_push($passenger, $adult);
			}
			for($i=1; $i<=$tot_child; $i++){
				$child = array(
					'order_id' => $order_id,
					'passenger_level' => 'child'.$i,
					'title' => $this->input->post('titlec'.$i, TRUE),
					'first_name' => $this->input->post('firstnamec'.$i, TRUE),
					'last_name' => $this->input->post('lastnamec'.$i, TRUE),
					'identity_number' => $this->input->post('idc'.$i, TRUE),
					'birthday' => $this->input->post('birthdatec'.$i, TRUE),
					'order_list' => $i
				);
				array_push($passenger, $child);
			}
			for($i=1; $i<=$tot_infant; $i++){
				$infant = array(
					'order_id' => $order_id,
					'passenger_level' => 'infant'.$i,
					'title' => $this->input->post('titlei'.$i, TRUE),
					'first_name' => $this->input->post('firstnamei'.$i, TRUE),
					'last_name' => $this->input->post('lastnamei'.$i, TRUE),
					'identity_number' => $this->input->post('idi'.$i, TRUE),
					'birthday' => $this->input->post('birthdatei'.$i, TRUE),
					'parent' => $this->input->post('parenti'.$i, TRUE),
					'order_list' => $i
				);
				array_push($passenger, $infant);
			}
			//print_r($passenger);
			$anyerror = 0;
			foreach ($passenger as $array){
				$batch = $this->orders->add_passenger($array);
				if ($batch==false)
					$anyerror ++;
			}
			if ($anyerror==0)
				redirect(base_url('index.php/order/success/'.$order_id));
			else
				redirect(base_url('index.php/order/failed'));
		}
	}
	
	public function add_train_order()
	{
		$schedule_id = $this->input->post('id', TRUE);
		$train_id = $this->input->post('train_id', TRUE);
		$class = $this->input->post('class', TRUE);
		$subclass = $this->input->post('subclass', TRUE);
		$train_name = $this->input->post('train_name', TRUE);
		$depart_date = $this->input->post('departing_date', TRUE);
		$route = $this->input->post('route', TRUE);
		$time_travel = $this->input->post('time_travel', TRUE);
		$tot_price = $this->input->post('total_price', TRUE);
		$price_adult = $this->input->post('price_adult', TRUE);
		$price_child = $this->input->post('price_child', TRUE);
		$price_infant = $this->input->post('price_infant', TRUE);
		$tot_child = $this->input->post('tot_child', TRUE);
		$tot_adult = $this->input->post('tot_adult', TRUE);
		$tot_infant = $this->input->post('tot_infant', TRUE);
		$conSalutation = $this->input->post('conSalutation', TRUE);
		$conFirstName = $this->input->post('conFirstName', TRUE);
		$conLastName = $this->input->post('conLastName', TRUE);
		$conPhone = $this->input->post('conPhone', TRUE);
		$conEmailAddress = $this->input->post('conEmailAddress', TRUE);
		$conOtherPhone = $this->input->post('conOtherPhone', TRUE);
		$token = $this->session->userdata('token');
		$account_id = $this->config->item('account_id');
		//$account_id = $this->session->userdata('akun_id');
		$time_stamp = date ('Y-m-d H:i:s');
		
		/*inserting the general info*/
		$data = array(
			'account_id' => $account_id,
			'token' => $token,
			'trip_category' => 'train',
			'train_name' => $train_name,
			'train_id' => $train_id,
			'train_class' => $class,
			'train_subclass' => $subclass,
			'route' => $route,
			'departing_date' => $depart_date,
			'time_travel' => $time_travel,
			'total_price' => $tot_price,
			'adult' => $tot_adult,
			'price_adult' => $price_adult,
			'child' => $tot_child,
			'price_child' => $price_child,
			'infant' => $tot_infant,
			'price_infant' => $price_infant,
			'order_status' => 'Registered',
			'registered_date' => $time_stamp
		);
		
		$this->load->model('orders');
		$order_id = $this->orders->add_order($data);
		//print_r($id);
		
		if ($order_id > 0){
			/*inserting the passenger info*/
			$passenger = array();
			$contact_person = array(
				'order_id' => $order_id,
					'passenger_level' => 'contact',
					'title' => $this->input->post('conSalutation', TRUE),
					'first_name' => $this->input->post('conFirstName', TRUE),
					'last_name' => $this->input->post('conLastName', TRUE),
					'identity_number' => $this->input->post('conid', TRUE),
					'email' => $this->input->post('conEmailAddress', TRUE),
					'phone_1' => $this->input->post('conPhone', TRUE)
			);
			array_push($passenger, $contact_person);
			for($i=1; $i<=$tot_adult; $i++){
				$adult = array(
					'order_id' => $order_id,
					'passenger_level' => 'adult'.$i,
					'title' => $this->input->post('titlea'.$i, TRUE),
					'first_name' => $this->input->post('firstnamea'.$i, TRUE),
					'last_name' => $this->input->post('lastnamea'.$i, TRUE),
					'identity_number' => $this->input->post('ida'.$i, TRUE),
					'birthday' => $this->input->post('birthdatea'.$i, TRUE),
					'order_list' => $i
				);
				array_push($passenger, $adult);
			}
			for($i=1; $i<=$tot_child; $i++){
				$child = array(
					'order_id' => $order_id,
					'passenger_level' => 'child'.$i,
					'title' => $this->input->post('titlec'.$i, TRUE),
					'first_name' => $this->input->post('firstnamec'.$i, TRUE),
					'last_name' => $this->input->post('lastnamec'.$i, TRUE),
					'identity_number' => $this->input->post('idc'.$i, TRUE),
					'birthday' => $this->input->post('birthdatec'.$i, TRUE),
					'order_list' => $i
				);
				array_push($passenger, $child);
			}
			for($i=1; $i<=$tot_infant; $i++){
				$infant = array(
					'order_id' => $order_id,
					'passenger_level' => 'infant'.$i,
					'title' => $this->input->post('titlei'.$i, TRUE),
					'first_name' => $this->input->post('firstnamei'.$i, TRUE),
					'last_name' => $this->input->post('lastnamei'.$i, TRUE),
					'identity_number' => $this->input->post('idi'.$i, TRUE),
					'birthday' => $this->input->post('birthdatei'.$i, TRUE),
					'parent' => $this->input->post('parenti'.$i, TRUE),
					'order_list' => $i
				);
				array_push($passenger, $infant);
			}
			//print_r($passenger);
			$anyerror = 0;
			foreach ($passenger as $array){
				$batch = $this->orders->add_passenger($array);
				if ($batch==false)
					$anyerror ++;
			}
			if ($anyerror==0)
				redirect(base_url('index.php/order/success/'.$order_id));
			else
				redirect(base_url('index.php/order/failed'));
		}
	}
	
	public function add_hotel_order()
	{
		$id = $this->input->post('hotel_id', TRUE);
		$name = $this->input->post('hotel_name', TRUE);
		$address = $this->input->post('hotel_address', TRUE);
		$regional = $this->input->post('regional', TRUE);
		$checkin = $this->input->post('checkin', TRUE);
		$checkout = $this->input->post('checkout', TRUE);
		$night = $this->input->post('night', TRUE);
		$room = $this->input->post('room', TRUE);
		$price = $this->input->post('price', TRUE);
		$tot_adult = $this->input->post('tot_adult', TRUE);
		$tot_child = $this->input->post('tot_child', TRUE);
		$conSalutation = $this->input->post('conSalutation', TRUE);
		$conFirstName = $this->input->post('conFirstName', TRUE);
		$conLastName = $this->input->post('conLastName', TRUE);
		$conPhone = $this->input->post('conPhone', TRUE);
		$conEmailAddress = $this->input->post('conEmailAddress', TRUE);
		$conOtherPhone = $this->input->post('conOtherPhone', TRUE);
		$token = $this->session->userdata('token');
		$account_id = $this->config->item('account_id');
		//$account_id = $this->session->userdata('akun_id');
		$time_stamp = date ('Y-m-d H:i:s');
		
		/*inserting the general info*/
		$data = array(
			'account_id' => $account_id,
			'token' => $token,
			'trip_category' => 'hotel',
			'hotel_name' => $name,
			'hotel_id' => $id,
			'hotel_address' => $address,
			'hotel_regional' => $regional,
			'hotel_room' => $room,
			'departing_date' => $checkin,
			'returning_date' => $checkout,
			'time_travel' => $night,
			'total_price' => $price,
			'adult' => $tot_adult,
			'child' => $tot_child,
			'order_status' => 'Registered',
			'registered_date' => $time_stamp
		);
		
		$this->load->model('orders');
		$order_id = $this->orders->add_order($data);
		//print_r($id);
		
		if ($order_id > 0){
			/*inserting the passenger info*/
			$passenger = array();
			$contact_person = array(
				'order_id' => $order_id,
					'passenger_level' => 'contact',
					'title' => $this->input->post('conSalutation', TRUE),
					'first_name' => $this->input->post('conFirstName', TRUE),
					'last_name' => $this->input->post('conLastName', TRUE),
					'identity_number' => $this->input->post('conid', TRUE),
					'email' => $this->input->post('conEmailAddress', TRUE),
					'phone_1' => $this->input->post('conPhone', TRUE)
			);
			array_push($passenger, $contact_person);
			for($i=1; $i<=$tot_adult; $i++){
				$adult = array(
					'order_id' => $order_id,
					'passenger_level' => 'adult'.$i,
					'title' => $this->input->post('titlea'.$i, TRUE),
					'first_name' => $this->input->post('firstnamea'.$i, TRUE),
					'last_name' => $this->input->post('lastnamea'.$i, TRUE),
					'identity_number' => $this->input->post('ida'.$i, TRUE),
					'birthday' => $this->input->post('birthdatea'.$i, TRUE),
					'phone_1' => $this->input->post('phonea'.$i, TRUE),
					'order_list' => $i
				);
				array_push($passenger, $adult);
			}
			
			$anyerror = 0;
			foreach ($passenger as $array){
				$batch = $this->orders->add_passenger($array);
				if ($batch==false)
					$anyerror ++;
			}
			if ($anyerror==0)
				redirect(base_url('index.php/order/success/'.$order_id));
			else
				redirect(base_url('index.php/order/failed'));
		}
	}
	
	public function checkout_order_by_system(){
		$id = $this->uri->segment(3);
		// check the payment status, if in status "requested" then refused to checkout
		list ($order_id, $status) = $this->bank->get_payment_id($id);
		if ($order_id==0){
			$responses['response'] = 'nok';
			$responses['message'] = 'Pelanggan belum melakukan konfirmasi pembayaran';
		}
		else {
			if ($status=='requested'){
				$responses['response'] = 'nok';
				$responses['message'] = 'Status pembayaran pelanggan belum divalidasi. Harap mengubah status pembayaran terlebih dahulu.';
			}
			else if ($status=='validated'){
				$this->orders->update_order_status($id, 'Processing');
				//redirect(base_url('index.php/admin/booking_page'));
				$responses['response'] = 'ok';
			}
		}
		echo json_encode($responses);
	}
	
	public function get_banks(){
		$query = $this->bank->get_all_bank();
		
		foreach ($query->result_array() as $row){
			$data[] = array(
				'bank_id' => $row['bank_id'],
				'bank_name' => $row['bank_name'],
				'account_number' => $row['bank_account_number'],
				'holder' => $row['bank_holder_name'],
				'branch' => $row['bank_branch'],
				'city' => $row['bank_city'],
				'logo' => $row['bank_logo']
			);
		}
		echo json_encode($data);
	}
	
	public function confirm_payment(){
		$data = array(
			'title' => 'Konfirmasi Pembayaran',
			'sub_title' => '',
			'thank_you' => false
			);
		$this->load->view('header');
		$this->load->view('page_nav_header', $data);
		$this->load->view('confirm_payment', $data);
		$this->load->view('footer');
	}
	
	public function confirm_payment_order(){
		
		$order_id = $this->input->post('order_id');
		$date = $this->input->post('tgl_transfer');
		$bank_receiver = $this->input->post('bank_tujuan');
		$total = $this->input->post('total');
		$sender = $this->input->post('sender');
		$note = $this->input->post('note');
		
		$data = array(
			'order_id' => $order_id,
			'sender_name' => $sender,
			'bank_receiver_id' => $bank_receiver,
			'transfer_date' => $date,
			'total_paid' => $total,
			'note' => $note,
			'status' => 'requested'
		);
		
		list ($check_order_id, $status) = $this->bank->get_payment_id($order_id);
		if ($check_order_id != 0){
			$any_error = array(
				'title' => 'Pesan Kesalahan',
				'sub_title' => 'Terjadi kesalahan pada saat memproses masukan anda',
				'error' => 'Anda sudah pernah melakukan konfirmasi atas Order ID = '. $order_id.'. Status pembayaran anda saat ini adalah "'.$status.'"'
			);
			$this->load->view('header');
			$this->load->view('page_nav_header', $any_error);
			$this->load->view('any_error', $any_error);
			$this->load->view('footer');
		}
		else {
			$query = $this->bank->add_confirm_payment($data);
			$data = array(
				'title' => 'Konfirmasi Pembayaran',
				'sub_title' => '',
				'thank_you' => true
				);
			$this->load->view('header');
			$this->load->view('page_nav_header', $data);
			$this->load->view('confirm_payment', $data);
			$this->load->view('footer');
		}
		
	}
	
	public function get_order_by_id(){
		$cat = $this->uri->segment(3);
		$id = $this->uri->segment(4);
		$query = $this->orders->get_order_by_id($id);
		$response = array();
		$response['responses'] = array();
		$response['responses']['general'] = array();
		// generate response general info
		foreach ($query->result_array() as $row){
			if ($cat == 'flight'){
				$general = array(
					'order_id' => $row['order_id'],
					'agent_name' => $row['agent_name'],
					'airline_name' => $row['airline_name'],
					'flight_id' => array('name' => 'flight_id', 'value' => $row['flight_id']),
					'token' => array('name' => 'token', 'value' => $row['token']),
					'lion_captcha' => array('name' => 'lioncaptcha', 'value' => $row['lion_captcha']),
					'lion_session_id' => array('name' => 'lionsessionid', 'value' => $row['lion_session_id']),
					'route' => $row['route'],
					'departing_date' => $row['departing_date'],
					'time_travel' => $row['time_travel'],
					'total_price' => $row['total_price'],
					'adult' => array('name' => 'adult', 'value' => $row['adult']),
					'price_adult' => $row['price_adult'],
					'child' => array('name' => 'child', 'value' => $row['child']),
					'price_child' => $row['price_child'],
					'infant' => array('name' => 'infant', 'value' => $row['infant']),
					'price_infant' => $row['price_infant']
				);
			}
			else if ($cat == 'train'){
				list ($d_station, $a_station) = explode('-', $row['route']);
				$general = array(
					'order_id' => $row['order_id'],
					'agent_name' => $row['agent_name'],
					'token' => array('name' => 'token', 'value' => $row['token']),
					'train_name' => $row['train_name'],
					'train_id' => array('name' => 'train_id', 'value' => $row['train_id']),
					'route' => $row['route'],
					'depart_station' => array('name' => 'd', 'value' => $d_station),
					'arrival_station' => array('name' => 'a', 'value' => $a_station),
					'departing_date' => array('name' => 'date', 'value' => $row['departing_date']),
					'subclass' => array('name' => 'subclass', 'value' => $row['train_subclass']),
					'kelas' => $row['train_class'],
					'time_travel' => $row['time_travel'],
					'total_price' => $row['total_price'],
					'adult' => array('name' => 'adult', 'value' => $row['adult']),
					'price_adult' => $row['price_adult'],
					'child' => array('name' => 'child', 'value' => $row['child']),
					'price_child' => $row['price_child'],
					'infant' => array('name' => 'infant', 'value' => $row['infant']),
					'price_infant' => $row['price_infant']
				);
			}
			else if ($cat == 'hotel'){ // for hotel there is no need to proceed it with Tiket.com API
				$general = array(
					'order_id' => $row['order_id'],
					'agent_name' => $row['agent_name'],
					//'token' => array('name' => 'token', 'value' => $row['token']),
					'hotel_name' => $row['hotel_name'],
					'hotel_id' => $row['hotel_id'],
					'hotel_address' => $row['hotel_address'],
					'hotel_regional' => $row['hotel_regional'],
					'room' => $row['hotel_room'],
					'checkin' => $row['departing_date'],
					'checkout' => $row['returning_date'],
					'night' => $row['time_travel'],
					'total_price' => $row['total_price'],
					'adult' => $row['adult'],
					'child' => $row['child']
				);
			}
			array_push($response['responses']['general'], $general);
		}
		
		$con = $this->orders->get_passenger($id, 'contact');
		$response['responses']['contact'] = array();
		foreach ($con->result_array() as $row){
			$contact = array(
				'title' => array('name' => 'conSalutation', 'value' => $row['title']),
				'firstname' => array('name' => 'conFirstName', 'value' => $row['first_name']),
				'lastname' => array('name' => 'conLastName', 'value' => $row['last_name']),
				'email' => array('name' => 'conEmailAddress', 'value' => $row['email']),
				'phone' => array('name' => 'conPhone', 'value' => $row['phone_1'])
			);
			array_push($response['responses']['contact'], $contact);
		}
		//fetch & generate passengers
		if ($cat != 'hotel') { // for hotel there is no need to show the passengers, only show the contact person
			//fetch & generate adult
			$con = $this->orders->get_passenger($id, 'adult');
			$response['responses']['adult'] = array();
			if ($cat=='flight'){
				foreach ($con->result_array() as $row){
					$adult = array(
						'title' => array('name' => 'titlea'.$row['order_list'], 'value' => $row['title']),
						'firstname' => array('name' => 'firstnamea'.$row['order_list'], 'value' => $row['first_name']),
						'lastname' => array('name' => 'lastnamea'.$row['order_list'], 'value' => $row['last_name']),
						'birthdate' => array('name' => 'birthdatea'.$row['order_list'], 'value' => $row['birthday']),
						'id' => array('name' => 'ida'.$row['order_list'], 'value' => $row['identity_number']),
						'baggage_direct' => array('name' => 'dcheckinbaggagea1'.$row['order_list'], 'value' => 'FALSE'),
						'baggage_transit' => array('name' => 'dcheckinbaggagea2'.$row['order_list'], 'value' => 'FALSE')
					);
					array_push($response['responses']['adult'], $adult);
				}
			}
			else if($cat=='train'){
				foreach ($con->result_array() as $row){
					$adult = array(
						'title' => array('name' => 'salutationAdult'.$row['order_list'], 'value' => $row['title']),
						'name' => array('name' => 'nameAdult'.$row['order_list'], 'value' => $row['first_name'].' '.$row['last_name']),
						'birthdate' => array('name' => 'birthDateAdult'.$row['order_list'], 'value' => $row['birthday']),
						'id' => array('name' => 'IdCardAdult'.$row['order_list'], 'value' => $row['identity_number']),
						'phone' => array('name' => 'noHpAdult'.$row['order_list'], 'value' => $row['phone_1'])
					);
					array_push($response['responses']['adult'], $adult);
				}
			}
			
			//fetch & generate child
			$con = $this->orders->get_passenger($id, 'child');
			$response['responses']['child'] = array();
			if ($cat=='flight'){
				foreach ($con->result_array() as $row){
					$child = array(
						'title' => array('name' => 'titlec'.$row['order_list'], 'value' => $row['title']),
						'firstname' => array('name' => 'firstnamec'.$row['order_list'], 'value' => $row['first_name']),
						'lastname' => array('name' => 'lastnamec'.$row['order_list'], 'value' => $row['last_name']),
						'birthdate' => array('name' => 'birthdatec'.$row['order_list'], 'value' => $row['birthday']),
						'id' => array('name' => 'idc'.$row['order_list'], 'value' => $row['identity_number']),
						'baggage_direct' => array('name' => 'dcheckinbaggagec1'.$row['order_list'], 'value' => 'FALSE'),
						'baggage_transit' => array('name' => 'dcheckinbaggagec2'.$row['order_list'], 'value' => 'FALSE')
					);
					array_push($response['responses']['child'], $child);
				}
			}
			else if($cat=='train'){
				foreach ($con->result_array() as $row){
					$child = array(
						'title' => array('name' => 'salutationChild'.$row['order_list'], 'value' => $row['title']),
						'name' => array('name' => 'nameChild'.$row['order_list'], 'value' => $row['first_name'].' '.$row['last_name']),
						'birthdate' => array('name' => 'birthDateChild'.$row['order_list'], 'value' => $row['birthday'])
					);
					array_push($response['responses']['child'], $child);
				}
			}
			//fetch & generate infant
			$con = $this->orders->get_passenger($id, 'infant');
			$response['responses']['infant'] = array();
			if ($cat=='flight'){
				foreach ($con->result_array() as $row){
					$infant = array(
						'title' => array('name' => 'titlei'.$row['order_list'], 'value' => $row['title']),
						'firstname' => array('name' => 'firstnamei'.$row['order_list'], 'value' => $row['first_name']),
						'lastname' => array('name' => 'lastnamei'.$row['order_list'], 'value' => $row['last_name']),
						'birthdate' => array('name' => 'birthdatei'.$row['order_list'], 'value' => $row['birthday']),
						'parent' => array('name' => 'parenti'.$row['order_list'], 'value' => $row['parent'])
					);
					array_push($response['responses']['infant'], $infant);
				}
			}
			else if($cat=='train'){
				foreach ($con->result_array() as $row){
					$infant = array(
						'title' => array('name' => 'salutationInfant'.$row['order_list'], 'value' => $row['title']),
						'name' => array('name' => 'nameInfant'.$row['order_list'], 'value' => $row['first_name'].' '.$row['last_name']),
						'birthdate' => array('name' => 'birthDateInfant'.$row['order_list'], 'value' => $row['birthday'])
					);
					array_push($response['responses']['infant'], $infant);
				}
			}
		}
		
		echo json_encode($response);
	}
	
	public function get_payment_list(){
		$list = $this->bank->get_payment_list();
		$number_row = 0;
		foreach ($list->result_array() as $row){
			$number_row++;
			$data[] = array(
				'number_row' => $number_row,
				'category' => $row['trip_category'],
				'order_id' => $row['order_id'],
				'payment_id' => $row['payment_id'],
				'sender' => $row['sender_name'],
				'bank_name' => $row['bank_name'],
				'transfer_date' => $row['transfer_date'],
				'total_paid' => $row['total_paid'],
				'total_price' => $row['total_price'],
				'status' => $row['status']
			);
		}
		echo json_encode($data);
	}
	
	public function get_booking_list(){
		$list = $this->orders->get_order_list();
		$number_row = 0;
		foreach ($list->result_array() as $row){
			$number_row++;
			$data[] = array(
				'number_row' => $number_row,
				'category' => $row['trip_category'],
				'order_id' => $row['order_id'],
				'total_price' => $row['total_price'],
				'order_status' => $row['order_status'],
				'timestamp' => $row['registered_date'],
				'payment_status' => $row['status']
			);
		}
		echo json_encode($data);
	}
	
	public function validate_payment_id(){
		$id = $this->uri->segment(3);
		$upd = $this->bank->update_payment_status($id, 'validated');
		//get order_id
		$order_id = $this->bank->get_order_id($id);
		//after validate payment, change order status to Paid
		$paid = $this->orders->update_order_status($order_id, 'Paid');
		redirect(base_url('index.php/admin/validate_payment'));
	}
	
	public function add_order_tiketcom(){
		$cat = $this->uri->segment(3);
		$id = $this->uri->segment(4);
		// check the payment status, if in status "requested" then refused to checkout
		list ($order_id, $status) = $this->bank->get_payment_id($id);
		if ($order_id==0){
			$response = 'nok';
			$message = 'Pelanggan belum melakukan konfirmasi pembayaran';
		}
		else {
			if ($status=='requested'){
				$response = 'nok';
				$message = 'Status pembayaran pelanggan belum divalidasi. Harap mengubah status pembayaran terlebih dahulu.';
			}
			else if ($status=='validated'){
				$posts = $this->input->post(NULL, TRUE);
				$token = $this->input->post('token');
				$str = '';
				foreach($posts as $key => $value)
					$str .= $key.'='.$value.'&';
				$post = rtrim($str, '&');
				//add order
				if ($cat=='flight')
					$getdata = file_get_contents($this->config->item('api_server').'/order/add/flight?'.$post.'&output=json');
				else if ($cat=='train')
					//print_r($this->config->item('api_server').'/order/add/train?'.$post.'&output=json');
					$getdata = file_get_contents($this->config->item('api_server').'/order/add/train?'.$post.'&output=json');
				
				$json = json_decode($getdata);
				$status = $json->diagnostic->status;
				if ($status!="200")
					$this->show_message_page('menambah pesanan ke pihak ketiga', $json->diagnostic->error_msgs);
				else if ($status=="200"){
					// order
					$order_req = file_get_contents($this->config->item('api_server').'/order?token='.$token.'&output=json');
					$order_resp = json_decode($order_req);
					$order_status = $order_resp->diagnostic->status;
					$checkout_link = stripslashes($order_resp->checkout);
					if ($order_status!="200")
						$this->show_message_page('konfirmasi pesanan ke pihak ketiga', $order_resp->diagnostic->error_msgs);
					else if ($order_status=="200"){
						//linking to checkout link
						$checkout_req = file_get_contents($checkout_link.'?token'.$token.'&output=json');
						$checkout_resp = json_decode($checkout_req);
						$checkout_status = $checkout_resp->diagnostic->status;
						if ($checkout_status!="200")
							$this->show_message_page('melakukan proses checkout ke pihak ketiga', $checkout_resp->diagnostic->error_msgs.' '.$checkout_link.'?token='.$token.'&output=json');
						else if ($checkout_status=="200"){
							$this->orders->update_order_status($id, 'Processing');
							redirect(base_url('index.php/admin/booking_page'));
						}
					}
				}
				
				//$this->orders->update_order_status($id, 'Processing');
				//redirect(base_url('index.php/admin/booking_page'));
				$response = 'ok';
			}
		}
		if ($response=='nok')
			$this->show_message_page('melakukan pengecekan status pembayaran.', $message);
			
	}
	
	function show_message_page($in, $message){
		$data = array(
				'user_name' => $this->session->userdata('user_name'),
				'ip_address' => $this->session->userdata('ip_address'),
				'title' => 'Pesan Kesalahan',
				'subtitle' => 'Terjadi kesalahan pada saat '.$in,
				'message' => $message
			);
			$this->load->view('admin_page_header', $data);
			$this->load->view('admin_any_message', $data);
			$this->load->view('admin_page_footer');
	}
}