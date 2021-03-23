<?php
class Login extends CI_Controller
{
	function __construct()
	{
		parent::__construct();		
		$this->load->model('m_pemilwa');
	}
	public function index()	{
		if ($this->session->userdata('login')) {
			if ($this->session->userdata('level') == 'admin') {
				redirect('pemilwa/dashboard');
			} else {
				if ($this->session->userdata('isVote')) {
					redirect('pemilwa/terimakasih');
				} else {
					redirect('pemilwa/vote_paslon');
				}
			}
		} else {
			$this->load->view('login');
		}
	}
	public function signin()
	{
		$whereuser = array(
            'nim' => $this->input->post('username')
		);
		$whereadmin = array(
            'username' => $this->input->post('username')
		);
		$userpass = $this->input->post('password');
		if($this->m_pemilwa->can_login_admin($whereadmin, $userpass)){
			redirect('login/enter_admin');
		}
		else if($this->m_pemilwa->can_login_user($whereuser, $userpass)){
			if ($this->session->userdata('isVote')) {
				redirect('pemilwa/terimakasih');
			} else {
				redirect('pemilwa/vote_paslon');
			}
		}
		else{
			$this->session->set_flashdata('error','Silakan cek username atau password anda');
			redirect('login');
		}
	}
	public function enter_user() {
		if ($this->session->userdata('login')) {
			redirect('pemilwa/vote_paslon');
		} else {
			redirect('login');
		}
	}
	public function enter_admin() {
		if ($this->session->userdata('login')) {
			redirect('pemilwa/dashboard');
		} else {
			redirect('login');
		}
	}
	
}
