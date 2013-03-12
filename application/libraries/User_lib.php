<?php
	
	class User_lib{

		public function __construct(){
			//parent::__construct();	     

			
		}

		public function cek_user_sudah_ada($id_facebook){
			$CI = & get_instance();
			$CI->load->model('User_model');

			return $CI->User_model->get_number_user_by_fbid($id_facebook);
		}

		public function cek_username($username){
			$CI = & get_instance();
			$CI->load->model('User_model');

			return $CI->User_model->get_number_user_by_username($username);
		}

		
	}
