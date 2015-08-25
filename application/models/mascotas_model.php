<?PHP
class Mascotas_model extends CI_Model {
 
	 function Mascotas_model() {
		 parent::__construct(); //llamada al constructor de Model.
	 }

	function getDataMascotas() {
		$this->db->select('*');
		$this->db->from('mascotas');
//		$this->db->LIMIT('10');
		$this->db->where('msc_baja_sn = 0');
		$this->db->ORDER_BY('msc_nombre asc');
		$mascotas = $this->db->get();

	 //$mascotas = $this->db->get('mascotas'); //obtenemos la tabla 'Mascotas'.
	 
	 return $mascotas->result(); //devolvemos el resultado de lanzar la query.
	 }

	 function dameRazas(){
	 	$this->db->select('*');
	 	$this->db->from('razas');
	 	$this->db->ORDER_BY('rz_nombre asc');
	 	$razas =  $this->db->get();
	 	return $razas->result();

	 }
	 function dameidraza($nombre_raza){
	 	$this->db->select("id_raza");
	 	$this->db->from("razas");
	 	$this->db->where("rz_nombre = '" .$nombre_raza."'");
	 	$razas =  $this->db->get();
	 	return $razas->result();
	 }
	 function dame_raza_por_id($id_raza){
		$this->db->select("*");
	 	$this->db->from("razas");
	 	$this->db->where("id_raza = '" .$id_raza."'");
	 	$razas =  $this->db->get();
	 	return $razas->result();

	 }

	public function obtenerMascota($id_mascota) {
		$this->db->select('*');
		$this->db->from('mascotas');
		$this->db->where('id_mascota = ' . $id_mascota);
		$this->db->join('razas', 'mascotas.msc_raza = razas.id_raza');
		$this->db->where('msc_baja_sn = 0');
		$mascotas = $this->db->get();
		return $mascotas->result();
	}

	function obtenerNombreMascota($id_mascota){
		$this->db->select('*');
		$this->db->from('mascotas');
		$this->db->where('id_mascota = ' . $id_mascota);
		$this->db->join('razas', 'mascotas.msc_raza = razas.id_raza');
		$this->db->where('msc_baja_sn = 0');
		$mascotas = $this->db->get();
		return $mascotas->result();

	}


	function obtenerMascotasCliente($id_cliente) {
		$this->db->select('*');
		$this->db->from('mascotas');
		$this->db->join('registra', 'mascotas.id_mascota = registra.reg_id_mascota');
		$this->db->join('razas', 'mascotas.msc_raza = razas.id_raza');
		$this->db->where('reg_id_cliente = ' . $id_cliente);
		$this->db->where('msc_baja_sn = 0');
		$mascotas = $this->db->get();
		return $mascotas->result();
	}

	function obtenerMascotasTexto($texto) {
		$this->db->select('*');
   		$this->db->from('mascotas');
   		$this->db->where('msc_nombre like "%' . $texto .'%"');
   		$this->db->where('msc_baja_sn = 0');
   		$this->db->or_where('msc_raza like "%' . $texto .'%"');
   		$this->db->or_where('msc_fecha_nac like "%' . $texto .'%"');
   		
   	
   		$mascotas = $this->db->get();
   
   		return $mascotas->result();
	}



	function insert($mascotas){

		if (isset($mascotas['msc_raza'])){
			$nombre_raza	= $mascotas['msc_raza'];
			
		}else{
			$nombre_raza	= "0";
		}
		
		$ids_razas['id_raza'] = $this->dameidraza($nombre_raza);

		foreach ($ids_razas['id_raza']  as $id_raza){

			$id_raza = $id_raza->id_raza;
		
		}
		
		if (isset($id_raza)){
			
		}else{
			$id_raza = 1;
		}


		//echo 'Numero '.$razas->id_raza. 'Raza '.$nombre_raza; 

	 	$this->db->set('msc_nombre', 				$mascotas['msc_nombre']);
	 	$this->db->set('msc_sexo', 					$mascotas['msc_sexo']);
	 	$this->db->set('msc_raza', 					$id_raza);
	 	$this->db->set('msc_raza_obs', 				$mascotas['msc_raza_obs']);
	 	$this->db->set('msc_medida', 				$mascotas['msc_medida']);
	 	$this->db->set('msc_color', 				$mascotas['msc_color']);
	 	$this->db->set('msc_fecha_nac', 			$mascotas['msc_fecha_nac']);
	 	$this->db->set('msc_nombre', 				$mascotas['msc_nombre']);
	 	$this->db->set('msc_problemas_medicos', 	$mascotas['msc_problemas_medicos']);
	 	$this->db->set('msc_caracter', 				$mascotas['msc_caracter']);

	 	$this->db->insert('mascotas');

	 	$id_nueva_mascota = $this->db->insert_id();
   		return $id_nueva_mascota;
	 }

	 function insert_a_cliente($mascotas){

	 	$this->db->set('msc_nombre', 				$mascotas['msc_nombre']);
	 	$this->db->set('msc_sexo', 					$mascotas['msc_sexo']);
	 	$this->db->set('msc_raza', 					$mascotas['msc_raza']);
	 	$this->db->set('msc_raza_obs', 				$mascotas['msc_raza_obs']);
	 	$this->db->set('msc_medida', 				$mascotas['msc_medida']);
	 	$this->db->set('msc_color', 				$mascotas['msc_color']);
	 	$this->db->set('msc_fecha_nac', 			$mascotas['msc_fecha_nac']);
	 	$this->db->set('msc_nombre', 				$mascotas['msc_nombre']);
	 	$this->db->set('msc_problemas_medicos', 	$mascotas['msc_problemas_medicos']);
	 	$this->db->set('msc_caracter', 				$mascotas['msc_caracter']);

	 	$this->db->insert('mascotas');

	 	$id_nueva_mascota = $this->db->insert_id();
   		return $id_nueva_mascota;
	 }

	 function insert_raza($razas){
	 	$this->db->set('rz_nombre', 				$razas['rz_nombre']);
	 	$this->db->set('rz_descripcion', 			$razas['rz_descripcion']);

	 	$this->db->insert('razas');
	 }
	 function editar_raza($razas){
	 	$this->db->set('rz_nombre', 				$razas['rz_nombre']);
	 	$this->db->set('rz_descripcion', 			$razas['rz_descripcion']);

	 	$this->db->where('id_raza', 				$razas['id_raza']);
	 	$this->db->update('razas');
	 }

	 
	function update($mascotas) {
		$this->db->set('msc_nombre', 				$mascotas['msc_nombre']);
	   	$this->db->set('msc_sexo', 					$mascotas['msc_sexo']);
	   	$this->db->set('msc_raza', 					$mascotas['msc_raza']);
	   	$this->db->set('msc_raza_obs', 				$mascotas['msc_raza_obs']);
	   	$this->db->set('msc_medida', 				$mascotas['msc_medida']);
	   	$this->db->set('msc_color', 				$mascotas['msc_color']);
	   	$this->db->set('msc_fecha_nac', 			$mascotas['msc_fecha_nac']);
	   	$this->db->set('msc_problemas_medicos', 	$mascotas['msc_problemas_medicos']);
	   	$this->db->set('msc_caracter', 				$mascotas['msc_caracter']);
	   	$this->db->set('msc_escritorio', 			$mascotas['msc_escritorio']);
		
		$this->db->where('id_mascota', 				$mascotas['id_mascota']);
		$this->db->update('mascotas');
 	}

 	function eliminar_raza($id_raza){
 		$this->db->delete('razas', array('id_raza' => $id_raza)); 
 	}

	function dameMascotaBaja($id_mascotas) {
		$this->db->set('msc_baja_sn', 				1);
		$this->db->where('id_mascota', 				$id_mascotas);
		$this->db->update('mascotas');
	}
 // FIN MASCOTAS
 
}


?>