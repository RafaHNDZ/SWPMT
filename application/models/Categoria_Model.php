<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Categoria_Model extends CI_Model{
		public function getCategorias(){
			$this->db->select('*');
			$this->db->from('Categoria');
			$query = $this->db->get();
			if($query != null){
				return $query->result();
			}else{
				return null;
			}
		}

	  public function coutn_Categorias(){
	  	return $this->db->count_all('Categoria');
	  }

	   public function ListaCategorias($porpagina,$segmento){
			$query = $this->db->get('Categoria',$porpagina,$segmento);

			if($query->num_rows() > 0){
				return $query->result();
			}else{
				return null;
			}
		}

	}
