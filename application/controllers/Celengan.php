<?php

	/*
	// Nama kelas : Soal.php
	// Peran 	  : Controller untuk soal
					- index, index dari soal, bisa menambah soal dan edit
					- add, handle request POST menambah soal
					
					- ubah, halaman edit
					- simpan_ubah, handle request POST mengubah soal


	*/

	class Celengan extends CI_Controller{
		function __construct(){
			parent :: __construct();
			$this->load->helper('url'); 

			$this->load->model('User_model');
			$this->load->model('Celengan_model');
			$this->load->model('Soal_model');
			$this->load->model('Isi_celengan_model');

			// load library
			$this->load->library(array('table','form_validation'));		
			$this->load->library('session');
			$this->load->library('form_validation');	//validasi data

			
		}

		function tambah(){
			$username = $this->session->userdata('username');

			$data['profil'] = $this->User_model->get_user_by_username($username);
			$data['user_celengan'] = $this->Celengan_model->get_all_celengan_user($username);
			$this->load->view('templates/header', $data);
			$this->load->view('templates/header_bar', $data);
			$this->load->view('tambah_celengan', $data);
			$this->load->view('templates/footer', $data);
		}

		function add(){

			$username = $this->session->userdata('username');

			//cek validasi
			$this->form_validation->set_rules('nama_celengan', 'Nama celengan', 'required');

			if($_POST==NULL){
				redirect('u/'.$username.'/celengan');
			}else{

				if ($this->form_validation->run() == FALSE) {
					//apabila gagal dalam validasi form
					
					redirect('u/'.$username.'/celengan');
				}else{
					//berhasil memasukkan data

					$data = array('nama_celengan' => $this->input->post('nama_celengan'),
								  'username' => $username);
					$this->Celengan_model->add_celengan($data);
					redirect('u/'.$username.'/celengan');
				}
				
			}	
		}

		/* Fungsi: tambah_isi
		   akses: index.php/celengan/tambah_isi
		   parameter: $id_soal
		   output: NULL

		   menampilkan tampilan menambah isi celengan
		*/
		function tambah_isi($id_soal){
			$this->load->helper('url');

			$username = $this->session->userdata('username');

			$data['profil'] = $this->User_model->get_user_by_username($username);
			$data['user_celengan'] = $this->Celengan_model->get_all_celengan_user($username);
			$data['soal'] = $this->Soal_model->selectsoal($id_soal)->row();

			$this->load->view('templates/header', $data);
			$this->load->view('templates/header_bar', $data);
			$this->load->view('tambah_isi_celengan', $data);
			$this->load->view('templates/footer', $data);
		}

		/* Fungsi: add_isi
		   akses: index.php/celengan/add_isi
		   parameter: $id_soal, $id_celengan (dari URL)
		   output: NULL

		   Proses memasukkan isi celengan
		*/
		function add_isi($id_soal){

			//id celengan didapat dari URL yang dimasukkan
			$id_celengan = $this->uri->segment(4,0);

			if (isset($id_soal) && isset($id_celengan)) {
				$username = $this->session->userdata('username');

				//cek dulu apakah user sekarang memiliki celengan yang dimaksud
				$cek_ada = $this->Celengan_model->is_user_have_celengan($username, $id_celengan);

				if ($cek_ada) {
						//kalau user punya celengan itu
						//cek, apakah sudah ada di celengannya

						$cek_ada_di_celengan = $this->Isi_celengan_model->is_celengan_have_soal_id($id_celengan, $id_soal);

						//kalau belum ada baru dimasukkan
						if (!$cek_ada_di_celengan) {
							$data = array('id_soal'		=> $id_soal,
										  'id_celengan' => $id_celengan);

							$masukkan = $this->Isi_celengan_model->add_isi($data);

							//kalau sukses
							if ($masukkan) {
								//tampilkan celengan yang tadi sudah dimasukkan
								redirect("celengan/id/".$id_celengan);
							}
						}else{	
								//kalau sudah ada di celengan
								//tampilkan celengan yang dituju
								redirect("celengan/id/".$id_celengan);
						}

						
				}
			}
		}

		/* Fungsi: id
		   akses: index.php/celengan/id
		   parameter: $id_celengan
		   output: NULL

		   menampilkan isi dari celengan yang dituju
		*/
		function id($id_celengan){
			if (isset($id_celengan)) {
				$data['celengan'] = $this->Celengan_model->get_celengan_by_id($id_celengan);
				$data['isi_celengan'] = $this->Isi_celengan_model->get_all_isi_celengan($id_celengan);
				$this->load->view('templates/header', $data);
				$this->load->view('templates/header_bar', $data);
				$this->load->view('isi_celengan', $data);
				$this->load->view('templates/footer', $data);	
			}
		}

		/* Fungsi: hapus_isi
		   akses: index.php/celengan/hapus_isi
		   parameter: $id_soal, $id_celengan (dari URL)
		   output: NULL

		   tampilan menghapus isi celengan
		*/
		function hapus_isi($id_soal){
			//id celengan didapat dari URL yang dimasukkan
			$id_celengan = $this->uri->segment(4,0);

			if (isset($id_soal) && isset($id_celengan)) {
				$username = $this->session->userdata('username');

				//cek dulu apakah user sekarang memiliki celengan yang dimaksud
				$cek_ada = $this->Celengan_model->is_user_have_celengan($username, $id_celengan);

				if ($cek_ada) {
						//kalau user punya celengan itu
						//cek, apakah sudah ada di celengannya

						$cek_ada_di_celengan = $this->Isi_celengan_model->is_celengan_have_soal_id($id_celengan, $id_soal);

						//kalau ada, tuju ke konfirmasi hapus celengan
						if ($cek_ada_di_celengan) {
							
							$data['celengan'] = $this->Celengan_model->get_celengan_by_id($id_celengan);
							$data['isi_celengan'] = $this->Isi_celengan_model->get_all_isi_celengan($id_celengan);

							$this->load->view('templates/header', $data);
							$this->load->view('templates/header_bar', $data);
							$this->load->view('konf_hapus_isi_celengan', $data);
							$this->load->view('templates/footer', $data);

						}else{	
								//kalau sudah ada di celengan
								//tampilkan celengan yang dituju
								redirect("celengan/id/".$id_celengan);
						}

						
				}
			}
		}

		/* Fungsi: del_isi
		   akses: index.php/celengan/del_isi
		   parameter: -
		   output: NULL

		   Proses menghapus isi celengan
		*/

		function del_isi(){
			$username = $this->session->userdata('username');

			if ($_POST == NULL) {
				redirect("u/".$username."/celengan");
			}else{
				$id_celengan = $this->input->post('id_celengan');
				$id_soal = $this->input->post('id_soal');

				//cek dulu apakah user sekarang memiliki celengan yang dimaksud
				$cek_ada = $this->Celengan_model->is_user_have_celengan($username, $id_celengan);

				if ($cek_ada) {
						//kalau user punya celengan itu
						//cek, apakah sudah ada di celengannya

						$cek_ada_di_celengan = $this->Isi_celengan_model->is_celengan_have_soal_id($id_celengan, $id_soal);

						//kalau memang ada, baru kita hapus
						if ($cek_ada_di_celengan) {

							$hapus = $this->Isi_celengan_model->delete_isi($id_celengan, $id_soal);

							if ($hapus) {
								redirect("celengan/id/".$id_celengan);
							}


						}else{	
								//kalau sudah ada di celengan
								//tampilkan celengan yang dituju
								redirect("celengan/id/".$id_celengan);
						}

						
				}
			}
		}

		/* Fungsi: edit
		   akses: index.php/celengan/edit
		   parameter: -
		   output: NULL

		   menampilkan view edit
		*/
		function edit($id_celengan){

			$data['celengan'] = $this->Celengan_model->get_celengan_by_id($id_celengan);

			$this->load->view('templates/header', $data);
			$this->load->view('templates/header_bar', $data);
			$this->load->view('edit_celengan', $data);
			$this->load->view('templates/footer', $data);
		}

		/* Fungsi: edit_celengan
		   akses: index.php/celengan/edit_celengan
		   parameter: -
		   output: NULL

		   menampilkan view edit
		*/
		function edit_celengan(){

			$username = $this->session->userdata('username');
			
			$id_celengan = $this->input->post('id_celengan');
			$nama_celengan = $this->input->post('nama_celengan');

			//cek validasi
			$this->form_validation->set_rules('nama_celengan', 'Nama celengan', 'required');
			$this->form_validation->set_rules('id_celengan', 'id celengan', 'required');

			if ($this->form_validation->run() == FALSE) {
				redirect('u/'.$username.'/celengan/id/'.$id_celengan);
			}else{
				if ($_POST == NULL) {
					redirect('u/'.$username.'/celengan/id/'.$id_celengan);
				}else{

					$update = $this->Celengan_model->update_celengan($id_celengan, $nama_celengan);
					
					if ($update) {
						redirect('u/'.$username.'/celengan');
					}
					
				}	
			}

			

			
		}

	}

?>