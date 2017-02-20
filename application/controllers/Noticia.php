<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Noticia extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('Noticia_Model');
		$this->load->library('pagination');
	}

	public function index(){
		if(!$this->session->userdata('login_status')){
			redirect('Login','refresh');
		}else{

			$data['titulo'] = "Lista de Noticias";

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
						$config['total_rows'] = $this->Noticia_Model->count_noticias();
						$config['per_page'] = $page;
						$config['num_links'] = 20;
						$this->pagination->initialize($config);

					    /* Se obtienen los datos */
						$data['Noticias'] = $this->Noticia_Model->ListaNoticias($config['per_page'], $this->uri->segment(3));

						$this->load->model('Dependencia_Model');
						$this->load->model('Categoria_Model');

						$data['Dependencias'] = $this->Dependencia_Model->getDependencias();
						$data['Categorias'] = $this->Categoria_Model->getCategorias();
						$data['browser'] = $this->agent->browser();
						
					    $this->load->view('Layout/Head', $data);
					    $this->load->view('Layout/Header');
					    $this->load->view('Layout/Sidebar');
					    $this->load->view('Lists/Lista_Noticias', $data);
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
	public function Registro_Noticia(){
		if(!$this->session->userdata('login_status')){
			redirect('Login','refresh');
		}else{

			$data['titulo'] = "Registro de Noticia";

			switch ($this->session->userdata('TipoUsuario')) {
					case '1':

						$this->load->model('Dependencia_Model');
						$this->load->model('Categoria_Model');

						$data['Dependencias'] = $this->Dependencia_Model->getDependencias();
						$data['Categorias'] = $this->Categoria_Model->getCategorias();
						$data['browser'] = $this->agent->browser();

					    $this->load->view('Layout/Head', $data);
					    $this->load->view('Layout/Header');
					    $this->load->view('Layout/Sidebar');
					    $this->load->view('Forms/Registro_Noticia',$data);
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

  		$this->form_validation->set_rules('titulo','Titulo','required|max_length[45]');
  		$this->form_validation->set_rules('categoria','Categoria','required');
  		$this->form_validation->set_rules('resumen','Resumen','required');
  		$this->form_validation->set_rules('dependencia','Dependencia','required');

  		if($this->form_validation->run() === TRUE){

	  		$datos = array(
						"Contenido" => $resumen,
						"Titulo" => $titulo,
						"idAutor" => $this->session->userdata('idUsuario'),
						"Dependencia_idDependencia" => $dependencia,
						"Categoria_idCategoria" => $categoria
	  			);

	  		if($this->Noticia_Model->Insert($datos)){
	  			echo "ok";
	  		}else{
	  			echo "fail";
	  		}

  		}else{
  			echo validation_errors('<li>','</li>');
  		}

  	}
  }

	public function getInfo(){

		//header('Content-type: application/json');

		$idNoticia = $this->input->post('idNoticia');
		$data = $this->Noticia_Model->getInfo($idNoticia);
		if($data != null){
			echo $data;
		}else{
			echo "null";
		}
	}

  public function Update(){
  	if($this->input->is_ajax_request()){

  		$id = $this->input->post('idN');
  		$titulo = $this->input->post('titulo');
  		$categoria = $this->input->post('categoria');
  		$dependencia = $this->input->post('dependencia');
  		$resumen = $this->input->post('resumen');

  		$this->form_validation->set_rules('titulo','Titulo','required|max_length[45]');
  		$this->form_validation->set_rules('categoria','Categoria','required');
  		$this->form_validation->set_rules('resumen','Resumen','required');
  		$this->form_validation->set_rules('dependencia','Dependencia','required');

  		if($this->form_validation->run() === TRUE){

	  		$datos = array(
						"Contenido" => $resumen,
						"Titulo" => $titulo,
						"Dependencia_idDependencia" => $dependencia,
						"Categoria_idCategoria" => $categoria
	  			);

	  		if($this->Noticia_Model->Update($datos, $id)){
	  			echo "ok";
	  		}else{
	  			echo "fail";
	  		}

  		}else{
  			echo validation_errors('<li>','</li>');
  		}

  	}
  }

// Fin de la clase Noticia
}
