<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Pemilwa extends CI_Model {
	public function __construct()	{
		$this->load->database(); 
	  }  
	
	//get 
    public function get_tabel($tabel)
	{
		$query = $this->db->get($tabel);
		return $query->result();
	}

	//insert tabel
    function insert_tabel($data, $tabel){
		$this->db->insert($tabel,$data);
		if($this->db->affected_rows()>0){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	//detail tabel
    function detail_tabel($where, $tabel){		
		$query = $this->db
        ->where($where)        
        ->get($tabel)
		->row();
		return $query;	
	}

	//delete tabel
    function delete_tabel($where, $tabel){
		$this->db->delete($tabel, $where);
		if($this->db->affected_rows()>0){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	//update tabel
	function update_tabel($data, $where, $tabel){
		$this->db->where($where);
		$this->db->update($tabel, $data);
		if($this->db->affected_rows()>0){
			return TRUE;
		}else{
			return FALSE;
		}
	}
	
	//get count pemilih done
	function get_count_pemilih_done() {
		$query = $this->db
		->where('no_pilihan_pasangan !=', null)
		->where('no_pilihan_bpm !=', null)
		->from('pemilih')
		->count_all_results();
		return $query;
	}
	//get count pemilih all
	function get_count_pemilih() {
		$query = $this->db
		->from('pemilih')
		->count_all_results();
		return $query;
	}
	//get count pemilih by prodi
	function get_count_prodi($id_prodi) {
		$query = $this->db
		->where('id_prodi' , $id_prodi)
		->where('no_pilihan_pasangan !=', null)
		->where('no_pilihan_bpm !=', null)
		->from('pemilih')
		->count_all_results();
		return $query;
	}

	//get count pemilih by pasang_calon
	function get_count_paslon($no_urut) {
		$query = $this->db
		->where('no_pilihan_pasangan', $no_urut)
		->from('pemilih')
		->count_all_results();
		return $query;
	}

	//get count pemilih by calon_bem
	function get_count_bpm($no_urut) {
		$query = $this->db
		->where('no_pilihan_bpm', $no_urut)
		->from('pemilih')
		->count_all_results();
		return $query;
	}
	function can_login_user($where, $userpass) {
		$query = $this->db->where($where)->get('pemilih');
        if($this->db->affected_rows()>0){
			$data_login = $query->row();
			if (password_verify($userpass, $data_login->password)) {
            $data_session = array(
                'username' => $data_login->nim,
				'login' => TRUE,
				'isVote' => ($data_login->no_pilihan_bpm != null || $data_login->no_pilihan_pasangan != null) ? TRUE: FALSE,
				'level' => 'user'
            );
            $this->session->set_userdata($data_session);
			return true;
			}
			else{
				return false;
			}
		}
		else{
			return false;
		}
	}
	function can_login_admin($where, $userpass) {
		$query = $this->db->where($where)->get('admin');
        if($this->db->affected_rows()>0){
			$data_login = $query->row();
			if (password_verify($userpass, $data_login->password)) {
            $data_session = array(
                'username' => $data_login->username,
				'login' => TRUE,
				'isVote' => FALSE,
				'level' => 'admin'
            );
            $this->session->set_userdata($data_session);
			return true;
			}
			else{
				return false;
			}
		}
		else{
			return false;
		}
	}
}
?>
