<?php
class Penghargaan_celengan_model extends CI_Model{
	public function __construct()
	{
		$this->load->database();
	}

	//return penghargaan yang dimiliki seseorang
	public function get_info_penghargaan($user){
		$sql="select a.nama_penghargaan from user_penghargaan b, penghargaan a where a.id_penghargaan = b.id_penghargaan and b.id_penghargaan = ?"; 
		$data = $this->db->query($sql,array($user)));
		return $data->result();
	
	}/* 
	public function get_info_penghargaan($user){
		$this->db->order_by("id_penghargaan","desc");
		$data = $this->db->get_where('user_penghargaan',array('username'=>$user));	
	
	} */

	public function add_penghargaan(){

	}

}