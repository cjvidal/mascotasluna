<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes extends CI_Controller {
	public function __construct(){
		//A partir de php 5 la nomenclautura es doble __
		parent::__construct();	//Ejecutar el padre
		$this->load->model('mascotas_model');		
		
	}
	
	function index(){
	
		$this->load->view('welcome_message');
	}

	function dameClientes(){
		$datos['title'] = "Clientes";
		$this->load->view('templates/header',$datos);

		$data['razas'] = $this->mascotas_model->dameRazas();
		//Cargar la vista para busqueda simple
		$this->load->view('pages/buscar_simple_cliente',$data);

		$data['clientes'] = $this->clientes_model->getDataClientes();
		$this->load->view('pages/dame_clientes',$data);

		$this->load->view('templates/footer');
	}

	function dameClienteBuscarCompleja(){

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
		
		

		$datos['title'] = "Buscar Clientes";
		$this->load->view('templates/header',$datos);
		
		$data['razas'] = $this->mascotas_model->dameRazas();
		$this->load->view('pages/buscar_compleja_cliente',$data);

		
		$data['clientes'] = $this->clientes_model->obtenerClienteBuscarCompleja($bc_nombre,$bc_apellido1,$bc_apellido2,$bc_telefono);
		
		

		if  ( !is_null($data['clientes'])){
			$this->load->view('pages/dame_clientes',$data);

		}

		$bc_nombre = "'";
		$bc_apellido1 	= "'";
		$bc_apellido2 	= "'";
		$bc_telefono	= "'";

		$this->load->view('templates/footer');
	}
	function dameClienteEditar($id_cliente){
		$datos['title'] = "Clientes";
		$this->load->view('templates/header',$datos);
		
		$data['razas'] = $this->mascotas_model->dameRazas();
		$data['clientes'] = $this->clientes_model->obtenerContacto($id_cliente);
		$this->load->view('pages/editar_clientes',$data);

		$data['razas'] = $this->mascotas_model->dameRazas();
		$data['mascotas'] = $this->mascotas_model->obtenerMascotasCliente($id_cliente);
		$this->load->view('pages/dame_mascotas',$data);

		$this->load->view('templates/footer');
	}
	function dameClienteTexto(){

		$dato['title'] = "Listado de Clientes";
		$this->load->view('templates/header',$dato);

		//Cargar la vista para busqueda simple
		$this->load->view('pages/buscar_simple_cliente');

		$data['clientes'] = $this->clientes_model->obtenerClienteTexto($_POST['b_texto']);


		$this->load->view('pages/dame_clientes',$data);
		$this->load->view('templates/footer');

	}

	function nuevoCliente(){
		$this->load->view('templates/header');
		$this->load->view('pages/nuevo_cliente');
		$this->load->view('templates/footer');
	}

	function alta() {
 //recogemos los datos obtenidos por POST
 
 
 		$data['cli_dni'] 			= NULL;//$_POST['cli_dni'];
		$data['cli_nombre'] 		= $_POST['cli_nombre'];
		$data['cli_apellido1'] 		= $_POST['cli_apellido1'];
		$data['cli_apellido2'] 		= $_POST['cli_apellido2'];
		$data['cli_direccion'] 		= $_POST['cli_direccion'];
		$data['cli_poblacion'] 		= $_POST['cli_poblacion'];
		$data['cli_cp'] 			= $_POST['cli_cp'];
		$data['cli_telefono1']		= $_POST['cli_telefono1'];
		$data['cli_obs_tel1']		= $_POST['cli_obs_tel1'];
		$data['cli_telefono2']		= $_POST['cli_telefono2'];
		$data['cli_obs_tel2']		= $_POST['cli_obs_tel2'];
		$data['cli_email']			= $_POST['cli_email'];
		$data['cli_conocio']		= $_POST['cli_conocio'];
		$data['cli_lpd']			= $_POST['cli_lpd'];
		$data['cli_contacto2']		= $_POST['cli_contacto2'];
		$data['cli_telefono_contacto2']	= $_POST['cli_telefono_contacto2'];
 
		 //llamamos al modelo, concretamente a la función insert() para que nos haga el insert en la base de datos.
		 $this->load->model('clientes_model');
		 $id_nuevo_cliente = $this->clientes_model->insert($data);
		 //volvemos a visualizar la tabla
		 //$this->load->model('clientes_model/getDataClientes()');
		 $this->load->view('templates/header');
		 $data['clientes'] = $this->clientes_model->obtenerContacto($id_nuevo_cliente);
		 $this->load->view('pages/editar_clientes',$data);
		 $this->load->view('templates/footer');
 }
 
	 function accion() {
		 //cargamos el modelo y obtenemos la información del contacto seleccionado.
		 $this->load->model('clientes_model');
		 $data['clientes'] = $this->clientes_model->obtenerContacto($_POST['editar_id_cliente']);
		 //cargamos la vista para editar la información, pasandole dicha información.
		 $this->load->view('edit', $data);
	 }
	 
	 function editar() {
		 //recogemos los datos por POST
	 	$data['cli_dni'] 			= NULL;//$_POST['cli_dni'];
		$data['id_cliente'] 		= $_POST['id_cliente'];
		$data['cli_nombre'] 		= $_POST['cli_nombre'];
		$data['cli_apellido1'] 		= $_POST['cli_apellido1'];
		$data['cli_apellido2'] 		= $_POST['cli_apellido2'];
		$data['cli_direccion'] 		= $_POST['cli_direccion'];
		$data['cli_poblacion'] 		= $_POST['cli_poblacion'];
		$data['cli_cp'] 			= $_POST['cli_cp'];
		$data['cli_telefono1'] 		= $_POST['cli_telefono1'];
		$data['cli_obs_tel1']		= $_POST['cli_obs_tel1'];
		$data['cli_telefono2'] 		= $_POST['cli_telefono2'];
		$data['cli_obs_tel2']		= $_POST['cli_obs_tel2'];
		$data['cli_conocio'] 		= $_POST['cli_conocio']; 
		$data['cli_email'] 			= $_POST['cli_email'];
		$data['cli_lpd'] 			= $_POST['cli_lpd'];
		$data['cli_contacto2'] 		= $_POST['cli_contacto2'];
		$data['cli_telefono_contacto2'] = $_POST['cli_telefono_contacto2'];
		$data['cli_debe'] 			= $_POST['cli_debe'];
		//cargamos el modelo y llamamos a la función update()
		$this->load->model('clientes_model');
		$this->clientes_model->update($data);
		//volvemos a cargar la primera vista
		$datos['title'] = "Clientes";
		$this->load->view('templates/header',$datos);
		
		$data['razas'] = $this->mascotas_model->dameRazas();
		$data['clientes'] = $this->clientes_model->obtenerContacto($_POST['id_cliente']);
		$this->load->view('pages/editar_clientes',$data);
		$this->load->model('mascotas_model');
		$data['mascotas'] = $this->mascotas_model->obtenerMascotasCliente($_POST['id_cliente']);
		$this->load->view('pages/dame_mascotas',$data);

		$this->load->view('templates/footer');
	 }
}
?>