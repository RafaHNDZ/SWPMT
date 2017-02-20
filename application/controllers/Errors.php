<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Errors extends CI_Controller{

  public function __construct(){
    parent::__construct();
  }
  public function Error_404() {

    if(!$this->session->userdata('login_status') == true){
			redirect('Login','refresh');
		}else{

      $data['titulo'] = "Error 404";
      $data['browser'] = $this->agent->browser();

      $this->load->view('Layout/Head', $data);
      $this->load->view('Layout/Header');
      $this->load->view('Layout/Sidebar');
      $this->load->view('Layout/Errors/404');
      $this->load->view('Layout/Footer');
    }
  }

  public function Error_500(){
    if(!$this->session->userdata('login_status') == true){
      redirect('Login','refresh');
    }else{

      $data['titulo'] = "Error 500";
      $data['browser'] = $this->agent->browser();
      $this->load->view('Layout/Head', $data);
      $this->load->view('Layout/Header');
      $this->load->view('Layout/Sidebar');
      $this->load->view('Layout/Errors/500');
      $this->load->view('Layout/Footer');
    }
  }

}
