<?php

	/*
	// Nama kelas : Soal.php
	// Peran 	  : Controller untuk soal
					- index, index dari soal, bisa menambah soal dan edit
					- add, handle request POST menambah soal
					
					- ubah, halaman edit
					- simpan_ubah, handle request POST mengubah soal


	*/

	class Soal extends CI_Controller{
		function __construct(){
			parent :: __construct();
			$this->load->helper('url'); 
			$this->load->model('Soal_model'); //meload data dari soal_model
			$this->load->library('session');

			// load library
			$this->load->library(array('table','form_validation'));		

			$this->load->model('Log_model');
			$this->load->library('sessionlogin');
		}
		
		function index(){
			// $this->sessionlogin->cek_login();

			// $this->load->library('session');
			// $username = $this->session->userdata('username');
			// $data['data_soal']=$this->Soal_model->selectByUser($username);
			
			// $this->load->vars($data);
			// $this->load->view('templates/header', $data);
			// $this->load->view('templates/header_bar', $data);
			// $this->load->view('soal_view',$data); //soal_view menampung data dari $data
			// $this->load->view('templates/footer_logout', $data);

			$this->sessionlogin->cek_login();

			$this->load->library('pagination');
			$this->load->library('session');

			$username = $this->session->userdata('username');
			$per_page = 10;			//banyaknya konten ditampilkan

			$halaman = $this->uri->segment(3);
			if ($halaman == "") {
				$halaman = 1;
			}			

			$config['base_url']   = base_url()."index.php/soal/index/";
			$config['total_rows'] = $this->Soal_model->get_jumlah_soal($username);;
			$config['per_page']   = $per_page;
			$config['first_link'] = 'First';
			$config['last_link'] = 'Last';
			$this->pagination->initialize($config);			
			
			$data['data_soal']=$this->Soal_model->selectByUserPagination($username, $halaman, $per_page);
			
			$this->load->vars($data);

			$data['pagination_link'] = $this->pagination->create_links();

			$this->load->view('templates/header', $data);
			$this->load->view('templates/header_bar', $data);
			$this->load->view('soal_view',$data); //soal_view menampung data dari $data
			$this->load->view('templates/footer_logout', $data);
		}

		//soal dengan halaman
		function p(){
			$this->load->library('pagination');

			$halaman = $this->uri->segment(3);
			if ($halaman == "") {
				$halaman = 1;
			}

			$per_page = 20;			//banyaknya konten ditampilkan

			$username = $this->session->userdata('username');

			$config['base_url']   = base_url()."index.php/soal/p/";
			$config['total_rows'] = $this->Soal_model->get_jumlah_soal($username);;
			$config['per_page']   = $per_page;

			$this->pagination->initialize($config);

			$this->sessionlogin->cek_login();

			$this->load->library('session');
			$username = $this->session->userdata('username');
			$data['data_soal']=$this->Soal_model->selectByUserPagination($username, $halaman, $per_page);
			
			$this->load->vars($data);


			$data['pagination_link'] = $this->pagination->create_links();

			$this->load->view('templates/header', $data);
			$this->load->view('templates/header_bar', $data);
			$this->load->view('soal_view',$data); //soal_view menampung data dari $data
			$this->load->view('templates/footer_logout', $data);
		}

		function add(){
			$this->sessionlogin->cek_login();

			$this->load->library('session');
			
			if($_POST==NULL){
				redirect('soal/index'); 
			}else{
				$data = array(
                            'text_soal' => $this->input->post('soal'),
                            'jawaban' => $this->input->post('jawaban') ,
			    'flag' => 0,
                            'tag' => $this->input->post('tag'),
			    'username' => $this->session->userdata('username'),
			    'locked' => 0);
				
				$this->Soal_model->add_soal($data);
				redirect('soal/index'); 
			}			 
		}
		
		function ubah($id_soal){
			$this->sessionlogin->cek_login();

			$id_soal = $this->uri->segment(3);

			$data['data_soal']= $this->Soal_model->selectsoal($id_soal); 
			$data['num_penjawab'] = $this->Log_model->get_num_penjawab($id_soal);
			$data['num_flag'] = $this->Log_model->get_num_flag($id_soal);

			$this->load->view('templates/header', $data);
			$this->load->view('templates/header_bar', $data);
			$this->load->view('soal_ubah',$data);
			$this->load->view('templates/footer_logout', $data);
			
		}
		
		function simpan_ubah(){
			$this->sessionlogin->cek_login();

			$this->load->library('session');
			
			if($_POST==NULL){
				redirect('soal/add');
			}else{
				$id_soal = $this->input->post('id_soal');
				
				$data = array(
					'text_soal' => $this->input->post('soal'),
					'locked' => $this->input->post('lock'),
					'jawaban' => $this->input->post('jawaban'),
					'tag' => $this->input->post('tag'),
					'username' => $this->session->userdata('username'));
				
				$this->Soal_model->simpan_ubah($id_soal, $data);
				
				redirect('soal/index','refresh');
			}
		}

		function cari_soal(){ //menampilkan form pencarian
			$this->sessionlogin->cek_login();

			$this->load->view('templates/header');
			$this->load->view('templates/header_bar_search');
			$this->load->view('cari_soal_view');
			$this->load->view('templates/footer_logout');
		}
		
		function proses_cari_soal(){ //memproses pencarian
			$this->sessionlogin->cek_login();

			$cari = $this->input->post('cari');
			
			$data['data_soal']=$this->Soal_model->proses_cari_soal($cari);		
			
			$this->load->view('templates/header', $data);
			$this->load->view('templates/header_bar_search', $data);
			$this->load->view('cari_soal_view',$data);
			$this->load->view('templates/footer_logout', $data);
			
		}

		/* Fungsi: jawab
		   akses: index.php/jawab/
		   parameter: -
		   output: NULL

		   menampilkan soal yang didapat secara acak dari
		   kesukaan pengguna
		   Tapi sementara ini pakai dulu saja secara acak
		*/
		function jawab(){
			$this->sessionlogin->cek_login();

			$username = $this->session->userdata('username');

			$banyak_soal = $this->Soal_model->get_num_total_soal();

			if ($banyak_soal <= 0) {
				//kalau nggak ada soal
				$this->load->view('templates/header');
				$this->load->view('templates/header_bar');
				$this->load->view('tidak_ada_pertanyaan');
				$this->load->view('templates/footer_logout');
			}else{
				$soal = $this->Soal_model->get_random_soal();

				$data['soal'] = $soal;
				$data['flagged'] = $this->Log_model->cek_log_flag($username, $soal->id_soal);
				
				$data['num_penjawab'] = $this->Log_model->get_num_penjawab($soal->id_soal);
				$data['num_flag'] = $this->Log_model->get_num_flag($soal->id_soal);

				$data['dijawab'] = $this->Log_model->cek_log_jawaban($username, $soal->id_soal);

				$this->load->view('templates/header');
				$this->load->view('templates/header_bar');
				$this->load->view('jawab_pertanyaan', $data);
				$this->load->view('templates/footer_logout');
			}

			
		}

		/* Fungsi: jawab_id
		   akses: index.php/jawab/[id_soal]
		   parameter: $id_soal
		   output: NULL

		   mmenjawab soal dengan id tertentu
		*/
		function jawab_id(){
			$this->sessionlogin->cek_login();

			$username = $this->session->userdata('username');
			
			$id_soal = $this->uri->segment(2);

			$cek_sudah_dihapus = $this->Soal_model->is_soal_deleted($id_soal);

			$soal = $this->Soal_model->jawab_soal_id($id_soal);



			if ($cek_sudah_dihapus == TRUE) {
				$this->load->view('templates/header');
				$this->load->view('templates/header_bar');
				$this->load->view('pertanyaan_hilang');
				$this->load->view('templates/footer_logout');	
			}else{
				$data['soal'] = $this->Soal_model->jawab_soal_id($this->uri->segment(2));
				$data['flagged'] = $this->Log_model->cek_log_flag($username, $soal->id_soal);
				$data['num_penjawab'] = $this->Log_model->get_num_penjawab($soal->id_soal);
				$data['num_flag'] = $this->Log_model->get_num_flag($soal->id_soal);

				$data['dijawab'] = $this->Log_model->cek_log_jawaban($username, $soal->id_soal);

				$this->load->view('templates/header');
				$this->load->view('templates/header_bar');
				$this->load->view('jawab_pertanyaan', $data);
				$this->load->view('templates/footer_logout');	
			}

			
		}

		/* Fungsi: cek_jawab
		   akses: index.php/soal/cek_jawab
		   parameter: -
		   output: NULL

		   mengecek jawaban
		*/
		function cek_jawab(){
			$this->sessionlogin->cek_login();
			
			$username = $this->session->userdata('username');

			if($_POST==NULL){
				redirect('index');
			}else{
				$id_soal = $this->input->post('id');
				$jawaban = $this->input->post('jawaban');

				$info_soal = $this->Soal_model->selectsoal($id_soal);
				$row = $info_soal->row();

				$jawaban_benar = $row->jawaban;

				$data['soal'] = $row;

				//cek jawaban
				if ( strtoupper($jawaban) == strtoupper($jawaban_benar) ) {

					//masukkan ke log jawabannya benar

					//cek dulu apakah user sudah pernah menjawab soal ini
					if ($this->Log_model->cek_log_jawaban($username, $id_soal) == FALSE) {

						$this->Log_model->add_log_jawaban($username, $id_soal);

					}
					$data['soal'] = $row;
					$data['flagged'] = $this->Log_model->cek_log_flag($username, $row->id_soal);
					$data['num_penjawab'] = $this->Log_model->get_num_penjawab($row->id_soal);
					$data['num_flag'] = $this->Log_model->get_num_flag($row->id_soal);

					$data['dijawab'] = $this->Log_model->cek_log_jawaban($username, $row->id_soal);

					$this->load->view('templates/header');
					$this->load->view('templates/header_bar');
					$this->load->view('jawab_benar', $data);
					$this->load->view('templates/footer_logout');
				}else{
					$data['soal'] = $row;
					$data['flagged'] = $this->Log_model->cek_log_flag($username, $row->id_soal);
					$data['num_penjawab'] = $this->Log_model->get_num_penjawab($row->id_soal);
					$data['num_flag'] = $this->Log_model->get_num_flag($row->id_soal);

					$data['dijawab'] = $this->Log_model->cek_log_jawaban($username, $row->id_soal);

					$this->load->view('templates/header');
					$this->load->view('templates/header_bar');
					$this->load->view('jawab_salah', $data);
					$this->load->view('templates/footer_logout');
				}

			}
		}


		/* Fungsi: flag_soal
		   akses: index.php/soal/flag_soal
		   parameter: $id_soal
		   output: NULL

		   memberi flag pada soal yang dimaksudkan
		*/
		function flag_soal($id_soal){
			// $id_soal = $this->Soal_model->selectsoal($this->uri->segment(3));

			$username = $this->session->userdata('username');

			$query = $this->Log_model->add_log_flag($username, $id_soal);

			if ($query) {
				redirect('soal/flagged/'.$id_soal);
			}
		}

		/* Fungsi: flagged
		   akses: index.php/soal/flagged
		   parameter: $id_soal
		   output: NULL

		   tampilan soal sudah di flag
		*/
		function flagged($id_soal){
			$username = $this->session->userdata('username');

			$info_soal = $this->Soal_model->selectsoal($id_soal);
			$row = $info_soal->row();

			$data['soal'] = $row;
			$data['num_penjawab'] = $this->Log_model->get_num_penjawab($row->id_soal);
			$data['num_flag'] = $this->Log_model->get_num_flag($row->id_soal);

			$data['dijawab'] = $this->Log_model->cek_log_jawaban($username, $row->id_soal);

			$this->load->view('templates/header');
			$this->load->view('templates/header_bar');
			$this->load->view('flagged_soal', $data);
			$this->load->view('templates/footer_logout');
		}

		/* Fungsi: unflag_soal
		   akses: index.php/soal/unflag_soal
		   parameter: $id_soal
		   output: NULL

		   memberi flag pada soal yang dimaksudkan
		*/
		function unflag_soal($id_soal){
			// $id_soal = $this->Soal_model->selectsoal($this->uri->segment(3));

			$username = $this->session->userdata('username');

			$query = $this->Log_model->remove_log_flag($username, $id_soal);

			if ($query) {
				redirect('jawab/'.$id_soal);
			}
		}
		

		/* Fungsi: hapus
		   akses: index.php/soal/hapus
		   parameter: $id_soal
		   output: NULL

		   menanyakan konfirmasi hapus
		*/

		function hapus($id_soal){
			$this->sessionlogin->cek_login();

			$id_soal = $this->uri->segment(3);

			$data['data_soal']= $this->Soal_model->selectsoal($id_soal); 
			$data['num_penjawab'] = $this->Log_model->get_num_penjawab($id_soal);
			$data['num_flag'] = $this->Log_model->get_num_flag($id_soal);

			$this->load->view('templates/header', $data);
			$this->load->view('hapus_pertanyaan',$data);
			$this->load->view('templates/footer', $data);
			
		}
		
		/* Fungsi: del_soal
		   akses: index.php/soal/del_soal
		   parameter: -
		   output: NULL

		   Melakukan proses hapus soal.
		   
		   INFO:
			Sebenarnya ini bukan hapus sebenarnya, hanya
			locked diubah jadi 3, yang diartikan sebagai
			hapus selamanya. Hal ini dilakukan supaya
			kalau ada yang sudah pernah menjawab tidak ada
			"keanehan" data
		*/
		function del_soal(){
			$this->sessionlogin->cek_login();

			$this->load->library('session');
			
			if($_POST==NULL){
				redirect('soal/index');
			}else{
				$id_soal = $this->input->post('id_soal');
				
				$this->Soal_model->delete_soal($id_soal);
				
				redirect('soal/index','refresh');
			}
		}



	}
?>