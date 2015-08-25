<?PHP
class Listado_escritorio_model extends CI_Model {
 
	 function Listado_escritorio_model() {
		 parent::__construct(); //llamada al constructor de Model.
	 }


	 function obtener_listado_escritorio(){

		$this->db->select('*');
		$this->db->from('registra');
		$this->db->join('clientes', 'clientes.id_cliente = registra.reg_id_cliente');
		$this->db->join('mascotas', 'mascotas.id_mascota = registra.reg_id_mascota');
		$this->db->join('razas', 'mascotas.msc_raza = razas.id_raza');
		$this->db->where('msc_escritorio = 1');
		$this->db->order_by('mascotas.msc_nombre', 'asc');
		$mascotas = $this->db->get();
		return $mascotas->result();

	 }






}