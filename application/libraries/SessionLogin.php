<?php
	
	class sessionlogin{

		public function __construct(){
			//parent::__construct();	     


			
		}

		/*
			function : cek_login
			Meyakinkan user memang sedang login, kalau tidak login user akan langsung di redirect ke halaman login
		*/

		public function cek_login(){
			$CI = & get_instance();

			$CI->load->library('session');
			$CI->load->helper('url');

			$logged_in = $CI->session->userdata('LOGGED_IN');

			if (!$logged_in) {
				redirect('tanyoo/index');
			}
			
		}
		
	}
