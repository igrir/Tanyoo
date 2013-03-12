<?php
class Soal_model extends CI_Model{
	public function __construct()
	{
		$this->load->database();
	}


	//return semua isi soal dalam bentuk array
	public function get_info_soal($id_soal){

	}

	//menambah soal baru
	public function add_soal(){

	}

	//mengedit soal
	public function edit_soal($id_soal){

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