<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Pemilwa extends CI_Model {
	public function __construct()	{
		$this->load->database(); 
	  }  
	
	//get tabel
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

	//get count pemilih by pasang_calon

	//get count pemilih by calon_bem
}
?>