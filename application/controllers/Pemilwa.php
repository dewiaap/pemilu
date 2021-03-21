<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemilwa extends CI_Controller {
	function __construct()
	{
		parent::__construct();		
		$this->load->model('m_pemilwa');
	}
	//home
	public function index()
	{
		$data['bem'] = $this->m_pemilwa->get_tabel('pasang_calon');
		$data['bpm'] = $this->m_pemilwa->get_tabel('calon_bpm');
		$this->load->view('pemilwa', $data);
	}

	//add paslon

	//update paslon

	//delete paslon

	//add calon bpm

	//update calon bpm

	//delete calon bpm

	//add pemilih

	//login

	//logout

	//register

	//add voting paslon

	//add voting bpm

}
