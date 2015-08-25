<?PHP
class Registra_msc_cli_model extends CI_Model {
 
	 function Registra_msc_cli_model() {
		 parent::__construct(); //llamada al constructor de Model.


	 }


	function insert($id_mascota, $id_cliente, $fecha, $hora) 
	{
	   $this->db->set('reg_id_usuario',          '1');
	   $this->db->set('reg_id_mascota',		$id_mascota);
	   $this->db->set('reg_id_cliente',     $id_cliente);
	   $this->db->set('reg_fecha',         	$fecha);
	   $this->db->set('reg_hora',         	date('H:i:s',strtotime($hora)));
	   

	   $this->db->insert('registra');
	}

	function update($id_registra, $fecha, $hora)
	{
	 /*
	   $this->db->set('reg_cambio_pro',		'1');
	   
	   $this->db->set('reg_fecha',         	$fecha);
	   $this->db->set('reg_hora',         	date('H:i:s',strtotime($hora)));
		$this->db->where('id_registra', 	$id_registra);
		$this->db->update('registra');*/

		$this->db->delete('registra', array('id_registra' => $id_registra)); 

	}

	function dame_antiguo_cliente($id_mascota){
		$this->db->select('*');
		$this->db->from('registra');
		$this->db->where('registra.reg_id_mascota = ' . $id_mascota);

		$registra = $this->db->get();
		return $registra->result();
	}

	function obtenerClienteMascota($id_mascota){
		$this->db->select('*');
		$this->db->from('registra');
		$this->db->join('clientes', 'clientes.id_cliente = registra.reg_id_cliente');
		$this->db->where('registra.reg_id_mascota = ' . $id_mascota);
		$mascotas = $this->db->get();
		return $mascotas->result();
	}

	function dame_bc_cli_msc($cli_nombre, $cli_apellido1, $cli_apellido2, $cli_telefono1,
		$bc_msc_nombre,$bc_msc_raza,$bc_msc_sexo,$bc_msc_medida	){


		//Obtener el id de la raza de la mascota 

		$this->load->model('mascotas_model');
		



		$this->db->select('		clientes.id_cliente, 
								clientes.cli_nombre, 
								clientes.cli_apellido1, 
								clientes.cli_apellido2,
								clientes.cli_telefono1, 
				 			
				 				mascotas.msc_nombre, 
				 				mascotas.msc_raza,
				 				mascotas.msc_sexo,
				 				mascotas.msc_medida,

				 				razas.id_raza,
				 				razas.rz_nombre
				 				');
		$this->db->from('registra');
		$this->db->join('mascotas', 'mascotas.id_mascota  = registra.reg_id_mascota', 'INNER');
		$this->db->join('clientes', 'clientes.id_cliente  = registra.reg_id_cliente');
		$this->db->join('razas', 'razas.id_raza  = mascotas.msc_raza');
		$this->db->where('registra.reg_cambio_pro = 0 and mascotas.msc_baja_sn = 0');

		
		 if (strlen(trim($cli_apellido1)) > 0){
		      //$this->db->WHERE('cli_apellido1 like " '.$bc_apellido1.' %"');
		       $this->db->like('cli_apellido1',       trim($cli_apellido1), 'after');
		      $ll_rtn = 1;
		      
		  }else{
		      $ll_rtn = 0;
		  }

		  
		   if (strlen(trim($cli_telefono1)) > 0){
		      $this->db->like('cli_telefono1',       trim($cli_telefono1), 'after');
		      $ll_rtn = 1;
		  }else{
		      $ll_rtn = 0;
		  }
		 

		  if (strlen(trim($cli_apellido2)) > 0){
		      $this->db->like('cli_apellido2',       trim($cli_apellido2), 'after');
		      $ll_rtn = 1;
		  }else{
		      $ll_rtn = 0;
		  }


		  if (strlen(trim($cli_nombre)) > 0){
		      $this->db->like('cli_nombre',       trim($cli_nombre), 'after');
		      $ll_rtn = 1;
		  }else{
		      $ll_rtn = 0; 
		  }

		  if (strlen(trim($bc_msc_nombre)) > 0){
		      $this->db->like('msc_nombre',       trim($bc_msc_nombre), 'after');
		      $ll_rtn = 1;
		  }else{
		      $ll_rtn = 0;
		  }
		  if (strlen(trim($bc_msc_raza)) > 0){
		      $this->db->where('razas.rz_nombre',  trim($bc_msc_raza));
		      $ll_rtn = 1;
		  }else{
		      $ll_rtn = 0;
		  }
		  if (strlen(trim($bc_msc_sexo)) > 0){
		      $this->db->like('msc_sexo',       trim($bc_msc_sexo), 'after');
		      $ll_rtn = 1;
		  }else{
		      $ll_rtn = 0;
		  }
		  if (strlen(trim($bc_msc_medida)) > 0){
		      $this->db->like('msc_medida',       trim($bc_msc_medida), 'after');
		      $ll_rtn = 1;
		  }else{
		      $ll_rtn = 0;
		  }



		  //$this->db->group_by('registra.reg_id_cliente');
		  $this->db->order_by('msc_nombre');


		   if (
		        (strlen(trim($cli_apellido1)) > 0) || 
		        (strlen(trim($cli_telefono1)) > 0) ||
		        (strlen(trim($cli_nombre)) > 0) ||
		        (strlen(trim($bc_msc_nombre)) > 0) ||
		        (strlen(trim($bc_msc_raza)) > 0)   
				

		        )  {



				$resultado = $this->db->get();
				return $resultado->result();
			}
	}
}
?>