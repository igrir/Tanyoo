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
	
	
	public function add_penghargaan($user,$id_peng){
		$sql="select * from user_penghargaan where username=? and id_penghargaan=?"; 
		$temp = $this->db->query($sql,array($user,$id_peng));
		if($temp->num_rows()==0)
		{
			$data = array(
				'id_penghargaan' => $id_peng,
				'username' => $user,
			);
			$this->db->insert('user_penghargaan',$data);
		}
	}
	public function data_penghargaan()
	{
		$data = $this->db->query('SELECT * FROM penghargaan');
		return $data;
	}
}