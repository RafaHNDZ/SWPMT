<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Evento_Model extends CI_Model{

		public function GetEventos(){
			$query = $this->db->get('Evento');

			if($query->num_rows() > 0){
				return $query->result();
			}
		}

	  	public function coutn_Eventos(){
	    	return $this->db->count_all('Evento');
	    }

		public function countEventssByUser($idUser){
			$this->db->select('idEvento');
			$this->db->from('Evento');
			$this->db->where('idAutor', $idUser);
			//$this->db->count_all_results();
			$query = $this->db->get();
			return $query->num_rows();	
		}

		public function ListaEventos($porpagina,$segmento){
			$this->db->select('*');
			$this->db->from('Evento');
			$this->db->join('Dependencia','Dependencia.idDependencia = Evento.Dependencia_idDependencia');
			$this->db->join('Categoria','Categoria.idCategoria = Evento.Categoria_idCategoria');
			$this->db->limit($porpagina,$segmento);
			$query = $this->db->get();

			if($query->num_rows() > 0){
					return $query->result();
			}else{
				return null;
			}
		}

	    public function Insert($datos){
	    	$this->db->insert('Evento', $datos);
	    	if($this->db->affected_rows() == '1'){
	    		return true;
	    	}else{
	    		return false;
	    	}
	    }

	  //Para Timeline /!\ Experimental /!\

	    public function EventTimeline($idUsuario){
	    	$this->db->select('Evento.Nombre, Evento.Fecha');
	    	$this->db->from('Evento');
	    	//$this->db->join('Evento','Evento.idEvento = BitPublicacion.idPublicacion','');
	    	$this->db->where('Evento.idAutor', $idUsuario);
	    	$this->db->order_by('Evento.Fecha','DESC');
	    	//$this->db->join('Noticia','Noticia.idNoticia = BitPublicacion.idPublicacion','OUT');
	    	$query = $this->db->get();
			return $query->result();
	    }

}
