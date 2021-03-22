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
			$add = $this->m_pemilwa->update_tabel($data, $where, 'admin');
			redirect('Pemilwa/admin');
	}
	//delete admin
	function deleteadmin($id)
	{
		$where = array('id_admin' => $id);
		$delete = $this->m_pemilwa->delete_tabel($where, 'admin');
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
				redirect('Pemilwa/paslon', 'refresh');
			}
	}

	//delete paslon
	function deletepaslon($id)
	{
		$where = array('no_urut' => $id);
		$delete = $this->m_pemilwa->delete_tabel($where, 'pasang_calon');
		if ($delete == TRUE) {
			echo "berhasil";
		}
		else {
			echo "tidak berhasil";
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
				redirect('Pemilwa/bpm', 'refresh');
			}
	}
	//delete calon bpm
	function deletebpm($id)
	{
		$where = array('no_urut' => $id);
		$delete = $this->m_pemilwa->delete_tabel($where, 'calon_bpm');
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
		redirect('Pemilwa/pemilih', 'refresh');
	}
	//delete pemilih
	function deletepemilih($id)
	{
		$where = array('nim' => $id);
		$delete = $this->m_pemilwa->delete_tabel($where, 'pemilih');
		redirect('Pemilwa/pemilih', 'refresh');
	}
	//login

	//logout

	//add voting paslon

	//add voting bpm

}
