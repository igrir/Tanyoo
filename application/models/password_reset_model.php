<?php
class Password_reset_model extends CI_Model{
	public function __construct()
	{
		$this->load->database();
	}

	public function get_last_id(){

		$this->db->order_by("id_reset","desc");
		$hasil = $this->db->get("password_reset", 1, 0);

		//hitung dulu banyak id
		if ($hasil->num_rows() == 0) {
			return 0;
		}else{
			$hasil = $hasil->row();
			return $hasil->id_reset;
		}

	}

	public function add_pr($username, $email, $random){

		$data = array(
				'username' => $username,
				'email'  => $email,
				'random' => $random
				);

		return $this->db->insert('password_reset', $data);

	}


	public function get_from_randkey($randkey){
		$query = $this->db->get_where('password_reset', array('random' => $randkey,
															  'used'   => 0));
		return $query;
	}

	//mengeset record reset sudah dipakai
	public function set_used($id_reset, $used){
		$query = $this->db->update('password_reset', array('used' => $used));
		return $query;
	}

}