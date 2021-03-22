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
		$data['prodi'] = $this->m_pemilwa->get_tabel('prodi');
		$data['bpm'] = $this->m_pemilwa->get_tabel('calon_bpm');
		$this->load->view('user/pemilwa', $data);
	}

	//admin
	public function admin()
	{
		$data['admin'] = $this->m_pemilwa->get_tabel('admin');
		$this->load->view('admin/admin', $data);
	}
	//view addadmin
	public function viewaddadmin()
	{
		$this->load->view('admin/tambah_admin');
	}
	//view updateadmin
	public function viewupdateadmin($id)
	{
		$where = array(
			'id_admin' =>$id
		);
		$data['admin'] = $this->m_pemilwa->detail_tabel($where, 'admin');
		$this->load->view('admin/ubah_admin', $data);
	}
	//add admin
	public function addadmin()
	{ 
			$data = array(
				'nama_admin' => $this->input->post('nama_admin'),
				'username' => $this->input->post('username'),
				'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT)
				);
			$add = $this->m_pemilwa->insert_tabel($data, 'admin');
			if ($add) {
				$this->session->set_flashdata('admin', 'sukses tambah admin');
			}
			else {
				$this->session->set_flashdata('admin', 'gagal tambah admin');
			}
			redirect('Pemilwa/admin');
	}
	//update admin
	public function updateadmin()
	{	if($this->input->post('password') == ""){
		$data = array(
			'nama_admin' => $this->input->post('nama_admin'),
			'username' => $this->input->post('username'),
			);
		}else{
			$data = array(
				'nama_admin' => $this->input->post('nama_admin'),
				'username' => $this->input->post('username'),
				'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT)
				);
			}
			$where = array(
				'id_admin' =>$this->input->post('id_admin')
			);
			$update = $this->m_pemilwa->update_tabel($data, $where, 'admin');
			if ($update) {
				$this->session->set_flashdata('admin', 'sukses ubah admin');
			}
			else {
				$this->session->set_flashdata('admin', 'gagal ubah admin');
			}
			redirect('Pemilwa/admin');
	}
	//delete admin
	function deleteadmin($id)
	{
		$where = array('id_admin' => $id);
		$delete = $this->m_pemilwa->delete_tabel($where, 'admin');
		if ($delete) {
			$this->session->set_flashdata('admin', 'sukses hapus admin');
		}
		else {
			$this->session->set_flashdata('admin', 'gagal hapus admin');
		}
		redirect('Pemilwa/admin', 'refresh');
	}

	//detil admin
	public function detiladmin()
	{
		$id = $this->uri->segment(3);
		$where = array(
			'id_admin' => $id
		);
		$data = $this->m_pemilwa->detail_tabel($where, 'admin');
		echo json_encode($data);
	}

	//paslon
	public function paslon()
	{
		$data['bem'] = $this->m_pemilwa->get_tabel('pasang_calon');
		$data['prodi'] = $this->m_pemilwa->get_tabel('prodi');
		$this->load->view('admin/paslon', $data);
	}
	//view addpaslon
	public function viewaddpaslon()
	{
		$data['prodi'] = $this->m_pemilwa->get_tabel('prodi');
		$this->load->view('admin/tambah_paslon', $data);
	}
	//view updatepaslon
	public function viewupdatepaslon($id)
	{
		$where = array(
			'no_urut' =>$id
		);
		$data['prodi'] = $this->m_pemilwa->get_tabel('prodi');
		$data['paslon'] = $this->m_pemilwa->detail_tabel($where, 'pasang_calon');
		$this->load->view('admin/ubah_paslon', $data);
	}
	//add paslon
	public function addpaslon()
	{ 
			$config['upload_path'] = './assets/image/paslon';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']  = '100000';
			$config['file_name']  = $this->input->post('nim_ketua');
			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('gambar')){
				echo $this->upload->display_errors();
				return false;
			}
		else{
			$data = array(
				'nama_pasangan' => $this->input->post('nama_pasangan'),
				'nim_ketua' => $this->input->post('nim_ketua'),
				'nim_wakil' => $this->input->post('nim_wakil'),
				'id_prodi_ketua' => $this->input->post('id_prodi_ketua'),
				'id_prodi_wakil' => $this->input->post('id_prodi_wakil'),
				'gambar' => $this->upload->data('file_name'),
				'visi' => $this->input->post('visi'),
				'misi' => $this->input->post('misi')
				);
			$add = $this->m_pemilwa->insert_tabel($data, 'pasang_calon');
			if ($add) {
				$this->session->set_flashdata('paslon', 'sukses tambah paslon');
			}
			else {
				$this->session->set_flashdata('paslon', 'gagal tambah paslon');
			}
			redirect('Pemilwa/paslon');
		}
	}

	//update paslon
	public function updatepaslon()
	{
			$nama_gambar = $_FILES['gambar']['name'];
			if ($nama_gambar!=="") {
			$config['upload_path'] = './assets/image/paslon';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']  = '200000';
			$config['file_name']  = $this->input->post('nim_ketua');
			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('gambar')){
				return false;
			}
			else {
				$data = array(
				'nama_pasangan' => $this->input->post('nama_pasangan'),
				'nim_ketua' => $this->input->post('nim_ketua'),
				'nim_wakil' => $this->input->post('nim_wakil'),
				'id_prodi_ketua' => $this->input->post('id_prodi_ketua'),
				'id_prodi_wakil' => $this->input->post('id_prodi_wakil'),
				'gambar' => $this->upload->data('file_name'),
				'visi' => $this->input->post('visi'),
				'misi' => $this->input->post('misi')
					);
				$where = array(
					'no_urut' => $this->input->post('no_urut')
					);
				$update = $this->m_pemilwa->update_tabel($data, $where, 'pasang_calon');
				if ($update) {
					$this->session->set_flashdata('paslon', 'sukses ubah paslon');
				}
				else {
					$this->session->set_flashdata('paslon', 'gagal ubah paslon');
				}
				redirect('Pemilwa/paslon', 'refresh');
			}
			
		}
			else{
				$data = array(
				'nama_pasangan' => $this->input->post('nama_pasangan'),
				'nim_ketua' => $this->input->post('nim_ketua'),
				'nim_wakil' => $this->input->post('nim_wakil'),
				'id_prodi_ketua' => $this->input->post('id_prodi_ketua'),
				'id_prodi_wakil' => $this->input->post('id_prodi_wakil'),
				'visi' => $this->input->post('visi'),
				'misi' => $this->input->post('misi')
					);
				$where = array(
					'no_urut' => $this->input->post('no_urut')
				);
				$update = $this->m_pemilwa->update_tabel($data, $where, 'pasang_calon');
				if ($update) {
					$this->session->set_flashdata('paslon', 'sukses ubah paslon');
				}
				else {
					$this->session->set_flashdata('paslon', 'gagal ubah paslon');
				}
				redirect('Pemilwa/paslon', 'refresh');
			}
	}

	//delete paslon
	function deletepaslon($id)
	{
		$where = array('no_urut' => $id);
		$delete = $this->m_pemilwa->delete_tabel($where, 'pasang_calon');
		if ($delete) {
			$this->session->set_flashdata('paslon', 'sukses hapus paslon');
		}
		else {
			$this->session->set_flashdata('paslon', 'gagal hapus paslon');
		}
		redirect('Pemilwa/paslon', 'refresh');
	}

	//detil paslon
	public function detilpaslon()
	{
		$id = $this->uri->segment(3);
		$where = array(
			'no_urut' => $id
		);
		$data = $this->m_pemilwa->detail_tabel($where, 'pasang_calon');
		echo json_encode($data);
	}

	//bpm
	public function bpm()
	{
		$data['prodi'] = $this->m_pemilwa->get_tabel('prodi');
		$data['bpm'] = $this->m_pemilwa->get_tabel('calon_bpm');
		$this->load->view('admin/calonbpm', $data);
	}
	//view addbpm
	public function viewaddbpm()
	{
		$data['prodi'] = $this->m_pemilwa->get_tabel('prodi');
		$this->load->view('admin/tambah_calonbpm', $data);
	}
	//view updatebpm
	public function viewupdatebpm($id)
	{
		$where = array(
			'no_urut' =>$id
		);
		$data['prodi'] = $this->m_pemilwa->get_tabel('prodi');
		$data['calon'] = $this->m_pemilwa->detail_tabel($where, 'calon_bpm');
		$this->load->view('admin/ubah_calonbpm', $data);
	}
	//add calon bpm
	public function addbpm()
	{ 
			$config['upload_path'] = './assets/image/bpm';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']  = '100000';
			$config['file_name']  = $this->input->post('nim');
			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('gambar')){
				return false;
			}
		else{
			$data = array(
				'nama_lengkap' => $this->input->post('nama_lengkap'),
				'nim' => $this->input->post('nim'),
				'id_prodi' => $this->input->post('id_prodi'),
				'gambar' => $this->upload->data('file_name'),
				'visi' => $this->input->post('visi'),
				'misi' => $this->input->post('misi')
				);
			$add = $this->m_pemilwa->insert_tabel($data, 'calon_bpm');
			if ($add) {
				$this->session->set_flashdata('bpm', 'sukses tambah calon bpm');
			}
			else {
				$this->session->set_flashdata('bpm', 'gagal tambah calon bpm');
			}
			redirect('Pemilwa/bpm');
		}
	}
	//update calon bpm
	public function updatebpm()
	{
			$nama_gambar = $_FILES['gambar']['name'];
			if ($nama_gambar!=="") {
			$config['upload_path'] = './assets/image/bpm';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']  = '200000';
			$config['file_name']  = $this->input->post('nim');
			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('gambar')){
				return false;
			}
			else {
				$data = array(
					'nama_lengkap' => $this->input->post('nama_lengkap'),
					'nim' => $this->input->post('nim'),
					'id_prodi' => $this->input->post('id_prodi'),
					'gambar' => $this->upload->data('file_name'),
					'visi' => $this->input->post('visi'),
					'misi' => $this->input->post('misi')
					);
				$where = array(
					'no_urut' => $this->input->post('no_urut')
					);
				$update = $this->m_pemilwa->update_tabel($data, $where, 'calon_bpm');
				if ($update) {
					$this->session->set_flashdata('bpm', 'sukses ubah calon bpm');
				}
				else {
					$this->session->set_flashdata('bpm', 'gagal ubah calon bpm');
				}
				redirect('Pemilwa/bpm', 'refresh');
			}
			
		}
			else{
				$data = array(
					'nama_lengkap' => $this->input->post('nama_lengkap'),
					'nim' => $this->input->post('nim'),
					'id_prodi' => $this->input->post('id_prodi'),
					'visi' => $this->input->post('visi'),
					'misi' => $this->input->post('misi')
					);
				$where = array(
					'no_urut' => $this->input->post('no_urut')
				);
				$update = $this->m_pemilwa->update_tabel($data, $where, 'calon_bpm');
				if ($update) {
					$this->session->set_flashdata('bpm', 'sukses ubah calon bpm');
				}
				else {
					$this->session->set_flashdata('bpm', 'gagal ubah calon bpm');
				}
				redirect('Pemilwa/bpm', 'refresh');
			}
	}
	//delete calon bpm
	function deletebpm($id)
	{
		$where = array('no_urut' => $id);
		$delete = $this->m_pemilwa->delete_tabel($where, 'calon_bpm');
		if ($delete) {
			$this->session->set_flashdata('bpm', 'sukses hapus calon bpm');
		}
		else {
			$this->session->set_flashdata('bpm', 'gagal hapus calon bpm');
		}
		redirect('Pemilwa/bpm', 'refresh');
	}

	//pemilih
	public function pemilih()
	{
		$data['prodi'] = $this->m_pemilwa->get_tabel('prodi');
		$data['pemilih'] = $this->m_pemilwa->get_tabel('pemilih');
		$this->load->view('admin/pemilih', $data);
	}
	//view addpemilih
	public function viewaddpemilih()
	{
		$data['prodi'] = $this->m_pemilwa->get_tabel('prodi');
		$this->load->view('admin/tambah_pemilih', $data);
	}
	//view updatepemilih
	public function viewupdatepemilih($id)
	{
		$where = array(
			'nim' =>$id
		);
		$data['prodi'] = $this->m_pemilwa->get_tabel('prodi');
		$data['pemilih'] = $this->m_pemilwa->detail_tabel($where, 'pemilih');
		$this->load->view('admin/ubah_pemilih', $data);
	}
	//add pemilih
	public function addpemilih()
	{ 
			$data = array(
				'nama_lengkap' => $this->input->post('nama_lengkap'),
				'nim' => $this->input->post('nim'),
				'id_prodi' => $this->input->post('id_prodi'),
				'angkatan' => $this->input->post('angkatan'),
				'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT)
				);
			$add = $this->m_pemilwa->insert_tabel($data, 'pemilih');
			if ($add) {
				$this->session->set_flashdata('pemilih', 'sukses tambah pemilih');
			}
			else {
				$this->session->set_flashdata('pemilih', 'gagal tambah pemilih');
			}
			redirect('Pemilwa/pemilih');
	}
	//update pemilih
	public function updatepemilih()
	{
		if($this->input->post('password') == ""){
			echo "aku";
			$data = array(
				'nama_lengkap' => $this->input->post('nama_lengkap'),
				'id_prodi' => $this->input->post('id_prodi'),
				'angkatan' => $this->input->post('angkatan'),
			);
		}else{
			echo "kamu";
			$data = array(
				'nama_lengkap' => $this->input->post('nama_lengkap'),
				'id_prodi' => $this->input->post('id_prodi'),
				'angkatan' => $this->input->post('angkatan'),
				'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT)
				);
		}
		$where = array(
			'nim' => $this->input->post('nim')
		);
		$update = $this->m_pemilwa->update_tabel($data, $where, 'pemilih');
		if ($update) {
			$this->session->set_flashdata('pemilih', 'sukses ubah pemilih');
		}
		else {
			$this->session->set_flashdata('pemilih', 'gagal ubah pemilih');
		}
		redirect('Pemilwa/pemilih', 'refresh');
	}
	//delete pemilih
	function deletepemilih($id)
	{
		$where = array('nim' => $id);
		$delete = $this->m_pemilwa->delete_tabel($where, 'pemilih');
		if ($delete) {
			$this->session->set_flashdata('pemilih', 'sukses hapus pemilih');
		}
		else {
			$this->session->set_flashdata('pemilih', 'gagal hapus pemilih');
		}
		redirect('Pemilwa/pemilih', 'refresh');
	}
	//login
	public function login() {
		$this->load->view('user/login');
	}

	public function login_validation() {
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nim', 'NIM', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run()) {
			$nim = $this->input->post('nim');
			$admin_username = $this->input->post('nim');
			$password = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
			//model function
			$this->load->model('m_pemilwa');
			if ($this->m_pemilwa->can_login_user($nim, $password)) {
				$session_data = array(
					'nim' => $nim
				);
				$this->session->set_userdata($session_data);
				redirect('enter_user');
				
			} else if ($this->m_pemilwa->can_login_admin($admin_username, $password)) {
				$session_data = array(
					'nim' => $admin_username
				);
				$this->session->set_userdata($session_data);
				redirect('enter_admin');
			} else {
				$this->session->set_flashdata('error','NIM atau Password salah');
				redirect('login');
			}
		} else {
			$this->login();
		}
		
	}
	public function enter_user() {
		if ($this->session->set_userdata('nim') != '') {
			redirect('vote');
		} else {
			redirect('login');
		}
	}
	public function enter_admin() {
		if ($this->session->set_userdata('nim') != '') {
			redirect('admin');
		} else {
			redirect('login');
		}
	}
	
	//logout
	public function logout() {
		$this->session->unset_userdata('nim');
		redirect('login');
	}

	//add voting paslon
	public function vote_paslon() {
		$this->load->view('user/vote_paslon');
	}
	
	public function add_vote_paslon() {
		$nim_pemilih = $this->session->userdata("nim"); 
		$pilihan = array(
			'no_pilihan_pasangan' => $this->input->post('dipilih')
			);
		$this->m_pemilwa->update_tabel($pilihan, $nim_pemilih, 'pemilih');
		redirect('user/vote_bpm');
	}
	
	//add voting bpm
	public function vote_bpm() {
		$this->load->view('user/vote_bpm');
	}

	public function add_vote_bpm() {
		$nim_pemilih = $this->session->userdata("nim"); 
		$pilihan = array(
			'no_pilihan_bpm' => $this->input->post('dipilih')
			);
		$this->m_pemilwa->update_tabel($pilihan, $nim_pemilih, 'pemilih');
		$this->logout();
	}


}
