<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('Login_Model');

	}

	public function index(){

		$data['titulo'] = "Login";

		if($this->session->userdata('login_status') != true){
		    $this->load->view('Layout/Head', $data);
		    $this->load->view('Layout/Header');
		    $this->load->view('Layout/Sidebar');
		    $this->load->view('Forms/Login');
		    $this->load->view('Layout/Footer');
		}else{
			redirect('Admin','reload');
		}
	}
/*
	public function Login(){

		$email = $this->input->post('email');
		$pass = $this->input->post('pass');

		$resp = $this->Login_Model->CheckStatus($email, $pass);

		if ($resp === true) {
		 	$data = $this->Login_Model->Login($email, $pass);

		 	foreach($data as $d){
					 		$datasession = array(
					 		'idUsuario'  => $d->idUsuario,
					 		'Nombre' => $d->Nombre,
					 		'Dependencia' => $d->Dependencia_idDependencia,
					 		'TipoUsuario' => $d->Tipo,
					 		'login_status' => true
		 			);

		 	}

			$this->session->set_userdata($datasession);

			echo "ok";

		}else{
			echo "fail";
		}
	}
*/

	public function Login(){

		$email = $this->input->post('email');
		$pass = sha1(md5($this->input->post('pass')));

		$this->form_validation->set_rules('email','E-Mail','required|valid_email');
		$this->form_validation->set_rules('pass','Contraseña','required|max_length[45]');

		if($this->form_validation->run() === TRUE){
			if($this->Login_Model->LockUser($email) == false){
				 if($this->Login_Model->Login($email, $pass)){

				 	$data = $this->Login_Model->Login($email, $pass);

				 	foreach($data as $d){
							 		$datasession = array(
							 		'idUsuario'  => $d->idUsuario,
							 		'Nombre' => $d->Nombre,
							 		'Dependencia' => $d->Dependencia_idDependencia,
							 		'TipoUsuario' => $d->Tipo,
									'Img_Usuario' => $d->Img_Usuario,
							 		'login_status' => true
				 			);

				 	}
					$this->session->set_userdata($datasession);

					echo 'ok';

				 }else{
				 	echo "fail";
				 }
			}else{
				echo 'blocked';
			}
		}else{
			echo validation_errors('<li>','</li>');
		}
	}

	public function LogOut(){

					 		$datasession = array(
					 		'idUsuario'  => '',
					 		'Nombre' => '',
					 		'Dependencia' => '',
					 		'TipoUsuario' => '',
					 		'login_status' => false
		 			);

	    $this->session->set_userdata($datasession);

	    redirect('Login', 'refresh');
	}
}
