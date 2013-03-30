<?php
class Isi_celengan_model extends CI_Model{
	public function __construct()
	{
		$this->load->database();
	}

	//return semua isi soal dalam bentuk array
	public function get_info_celengan($id_celengan){

	}

	public function add_isi($data){
		$query = $this->db->insert('isi_celengan', $data);
		return $query;
	}

	//mendapatkan semua isi celengan
	public function get_all_isi_celengan($id_celengan){
		$query = $this->db->get_where('isi_celengan', array('id_celengan'=>$id_celengan));
		return $query->result();
	}

	public function delete_isi($id_celengan, $id_soal){
		$query = $this->db->delete('isi_celengan', array('id_celengan'=>$id_celengan,
												'id_soal'=>$id_soal));
		return $query;
	}

	//mengecek celengan X sudah punya soal Y
	public function is_celengan_have_soal_id($id_celengan, $id_soal){
		$query = $this->db->get_where('isi_celengan', array('id_celengan'=>$id_celengan, 'id_soal'=>$id_soal));
		if ($query->num_rows() > 0) {
			return true;
		}else{
			return false;
		}
	}

}