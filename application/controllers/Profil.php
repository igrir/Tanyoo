<?php
	
	// Nama kelas : Profil.php
	// Peran 	  : - Controller untuk halaman profil
	//				- Celengan

	class Profil extends CI_Controller{

		public function __construct(){
			parent::__construct();   

			//load model database user
			$this->load->model('User_model');
			$this->load->model('Celengan_model');
			$this->load->model('Penghargaan_model');
			$this->load->helper('url');			
			$this->load->library('session');
		}

		public function index($username){

				$data['profil'] = $this->User_model->get_user_by_username($username);
				$data['jml_soal'] = $this->Penghargaan_model->get_jumlah_soal($username);
				
				//var_dump($result);
				$this->load->view('templates/header', $data);
				$this->load->view('templates/header_bar', $data);
				$this->load->view('profile', $data);
				$this->load->view('templates/footer', $data);	
				
		}

		//Halaman celengan
		public function celengan($username){
			$data['profil'] = $this->User_model->get_user_by_username($username);
			$data['user_celengan'] = $this->Celengan_model->get_all_celengan_user($username);
			$this->load->view('templates/header', $data);
			$this->load->view('templates/header_bar', $data);
			$this->load->view('celengan', $data);
			$this->load->view('templates/footer', $data);
		}
		
		//Halaman penghargaan
		public function penghargaan($username){

			$data['user_penghargan'] = $this->Penghargaan_model->get_all_penghargaan($username);
			$dataaku['penghargaan'] = $this->Penghargaan_model->get_all_penghargaan($username);
			
			$this->load->view('templates/header', $data);
			$this->load->view('templates/header_bar', $data);
			$this->load->view('penghargaan', $dataaku);
			$this->load->view('templates/footer', $data);
			var_dump($data);
		}
		
		//Halaman jumlah soal
		public function jml_soal($username){
			$data['jml_soal'] = $this->Penghargaan_model->get_jumlah_soal($username);
			$data['jml_jwb'] = $this->Penghargaan_model->get_jumlah_jawab($username);
			
			$this->load->view('profile', $data);
			//var_dump($data);
		}
		
	}
