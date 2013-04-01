<?php
	//nama kelas : penghargaan.php
	// Peran 	  : Controller untuk menampilkan penghargaan

	class Penghargaan extends CI_Controller{

		public function __construct(){
			parent::__construct();   

			//load model database user
			$this->load->model('Penghargaan_model');
		}
		
		public function index($username){
			$result = $this->Penghargaan_model->get_all_penghargaan($username);
			var_dump($result);
		}
		
		public function cek_penghargaan($username){
			$soal = $this->Penghargaan_model->get_jumlah_soal($username);
			$jwb = $this->Penghargaan_model->get_jumlah_jawab($username);
			if($soal<=51 and $jwb<=51)
			{
				if($soal>=11 and $jwb>=11)
				{
					$this->Penghargaan_model->add_penghargaan($username,3);
				}
				else if($soal<10 and $jwb>=10)
				{
					$this->Penghargaan_model->add_penghargaan($username,1);
				}
				else if($soal>=10 and $jwb<10)
				{
					$this->Penghargaan_model->add_penghargaan($username,2);
				}
			}
			else if($soal<51 and $jwb>=50)
			{
				$this->Penghargaan_model->add_penghargaan($username,4);
			}
			else if($soal>=50 and $jwb<51)
			{
				$this->Penghargaan_model->add_penghargaan($username,5);
			}
			else
			{
				$this->Penghargaan_model->add_penghargaan($username,6);
			}				
		}

	}

