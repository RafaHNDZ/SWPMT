<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dependencia extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('Dependencia_Model');
		$this->load->library('pagination');
	}

	public function index(){
		if(!$this->session->userdata('login_status')){
			redirect('Login','refresh');
		}else{

			$data['titulo'] = "Lista de Dependencias";
			$data['browser'] = $this->agent->browser();

			switch ($this->session->userdata('TipoUsuario')) {
					case '1':

						$page=10;
						//$this->load->library('pagination');
						$config['full_tag_open'] = '<ul class="pagination pagination-md">';
						$config['full_tag_close'] = '</ul>';
						$config['num_tag_open'] = '<li>';
						$config['num_tag_close'] = '</li>';
						$config['cur_tag_open'] = '<li class="active"><span>';
						$config['cur_tag_close'] = '<span></span></span></li>';
						$config['prev_tag_open'] = '<li>';
						$config['prev_tag_close'] = '</li>';
						$config['next_tag_open'] = '<li>';
						$config['next_tag_close'] = '</li>';
						$config['first_link'] = '«';
						$config['prev_link'] = '‹';
						$config['last_link'] = '»';
						$config['next_link'] = '›';
						$config['first_tag_open'] = '<li>';
						$config['first_tag_close'] = '</li>';
						$config['last_tag_open'] = '<li>';
						$config['last_tag_close'] = '</li>'; 
						$config['base_url'] = base_url() . 'index.php/Dependencia/pagina';
						$config['total_rows'] = $this->Dependencia_Model->count_dependencias();
						$config['per_page'] = $page;
						$config['num_links'] = 20;
						$this->pagination->initialize($config);

					    /* Se obtienen los datos */
						$data['Dependencias'] = $this->Dependencia_Model->ListaDependencias($config['per_page'], $this->uri->segment(3));

					    $this->load->view('Layout/Head', $data);
					    $this->load->view('Layout/Header');
					    $this->load->view('Layout/Sidebar');
					    $this->load->view('Lists/Lista_Dependencia', $data);
					    $this->load->view('Layout/Footer');
						break;
					case '2':
						break;

					default:
						exit('El usuario no esta identificado.');
						break;
			}

		}
	}
// Fin Index
	public function Registro_Dependencia(){
		if(!$this->session->userdata('login_status')){
			redirect('Login','refresh');
		}else{

			$data['titulo'] = "Registro de Dependencia";
			$data['browser'] = $this->agent->browser();

			switch ($this->session->userdata('TipoUsuario')) {
					case '1':
					    $this->load->view('Layout/Head', $data);
					    $this->load->view('Layout/Header');
					    $this->load->view('Layout/Sidebar');
					    $this->load->view('Forms/Registro_Dependencia');
					    $this->load->view('Layout/Footer');
						break;
					case '2':
						break;

					default:
						exit('El usuario no esta identificado.');
						break;
			}

		}
	}

  public function Guardar(){
  	if($this->input->is_ajax_request()){

  		$nombre = $this->input->post('nombre');

  		$this->form_validation->set_rules('nombre','Nombre','required|max_length[45]');

  		if($this->form_validation->run() === TRUE){

	  		$datos = array(
						"NombreDependencia" => $nombre
	  			);

	  		if($this->Dependencia_Model->Insert($datos)){
	  			echo "ok";
	  		}else{
	  			echo "fail";
	  		}

  		}else{
  			echo validation_errors('<li>','</li>');
  		}

  	}
  }
}