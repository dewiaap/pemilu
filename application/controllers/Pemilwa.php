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
		if ($this->session->userdata('login')) {
		$data['bem'] = $this->m_pemilwa->get_tabel('pasang_calon');
		$data['prodi'] = $this->m_pemilwa->get_tabel('prodi');
		$data['bpm'] = $this->m_pemilwa->get_tabel('calon_bpm');
		$this->load->view('user/pemilwa', $data);
		}
		else{
			redirect('login');
		}
	}
	//dashboard admin
	public function dashboard(){
		if ($this->session->userdata('login')&&$this->session->userdata('level') == 'admin') {
		$data['pemilih_all'] = $this->m_pemilwa->get_count_pemilih();
		$data['pemilih_done'] = $this->m_pemilwa->get_count_pemilih_done();
		$prodi = $this->m_pemilwa->get_tabel('prodi');
		for($i=0;$i<count($prodi);$i++){
			$data['prodi'][$i] = $this->m_pemilwa->get_count_prodi($prodi[$i]->id_prodi);
			$data['nama_prodi'][$i] = $prodi[$i]->singkatan;
		}
		$data['content_view'] = "admin/dashboard";
		$this->load->view('admin/template', $data);
	}else{
		redirect('login');
	}
	}
	//admin
	public function admin()
	{
		if ($this->session->userdata('login')&&$this->session->userdata('level') == 'admin') {
		$data['admin'] = $this->m_pemilwa->get_tabel('admin');
		$data['content_view'] = "admin/admin";
		$this->load->view('admin/template', $data);}
		else{
			redirect('login');
		}
	}
	//view addadmin
	public function viewaddadmin()
	{
		if ($this->session->userdata('login')) {
		$this->load->view('admin/tambah_admin');
		}else{
			redirect('login');
		}
	}
	//view updateadmin
	public function viewupdateadmin($id)
	{
		if ($this->session->userdata('login')) {
		$where = array(
			'id_admin' =>$id
		);
		$data['admin'] = $this->m_pemilwa->detail_tabel($where, 'admin');
		$this->load->view('admin/ubah_admin', $data);}
		else{
			redirect('login');
		}
	}
	//add admin
	public function addadmin()
	{ 
			$data = array(
				'nama_admin' => $this->input->post('nama_admin'),
				'username' => $this->input->post('username'),
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
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
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
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

	//paslon
	public function paslon()
	{
		if ($this->session->userdata('login')&&$this->session->userdata('level') == 'admin') {
		$data['bem'] = $this->m_pemilwa->get_tabel('pasang_calon');
		$data['prodi'] = $this->m_pemilwa->get_tabel('prodi');
		$data['content_view'] = "admin/paslon";
		$this->load->view('admin/template', $data);
		}else{
			redirect('login');
		}
	}
	//view addpaslon
	public function viewaddpaslon()
	{
		if ($this->session->userdata('login')) {
		$data['prodi'] = $this->m_pemilwa->get_tabel('prodi');
		$this->load->view('admin/tambah_paslon', $data);
		}else{
			redirect('login');
		}
	}
	//view updatepaslon
	public function viewupdatepaslon($id)
	{
		if ($this->session->userdata('login')) {
		$where = array(
			'no_urut' =>$id
		);
		$data['prodi'] = $this->m_pemilwa->get_tabel('prodi');
		$data['paslon'] = $this->m_pemilwa->detail_tabel($where, 'pasang_calon');
		$this->load->view('admin/ubah_paslon', $data);
	}else{
		redirect('login');
	}
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

	//bpm
	public function bpm()
	{
		if ($this->session->userdata('login')&&$this->session->userdata('level') == 'admin') {
		$data['prodi'] = $this->m_pemilwa->get_tabel('prodi');
		$data['bpm'] = $this->m_pemilwa->get_tabel('calon_bpm');
		$data['content_view'] = "admin/calonbpm";
		$this->load->view('admin/template', $data);}
		else{
			redirect('login');
		}
	}
	//view addbpm
	public function viewaddbpm()
	{
		if ($this->session->userdata('login')) {
		$data['prodi'] = $this->m_pemilwa->get_tabel('prodi');
		$this->load->view('admin/tambah_calonbpm', $data);}
		else{
			redirect('login');
		}
	}
	//view updatebpm
	public function viewupdatebpm($id)
	{
		if ($this->session->userdata('login')) {
		$where = array(
			'no_urut' =>$id
		);
		$data['prodi'] = $this->m_pemilwa->get_tabel('prodi');
		$data['calon'] = $this->m_pemilwa->detail_tabel($where, 'calon_bpm');
		$this->load->view('admin/ubah_calonbpm', $data);}
		else{
			redirect('login');
		}
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
		if ($this->session->userdata('login')&&$this->session->userdata('level') == 'admin') {
		$data['prodi'] = $this->m_pemilwa->get_tabel('prodi');
		$data['pemilih'] = $this->m_pemilwa->get_tabel('pemilih');
		$data['content_view'] = "admin/pemilih";
		$this->load->view('admin/template', $data);
		}else{
			redirect('login');
		}
	}
	//view addpemilih
	public function viewaddpemilih()
	{
		if ($this->session->userdata('login')) {
		$data['prodi'] = $this->m_pemilwa->get_tabel('prodi');
		$this->load->view('admin/tambah_pemilih', $data);}
		else{
			redirect('login');
		}
	}
	//view updatepemilih
	public function viewupdatepemilih($id)
	{
		if ($this->session->userdata('login')) {
		$where = array(
			'nim' =>$id
		);
		$data['prodi'] = $this->m_pemilwa->get_tabel('prodi');
		$data['pemilih'] = $this->m_pemilwa->detail_tabel($where, 'pemilih');
		$this->load->view('admin/ubah_pemilih', $data);
	}else{
		redirect('login');
	}
	}
	//add pemilih
	public function addpemilih()
	{ 
			$data = array(
				'nama_lengkap' => $this->input->post('nama_lengkap'),
				'nim' => $this->input->post('nim'),
				'id_prodi' => $this->input->post('id_prodi'),
				'angkatan' => $this->input->post('angkatan'),
				'password' => password_hash($this->input->post('password', true), PASSWORD_DEFAULT)
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
			$data = array(
				'nama_lengkap' => $this->input->post('nama_lengkap'),
				'id_prodi' => $this->input->post('id_prodi'),
				'angkatan' => $this->input->post('angkatan'),
			);
		}else{
			$data = array(
				'nama_lengkap' => $this->input->post('nama_lengkap'),
				'id_prodi' => $this->input->post('id_prodi'),
				'angkatan' => $this->input->post('angkatan'),
				'password' => password_hash($this->input->post('password', true), PASSWORD_DEFAULT)
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
	
	//logout
	function terimakasih() {
		$this->load->view('user/terimakasih');
	}
	
	public function logout() {
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('login');
		redirect('login');
	}

	//add voting paslon
	public function vote_paslon() {
		if ($this->session->userdata('login')&&$this->session->userdata('level') == 'user') {
		$data['bem'] = $this->m_pemilwa->get_tabel('pasang_calon');
		$data['prodi'] = $this->m_pemilwa->get_tabel('prodi');
		$this->load->view('user/vote_paslon', $data);}
		else{
			redirect('login');
		}
	}
	
	public function add_vote_paslon() {
		$nim_pemilih = $this->session->userdata("username"); 
		$where = array(
			'nim' => $nim_pemilih
		);
		$data = array(
			'no_pilihan_pasangan' => $this->input->post('dipilih')
			);
		$this->m_pemilwa->update_tabel($data, $where, 'pemilih');
		redirect('pemilwa/vote_bpm');
	}
	
	//add voting bpm
	public function vote_bpm() {
		if ($this->session->userdata('login')&&$this->session->userdata('level') == 'user') {
		$data['bpm'] = $this->m_pemilwa->get_tabel('calon_bpm');
		$data['prodi'] = $this->m_pemilwa->get_tabel('prodi');
		$this->load->view('user/vote_bpm', $data);
		}else{
			redirect('login');
		}
	}

	public function add_vote_bpm() {
		$nim_pemilih = $this->session->userdata("username"); 
		$where = array(
			'nim' => $nim_pemilih
		);
		$data = array(
			'no_pilihan_bpm' => $this->input->post('dipilih')
			);
		$this->m_pemilwa->update_tabel($data, $where, 'pemilih');
		redirect('pemilwa/terimakasih');
	}

	public function detildashboard(){
		$paslon = $this->m_pemilwa->get_tabel('pasang_calon');
		for($i=0;$i<count($paslon);$i++){
			$data['paslon'][$i] = $this->m_pemilwa->get_count_paslon($paslon[$i]->no_urut);
			$data['nama_paslon'][$i] = $paslon[$i]->nama_pasangan;
		}
		$bpm = $this->m_pemilwa->get_tabel('calon_bpm');
		for($i=0;$i<count($bpm);$i++){
			$data['bpm'][$i] = $this->m_pemilwa->get_count_bpm($bpm[$i]->no_urut);
			$data['nama_bpm'][$i] = $bpm[$i]->nama_lengkap;
		}
		echo json_encode($data);
	}

}
