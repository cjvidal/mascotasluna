<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mascota_cliente extends CI_Controller {
	public function __construct(){
		//A partir de php 5 la nomenclautura es doble __
		parent::__construct();	//Ejecutar el padre

		$this->load->helper('date');
		$this->load->model('clientes_model');
		$this->load->model('registra_msc_cli_model');
	}
	
	function index(){
		$this->load->view('welcome_message');
	}

	function mascota_cliente_alta(){

		// DATOS DE LA MASCOTA
		$data_msc['msc_nombre'] 			= $_POST['msc_nombre'];
		$data_msc['msc_sexo'] 				= $_POST['msc_sexo'];
		$data_msc['msc_raza'] 				= $_POST['msc_raza'];
		$data_msc['msc_raza_obs'] 			= $_POST['msc_raza_obs'];
		$data_msc['msc_medida'] 			= $_POST['msc_medida'];
		$data_msc['msc_color'] 				= $_POST['msc_color'];
		$data_msc['msc_fecha_nac'] 			= $_POST['msc_fecha_nac'];
		$data_msc['msc_problemas_medicos'] 	= $_POST['msc_problemas_medicos'];
		$data_msc['msc_caracter'] 			= $_POST['msc_caracter'];

		// DATOS DEL CLIENTE
		$data_cli['cli_dni'] 				= NULL;//$_POST['cli_dni'];
		$data_cli['cli_nombre'] 			= $_POST['cli_nombre'];
		$data_cli['cli_apellido1'] 			= $_POST['cli_apellido1'];
		$data_cli['cli_apellido2'] 			= $_POST['cli_apellido2'];
		$data_cli['cli_direccion'] 			= $_POST['cli_direccion'];
		$data_cli['cli_poblacion'] 			= $_POST['cli_poblacion'];
		$data_cli['cli_cp'] 				= $_POST['cli_cp'];
		$data_cli['cli_telefono1']			= $_POST['cli_telefono1'];
		$data_cli['cli_obs_tel1']			= $_POST['cli_obs_tel1'];
		$data_cli['cli_telefono2']			= $_POST['cli_telefono2'];
		$data_cli['cli_obs_tel2']			= $_POST['cli_obs_tel2'];
		$data_cli['cli_email']				= $_POST['cli_email'];
		$data_cli['cli_conocio']			= $_POST['cli_conocio'];
		$data_cli['cli_lpd']				= $_POST['cli_lpd'];
		$data_cli['cli_contacto2']			= $_POST['cli_contacto2'];
		$data_cli['cli_telefono_contacto2']	= $_POST['cli_telefono_contacto2'];

 

		//Insertar datos en mascotas
		$this->load->model('mascotas_model');
		$id_nueva_mascota = $this->mascotas_model->insert($data_msc);
		
		//Insertar datos en clientes
	 	$this->load->model('clientes_model');
	 	$id_nuevo_cliente = $this->clientes_model->insert($data_cli);



	 	//Parametros FECHA Y HORA
		date_default_timezone_set("Europe/Madrid");
	 	$fecha =date('Y/m/d');
	 	$hora = date('H:i:s');	


	 	//Insertar datos en registra
	 	$this->load->model('registra_msc_cli_model');
	 	$this->registra_msc_cli_model->insert($id_nueva_mascota,$id_nuevo_cliente, $fecha, $hora);



	 	//Mostrar la nueva inserción en su ficha
		$this->load->view('templates/header');

		$data['razas'] = $this->mascotas_model->dameRazas();
		 
		$data['clientes'] = $this->clientes_model->obtenerContacto($id_nuevo_cliente);
		$this->load->view('pages/editar_clientes',$data);

		$data['mascotas'] = $this->mascotas_model->obtenerMascotasCliente($id_nuevo_cliente);
		$this->load->view('pages/dame_mascotas',$data);


		
		$this->load->view('templates/footer');

	}


	function add_mascota_a_cliente(){
		if (isset($_POST['msc_raza'])){
			$nombre_raza	= $_POST['msc_raza'];
			
		}else{
			$nombre_raza	= "0";
		}
		

		$ids_razas['id_raza'] = $this->mascotas_model->dameidraza($nombre_raza);

		foreach ($ids_razas['id_raza']  as $id_raza){

			$id_raza = $id_raza->id_raza;
		
		}
		
		if (isset($id_raza) <= 0){
			$id_raza = NULL;
		}
		//echo "LA ID de la raza es".$id_raza;

		$id_cliente 					= $_POST['id_cliente'];

		$data['msc_nombre'] 			= $_POST['msc_nombre'];
		$data['msc_sexo'] 				= $_POST['msc_sexo'];
		$data['msc_raza'] 				= $id_raza;
		$data['msc_raza_obs'] 			= $_POST['msc_raza_obs'];
		$data['msc_medida'] 			= $_POST['msc_medida'];
		$data['msc_color'] 				= $_POST['msc_color'];
		$data['msc_fecha_nac'] 			= $_POST['msc_fecha_nac'];
		$data['msc_problemas_medicos'] 	= $_POST['msc_problemas_medicos'];
		$data['msc_caracter'] 			= $_POST['msc_caracter'];


		//llamamos al modelo, concretamente a la función insert() para que nos haga el insert en la base de datos.
		 $this->load->model('mascotas_model');
		 $id_nueva_mascota = $this->mascotas_model->insert_a_cliente($data);



		 //Parametros FECHA Y HORA
		date_default_timezone_set("Europe/Madrid");
	 	$fecha =date('Y/m/d');
	 	$hora = date('H:i:s');	

		//Insertar datos en registra
	 	$this->load->model('registra_msc_cli_model');
	 	$this->registra_msc_cli_model->insert($id_nueva_mascota,$id_cliente, $fecha, $hora);
		
		$datos['title'] = "Clientes";
		//Mostrar los datos
		$this->load->view('templates/header',$datos);
		//Datos del cliente
		$data['clientes'] = $this->clientes_model->obtenerContacto($id_cliente);
		$this->load->view('pages/editar_clientes',$data);
		$this->load->model('mascotas_model');
		$data['mascotas'] = $this->mascotas_model->obtenerMascotasCliente($id_cliente);
		$this->load->view('pages/dame_mascotas',$data);

		$this->load->view('templates/footer');

	}

	function cambia_propietario($id_mascota){
 		
		// DATOS DEL CLIENTE
		$data_cli['cli_dni'] 				= NULL;//$_POST['cli_dni'];
		$data_cli['cli_nombre'] 			= $_POST['cli_nombre'];
		$data_cli['cli_apellido1'] 			= $_POST['cli_apellido1'];
		$data_cli['cli_apellido2'] 			= $_POST['cli_apellido2'];
		$data_cli['cli_direccion'] 			= $_POST['cli_direccion'];
		$data_cli['cli_poblacion'] 			= $_POST['cli_poblacion'];
		$data_cli['cli_cp'] 				= $_POST['cli_cp'];
		$data_cli['cli_telefono1']			= $_POST['cli_telefono1'];
		$data_cli['cli_obs_tel1']			= $_POST['cli_obs_tel1'];
		$data_cli['cli_telefono2']			= $_POST['cli_telefono2'];
		$data_cli['cli_obs_tel2']			= $_POST['cli_obs_tel2'];
		$data_cli['cli_email']				= $_POST['cli_email'];
		$data_cli['cli_conocio']			= $_POST['cli_conocio'];
		$data_cli['cli_lpd']				= $_POST['cli_lpd'];
		$data_cli['cli_contacto2']			= $_POST['cli_contacto2'];
		$data_cli['cli_telefono_contacto2']	= $_POST['cli_telefono_contacto2'];

 		//Parametros FECHA Y HORA
		date_default_timezone_set("Europe/Madrid");
	 	$fecha =date('Y/m/d');
	 	$hora = date('H:i:s');

	 	
		
		$datos['title'] = "Clientes";
		//Mostrar los datos
		$this->load->view('templates/header',$datos);

		//Obtenemos el antiguo cliente
	 	$data['registra'] = $this->registra_msc_cli_model->dame_antiguo_cliente($id_mascota);

			foreach ($data['registra'] as $reg) {
			# code...
				$reg_id_cliente_antiguo = $reg->reg_id_cliente;
				$reg_id_linea_registra = $reg->id_registra;
		
			}

			//echo "Antiguo".$reg_id_cliente_antiguo;
			//echo "Linea  ".$reg_id_linea_registra;
		$this->registra_msc_cli_model->update($reg_id_linea_registra, $fecha, $hora);

		$id_nuevo_cliente = $this->clientes_model->insert($data_cli);

		$this->registra_msc_cli_model->insert($id_mascota,$id_nuevo_cliente, $fecha, $hora);
		
		$data['clientes'] = $this->clientes_model->obtenerContacto($id_nuevo_cliente);
		$this->load->view('pages/editar_clientes',$data);

		$data['mascotas'] = $this->mascotas_model->obtenerMascotasCliente($id_nuevo_cliente);
		$this->load->view('pages/dame_mascotas',$data);

		$this->load->view('templates/footer',$data);

	 	
	 	
	 	

		

	}

	function buscar_msc_add($id_cliente){


		$datos['title'] = "Añadir a Cliente";
		//Mostrar los datos
		$this->load->view('templates/header',$datos);
		
		$this->load->view('pages/buscar_simple_mascota_add_cliente');
		
		$this->load->view('templates/footer');


	}

	function add_msc_a_cliente_busca($id_mascota){

		$datos['title'] = "Buscar Cliente";
		//Mostrar los datos
		$this->load->view('templates/header',$datos);


		$this->load->view('templates/footer');
	}

	function dame_bc_cliente_mascota(){
		if (isset($_POST['bc_msc_sexo'])){
			$bc_msc_sexo	= $_POST['bc_msc_sexo'];
			
		}else{
			$bc_msc_sexo	= " ";
		}

		$bc_nombre 			= $_POST['bc_nombre'];
		$bc_apellido1 		= $_POST['bc_apellido1'];
		$bc_apellido2 		= $_POST['bc_apellido2'];
		$bc_telefono 		= $_POST['bc_telefono'];
		$bc_msc_nombre 		= $_POST['bc_msc_nombre'];
		$bc_msc_raza 		= $_POST['bc_msc_raza'];
		$bc_msc_sexo 		= $bc_msc_sexo;
		$bc_msc_medida		= $_POST['bc_msc_medida'];

		$datos['title'] = "Buscar Clientes y Mascotas";
		$this->load->view('templates/header',$datos);
		
		$data['razas'] = $this->mascotas_model->dameRazas();
		//Cargar el buscador en el resultado
		$this->load->view('pages/buscar_compleja_cliente',$data);
		
		$this->load->model('registra_msc_cli_model');
		$data['bc_cli_msc'] = $this->registra_msc_cli_model->dame_bc_cli_msc(
			$bc_nombre,$bc_apellido1,$bc_apellido2,$bc_telefono,
			$bc_msc_nombre,$bc_msc_raza,$bc_msc_sexo,$bc_msc_medida
			 );

		$this->load->view('pages/dame_clientes',$data);

		$this->load->view('templates/footer');

	}



	function dame_bc_busca_cambia_cli_pro($id_mascota){
		
		
		//Obtener los datos a utilizar en la búsqueda
		 if (isset($_POST['bc_nombre'])){
		 	$bc_nombre 		= $_POST['bc_nombre'];
		 }else{
		 	$bc_nombre = " ";
		 }


		 if (isset($_POST['bc_apellido1'])){
			$bc_apellido1 	= $_POST['bc_apellido1'];
		}else{
			$bc_apellido1 	= " ";
		}


		if (isset($_POST['bc_apellido2'])){
			$bc_apellido2 	= $_POST['bc_apellido2'];
		}else{
			$bc_apellido2 	= " ";
		}


		if (isset($_POST['bc_telefono'])){
			$bc_telefono	= $_POST['bc_telefono'];
		}else{
			$bc_telefono	= " ";
		}



		$datos['title'] = "Buscar Clientes y Mascotas";
		$this->load->view('templates/header',$datos);
		$data['id_mascota'] = $id_mascota;
		$data['clientes'] = $this->clientes_model->obtenerClienteBuscarCompleja($bc_nombre,$bc_apellido1,$bc_apellido2,$bc_telefono, $id_mascota);

		if  ( !is_null($data['clientes'])){
			$this->load->view('pages/dame_clientes_buscar_cambio_pro',$data);

		}


		$bc_nombre = "'";
		$bc_apellido1 	= "'";
		$bc_apellido2 	= "'";
		$bc_telefono	= "'";

		$this->load->view('templates/footer');
	}


	function asigna_mascota_cli_pro($id_cliente,$id_mascota){
		//En esta función se recibe el id_cliente y id_mascota
		// En registro se añade una entrada con esta nueva asociación
		// Y se inhabilita la anterior.
		//Parametros FECHA Y HORA
		date_default_timezone_set("Europe/Madrid");
	 	$fecha =date('Y/m/d');
	 	$hora = date('H:i:s');

	 	
		
		
		
		//Obtenemos el antiguo cliente
	 	$data['registra'] = $this->registra_msc_cli_model->dame_antiguo_cliente($id_mascota);

			foreach ($data['registra'] as $reg) {
			# code...
				$reg_id_cliente_antiguo = $reg->reg_id_cliente;
				$reg_id_linea_registra = $reg->id_registra;
		
			}

			//echo "Antiguo".$reg_id_cliente_antiguo;
			//echo "Linea  ".$reg_id_linea_registra;
		$this->registra_msc_cli_model->update($reg_id_linea_registra, $fecha, $hora);

		$this->registra_msc_cli_model->insert($id_mascota,$id_cliente, $fecha, $hora);

		$datos['title'] = "Clientes";
		//Mostrar los datos
		$this->load->view('templates/header',$datos);

		$data['clientes'] = $this->clientes_model->obtenerContacto($id_cliente);
		$this->load->view('pages/editar_clientes',$data);

		$data['mascotas'] = $this->mascotas_model->obtenerMascotasCliente($id_cliente);
		$this->load->view('pages/dame_mascotas',$data);

		$this->load->view('templates/footer',$data);
	}





}

?>