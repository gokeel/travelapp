<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Flight extends CI_Controller {
	public function get_token()
	{
		$getdata = file_get_contents($this->config->item('api_server').'/apiv1/payexpress?method=getToken&secretkey=' . $this->config->item('api_key').'&output=json');
		$json = json_decode($getdata);
		$token = $json->token;
		// set session token
		$this->session->set_userdata('active_token', $token);
		return $token;
	}
	
	public function page()
	{
		$data = array(
			'title' => 'Pencarian Pesawat',
			'sub_title' => 'Pencarian cepat pesawat sesuai dengan kebutuhan anda.'
			);
		$this->load->view('header');
		$this->load->view('page_nav_header', $data);
		$this->load->view('search_flight');
		$this->load->view('footer');
		
	}
	
	public function get_all_airport()
	{
		//$this->db->select('flight_airports');
		$this->db->order_by('airport_location_name','asc');
		$sql = $this->db->get('flight_airports');
		
		foreach ($sql->result_array() as $row)
		{
			$data[] = array(
				'airport_name' => $row['airport_name'],
				'airport_code' => $row['airport_code'],
				'airport_location_name' => $row['airport_location_name'],
				'airport_country' => $row['airport_country']
			);
		}
		echo json_encode($data);
	}
	
	public function sync_all_airport()
	{
		$getdata = file_get_contents($this->config->item('api_server').'/flight_api/all_airport?token='.$this->get_token().'&output=json');
		print_r($getdata);
		$json = json_decode($getdata);
		$airports = $json->all_airport->airport;
		
		$data = array();
		foreach ($airports as $airport)
		{
			$sub_data = array(
				'airport_name' => $airport->airport_name,
				'airport_code' => $airport->airport_code,
				'airport_location_name' => $airport->location_name,
				'airport_country' => $airport->country_id
			);
			array_push($data, $sub_data);
		}
		
		//truncate and the insert all data
		$this->db->truncate('flight_airports');
		//insert batch
		$this->db->insert_batch('flight_airports', $data);
		print_r("Sync all airport done.");
	}

	public function search_flights()
	{
		$asal = $this->input->get('dari', TRUE);
		$tujuan = $this->input->get('ke', TRUE);
		$date = $this->input->get('flight-pergi', TRUE);
		$ret_date = $this->input->get('flight-pulang', TRUE);
		$adult = $this->input->get('dewasa', TRUE);
		$child = $this->input->get('anak', TRUE);
		$infant = $this->input->get('bayi', TRUE);
		$token = $this->get_token();
		$this->session->set_userdata('token', $token);
		$Data = file_get_contents($this->config->item('api_server').'/search/flight?d='.$asal.'&a='.$tujuan.'&date='.$date.'&ret_date='.$ret_date.'&adult='.$adult.'&child='.$child.'&infant='.$infant.'&sort=priceasc&token='.$token.'&output=json');
		 
		$Proses2 = json_decode($Data);
		 
		$array = array();
		$array[] = (object)$Proses2;
		 
		if (isset($_GET['callback'])) {
				echo $_GET['callback'] . '('.json_encode($array).')';
			}else{
				echo '{"items":'. json_encode($array) .'}';
			}
	}
	
	public function get_flight_data()
	{
		$flight_id = $this->uri->segment(3);
		$date = $this->uri->segment(4);
		$getdata = file_get_contents($this->config->item('api_server').'/flight_api/get_flight_data?flight_id='.$flight_id.'&date='.$date.'&token='.$this->get_token().'&output=json');
		
		$json = json_decode($getdata);
		$array = array();
		$array[] = (object)$json;
		 
		if (isset($_GET['callback'])) {
				echo $_GET['callback'] . '('.json_encode($array).')';
			}else{
				echo '{"items":'. json_encode($array) .'}';
			}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */