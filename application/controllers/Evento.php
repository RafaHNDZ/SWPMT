<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Evento extends CI_Controller{
  public function __construct(){
    parent::__construct();
    $this->load->model('Evento_Model');
    $this->load->library('pagination');
  }

  public function index(){
		if(!$this->session->userdata('login_status')){
			redirect('Login','refresh');
		}else{

			$data['titulo'] = "Lista de Eventos";
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
						$config['base_url'] = base_url() . 'index.php/Evento/pagina';
						$config['total_rows'] = $this->Evento_Model->coutn_Eventos();
						$config['per_page'] = $page;
						$config['num_links'] = 20;
						$this->pagination->initialize($config);

					    /* Se obtienen los datos */
						$data['Eventos'] = $this->Evento_Model->ListaEventos($config['per_page'], $this->uri->segment(3));

					    $this->load->view('Layout/Head', $data);
					    $this->load->view('Layout/Header');
					    $this->load->view('Layout/Sidebar');
					    $this->load->view('Lists/Lista_Evento', $data);
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

  public function Registro_Evento(){
		if(!$this->session->userdata('login_status')){
			redirect('Login','refresh');
		}else{

			$data['titulo'] = "Regisro de Evento";
			$data['browser'] = $this->agent->browser();
			switch ($this->session->userdata('TipoUsuario')) {
					case '1':

						$this->load->model('Dependencia_Model');
						$this->load->model('Categoria_Model');

						$data['Dependencias'] = $this->Dependencia_Model->getDependencias();
						$data['Categorias'] = $this->Categoria_Model->getCategorias();

					    $this->load->view('Layout/Head', $data);
					    $this->load->view('Layout/Header');
					    $this->load->view('Layout/Sidebar');
					    $this->load->view('Forms/Registro_Evento',$data);
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

  		$titulo = $this->input->post('titulo');
  		$categoria = $this->input->post('categoria');
  		$dependencia = $this->input->post('dependencia');
  		$resumen = $this->input->post('resumen');
  		$fecha = $this->input->post('fecha');

  		$this->form_validation->set_rules('titulo','Titulo','required|max_length[45]');
  		$this->form_validation->set_rules('categoria','Categoria','required');
  		$this->form_validation->set_rules('resumen','Resumen','required');
  		$this->form_validation->set_rules('dependencia','Dependencia','required');
  		$this->form_validation->set_rules('fecha','Fecha','required');

  		if($this->form_validation->run() === TRUE){

	  		$datos = array(
						"Nombre" => $titulo,
						"Contenido" => $resumen,
						"Fecha" => $fecha,
						"idAutor" => $this->session->userdata('idUsuario'),
						"Dependencia_idDependencia" => $dependencia,
						"Categoria_idCategoria" => $categoria
	  			);

	  		if($this->Evento_Model->Insert($datos)){
	  			echo "ok";
	  		}else{
	  			echo "fail";
	  		}

  		}else{
  			echo validation_errors('<li>','</li>');
  		}

  	}else{
  		echo "Unknown";
  	}
  }
}
