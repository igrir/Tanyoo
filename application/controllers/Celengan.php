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

			// load library
			$this->load->library(array('table','form_validation'));		
			$this->load->library('session');
			$this->load->library('form_validation');	//validasi data masukkan
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
	}

?>