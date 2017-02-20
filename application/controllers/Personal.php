<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Personal extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('Personal_Model');
		$this->load->library('pagination');
	}

	public function index(){

		$data['titulo'] = "Lista de Personal";

		if(!$this->session->userdata('login_status')){
			redirect('Login','refresh');
		}else{

			switch ($this->session->userdata('TipoUsuario')) {
					case '1':

					/* URL a la que se desea agregar la paginación*/
					    $config['base_url'] = base_url().'index.php/Personal/pagina';

					    /*Obtiene el total de registros a paginar */
					    $config['total_rows'] = $this->Personal_Model->get_total_personal();

					    /*Obtiene el numero de registros a mostrar por pagina */
					    $config['per_page'] = '10';

					    /*Indica que segmento de la URL tiene la paginación, por default es 3*/
					    $config['uri_segment'] = '3';

					    /*Se personaliza la paginación para que se adapte a bootstrap*/
					    $config['cur_tag_open'] = '<li class="active"><a href="#">';
					    $config['cur_tag_close'] = '</a></li>';
					    $config['num_tag_open'] = '<li>';
					    $config['num_tag_close'] = '</li>';
					    $config['last_link'] = FALSE;
					    $config['first_link'] = FALSE;
					    $config['next_link'] = '&raquo;';
					    $config['next_tag_open'] = '<li>';
					    $config['next_tag_close'] = '</li>';
					    $config['prev_link'] = '&laquo;';
					    $config['prev_tag_open'] = '<li>';
					    $config['prev_tag_close'] = '</li>';

					    /* Se inicializa la paginacion*/
					    $this->pagination->initialize($config);

					    /* Se obtienen los datos */
						$data['Personal'] = $this->Personal_Model->ListaPersonal($config['per_page'], $this->uri->segment(3));
						$this->load->model('Dependencia_Model');
						$data['Dependencias'] = $this->Dependencia_Model->getDependencias();
						$data['browser'] = $this->agent->browser();

					    $this->load->view('Layout/Head', $data);
					    $this->load->view('Layout/Header');
					    $this->load->view('Layout/Sidebar');
					    $this->load->view('Lists/Lista_Personal', $data);
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

// Fin de Indez
  public function RegistroPersonal(){

  		$data['titulo'] = "Regis de Personal";

		if(!$this->session->userdata('login_status')){
			redirect('Login','refresh');
		}else{

			switch ($this->session->userdata('TipoUsuario')) {
					case '1':

						$this->load->model('Dependencia_Model');

						$data['Dependencias'] = $this->Dependencia_Model->getDependencias();
						$data['browser'] = $this->agent->browser();

					    $this->load->view('Layout/Head', $data);
					    $this->load->view('Layout/Header');
					    $this->load->view('Layout/Sidebar');
					    $this->load->view('Forms/Registro_Personal', $data);
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

	public function Perfil($id){

  		$data['titulo'] = "Perfil";

		if(!$this->session->userdata('login_status')){
			redirect('Login','refresh');
		}else{

			switch ($this->session->userdata('TipoUsuario')) {
					case '1':

						$data['browser'] = $this->agent->browser();
						$this->load->model('Noticia_Model');
						$this->load->model('Evento_Model');

						$idUsuario = $id;

						$data['EmpleadoInfo'] = $this->Personal_Model->getInfo($idUsuario);
						$data['NewsPosted'] = $this->Noticia_Model->countNewsByUser($idUsuario);

						$data['EventsPosted'] = $this->Evento_Model->countEventssByUser($idUsuario);

					    $this->load->view('Layout/Head', $data);
					    $this->load->view('Layout/Header');
					    $this->load->view('Layout/Sidebar');
					    $this->load->view('Perfil_View');
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
  		$email = $this->input->post('email');
  		$pass = $this->input->post('pass');
  		$status = $this->input->post('estado');
  		$dependencia = $this->input->post('dependencia');

  		$this->form_validation->set_rules('nombre','Nombre','required');
  		$this->form_validation->set_rules('email','E-Mail','required|valid_email|max_length[45]');
  		$this->form_validation->set_rules('pass','Contraseña','required|max_length[45]');
  		$this->form_validation->set_rules('estado','Estado','required');
  		$this->form_validation->set_rules('dependencia','Dependencia','required');

  		$this->form_validation->set_message("nombre","El campo nombre es requerido.");

  		if($this->form_validation->run() === TRUE){

				$config = [
					"upload_path" => "./assets/uploads/images/",
					'allowed_types' => "png|jpg",
					"max_size" => "2048"
				];
				if(!file_exists($config['upload_path'])){
					mkdir($config['upload_path']);
				}
				$this->load->library('upload', $config);
				if($this->upload->do_upload('img_usuario')){
					$data = array("upload_data" => $this->upload->data());
					$datos = array(
							"Nombre" => $nombre,
							"Email" => $email,
							"Password" => sha1(md5($pass)),
							"Estatus" => $status,
							"Tipo" => '2',
							"Img_Usuario" => $data['upload_data']['file_name'],
							"Dependencia_idDependencia" => $dependencia
		  			);

		  		if($this->Personal_Model->Insert($datos)){
		  			echo "ok";
			  		}else{
			  			echo "fail";
			  		}

		  		}else{
						echo $this->upload->display_errors();
		  		}
				}else{
					echo validation_errors('<li>','</li>');
				}
  	}
  }

	public function getInfo(){

		header('Content-type: application/json');

		$idUsuario = $this->input->post('idUsuario');
		$data = $this->Personal_Model->getInfo($idUsuario);
		if($data != null){
			echo json_encode($data);
		}else{
			echo "null";
		}
	}

	public function Update(){
		if($this->input->is_ajax_request()){

			$idUsuario = $this->input->post('idUsuario');
			$nombre = $this->input->post('nombre');
			$email = $this->input->post('email');
			$pass = $this->input->post('pass');
			$status = $this->input->post('estado');
			$dependencia = $this->input->post('dependencia');

			$this->form_validation->set_rules('nombre','Nombre','required');
			$this->form_validation->set_rules('email','E-Mail','required|valid_email|max_length[45]');
			if($pass != null){
			$this->form_validation->set_rules('pass','Contraseña','required|max_length[45]');
			}
			$this->form_validation->set_rules('estado','Estado','required');
			$this->form_validation->set_rules('dependencia','Dependencia','required');

			$this->form_validation->set_message("nombre","El campo nombre es requerido.");

			if($this->form_validation->run() === TRUE){

				if($pass != null){
					$datos = array(
							"Nombre" => $nombre,
							"Email" => $email,
							//"Password" => sha1(md5($pass)),
							"Estatus" => $status,
							"Tipo" => '2',
							"Dependencia_idDependencia" => $dependencia
						);
				}else{
					$datos = array(
							"Nombre" => $nombre,
							"Email" => $email,
							"Password" => sha1(md5($pass)),
							"Estatus" => $status,
							"Tipo" => '2',
							"Dependencia_idDependencia" => $dependencia
						);
				}

				if($this->Personal_Model->Update($datos, $idUsuario)){
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
