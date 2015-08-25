<?PHP
class Registra_serv_msc_model extends CI_Model {
 
	 function Registra_serv_msc_model() {
		 parent::__construct(); //llamada al constructor de Model.


	 }


	function insert($id_mascota, $id_servicio, $fecha, $hora) 
	{
	   $this->db->set('serv_id_mascota',        $id_mascota);
	   $this->db->set('serv_id_servicio',		$id_servicio);
	   $this->db->set('reg_serv_fecha',         	$fecha);
	   $this->db->set('reg_serv_hora',         	date('H:i:s',strtotime($hora)));
	   

	   $this->db->insert('registra_serv');
	}

	function obtenerServicio($id_mascota){

		$this->db->select('*');
		$this->db->from('servicios');
		$this->db->join('registra_serv', 'registra_serv.serv_id_servicio = servicios.id_servicio');
		$this->db->where('registra_serv.serv_id_mascota = ' . $id_mascota);
		$this->db->order_by('servicios.serv_fecha', 'desc');
		$servicio = $this->db->get();
		return $servicio->result();
	}

}