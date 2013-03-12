<?php
	
	class Tanyoo extends CI_Controller{

		public function __construct(){
			parent::__construct();
			

	        
		}

		public function index(){
			$this->load->helper('form');
			$this->load->library('form_validation');
			$data['title'] = "Login to Tumehsite";
			$this->load->view('templates/header', $data);
			$this->load->view('login', $data);
		}

		public function login($fbid){
			$this->load->library('user');

			$cek_user = $this->user->cek_user_sudah_ada($fbid);

			if ($cek_user == 0) {

			}
		}
		
	}