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
			$add = $this->m_pemilwa->insert_tabel($data, 'admin');
			redirect('Pemilwa/admin');
	}
	//delete admin
	function deleteadmin($id)
	{
		$where = array('id_admin' => $id);
		$delete = $this->m_pemilwa->delete_tabel($where, 'admin');
		if ($delete == TRUE) {
			echo "berhasil";
		}
		else {
			echo "tidak berhasil";
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
		$this->load->view('paslon');
	}

	//add paslon
	public function addpaslon()
	{ 
			$config['upload_path'] = './assets/image/paslon';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']  = '100000';
			$config['overwrite']  = true;
			$config['file_name']  = $this->input->post('nim_ketua');
			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('gambar')){
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
			if ($add == TRUE)
			{
				echo "berhasil tambah";
			} else {
				echo "gagal tambah";
			}
			redirect('Pemilwa/admin');
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
			$config['overwrite']  = true;
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
				if ($update == TRUE) {
					echo "berhasil";
				}
				else {
					echo "tidak berhasil";
				}
				redirect('Pemilwa/admin', 'refresh');
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
				if ($update == TRUE) {
					echo "berhasil";
				}
				else {
					echo "tidak berhasil";
				}
				redirect('Pemilwa/admin', 'refresh');
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
		redirect('Pemilwa/admin', 'refresh');
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
	public function calon_bpm()
	{
		$this->load->view('bpm');
	}
	//add calon bpm
	public function addbpm()
	{ 
			$config['upload_path'] = './assets/image/bpm';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']  = '100000';
			$config['overwrite']  = true;
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
			if ($add == TRUE)
			{
				echo "berhasil tambah";
			} else {
				echo "gagal tambah";
			}
			redirect('Pemilwa/admin');
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
			$config['overwrite']  = true;
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
				if ($update == TRUE) {
					echo "berhasil";
				}
				else {
					echo "tidak berhasil";
				}
				redirect('Pemilwa/admin', 'refresh');
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
				if ($update == TRUE) {
					echo "berhasil";
				}
				else {
					echo "tidak berhasil";
				}
				redirect('Pemilwa/admin', 'refresh');
			}
	}
	//delete calon bpm
	function deletebpm($id)
	{
		$where = array('no_urut' => $id);
		$delete = $this->m_pemilwa->delete_tabel($where, 'calon_bpm');
		if ($delete == TRUE) {
			echo "berhasil";
		}
		else {
			echo "tidak berhasil";
		}
		redirect('Pemilwa/admin', 'refresh');
	}

	//detil paslon
	public function detilbpm()
	{
		$id = $this->uri->segment(3);
		$where = array(
			'no_urut' => $id
		);
		$data = $this->m_pemilwa->detail_tabel($where, 'calon_bpm');
		echo json_encode($data);
	}
	//login

	//logout

	//add voting paslon

	//add voting bpm

}
