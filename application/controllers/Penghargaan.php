<?php
	//nama kelas : penghargaan.php
	// Peran 	  : Controller untuk menampilkan penghargaan

	class Penghargaan extends CI_Controller{

		public function __construct(){
			parent::__construct();   

			//load model database user
			$this->load->model('User_model');
			
		}
		
		public function index($username){
			$result = $this->User_model->get_info_penghargaan($username);
			var_dump($result);
		}

	}

