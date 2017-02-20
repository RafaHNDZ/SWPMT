<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Error_404 extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
  }

  function index()
  {
    $this->load->view('Layout/Head');
    $this->load->view('Layout/Header');
    $this->load->view('Layout/Sidebar');
    $this->load->view('Layout/Errors/404');
    $this->load->view('Layout/Footer');
  }

}
