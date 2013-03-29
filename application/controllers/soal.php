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
		}
		
		function index(){
			$this->load->library('session');
			
			
			$username = $this->session->userdata('username');
			

			$data['data_soal']=$this->Soal_model->selectByUser($username); //data_soal menampung data dari soal_model dengan method selectAll
			
			$this->load->view('templates/header', $data);
			$this->load->view('templates/header_bar', $data);
			$this->load->view('soal_view',$data); //soal_view menampung data dari $data
			$this->load->view('templates/footer_logout', $data);
		}
		
		function add(){
			$this->load->library('session');
			
			if($_POST==NULL){
				$this->load->view('soal_view');
			}else{
				$data = array(
                            'text_soal' => $this->db->$this->input->post('soal'),
                            'jawaban' => $this->db->$this->input->post('jawaban'),
			    'flag' => 0,
                            'tag' => $this->input->post('tag'),
			    'username' => $this->session->userdata('username'),
			    'locked' => 0);
				
				$this->Soal_model->add_soal($data);

				redirect('soal/index'); 
			}			 
		}
		
		function ubah($id_soal){
			
			$data['data_soal']=$this->Soal_model->selectsoal($this->uri->segment(3)); 
		
			$this->load->view('templates/header', $data);
			$this->load->view('templates/header_bar', $data);
			$this->load->view('soal_ubah',$data);
			$this->load->view('templates/footer_logout', $data);
			
		}
		
		function simpan_ubah(){
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
				
				redirect('soal/ubah/'.$id_soal,'refresh');
			}
		}
		
		function cari_soal(){ //menampilkan form pencarian
			$this->load->view('templates/header');
			$this->load->view('templates/header_bar');
			$this->load->view('cari_soal_view');
			$this->load->view('templates/footer_logout');
		}
		
		function proses_cari_soal(){ //memproses pencarian
			$cari = $this->input->post('cari');
			
			$data['data_soal']=$this->Soal_model->proses_cari_soal($cari);		
			
			$this->load->view('templates/header', $data);
			$this->load->view('templates/header_bar', $data);
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
			$data['soal'] = $this->Soal_model->get_random_soal();

			$this->load->view('templates/header');
			$this->load->view('templates/header_bar');
			$this->load->view('jawab_pertanyaan', $data);
			$this->load->view('templates/footer_logout');
		}

		/* Fungsi: jawab_id
		   akses: index.php/jawabid/[id_soal]
		   parameter: $id_soal
		   output: NULL

		   mmenjawab soal dengan id tertentu
		*/
		function jawab_id($id_soal){
			$data['soal'] = $this->Soal_model->get_random_soal();

			$this->load->view('templates/header');
			$this->load->view('templates/header_bar');
			$this->load->view('jawab_pertanyaan', $data);
			$this->load->view('templates/footer_logout');
		}


	}
?>