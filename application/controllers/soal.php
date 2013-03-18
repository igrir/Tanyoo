<?php
	class Soal extends CI_Controller{
		function __construct(){
			parent :: __construct();
			$this->load->helper('url'); 
			$this->load->model('Soal_model'); //meload data dari soal_model
		
			// load library
			$this->load->library(array('table','form_validation'));		
		}
		
		function index(){
			$data['data_soal']=$this->Soal_model->selectAll(); //data_soal menampung data dari soal_model dengan method selectAll
			$this->load->view('soal_view',$data); //soal_view menampung data dari $data	
		}
		
		function add(){			
			if($_POST==NULL){
				$this->load->view('soal_view');
			}else{
				$data = array('id_soal' => $this->input->post(''),
                            'text_soal' => $this->input->post('soal'),
                            'jawaban' => $this->input->post('jawaban'),
                            'flag' => $this->input->post(''),
                            'tag' => $this->input->post('tag'),
                            'username' => 'giri', //masih dihardcode soalnya blm ada session
                            'lock' => $this->input->post(''));
				$this->soal_model->insert($data);
				redirect('','refresh'); 
			}			 
		}
		
		function ubah($id_soal){			
			$data['data_soal']=$this->Soal_model->selectsoal($this->uri->segment(3)); 
			$this->load->view('soal_ubah',$data); 
		}
		
		function simpan_ubah(){
			$this->soal_model->simpan_ubah(); 
			redirect('','refresh');
		}
	}
?>