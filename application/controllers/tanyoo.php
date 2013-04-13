<?php
	
	// Nama kelas : Tanyoo.php
	// Peran 	  : Controller untuk halaman:
	//					- index
	//					- register
	//					- tanya (pendaftaran)
	//					- home (beranda)

	class Tanyoo extends CI_Controller{

		public function __construct(){
			parent::__construct();
			$this->load->library('sessionlogin');

			$this->load->model('User_model');
			$this->load->model('Soal_model');
			$this->load->model('Log_model');
		}
		
		//comment lagi
		public function index(){ //index disini
			$this->load->helper('url');
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->load->library('session');
			
			//supaya kalau login langsung redirect
			if ($this->session->userdata('LOGGED_IN')) {
				redirect('home');
			}else{
				$data['title'] = "Login to Tanyoo";
				$this->load->view('templates/header', $data);
				$this->load->view('login', $data);
				$this->load->view('templates/footer', $data);	
			}
			

		}
		
		public function register(){
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->load->helper('url');

			$data['error'] = "";
			$data['title'] = "Daftar";

			$this->load->view('templates/header', $data);
			$this->load->view('register', $data);
			
		}


		//redirect register kalau ada yang salah
		public function register_w($error){
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->load->helper('url');

			$data['title'] = "Daftar";

			$data['error'] = "";

			if ($error == 1) {
				$data['error'] = "Nama tampilan sudah ada, gunakan nama lain";
			}else if ($error == 2) {
				$data['error'] = "Nama tampilan hanya gunakan hanya huruf, angka, atau _ (underscore)";
			}else if ($error == 3) {
				$data['error'] = "Pastikan email yang anda masukkan benar";
			}else if ($error == 4) {
				$data['error'] = "Jangan lupa masukkan password anda";
			}
			

			$this->load->view('templates/header', $data);
			$this->load->view('register', $data);
			
		}

		//selamat telah registrasi
		public function congrats_r(){
			$this->load->helper('url');
			$data['title'] = "Selamat";
			$this->load->view('templates/header', $data);
			$this->load->view('congrats_r', $data);
		}

		public function tanya(){
			$this->sessionlogin->cek_login();
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->load->helper('url');

			$data['title'] = "Daftar";

			$this->load->view('templates/header', $data);
			$this->load->view('templates/header_bar', $data);
			$this->load->view('tanya', $data);
			$this->load->view('templates/footer_logout', $data);
		}

		public function home(){
			$this->sessionlogin->cek_login();
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->load->helper('url');
			$this->load->library('session');

			$data['title'] = "Home";
			$data['username'] = $this->session->userdata('username');

			if ($this->session->userdata('LOGGED_IN')) {
				$this->load->view('templates/header', $data);
				$this->load->view('templates/header_bar_home', $data);
				$this->load->view('home.php', $data);
				$this->load->view('templates/footer_logout', $data);
			}else{
				redirect('index');
			}
			
		}

		public function statistik(){
			$this->sessionlogin->cek_login();
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->load->library('session');
			$this->load->helper('url');

			$username = $this->session->userdata('username');

			$data['title'] = "Statistik";
			$data['num_user'] = $this->User_model->get_num_user();
			$data['num_soal'] = $this->Soal_model->get_num_total_soal();
			$data['num_jawaban_soal'] = $this->Log_model->get_num_answered_soal();
			$data['num_flagged_soal'] = $this->Log_model->get_num_flagged_soal();

			$data['num_jawaban_soalmu'] = $this->Soal_model->get_jumlah_penjawab($username);
			$data['num_flagged_soalmu'] = $this->Log_model->get_num_flagged_user($username);
			$data['highscore'] = $this->Log_model->get_highscore(3);

			$this->load->view('templates/header', $data);
			$this->load->view('templates/header_bar_statistik', $data);
			$this->load->view('statistik', $data);
			$this->load->view('templates/footer_logout', $data);
		}


		public function reset_pass(){
			$this->load->helper("url");

			$hal = $this->uri->segment(2);

			$data['title'] = "reset kata kunci";

			$data['error'] = "";
			if ($hal == "") {
				$this->load->view('templates/header', $data);
				$this->load->view('reset_password', $data);	
			}else{
				if ($hal == 2){
					$this->load->view('templates/header', $data);
					$this->load->view('reset_password2', $data);	
				}if ($hal == 3){
					$data['error'] = "tidak ada pengguna dengan nama tersebut di database";
					$this->load->view('templates/header', $data);
					$this->load->view('reset_password', $data);
				}
			}
			
		}

		//proses reset password
		public function proc_reset_pass(){

			$this->load->helper('url');

			$this->load->model("Password_reset_model");
			$this->load->model("User_model");

			//cek apakah ada user dari username yang diminta

			$username = $this->input->post("username");

			if ($this->User_model->get_number_user_by_username($username) == 1) {

				$user = $this->User_model->get_user_by_username($username);

				$email = $user->email;

				//link random
				$random = "";

				$random .= $this->Password_reset_model->get_last_id();
				$random .= md5(time());
				$random .= md5($random);
				$random .= rand(0,500);
				$random = md5($random);
				$random .= md5(time());
				$random .= md5(time());
				$random .= md5($random);
				$random .= rand(0,500);
				$random = md5($random);
				$random .= md5(time());
				$random = md5($random);
				$random .= rand(0,500);
				$random = md5($random);
				$random .= rand(0,500);
				$random .= rand(0,1000);
				$random .= md5(time());
				$random .= rand(0,500);
				$random .= md5(time());
				$random .= rand(0,500);
				$random .= md5(rand(0,1000));


				$masukkan = $this->Password_reset_model->add_pr($user->username, $email, $random);
				if ($masukkan) {

					$alamat = "http://tanyoo.prahasta.com/index.php";
					$alamat_reset = "/resetme";

					$alamat_reset_random = $alamat.$alamat_reset."/".$random;

					//kirimkan password ke email pengguna
					$to = $email;
					$subject = "Permintaan setel ulang kata kunci. Halo ".$user->username."!";
					$message = "Halo ".$user->username."! Kami mendapatkan informasi bahwa
								kamu meminta untuk reset password. Jika kamu tidak merasa
								memintanya kamu bisa mengabaikan email ini. Bila kamu
								memang meminta reset password maka ini adalah link untukmu reset
								password akunmu. Mohon diperhatikan link ini hanya aktif dalam waktu
								30 menit<br/>
								<a href='".$alamat_reset_random."'>".$alamat_reset_random."</a>
								<br/>
								<br/>
								<br/>
								Tanyoo<br/>
								Berbagi - Bertanya - Ilmu Pengetahuan";
					$from = "noreply@tanyoo.prahasta.com";
					$headers = "From: ". $from;

					mail($to,$subject,$message,$headers);

					redirect("reset_pass/2");
				}

			}else{
				redirect("reset_pass/3");
			}
					
		}

		//halaman mengetik password hasil reset
		public function resetme($randkey){
			$this->load->helper('url');

			$this->load->model("Password_reset_model");
			$this->load->model("User_model");

			$ps = $this->Password_reset_model->get_from_randkey($randkey);

			$data['error'] = "";
			
			//cek error-error
			$info = $this->uri->segment(3);
			if ($info != "") {
				if ($info == 1) {
					$data['error'] = "Jangan lupa masukkan password anda";
				}
			}


			if ($ps->num_rows() == 1 ) {

				$r_ps = $ps->row();

				//cek apakah kurang dari sama dengan 30 menit
				$now = time();
				$time = strtotime($r_ps->time);
				$diff = $now-$time;
				$diff_minute =  floor($diff/60);

				if ($diff_minute <= 30) {
					$data['title'] = "reset kata kunci";
					$data['randkey'] = $randkey;
					$this->load->view('templates/header', $data);
					$this->load->view('reset_password3', $data);		
				}else{
					//set timeout
					$this->Password_reset_model->set_used($r_ps->id_reset, 2);

					redirect("reset_pass");	
				}
			}else{
				redirect("reset_pass");	
			}
		}

		//proses mereset
		public function proc_resetme(){
			$this->load->helper('url');
			$this->load->model("User_model");
			$this->load->model("Password_reset_model");

			$password = $this->input->post('password');
			$randkey  = $this->input->post('randkey');

			$ps = $this->Password_reset_model->get_from_randkey($randkey);

			if ($password == "") {
				redirect("resetme/".$randkey."1");
			}else{
				$ps = $this->Password_reset_model->get_from_randkey($randkey);
				$r_ps = $ps->row();
				
				$this->User_model->change_password($r_ps->username, $password);

				//reset sudah tidak bisa dipake lagi
				$this->Password_reset_model->set_used($r_ps->id_reset, 2);

				redirect("#two");
			}
		}

	}