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

	//cek banyak user berdasarkan usernamenya
	public function get_number_user_by_username($username){
		$query = $this->db->get_where('user', array('username' => $username));
		return $query->num_rows();
	}


	public function add_user(){
		$data = array(
				'username'  => $this->input->post('username'),
				'id_fb'  => $this->input->post('fbid'),
				'skor'  => 0,
				'bio' => $this->input->post('bio'),
				'minat' => $this->input->post('minat')
				);

		return $this->db->insert('user', $data);
	}

}