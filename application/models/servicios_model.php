<?PHP
class Servicios_model extends CI_Model {
 
	 function Servicios_model() {
		 parent::__construct(); //llamada al constructor de Model.
	 }


	 function insert_servicio($servicios){

		$this->db->set('serv_fecha',          		$servicios['serv_fecha']);
		$this->db->set('serv_corte',				$servicios['serv_corte']);
		$this->db->set('serv_acc1',     			$servicios['serv_acc1']);
		$this->db->set('serv_acc2',     			$servicios['serv_acc2']);
		$this->db->set('serv_acc3',     			$servicios['serv_acc3']);
		$this->db->set('serv_acc4',     			$servicios['serv_acc4']);
		$this->db->set('serv_observaciones',    	$servicios['serv_observaciones']);
		$this->db->set('serv_observ_priv',      	$servicios['serv_observ_priv']);
		$this->db->set('serv_problemas_medicos', 	$servicios['serv_problemas_medicos']);
	   

	   $this->db->insert('servicios');

	   $id_nuevo_servicio = $this->db->insert_id();

	   

	   return $id_nuevo_servicio;


	 }


	function editarServicio($servicio) {

		

		$this->db->set('serv_fecha', 				$servicio['serv_fecha']);
	   	$this->db->set('serv_corte', 				$servicio['serv_corte']);
	   	$this->db->set('serv_acc1', 				$servicio['serv_acc1']);
	   	$this->db->set('serv_acc2', 				$servicio['serv_acc2']);
	   	$this->db->set('serv_acc3', 				$servicio['serv_acc3']);
	   	$this->db->set('serv_acc4', 				$servicio['serv_acc4']);
	   	$this->db->set('serv_observaciones', 		$servicio['serv_observaciones']);
	   	$this->db->set('serv_observ_priv', 			$servicio['serv_observ_priv']);
		$this->db->set('serv_problemas_medicos',	$servicio['serv_problemas_medicos']);

		$this->db->where('id_servicio', 			$servicio['id_servicio']);
		$this->db->update('servicios');

		
 	}

 	function obtener_servicio_editar($id_servicio){

 		$this->db->select('*');
		$this->db->from('servicios');
		$this->db->join('registra_serv', 'registra_serv.serv_id_servicio = servicios.id_servicio');
		$this->db->where('id_servicio = ' . $id_servicio);

		$servicio = $this->db->get();
		return $servicio->result();
 	}

 	function baja_servicio($id_servicio){

 		$this->db->delete('servicios', array('id_Servicio' => $id_servicio)); 
 	}

}
?>