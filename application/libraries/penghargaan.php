<?php
class penghargaan{

		public function __construct(){
			//parent::__construct();	     			
		}
		public function cek_penghargaan($username){
		
			$CI = & get_instance();
			$CI->load->model('Penghargaan_model');
			$CI->load->model('User_model');
			
			$soal = $CI->Penghargaan_model->get_jumlah_soal($username);
			$jwb = $CI->Penghargaan_model->get_jumlah_jawab($username);
			$skor = $CI->User_model->get_jumlah_skor($username);
			
			$data = $CI->Penghargaan_model->data_penghargaan();
			foreach($data->result_array() as $row)
			{
				if($row['Jawab']<=$jwb and $row['Tanya']<=$soal and $row['Skor']<=$skor->skor)
				{
					$CI->Penghargaan_model->add_penghargaan($username,$row['id_penghargaan']);
				}
			}		
		}
	}