<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hotel extends CI_Controller {
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
			'title' => 'Pencarian Pesawat',
			'sub_title' => 'Pencarian cepat pesawat sesuai dengan kebutuhan anda.'
			);
		$this->load->view('header');
		$this->load->view('search_page_header', $data);
		$this->load->view('search_flight');
		$this->load->view('footer');
		
	}
	
	public function search_autocomplete(){
		$area = $this->input->get('area', TRUE);
		$getdata = file_get_contents($this->config->item('api_server').'/search/autocomplete/hotel?q='.$area.'&token='.$this->get_token().'&output=json');
		$json = json_decode($getdata);
		
		$array = array();
		$array[] = (object)$json;
		 
		if (isset($_GET['callback'])) {
				echo $_GET['callback'] . '('.json_encode($array).')';
			}else{
				echo '{"items":'. json_encode($array) .'}';
			}
	}
	
	public function search_hotels(){
		$query = $this->input->get('query', TRUE);
		$checkin = $this->input->get('checkin', TRUE);
		$checkout = $this->input->get('checkout', TRUE);
		$room = $this->input->get('room', TRUE);
		$adult = $this->input->get('adult', TRUE);
		$child = $this->input->get('child', TRUE);
		$getdata = file_get_contents($this->config->item('api_server').'/search/hotel?q='.$query.'&startdate='.$checkin.'&enddata='.$checkout.'&room='.$room.'&adult='.$adult.'&child='.$child.'&token='.$this->get_token().'&output=json');
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