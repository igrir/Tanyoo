<?php
	
	// Nama kelas : Profil.php
	// Peran 	  : - Controller untuk halaman profil
	//				- Celengan

	class Profil extends CI_Controller{

		public function __construct(){
			parent::__construct();   

			//load model database user
			$this->load->model('User_model');
			$this->load->model('Celengan_model');
			$this->load->model('Penghargaan_model');
			$this->load->model('Log_model');
			$this->load->model('Soal_model');

			$this->load->helper('url');			
			$this->load->library('session');
			$this->load->library('sessionlogin');
			$this->load->library('penghargaan');
			

		}

		public function index($username){
				
				$data['username'] = $username;
				$data['profil'] = $this->User_model->get_user_by_username($username);
				$data['jml_soal'] = $this->Soal_model->get_jumlah_soal($username);
				$data['skor'] = $this->Log_model->get_skor_from_username($username);
				$data['penjawab'] = $this->Log_model->get_penjawab_soal($username);
				
				//var_dump($result);
				$this->load->view('templates/header', $data);
				$this->load->view('templates/header_bar_profile', $data);
				$this->load->view('profile', $data);
				$this->load->view('templates/footer_logout', $data);
				
		}

		//Halaman celengan
		public function celengan($username){
			$this->sessionlogin->cek_login();
			$data['profil'] = $this->User_model->get_user_by_username($username);
			$data['user_celengan'] = $this->Celengan_model->get_all_celengan_user($username);
			$this->load->view('templates/header', $data);
			$this->load->view('templates/header_bar', $data);
			$this->load->view('celengan', $data);
			$this->load->view('templates/footer_logout', $data);
		}
		
		//Halaman penghargaan
		public function penghargaan($username){
			$this->sessionlogin->cek_login();
			$this->penghargaan->cek_penghargaan($username);
			$data['nama_penghargaan'] = $this->Penghargaan_model->get_all_penghargaan($username);
			
			$this->load->view('templates/header', $data);
			$this->load->view('templates/header_bar', $data);
			$this->load->view('penghargaan', $data);
			$this->load->view('templates/footer_logout', $data);
			var_dump($data);
		}
		
		//Halaman jumlah soal
		public function jml_soal($username){
			$this->sessionlogin->cek_login();

			$data['jml_soal'] = $this->Penghargaan_model->get_jumlah_soal($username);
			$data['jml_jwb'] = $this->Penghargaan_model->get_jumlah_jawab($username);
			$this->load->view('profile', $data);
			//var_dump($data);
		}		
		
	
		
		//ubah profil
		function profile_ubah($username){
			$this->sessionlogin->cek_login();
		
			$data['profil']=$this->User_model->selectuser($username); 
			
			//$this->load->vars($data);
			$this->load->view('templates/header',$data);
			$this->load->view('templates/header_bar_profile',$data);
			$this->load->view('profile_ubah_view',$data);
			$this->load->view('templates/footer',$data);	
		}
		
		function simpan_profile_ubah(){
			$this->sessionlogin->cek_login();

			if ($_POST) {
				$this->load->library('session');
				$username = $this->input->post('username');
				$data = array(
					'bio' => $this->input->post('bio'),
					'minat' => $this->input->post('minat'),
					'email' => $this->input->post('email'));
				
				$this->User_model->simpan_profile_ubah($username, $data);
				
				//ubah password jika password dimasukkan
				$password = $this->input->post('password');
				$password_b1 = $this->input->post('password_b1');
				$password_b2 = $this->input->post('password_b2');

				if (isset($password) && $password != '') {
					
					//cek apakah password benar
					if ($this->User_model->check_username_password($username, $password) == TRUE) {
						
						if ($password_b1 == $password_b2) {
							
							$this->User_model->change_password($username, $password_b1);
							redirect('u/'.$username,'refresh');

						}else{
							//kalau salah kembalikan ke ubah profile dan tampilan password yang dimasukkan tidak sama
							$data['profil'] = $this->User_model->selectuser($username); 
							$data['error'] = 'password baru yang dimasukkan tidak sama';
							//$this->load->vars($data);
							$this->load->view('templates/header',$data);
							$this->load->view('templates/header_bar_profile',$data);
							$this->load->view('profile_ubah_view',$data);
							$this->load->view('templates/footer',$data);
						}
					}else{
						//kalau salah kembalikan ke ubah profile dan tampilan data error salah	
						$data['profil'] = $this->User_model->selectuser($username); 
						$data['error'] = 'password yang dimasukkan salah';
						//$this->load->vars($data);
						$this->load->view('templates/header',$data);
						$this->load->view('templates/header_bar_profile',$data);
						$this->load->view('profile_ubah_view',$data);
						$this->load->view('templates/footer',$data);
					}
					
				}else{
					redirect('u/'.$username,'refresh');	
				}
				//redirect('Profil/profile_ubah/'.$username,'refresh');
			}			
		}
		
		function about(){ //menampilkan tentang tanyoo
			//$this->sessionlogin->cek_login();
			$this->load->view('templates/header');
			$this->load->view('templates/header_bar');
			$this->load->view('about');
			$this->load->view('templates/footer_logout_about');
		}
		
		function help(){ //menampilkan tentang tanyoo
			//$this->sessionlogin->cek_login();
			$this->load->view('templates/header');
			$this->load->view('templates/header_bar');
			$this->load->view('help');
			$this->load->view('templates/footer_logout_help');
		}

		function soal($username){
	      $this->load->library('pagination');


	      $per_page = 10;      //banyaknya konten ditampilkan

	      $halaman = $this->uri->segment(4);
	      if ($halaman == "" || $halaman < 0) {
	        $halaman = 1;
	      }

	      $config['base_url']   = "http://localhost/lab/tanyoo/index.php/giri/soal/";
	      $config['total_rows'] = $this->Soal_model->get_jumlah_soal($username);
	      $config['per_page']   = $per_page;
	      $config['use_page_numbers'] = TRUE;
	      $config['first_link'] = 'First';
	      $config['last_link']  = 'Last';
	      //$config['cur_tag_open'] = 'aha';
	      //$config['cur_tag_close'] = 'oho';
	      $this->pagination->initialize($config);
	      
	      $data['data_soal']     = $this->Soal_model->selectByUserPagination($username, $halaman, $per_page);

	      $this->load->vars($data);

	      $data['pagination_link'] = $this->pagination->create_links();

	      $this->load->view('templates/header', $data);
	      $this->load->view('templates/header_bar', $data);
	      $this->load->view('profil_soal_view',$data); //soal_view menampung data dari $data
	      $this->load->view('templates/footer_logout', $data);

	    }

	    function jawab($username){  
	      $data['data_soal']= $this->Log_model->get_answered_soal_from_username($username);

	      $this->load->view('templates/header', $data);
	      $this->load->view('templates/header_bar', $data);
	      $this->load->view('profil_jawab_view',$data); //soal_view menampung data dari $data
	      $this->load->view('templates/footer_logout', $data);

	    }

		
	}
