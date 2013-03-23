<?php
	
	// Nama kelas : Profil.php
	// Peran 	  : Controller untuk halaman profil

	class Profil extends CI_Controller{

		public function __construct(){
			parent::__construct();   

			//load model database user
			$this->load->model('User_model');
			
		}

		public function index($username){
			$result = $this->User_model->get_user_by_username($username);
			var_dump($result);
		}

	}
