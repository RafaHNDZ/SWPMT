<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('Personal_Model');
		$this->load->model('Dependencia_Model');
		$this->load->model('Categoria_Model');
		$this->load->model('Noticia_Model');
		$this->load->model('Evento_Model');
		$this->load->model('Comentario_Model');
	}

  public function index(){

  	$data['titulo'] = "Panel de Control";

		if(!$this->session->userdata('login_status')){
			redirect('Login','refresh');
		}else{

			switch ($this->session->userdata('TipoUsuario')) {
					case '1':
						$data['browser'] = $this->agent->browser();
						$data['Empleados'] = $this->Personal_Model->get_total_personal();
						$data['Dependencias'] = $this->Dependencia_Model->count_dependencias();
						$data['Categorias'] = $this->Categoria_Model->coutn_Categorias();
						$data['Noticias'] = $this->Noticia_Model->count_noticias();
						$data['Eventos'] = $this->Evento_Model->coutn_Eventos();
						$data['Comentarios'] = $this->Comentario_Model->Count_Comentarios();

					    $this->load->view('Layout/Head', $data);
					    $this->load->view('Layout/Header');
					    $this->load->view('Layout/Sidebar');
					    $this->load->view('Layout/Pagina', $data);
					    $this->load->view('Layout/Footer');
						break;
					case '2':
					$data['browser'] = $this->agent->browser();
					$data['Empleados'] = $this->Personal_Model->get_total_personal();
					$data['Dependencias'] = $this->Dependencia_Model->count_dependencias();
					$data['Categorias'] = $this->Categoria_Model->coutn_Categorias();
					$data['Noticias'] = $this->Noticia_Model->count_noticias();
					$data['Eventos'] = $this->Evento_Model->coutn_Eventos();
					$data['Comentarios'] = $this->Comentario_Model->Count_Comentarios();

						$this->load->view('Layout/Head', $data);
						$this->load->view('Layout/Header');
						$this->load->view('Layout/Sidebar');
						$this->load->view('Layout/Pagina', $data);
						$this->load->view('Layout/Footer');
						break;

					default:
						exit('El usuario no esta identificado.');
						break;
			}

		}
  }
// Fin de Indez
  public function RegistroPersonal(){

  		$data['titulo'] = "Registro de Persona";

		if(!$this->session->userdata('login_status')){
			redirect('Login','refresh');
		}else{

			switch ($this->session->userdata('TipoUsuario')) {
					case '1':
					    $this->load->view('Layout/Head', $data);
					    $this->load->view('Layout/Header');
					    $this->load->view('Layout/Sidebar');
					    $this->load->view('Forms/Empleado');
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
}
