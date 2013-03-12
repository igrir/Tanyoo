<?php
	
	class Tanyoo extends CI_Controller{

		public function __construct(){
			parent::__construct();
			

	        // $CI = & get_instance();
	        // $CI->config->load("facebook",TRUE);
	        // $config = $CI->config->item('facebook');
	        
	        // $this->load->library('facebook', $config);
	        
		}

		public function index(){
			$this->load->helper('form');
			$this->load->library('form_validation');

			$data['title'] = "Login to Tumehsite";

			$this->load->view('register', $data);
		}

		public function logout(){
			$data['title'] = "Telah logout";

			$this->facebook->destroySession();

			$this->load->view('templates/header', $data);
			$this->load->view('templates/content', $data);
			$this->load->view('templates/footer', $data);
		}

		
	}