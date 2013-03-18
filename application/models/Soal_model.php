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


	//return semua isi soal dalam bentuk array
	public function get_info_soal($id_soal){

	}

	//menambah soal baru
	public function add_soal($data){
		$this->db->insert('soal', $data); //insert ke tabel soal
		return $this->db->insert_id();
	}

	//mengedit soal
	public function edit_soal(){
		
	}
	
	function selectsoal ($id_soal){
			$data = $this->db->get_where('soal', array('id_soal' => $id_soal));
			return $data;
	}	
	
	function simpan_ubah(){
		$this->db->where("id_soal",$_POST['id_soal']);
		$this->db->update("soal",$_POST); 
		redirect('','refresh');
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