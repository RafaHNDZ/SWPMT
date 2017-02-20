<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Personal_Model extends CI_Model{
	public function __construct(){
		parent::__construct();
		$this->load->library('pagination');
	}

	public function ListaPersonal($porpagina,$segmento){
		$this->db->select('*');
		$this->db->from('Usuario');
		$this->db->join('Dependencia','Dependencia.idDependencia = Usuario.Dependencia_idDependencia');
		$this->db->where('Tipo != 1');
		$this->db->limit($porpagina, $segmento);
		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return null;
		}
	}

  	public function get_total_personal(){
    	return $this->db->count_all('Usuario');
  }

  public function Insert($datos){
  	$this->db->insert('Usuario',$datos);
  	if($this->db->affected_rows() == '1'){
  		return true;
  	}else{
  		return false;
  	}
  }

	public function getInfo($idUsuario){
		$this->db->select('*');
		$this->db->from('Usuario');
		$this->db->join('Dependencia','Dependencia.idDependencia = Usuario.Dependencia_idDependencia');
		$this->db->where('Usuario.idUsuario', $idUsuario);

		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result();
		}else {
			return null;
		}
	}

	public function Update($datos, $idUsuario){
		$this->db->where('idUsuario', $idUsuario);
		$this->db->update('Usuario', $datos);
		if($this->db->affected_rows() >= 1){
			return true;
		}else{
			return false;
		}
	}
}
