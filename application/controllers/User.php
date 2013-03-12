<?php
	
	class User extends CI_Controller{

		public function __construct(){
			parent::__construct();	        
		}

		public function cek_user_sudah_ada($id_facebook){
			get_number_user_by_fbid($id_facebook);
		}

		
	}
