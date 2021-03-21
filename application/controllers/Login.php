<?php
class Login extends CI_Controller
{
	public function index()	{
        //menampilkan halaman view dengan login
		$this->load->view('login');
	}
}
