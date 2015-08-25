<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Home extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		
          
	}

	public function index(){
		//$this->load->view('welcome_message');
	}

	public function mostrar_escritorio(){
		$datos['title'] = "Escritorio";
		$this->load->view('templates/header',$datos);



		$data['listado_escritorio'] = $this->listado_escritorio_model->obtener_listado_escritorio();
		
		$this->load->view('pages/listados/listado_escritorio', $data);
		$this->load->view('templates/footer');

	}
}