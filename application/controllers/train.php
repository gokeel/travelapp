<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Train extends CI_Controller {
	public function get_token()
	{
		$getdata = file_get_contents($this->config->item('api_server').'/apiv1/payexpress?method=getToken&secretkey=' . $this->config->item('api_key').'&output=json');
		$json = json_decode($getdata);
		$token = $json->token;
		return $token;
	}
	
	public function page()
	{
		$data = array(
			'title' => 'Pencarian Kereta Api',
			'sub_title' => 'Pencarian cepat tiket kereta api sesuai dengan kebutuhan anda.'
			);
		$this->load->view('header');
		$this->load->view('page_nav_header', $data);
		$this->load->view('search_train');
		$this->load->view('footer');
		
	}
	
	public function get_all_station()
	{
		$this->db->order_by('station_name','asc');
		$sql = $this->db->get('train_stations');
		
		foreach ($sql->result_array() as $row)
		{
			$data[] = array(
				'station_name' => $row['station_name'],
				'station_code' => $row['station_code'],
				'station_location_name' => $row['station_location_name']
			);
		}
		echo json_encode($data);
	}
	
	public function sync_all_station()
	{
		$getdata = file_get_contents($this->config->item('api_server').'/train_api/train_station?token='.$this->get_token().'&output=json');
		$json = json_decode($getdata);
		$stations = $json->stations->station;
		
		$data = array();
		foreach ($stations as $station)
		{
			$sub_data = array(
				'station_name' => $station->station_name,
				'station_code' => $station->station_code,
				'station_location_name' => $station->city_name
			);
			array_push($data, $sub_data);
		}
		
		//truncate and the insert all data
		$this->db->truncate('train_stations');
		//insert batch
		$this->db->insert_batch('train_stations', $data);
		print_r("Sync all station done.");
	}

	public function search_trains()
	{
		$asal = $this->input->get('dari', TRUE);
		$tujuan = $this->input->get('ke', TRUE);
		$date = $this->input->get('train-pergi', TRUE);
		$ret_date = $this->input->get('train-pulang', TRUE);
		$adult = $this->input->get('dewasa', TRUE);
		$child = $this->input->get('anak', TRUE);
		$infant = $this->input->get('bayi', TRUE);
		$token = $this->get_token();
		$this->session->set_userdata('token', $token);
		
		$Data = file_get_contents($this->config->item('api_server').'/search/train?d='.$asal.'&a='.$tujuan.'&date='.$date.'&ret_date='.$ret_date.'&adult='.$adult.'&child='.$child.'&infant='.$infant.'&class=all&token='.$token.'&output=json');
		 
		$Proses2 = json_decode($Data);
		 
		$array = array();
		$array[] = (object)$Proses2;
		 
		if (isset($_GET['callback'])) {
				echo $_GET['callback'] . '('.json_encode($array).')';
			}else{
				echo '{"items":'. json_encode($array) .'}';
			}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */