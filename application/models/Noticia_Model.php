<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Noticia_Model extends CI_Model{

		public function ListaNoticias($porpagina,$segmento){
			$this->db->select('*');
			$this->db->from('Noticia');
			$this->db->join('Dependencia','Dependencia.idDependencia = Noticia.Dependencia_idDependencia');
			$this->db->join('Categoria','Categoria.idCategoria = Noticia.Categoria_idCategoria');
			$this->db->limit($porpagina,$segmento);
			$query = $this->db->get();

			if($query->num_rows() > 0){
				return $query->result();
			}else{
				return null;
			}
		}

		public function count_noticias(){
			return $this->db->count_all('Noticia');
		}

		public function countNewsByUser($idUser){
			$this->db->select('idNoticia');
			$this->db->from('Noticia');
			$this->db->where('idAutor', $idUser);
			//$this->db->count_all_results();
			$query = $this->db->get();
			return $query->num_rows();	
		}

	    public function Insert($datos){
	    	$this->db->insert('Noticia', $datos);
	    	if($this->db->affected_rows() == '1'){
	    		return true;
	    	}else{
	    		return false;
	    	}
	    }

		public function getInfo($id){
			$this->db->select('*');
			$this->db->from('Noticia');
			//$this->db->join('Dependencia','Dependencia.idDependencia = Usuario.Dependencia_idDependencia');
			$this->db->where('Noticia.idNoticia', $id);
			$query = $this->db->get();

			if($query->num_rows() > 0){
				return json_encode($query->result());
			}else {
				return null;
			}
		}

		public function Update($datos, $id){
			$this->db->where('idNoticia', $id);
			$this->db->update('Noticia', $datos);
			if ($this->db->affected_rows() > 0) {
				return true;
			}else{
				return false;
			}
		}

	  //Para Timeline /!\ Experimental /!\

	    public function NewsTimeline($idUsuario){
	    	$this->db->select('Noticia.Titulo, Noticia.Fecha');
	    	$this->db->from('Noticia');
	    	//$this->db->join('Evento','Evento.idEvento = BitPublicacion.idPublicacion','');
	    	$this->db->where('Noticia.idAutor', $idUsuario);
	    	$this->db->order_by('Noticia.Fecha','DESC');
	    	//$this->db->join('Noticia','Noticia.idNoticia = BitPublicacion.idPublicacion','OUT');
	    	$query = $this->db->get();
			return $query->result();
	    }

	}
