<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Servicios extends CI_Controller {
	public function __construct(){
		//A partir de php 5 la nomenclautura es doble __
		parent::__construct();	//Ejecutar el padre

		$this->load->model('servicios_model');
		$this->load->model('registra_msc_cli_model');
		$this->load->model('registra_serv_msc_model');
		$this->load->model('mascotas_model');	
	}
	
	function index(){
	
		$this->load->view('welcome_message');
	}

	function add_servicio_msc($id_mascota){

		// DATOS DEL SERVICIO DE LA MASCOTA
		$data_serv['id_mascota']				= $id_mascota;
		$data_serv['serv_fecha'] 				= $_POST['serv_fecha'];
		$data_serv['serv_corte'] 				= $_POST['serv_corte'];
		$data_serv['serv_acc1'] 				= $_POST['serv_acc1'];
		$data_serv['serv_acc2'] 				= $_POST['serv_acc2'];
		$data_serv['serv_acc3'] 				= $_POST['serv_acc3'];
		$data_serv['serv_acc4'] 				= $_POST['serv_acc4'];
		$data_serv['serv_observaciones'] 		= $_POST['serv_observaciones'];
		$data_serv['serv_observ_priv'] 			= $_POST['serv_observ_priv'];
		$data_serv['serv_problemas_medicos'] 	= $_POST['serv_problemas_medicos'];

		
		

		$id_nuevo_servicio = $this->servicios_model->insert_servicio($data_serv);

		//Parametros FECHA Y HORA
		date_default_timezone_set("Europe/Madrid");
	 	$fecha =date('Y/m/d');
	 	$hora = date('H:i:s');	

	 	//Insertar datos en registra_serv
	 	$this->load->model('registra_serv_msc_model');
	 	$this->registra_serv_msc_model->insert($id_mascota,$id_nuevo_servicio, $fecha, $hora);

		
		$datos['title'] = "Ficha de la Mascota";
		$this->load->view('templates/header',$datos);
		
		//Mostrar los clientes asociados a la mascota
		$data['reg_mascotas_clientes'] = $this->registra_msc_cli_model->obtenerClienteMascota($id_mascota);
		$this->load->view('pages/dame_mascota_de_cliente',$data);

		//Antes de mostrar los datos de la mascota necesitamos las razas
		$data['razas'] = $this->mascotas_model->dameRazas();

		//Mostrar los datos de la mascota
		$data['mascotas'] = $this->mascotas_model->obtenerMascota($id_mascota);
		$this->load->view('pages/editar_mascotas',$data);


		$data['serv_mascotas'] = $this->registra_serv_msc_model->obtenerServicio($id_mascota);
		$this->load->view('pages/ficha_tecnica_mascota',$data);

		$this->load->view('templates/footer');



	}

	function obtener_servicio_editar($id_servicio, $id_mascota){


		$datos['title'] = "Ficha de la Mascota";
		$this->load->view('templates/header',$datos);
		
		//Mostrar los datos de la mascota
		$data['mascotas_nombre'] = $this->mascotas_model->obtenerNombreMascota($id_mascota);
		$this->load->view('pages/nombre_mascota',$data);


		$data['servicios'] = $this->servicios_model->obtener_servicio_editar($id_servicio);

		$this->load->view('pages/editar_servicio',$data);

		$this->load->view('templates/footer');	


	}

	function servicio_editar(){

		// DATOS DEL SERVICIO DE LA MASCOTA
		
		$data_serv['id_servicio'] 				= $_POST['id_servicio'];
		$data_serv['serv_fecha'] 				= $_POST['serv_fecha'];
		$data_serv['serv_corte'] 				= $_POST['serv_corte'];
		$data_serv['serv_acc1'] 				= $_POST['serv_acc1'];
		$data_serv['serv_acc2'] 				= $_POST['serv_acc2'];
		$data_serv['serv_acc3'] 				= $_POST['serv_acc3'];
		$data_serv['serv_acc4'] 				= $_POST['serv_acc4'];
		$data_serv['serv_observaciones'] 		= $_POST['serv_observaciones'];
		$data_serv['serv_observ_priv'] 			= $_POST['serv_observ_priv'];
		$data_serv['serv_problemas_medicos'] 	= $_POST['serv_problemas_medicos'];

		$this->load->view('templates/header');

		$this->servicios_model->editarServicio($data_serv);

		//Mostrar los datos de la mascota
		//$data['mascotas_nombre'] = $this->mascotas_model->obtenerNombreMascota($_POST['id_mascota']);
		//$this->load->view('pages/nombre_mascota',$data);

		//Mostrar de nuevo el servicio editado
		//$data['servicios'] = $this->servicios_model->obtener_servicio_editar($_POST['id_servicio']);
		//$this->load->view('pages/editar_servicio',$data);
		
		//Mostrar los clientes asociados a la mascota
		$data['reg_mascotas_clientes'] = $this->registra_msc_cli_model->obtenerClienteMascota($_POST['id_mascota']);
		$this->load->view('pages/dame_mascota_de_cliente',$data);

		//Antes de mostrar los datos de la mascota necesitamos las razas
		$data['razas'] = $this->mascotas_model->dameRazas();
	
		//Datos de la Mascota
		$data['mascotas'] = $this->mascotas_model->obtenerMascota($_POST['id_mascota']);
		$this->load->view('pages/editar_mascotas',$data);

		//Datos de la Ficha Técnica.

		$data_serv['serv_mascotas'] = $this->registra_serv_msc_model->obtenerServicio($_POST['id_mascota']);
		$this->load->view('pages/ficha_tecnica_mascota',$data_serv);

		$this->load->view('templates/footer');	
	}

	function dameServicioBaja(){
		$this->load->view('templates/header');
		
		$this->servicios_model->baja_servicio($_POST['id_servicio']);

		//Mostrar los clientes asociados a la mascota
		$data['reg_mascotas_clientes'] = $this->registra_msc_cli_model->obtenerClienteMascota($_POST['id_mascota']);
		$this->load->view('pages/dame_mascota_de_cliente',$data);

		//Antes de mostrar los datos de la mascota necesitamos las razas
		$data['razas'] = $this->mascotas_model->dameRazas();
	
		//Datos de la Mascota
		$data['mascotas'] = $this->mascotas_model->obtenerMascota($_POST['id_mascota']);
		$this->load->view('pages/editar_mascotas',$data);

		//Datos de la Ficha Técnica.

		$data_serv['serv_mascotas'] = $this->registra_serv_msc_model->obtenerServicio($_POST['id_mascota']);
		$this->load->view('pages/ficha_tecnica_mascota',$data_serv);
		$this->load->view('templates/footer');	

	}


}