<?php
class User_model extends CI_Model{
	public function __construct()
	{
		$this->load->database();
	}

	//mendapatkan banyak pengguna keseluruhan
	public function get_num_user(){
		$query = $this->db->get('user')->num_rows();
		return $query;
	}


	//cek banyak user yang dicari berdasarkan id fb nya
	// public function get_number_user_by_fbid($id_facebook){
	// 	$query = $this->db->get_where('user', array('id_fb' => $id_facebook));
	// 	return $query->num_rows();
	// }

	public function get_user_by_username($username){
		$this->db->select('username, bio, minat');
		$query = $this->db->get_where('user', array('username' => $username));
		return $query->row();
	}

	//cek banyak user berdasarkan usernamenya
	public function get_number_user_by_username($username){
		$query = $this->db->get_where('user', array('username' => $username));
		return $query->num_rows();
	}

	//MENGECEK USER APAKAH ADA
	//digunakan pada login
	public function check_user(){
		$query = $this->db->get_where('user', array('username' => $this->input->post('username'),
													'password' => $this->input->post('password')));

		if ($query->num_rows == 1) {
			return true;
		}else{
			return false;
		}
	}

	//MENGECEK USER DAN PASSWORD BENAR
	//digunakan untuk mengecek dengan inputan dari parameter
	public function check_username_password($username, $password){
		$query = $this->db->get_where('user', array('username' => $username,
													'password' => $password));

		if ($query->num_rows == 1) {
			return true;
		}else{
			return false;
		}
	}


	//fungsi menghitung apakah ada user dengan username yang dimaksud
	public function count_this_user_exist($username){
		$query = $this->db->get_where('user', array('username' => $username));

		return $query->num_rows();


	}

	public function add_user(){
		$data = array(
				'username'  => $this->input->post('username'),
				'password'  => $this->input->post('password'),
				'skor'  => 0,
				'bio' => $this->input->post('bio'),
				'minat' => $this->input->post('minat')
				);

		return $this->db->insert('user', $data);
	}
	
	//ubah profil
	function selectuser($username){
			// $data = $this->db->get_where('user', array('username' => $username));
			// return $data;
		$this->db->select('username, bio, minat');
		$query = $this->db->get_where('user', array('username' => $username));
		return $query->row();
	}
	
	function simpan_profile_ubah($username, $data){
		$this->db->where("username",$username);
		$this->db->update("user",$data);
	}
	
	//fungsi mengambil skor untuk penghargaan
	function get_jumlah_skor($username){

		//cara mendapatkan skor didapat dari LOG sebenarnya
		$this->db->select('skor');
		$query = $this->db->get_where('user', array('username' => $username));
		return $query->row();
	}

	function change_password($username, $password){
		$this->db->where("username", $username);
		$this->db->update('user', array('password'=>$password));
	}
}