<?php
class Celengan_model extends CI_Model{
	public function __construct()
	{
		$this->load->database();
	}


	//mendapatkan semua celengan dari username
	public function get_all_celengan_user($username){
		$data = $this->db->get_where('celengan', array('username'=>$username));
		return $data->result();
	}

	//menambah celengan baru
	public function add_celengan($data){
		$this->db->insert('celengan',$data);
	}

	//menghapus celengan berdasarkan id celengan
	public function delete_celengan($id){
		$this->db->delete('celengan', array('id' => $id));
	}

	//edit dari celengan
	public function edit_celengan(){

	}

	//menambah isi
	public function add_isi_celengan(){
		
	}

	//menghapus isi celengan
	public function delete_isi_celengan(){

	}

}