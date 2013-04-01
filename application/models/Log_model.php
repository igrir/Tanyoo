<?php
class Log_model extends CI_Model{
	public function __construct()
	{
		$this->load->database();
	}


	/* Fungsi: add_log_jawaban
	   parameter: $username, $id_soal

	   memasukkan user telah menjawab soal dengan benar
	*/
	public function add_log_jawaban($username, $id_soal){
		$query = $this->db->insert('log', array('username'=>$username,
											 'id_soal'=>$id_soal,
											 'log_type'=>1));
		return $query;
	}

	/* Fungsi: cek_log_jawaban
	   parameter: $username, $id_soal
	   output : BOOLEAN
	   mengecek apakah $username telah menjawab $id_soal.
	   Return TRUE kalau sudah
	*/
	public function cek_log_jawaban($username, $id_soal){
		$query = $this->db->get_where('log', array('username'=>$username,
												   'id_soal'=>$id_soal));

		if ($query->num_rows() > 0) {
			return true;
		}else{
			return false;
		}
	}



}