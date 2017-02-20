<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comentario_Model extends CI_Model{

  public function __construct(){
    parent::__construct();

  }

  public function Count_Comentarios(){
    return $this->db->count_all('Comentario');
  }

}
