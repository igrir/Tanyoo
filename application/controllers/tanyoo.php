<?php
	//di comment ajah
	
	//ini untuk controller dari tanyoo
	//ngedit buat yola nambah
	class Tanyoo extends CI_Controller{

		public function __construct(){
			parent::__construct();
		}
		
		//comment lagi
		public function index(){ //index disini
			$this->load->helper('url');
			$this->load->helper('form');
			$this->load->library('form_validation');
			$data['title'] = "Login to Tumehsite";
			$this->load->view('templates/header', $data);
			$this->load->view('login', $data);
			$this->load->view('templates/footer', $data);
		}

		public function login($fbid){
			$this->load->library('user_lib');
			$this->load->helper('url');

			$cek_user = $this->user_lib->cek_user_sudah_ada($fbid);


			//kalau belum ada user
			if ($cek_user == 0) {
				//daftar dulu
				redirect("register");
			}else{
				//langsung masuk
				redirect("home");
			}
		}
		
		public function register(){
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->load->helper('url');

			$data['title'] = "Daftar";

			$this->load->view('templates/header', $data);
			$this->load->view('register', $data);
			$this->load->view('templates/footer', $data);
		}

		public function tanya(){
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->load->helper('url');

			$data['title'] = "Daftar";

			$this->load->view('templates/header', $data);
			$this->load->view('tanya', $data);
			$this->load->view('templates/footer', $data);
		}

		public function home(){

			$data['title'] = "Home";
			echo 
			$this->load->view('templates/header', $data);
			$this->load->view('home', $data);
			$this->load->view('templates/footer', $data);
		}

	}