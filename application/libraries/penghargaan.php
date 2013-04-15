<?php
class penghargaan{

		public function __construct(){
			//parent::__construct();	     			
		}

		public function cek_penghargaan($username){
		
			$CI = & get_instance();
			$CI->load->model('Penghargaan_model');
			$CI->load->model('User_model');
			$CI->load->model('Log_model');
			$CI->load->model('Soal_model');
			
			$soal = $CI->Soal_model->get_jumlah_soal_1($username);
			$jwb = $CI->Log_model->get_skor_from_username($username);
			$data = $CI->Penghargaan_model->data_penghargaan();
			foreach($data->result_array() as $row)
			{
				if($row['Jawab']<=$jwb and $row['Tanya']<=$soal)
				{
					$CI->Penghargaan_model->add_penghargaan($username,$row['id_penghargaan']);
				}
			}		
		}
	}