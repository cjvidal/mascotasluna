<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nuevo_cliente extends CI_Controller {
	public function __construct(){
		//A partir de php 5 la nomenclautura es doble __
		parent::__construct();	//Ejecutar el padre
		$this->load->model('mascotas_model');
	}
	
	function index(){
		$this->load->view('welcome_message');

	}

	function ficha_alta_nuevo_cliente(){
		$datos['title'] = "Nuevo Cliente";
		$this->load->view('templates/header',$datos);

		$data['razas'] = $this->mascotas_model->dameRazas();

		$this->load->view('pages/clientes/view_nuevo_cliente',$data);
		$this->load->view('templates/footer');
	}

}