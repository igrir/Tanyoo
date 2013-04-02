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

			$username = $_GET['username'];

			$this->load->library('user_lib');
			$this->load->helper('url');

			$cek_user = $this->user_lib->cek_username($username);
			echo $cek_user;
		}

		public function add_user(){

			$this->load->helper('url');

			//cek dulu apa ada user yang sama di database
			//kalau nggak ada baru dimasukkan

			$user_exist = $this->user_model->count_this_user_exist($this->input->post('username'));
			
			if ($user_exist == 0) {
				$add_user = $this->user_model->add_user();
				if($add_user){
					redirect("index");
				}else{
					echo "can't add database";
				}
			}else{
				redirect('register_w');
			}

		}
	}
