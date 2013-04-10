<?php
class tanyoo_validate{

		public function __construct(){
			//parent::__construct();	     			
		}

		function validateRestrictedChar($string){
			$restricted_chars = " ~!@#$%^&*()+=-{}|[]\\:\";'<>?,./`";


			for ($i = 0; $i < strlen($restricted_chars); $i++) {
				if (strpos($string,$restricted_chars[$i])) {
					return false;
				}
			}

			return true;
		}
	
		function validateEmail($email){
			$regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
			if (preg_match($regex, $email)) {
			     return true;
			} else { 
			     return false;
			 }
		}

	}

