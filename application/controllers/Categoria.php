<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categoria extends CI_Controller{

  public function __construct(){
    parent::__construct();
    $this->load->model('Categoria_Model');
  }

  public function index(){
		if(!$this->session->userdata('login_status')){
			redirect('Login','refresh');
		}else{

			$data['titulo'] = "Lista de Categorias";

			switch ($this->session->userdata('TipoUsuario')) {
					case '1':

						$this->load->library('pagination');
						$data['browser'] = $this->agent->browser();

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
						$config['base_url'] = base_url() . 'index.php/Categoria/pagina';
						$config['total_rows'] = $this->Categoria_Model->coutn_Categorias();
						$config['per_page'] = $page;
						$config['num_links'] = 20;
						$this->pagination->initialize($config);

					    /* Se obtienen los datos */
						$data['Categorias'] = $this->Categoria_Model->listaCategorias($config['per_page'], $this->uri->segment(3));

					    $this->load->view('Layout/Head', $data);
					    $this->load->view('Layout/Header');
					    $this->load->view('Layout/Sidebar');
					    $this->load->view('Lists/Lista_Categoria',$data);
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

  public function Registro_Categoria(){

		if(!$this->session->userdata('login_status')){
			redirect('Login','refresh');
		}else{

			$data['titulo'] = "Registro de Categoria";

			switch ($this->session->userdata('TipoUsuario')) {
					case '1':
					$data['browser'] = $this->agent->browser();
					$this->load->view('Layout/Head', $data);
					$this->load->view('Layout/Header');
					$this->load->view('Layout/Sidebar');
					$this->load->view('Forms/Registro_Categoria');
					$this->load->view('Layout/Footer');
					break;
					default:
					break;
					}
			}
  }

}
