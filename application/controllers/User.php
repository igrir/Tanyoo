<?php
	
	//untuk handle API

	class User extends CI_Controller{

		public function __construct(){
			parent::__construct();   

			//load model database user
			$this->load->model('user_model');
			$this->load->library('sessionlogin');
		}

		public function index(){
			echo "index";
		}


		//API mendapatkan banyak user
		public function get_num_user(){
			$this->sessionlogin->cek_login();

			$username = $_GET['username'];

			$this->load->library('user_lib');
			$this->load->helper('url');

			$cek_user = $this->user_lib->cek_username($username);
			echo $cek_user;
		}

		public function add_user(){
			$this->sessionlogin->cek_login();
			
			$this->load->helper('url');

			if($this->user_model->add_user()){
				redirect("index");
			}else{
				echo "can't add database";
			}
		}
	}
