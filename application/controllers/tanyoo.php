<?php
	//di comment ajah
	class Tanyoo extends CI_Controller{

		public function __construct(){
			parent::__construct();
			

	        
		}

		public function index(){
			$this->load->helper('url');
			$this->load->helper('form');
			$this->load->library('form_validation');
			$data['title'] = "Login to Tumehsite";
			$this->load->view('templates/header', $data);
			$this->load->view('login', $data);
		}

		public function login($fbid){
			$this->load->library('user_lib');
			$this->load->helper('url');

			$cek_user = $this->user_lib->cek_user_sudah_ada($fbid);


			//kalau belum ada user
			if ($cek_user == 0) {
				//daftar dulu
				$this->register();
			}else{
				//langsung masuk
				$this->home();
			}
		}
		
		public function register(){
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->load->helper('url');

			$data['title'] = "Daftar";

			$this->load->view('templates/header', $data);
			$this->load->view('register', $data);
		}

		public function home(){

			$data['title'] = "Home";

			$this->load->view('templates/header', $data);
			$this->load->view('home', $data);
		}

	}