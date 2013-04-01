<?php
class Soal_model extends CI_Model{
	public function __construct()
	{
		$this->load->database();
	}
	
	function selectAll(){
			$this->db->order_by("id_soal", "desc"); 
			return $this->db->get('soal')->result(); //nama tabelnya soal
	}
	
	
	//mengambil soal-soal berdasarkan user tertentu
	function selectByUser($user){
		$this->db->order_by("id_soal", "desc"); 
		$data = $this->db->get_where('soal', array('username' => $user));
		return $data->result();
	}

	//menambah soal baru
	public function add_soal($data){
		$this->db->insert('soal', $data); //insert ke tabel soal
	}

	//mengedit soal
	public function edit_soal(){
		
	}
	
	function selectsoal ($id_soal){
			$data = $this->db->get_where('soal', array('id_soal' => $id_soal));
			return $data;
	}	

	function get_random_soal(){
		$query = 'SELECT * FROM `soal` WHERE locked=0 ORDER BY RAND() LIMIT 0,1';
		$data = $this->db->query($query);

		return $data->row();
	}
	
	function simpan_ubah($id_soal, $data){
		//$this->db->where("id_soal",$_POST['id_soal']);
		//$this->db->update("soal",$_POST);
		$this->db->where("id_soal",$id_soal);
		$this->db->update("soal",$data);
		//redirect('','refresh');
	}
	
	function proses_cari_soal($cari){
		$this->db->like('tag', $cari, 'both'); //%like%
		$data = $this->db->get('soal');
		//$data = $this->db->get_where('soal', array('tag' => $cari));
		return $data->result();
	}
	
	function jawab_soal_id($id_soal){
		$data = $this->db->get_where('soal', array('id_soal' => $id_soal));
		return $data->row();
	}

	//menambah flag
	public function add_flag($id_soal){

	}

	//mengurangi flag
	public function decrease_flag($id_soal){

	}

	//memberi lock
	public function set_lock(){

	}

	//melepaskan lock
	public function unset_lock(){

	}

}