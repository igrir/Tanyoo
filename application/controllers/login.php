<?php
	
	//ini untuk controller dari tanyoo
	
	class Login extends CI_Controller{

		public function __construct(){
			parent::__construct();
			$this->load->model('user_model');
			
		}
	
		public function check_login(){ //index disini
			$this->load->helper('url');
			$this->load->helper('form');
			$this->load->library('session');

			if($this->user_model->check_user()){
				$newdata = array(
								'username' => $this->input->post('username'),
								'LOGGED_IN' => true
							);
				$this->session->set_userdata($newdata);
				redirect('home');
			}else{
				$data['title'] = "Login to Tanyoo";
				$data['error'] = "Nampaknya anda salah memasukkan username atau password";
				$this->load->view('templates/header', $data);
				$this->load->view('login_err', $data);
				$this->load->view('templates/footer', $data);	
			}			
		}

		public function logout(){
			$this->load->helper('url');
			$this->load->library('session');
			$this->session->sess_destroy();
			redirect('tanyoo/index');
		}


	}