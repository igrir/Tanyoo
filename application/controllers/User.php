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
			$this->load->library('tanyoo_validate');

			//cek dulu apa ada user yang sama di database
			//kalau nggak ada baru dimasukkan

			$user_exist = $this->user_model->count_this_user_exist($this->input->post('username'));
			
			$email = $this->input->post('email');
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			if ($user_exist == 0) {

				if ($this->tanyoo_validate->validateRestrictedChar($username) == false) {
					redirect('register_w/2');
				}else{
					if ($this->tanyoo_validate->validateEmail($email) == false) {
						redirect('register_w/3');
					}else{
						if ($password == "") {
							redirect('register_w/4');
						}else{
							$add_user = $this->user_model->add_user();
						
							if($add_user){
								redirect("congrats_r");
							}else{
								echo "can't add database";
							}
						}	
					}
				}
			}else{
				redirect('register_w/1');
			}

		}
	}
