<?php
class User_model extends CI_Model{
	public function __construct()
	{
		$this->load->database();
	}

	//cek banyak user yang dicari berdasarkan id fb nya
	public function get_number_user_by_fbid($id_facebook){
		$query = $this->db->get_where('user', array('id_fb' => $id_facebook));
		return $query->num_rows();
	}

}