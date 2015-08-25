<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mascotas extends CI_Controller {
	public function __construct(){
		//A partir de php 5 la nomenclautura es doble __
		parent::__construct();	//Ejecutar el padre

		$this->load->model('mascotas_model');
		$this->load->model('registra_serv_msc_model');
	}
	
	function index(){
	
		$this->load->view('welcome_message');
	}

	function dameMascotas(){
		$datos['title'] = "Mascotas";
		$this->load->view('templates/header',$datos);
		
		//Cargar la vista para busqueda simple
		$this->load->view('pages/buscar_simple_mascota');


		$data['mascotas'] = $this->mascotas_model->getDataMascotas();
		//$this->load->view('pages/dame_mascotas',$data);

		$this->load->view('templates/footer');
	}

	function dameMascotaEditar($id_mascota){
		$datos['title'] = "Editar Mascotas";
		$this->load->view('templates/header',$datos);
		
		//Mostrar los clientes asociados a la mascota
		$data['reg_mascotas_clientes'] = $this->registra_msc_cli_model->obtenerClienteMascota($id_mascota);
		$this->load->view('pages/dame_mascota_de_cliente',$data);

		$data['razas'] = $this->mascotas_model->dameRazas();

		//Mostrar los datos de la mascota
		$data['mascotas'] = $this->mascotas_model->obtenerMascota($id_mascota);
		$this->load->view('pages/editar_mascotas',$data);

		//Datos de la Ficha Técnica.

		$data_serv['serv_mascotas'] = $this->registra_serv_msc_model->obtenerServicio($id_mascota);
		$this->load->view('pages/ficha_tecnica_mascota',$data_serv);


		$this->load->view('templates/footer');
	}
	function dameMascotaBaja($id_mascota){
		$datos['title'] = "Editar Mascotas";
		$this->load->view('templates/header',$datos);
		

		$data['mascotas'] = $this->mascotas_model->dameMascotaBaja($id_mascota);

		
		$this->load->view('pages/home');
		$this->load->view('templates/footer');

		
	}

	function dameMascotaTexto(){

		if (isset($_POST['b_texto'])){
			$b_texto	= $_POST['b_texto'];
			if ($b_texto == ""){
		 		$b_texto = "'";
		 	}
		}else{
			$b_texto	= "'";
		}

		$dato['title'] = "Buscar de Mascotas";
		$this->load->view('templates/header',$dato);



		//Cargar la vista para busqueda simple
		$this->load->view('pages/buscar_simple_mascota');


		$data['mascotas'] = $this->mascotas_model->obtenerMascotasTexto($b_texto);

		if  ( !is_null($data['mascotas'])){
			$this->load->view('pages/dame_mascotas',$data);
		}

		$b_texto = "'";

		
		$this->load->view('templates/footer');

	}



		function dameMascotaTexto_add_cliente(){

		if (isset($_POST['b_texto'])){
			$b_texto	= $_POST['b_texto'];
			if ($b_texto == ""){
		 		$b_texto = "'";
		 	}
		}else{
			$b_texto	= "'";
		}

		$dato['title'] = "Buscar de Mascotas";
		$this->load->view('templates/header',$dato);



		//Cargar la vista para busqueda simple
		$this->load->view('pages/buscar_simple_mascota');


		$data['mascotas'] = $this->mascotas_model->obtenerMascotasTexto($b_texto);

		if  ( !is_null($data['mascotas'])){
			$this->load->view('pages/dame_mascotas_add_cliente',$data);
		}

		$b_texto = "'";

		
		$this->load->view('templates/footer');

	}

	function alta(){
		$data['msc_nombre'] 			= $_POST['msc_nombre'];
		$data['msc_sexo'] 				= $_POST['msc_sexo'];
		$data['msc_raza'] 				= $_POST['msc_raza'];
		$data['msc_raza_obs'] 			= $_POST['msc_raza_obs'];
		$data['msc_medida'] 			= $_POST['msc_medida'];
		$data['msc_color'] 				= $_POST['msc_color'];
		$data['msc_fecha_nac'] 			= $_POST['msc_fecha_nac'];
		$data['msc_problemas_medicos'] 	= $_POST['msc_problemas_medicos'];
		$data['msc_caracter'] 			= $_POST['msc_caracter'];



		//llamamos al modelo, concretamente a la función insert() para que nos haga el insert en la base de datos.
		 $this->load->model('mascotas_model');
		 $this->mascotas_model->insert($data);
		 
		 
	}

	function editar() {
		$this->load->model('mascotas_model');

		if (isset($_POST['msc_escritorio'])){
			$msc_escritorio	= $_POST['msc_escritorio'];
			
		}else{
			$msc_escritorio	= "0";
		}

		if (isset($_POST['msc_raza'])){
			$nombre_raza	= $_POST['msc_raza'];
			
		}else{
			$nombre_raza	= "0";
		}
		

		$ids_razas['id_raza'] = $this->mascotas_model->dameidraza($nombre_raza);

		foreach ($ids_razas['id_raza']  as $id_raza){

			$id_raza = $id_raza->id_raza;
		
		}
		//	$id_raza = 2;
		//echo 'Hola '.(string)$id_raza;

		 //recogemos los datos por POST
		$data['id_mascota'] 			= $_POST['id_mascota'];
		$data['msc_nombre'] 			= $_POST['msc_nombre'];
		$data['msc_sexo'] 				= $_POST['msc_sexo'];
		$data['msc_raza'] 				= $id_raza;
		$data['msc_raza_obs'] 			= $_POST['msc_raza_obs'];
		$data['msc_medida'] 			= $_POST['msc_medida'];
		$data['msc_color'] 				= $_POST['msc_color'];
		$data['msc_fecha_nac'] 			= $_POST['msc_fecha_nac'];
		$data['msc_problemas_medicos'] 	= $_POST['msc_problemas_medicos'];
		$data['msc_caracter'] 			= $_POST['msc_caracter'];
		$data['msc_escritorio']			= $msc_escritorio;
		//cargamos el modelo y llamamos a la función update()
		
		$this->mascotas_model->update($data);
		 //volvemos a cargar la primera vista
		$datos['title'] = "Mascotas";
		$this->load->view('templates/header',$datos);
		
		//Datos del Cliente de la Mascota
		$data['reg_mascotas_clientes'] = $this->registra_msc_cli_model->obtenerClienteMascota($_POST['id_mascota']);
		$this->load->view('pages/dame_mascota_de_cliente',$data);

		//Datos de la Mascota
		$data['mascotas'] = $this->mascotas_model->obtenerMascota($_POST['id_mascota']);
		$data['razas'] = $this->mascotas_model->dameRazas();
		$this->load->view('pages/editar_mascotas',$data);
		

		//Datos de la Ficha Técnica.
		//Datos de la Ficha Técnica.

		$data_serv['serv_mascotas'] = $this->registra_serv_msc_model->obtenerServicio($_POST['id_mascota']);
		$this->load->view('pages/ficha_tecnica_mascota',$data_serv);

		$this->load->view('templates/footer');
	}
	

	function nueva_raza(){
		$datos['title'] = "Edición de RAZAS";
		$this->load->view('templates/header',$datos);

		$this->load->view('pages/razas/add_raza');

		$data['razas'] = $this->mascotas_model->damerazas();

		$this->load->view('pages/razas/dame_razas',$data);

		$this->load->view('templates/footer');

	}

	
	function add_nueva_raza(){
		$data['rz_nombre'] 			= $_POST['rz_nombre'];
		$data['rz_descripcion'] 	= $_POST['rz_descripcion'];

		$this->load->model('mascotas_model');
		$this->mascotas_model->insert_raza($data);

		$datos['title'] = "Edición de RAZAS";
		$this->load->view('templates/header',$datos);

		$this->load->view('pages/razas/add_raza');

		$data['razas'] = $this->mascotas_model->damerazas();

		$this->load->view('pages/razas/dame_razas',$data);

		$this->load->view('templates/footer');

	}

	function pre_editar_raza($id_raza)
	{

		$datos['title'] = "Edición de RAZAS";
		$this->load->view('templates/header',$datos);

		$data['razas'] = $this->mascotas_model->dame_raza_por_id($id_raza);
		$this->load->view('pages/razas/editar_raza',$data);
		$this->load->view('templates/footer');

	}
	function editar_raza(){
		$data['id_raza']			= $_POST['id_raza'];
		$data['rz_nombre'] 			= $_POST['rz_nombre'];
		$data['rz_descripcion'] 	= $_POST['rz_descripcion'];

		$this->load->model('mascotas_model');
		$this->mascotas_model->editar_raza($data);

		$datos['title'] = "Edición de RAZAS";
		$this->load->view('templates/header',$datos);

		$this->load->view('pages/razas/add_raza');

		$data['razas'] = $this->mascotas_model->damerazas();

		$this->load->view('pages/razas/dame_razas',$data);

		$this->load->view('templates/footer');

	}

	function eliminar_raza($id_raza){
		$this->load->model('mascotas_model');
		$this->mascotas_model->eliminar_raza($id_raza);

		$datos['title'] = "Edición de RAZAS";
		$this->load->view('templates/header',$datos);

		$this->load->view('pages/razas/add_raza');

		$data['razas'] = $this->mascotas_model->damerazas();

		$this->load->view('pages/razas/dame_razas',$data);

		$this->load->view('templates/footer');

	}

}?>