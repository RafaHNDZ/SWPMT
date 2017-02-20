<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Dependencia_Model extends CI_Model{

		public function ListaDependencias($porpagina,$segmento){
			$query = $this->db->get('Dependencia',$porpagina,$segmento);

			if($query->num_rows() > 0){
				return $query->result();
			}else{
				return null;
			}
		}

		public function getDependencias(){
			$query = $this->db->get('Dependencia');

			if($query->num_rows() > 0){
				return $query->result();
			}else{
				return null;
			}
		}

		public function count_dependencias(){
			return $this->db->count_all('Dependencia');
		}

	    public function Insert($datos){
	    	$this->db->insert('Dependencia',$datos);
	    	if($this->db->affected_rows() == '1'){
	    		return true;
	    	}else{
	    		return false;
	    	}
	    }
	}  