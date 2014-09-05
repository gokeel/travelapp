<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Webfront extends CI_Controller {

	public function index()
	{
		$this->session->set_userdata('akun_id', '2');
		
		$this->load->view('header');
		$this->load->view('homepage');
		$this->load->view('footer');
		
		//$this->load->view('homepage');
	}
	
	public function paketwisata(){
		$this->load->view('header');
		$this->load->view('wisata');
		$this->load->view('footer');
	}
	
	public function agen(){
		$this->load->view('header');
		$this->load->view('agen');
		$this->load->view('footer');
	}
	
	public function hotel(){
		$this->load->view('header');
		$this->load->view('hotel');
		$this->load->view('footer');
	}
	
	public function tentang(){
		$this->load->view('header');
		$this->load->view('tentang');
		$this->load->view('footer');
	}
	
	public function promo(){
		$this->load->view('header');
		$this->load->view('promo');
		$this->load->view('footer');
	}
	
		public function kontak(){
		$this->load->view('header');
		$this->load->view('kontak');
		$this->load->view('footer');
	}
	
		public function paketdetailbelitung(){
		$this->load->view('header');
		$this->load->view('paketdetailbelitung');
		$this->load->view('footer');
	}
	
	public function paketdetailrajaampat(){
		$this->load->view('header');
		$this->load->view('paketdetailrajaampat');
		$this->load->view('footer');
	}
	
	public function registrasi(){
		$data = array(
			'title' => 'Registrasi Agen',
			'sub_title' => 'Keagenan dalam hellotraveler menawarkan berbagai keunggulan dan keleluasaan dalam memulai bisnis travel agen. Kami mengucapkan selamat bergabung. ikuti langkah-langkan registrasi untuk menjadi agen Hellotraveler. Anda juga dapat langsung mengunjungi kantor kami.'
			);
		$this->load->view('header');
		$this->load->view('page_nav_header', $data);
		$this->load->view('registrasi');
		$this->load->view('footer');
	}
	
	public function pesanpaket(){
		$this->load->view('header');
		$this->load->view('pesanpaket');
		$this->load->view('footer');
	}
	
	public function subdomain(){
		$username = $this->input->get('username');
		$this->load->model('users');
		$account_id = $this->users->get_account_id_by_username($username);
		$this->session->set_userdata('akun_id', $account_id);
		$this->session->set_userdata('user_name', $username);
		
		$this->load->view('header');
		$this->load->view('homepage');
		$this->load->view('footer');
	}
	public function test(){
		print_r($this->config->item('account_id'));
		$this->config->set_item('account_id', '2');
		print_r($this->config->item('account_id'));
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */