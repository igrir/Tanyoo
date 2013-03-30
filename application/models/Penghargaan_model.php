<?php
class Penghargaan_model extends CI_Model{
	public function __construct()
	{
		$this->load->database();
	}

	//return penghargaan yang dimiliki seseorang
	public function get_all_penghargaan($user){
		$sql="select a.nm_penghargaan from user_penghargaan b, penghargaan a where a.id_penghargaan = b.id_penghargaan and b.username = ?"; 
		$temp = $this->db->query($sql,array($user));
		if($temp->num_rows()>0)
		{
			return $temp->result();
		}
		else
		{
			return false;
		}
	}
	
	public function get_jumlah_soal($user){
		$this->db->select('text_soal');
		$data = $this->db->get_where('soal', array('username' => $user));
		$data = $data->num_rows();
		return $data;
	}
	
	public function get_jumlah_jawab($user){
		$this->db->order_by("id_log", "desc");
		$data = $this->db->get_where('log', array('username' => $user,'log_type'=>2));
		$data = $data->num_rows();
		return $data;
	}
}