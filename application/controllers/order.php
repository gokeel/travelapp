<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Order extends CI_Controller {
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
	{
		$data = array(
			'title' => 'Proses memasukkan data selesai',
			'sub_title' => 'Harap segera melakukan check out di halaman admin'
			);
		$this->load->view('header');
		$this->load->view('page_nav_header', $data);
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
			
		if ($airline_name == 'LION')
			list ($lioncaptcha, $lionsessionid) = $this->get_lion_captcha();
		$token = $this->session->userdata('token');
		$account_id = $this->config->item('account_id');
		
		if ($account_id > 0){
			
		}
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
			'lion_session_id' => (isset($lionsessionid) ? $lionsessionid : '')
		);
		
		$this->load->model('orders');
		$order_id = $this->orders->add_order($data);
		//print_r($id);
		
		if ($order_id > 0){
			$response['insert_general'] = true;
			
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
				redirect(base_url('index.php/order/success'));
			else
				redirect(base_url('index.php/order/failed'));
				
			/*$batch = $this->orders->add_passenger($passenger);
			if ($batch)
				$response['insert_batch'] = true;
			else $response['insert_batch'] = false;*/
		}
		else
			$response['insert_general'] = false;
		
		//echo json_encode($response);
	}
}