<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TimeLine extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Evento_Model');
		$this->load->model('Noticia_Model');
	}

	function GetTimeLineByUser(){
		$idUsuario = $this->input->post('idUsuario');

		$Eventos = $this->Evento_Model->EventTimeline($idUsuario);
		$Noticias = $this->Noticia_Model->NewsTimeline($idUsuario);

			//echo var_dump($Eventos);

		if($Eventos != null){
			$header = false;
			$timeline ='';
			$timeline .="<div class='row'>";
				$timeline .="<div class='col-md-6 col-xs-12'>";
					$timeline .="<ul class='timeline'>";

					$timeline .=   "<li class='time-label'>";
					$timeline .=   "<span class='bg-blue'>";
					$timeline .=            /*$datos[0]->Fecha */ 'Eventos';
						$timeline .=    "</span>";
					$timeline .=    "</li>";
					foreach($Eventos as $dato){
					$timeline .=    "<li>";
					$timeline .=        "<i class='fa fa-calendar bg-blue'></i>";
					$timeline .=        "<div class='timeline-item'>";
					$timeline .=            "<span class='time'><i class='fa fa-calendar-o'></i> $dato->Fecha</span>";

					$timeline .=            "<h3 class='timeline-header'><a href='#'> $dato->Nombre </a></h3>";

					//$timeline .=            "<div class='timeline-body'>";
					//$timeline .=                $dato->Contenido;
					//$timeline .=            "</div>";

					//$timeline .=            "<div class='timeline-footer'>";
					//$timeline .=                "<a class='btn btn-primary btn-xs'>Botones</a>";
					//$timeline .=            "</div>";
					$timeline .=        "</div>";
					$timeline .=    "</li>";
					}
					$timeline .="</ul>";
				$timeline .="</div>";
				if($Noticias != null){
				$timeline .="<div class='col-md-6 col-xs-12'>";
					$timeline .="<ul class='timeline'>";

					$timeline .=   "<li class='time-label'>";
					$timeline .=   "<span class='bg-blue'>";
					$timeline .=            /*$datos[0]->Fecha */ 'Noticias';
						$timeline .=    "</span>";
					$timeline .=    "</li>";
					foreach($Noticias as $Noticia){
					$timeline .=    "<li>";
					$timeline .=        "<i class='fa fa-newspaper-o bg-blue'></i>";
					$timeline .=        "<div class='timeline-item'>";
					$timeline .=            "<span class='time'><i class='fa fa-calendar-o'></i> $Noticia->Fecha</span>";

					$timeline .=            "<h3 class='timeline-header'><a href='#'> $Noticia->Titulo </a></h3>";

					//$timeline .=            "<div class='timeline-body'>";
					//$timeline .=                $dato->Contenido;
					//$timeline .=            "</div>";

					//$timeline .=            "<div class='timeline-footer'>";
					//$timeline .=                "<a class='btn btn-primary btn-xs'>Botones</a>";
					//$timeline .=            "</div>";
					$timeline .=        "</div>";
					$timeline .=    "</li>";
					}
					$timeline .="</ul>";
				$timeline .="</div>";
				}else{

				}
				//ROW
			$timeline .="</div>";
		}else{
			$timeline = "Sin Resultados";
		}
		echo $timeline;
	}

}

/* End of file TimeLine.php */
/* Location: ./application/controllers/TimeLine.php */