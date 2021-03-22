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
	
	//get count pemilih

	//get count pemilih by prodi
	function get_count_prodi($no_urut, $id_prodi) {
		$query = $this->db
		->where(['no_pilihan_pasangan'=>$no_urut,
		'id_prodi' => $id_prodi])
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
}
?>
