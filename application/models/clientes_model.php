<?PHP
class Clientes_model extends CI_Model {
 
 function Clientes_model() {
 parent::__construct(); //llamada al constructor de Model.
 }
 
function getDataClientes() {
 //$clientes = $this->db->get('clientes'); //obtenemos la tabla 'clientes'. db->get('clientes') equivale a SELECT * FROM clientes.
   $this->db->select('*');
   $this->db->from('clientes');
   $this->db->ORDER_BY('cli_nombre ASC');

   $clientes = $this->db->get(); 
   return $clientes->result(); //devolvemos el resultado de lanzar la query.
 }
  
 // INI CLIENTES
 function insert($clientes) {
	
   $this->db->set('cli_dni',          $clientes['cli_dni']);
   $this->db->set('cli_nombre', 	    $clientes['cli_nombre']);
   $this->db->set('cli_apellido1',    $clientes['cli_apellido1']);
   $this->db->set('cli_apellido2',    $clientes['cli_apellido2']);
   $this->db->set('cli_direccion',    $clientes['cli_direccion']);
   $this->db->set('cli_poblacion',    $clientes['cli_poblacion']);
   $this->db->set('cli_cp', 		      $clientes['cli_cp']);
   $this->db->set('cli_telefono1',    $clientes['cli_telefono1']);
   $this->db->set('cli_obs_tel1',     $clientes['cli_obs_tel1']);
   $this->db->set('cli_telefono2',    $clientes['cli_telefono2']);
   $this->db->set('cli_obs_tel2',     $clientes['cli_obs_tel2']);
   $this->db->set('cli_conocio',      $clientes['cli_conocio']);
   $this->db->set('cli_email',        $clientes['cli_email']);
   $this->db->set('cli_lpd',          $clientes['cli_lpd']);
   $this->db->set('cli_contacto2',    $clientes['cli_contacto2']);
   $this->db->set('cli_telefono_contacto2', $clientes['cli_telefono_contacto2']);

 
 	$this->db->insert('clientes');
   $id_nuevo_cliente = $this->db->insert_id();


   return $id_nuevo_cliente;
 }
 
 
 function obtenerContacto($id_cliente) {
	$this->db->select('*');
	$this->db->from('clientes');
	$this->db->where('id_cliente = ' . $id_cliente);



	$clientes = $this->db->get();
	
   return $clientes->result();
}

function obtenerClienteTexto($texto){
   $this->db->select('*');
   $this->db->from('clientes');
   $this->db->where('cli_nombre like "%' . $texto .'%"');
   $this->db->or_where('cli_apellido1 like "%' . $texto .'%"');
   $this->db->or_where('cli_apellido2 like "%' . $texto .'%"');
   $this->db->or_where('cli_telefono1 like "%' . $texto .'%"');
   $clientes = $this->db->get();
   
   return $clientes->result();
}

function obtenerClienteBuscarCompleja($bc_nombre, $bc_apellido1, $bc_apellido2, $bc_telefono){
  $ll_rtn = 0;
  $clientes;


   $this->db->select('*');
   $this->db->from('clientes');   


   if (strlen(trim($bc_apellido1)) > 0){
      //$this->db->WHERE('cli_apellido1 like " '.$bc_apellido1.' %"');
       $this->db->like('cli_apellido1',       trim($bc_apellido1), 'after');
      $ll_rtn = 1;
      
  }else{
      $ll_rtn = 0;
  }

  
   if (strlen(trim($bc_telefono)) > 0){
      $this->db->like('cli_telefono1',       trim($bc_telefono), 'after');
      $ll_rtn = 1;
  }else{
      $ll_rtn = 0;
  }
 

  if (strlen(trim($bc_apellido2)) > 0){
      $this->db->like('cli_apellido2',       trim($bc_apellido2), 'after');
      $ll_rtn = 1;
  }else{
      $ll_rtn = 0;
  }


  if (strlen(trim($bc_nombre)) > 0){
      $this->db->like('cli_nombre',       trim($bc_nombre), 'after');
      $ll_rtn = 1;
  }else{
      $ll_rtn = 0; 
  }




   if (
        (strlen(trim($bc_apellido1)) > 0) || 
        (strlen(trim($bc_telefono)) > 0)  ||
        (strlen(trim($bc_nombre)) > 0) ||
        (strlen(trim($bc_telefono)) > 0)


        ){
      
      $clientes = $this->db->get();

      return $clientes->result();
   }

   
      
   
   
   

   
}

 function update($clientes) {
   $this->db->set('cli_dni',        $clientes['cli_dni']);
   $this->db->set('cli_nombre', 	  $clientes['cli_nombre']);
   $this->db->set('cli_apellido1',  $clientes['cli_apellido1']);
   $this->db->set('cli_apellido2',  $clientes['cli_apellido2']);
   $this->db->set('cli_direccion',  $clientes['cli_direccion']);
   $this->db->set('cli_poblacion',  $clientes['cli_poblacion']);
   $this->db->set('cli_cp', 		    $clientes['cli_cp']);
   $this->db->set('cli_telefono1',  $clientes['cli_telefono1']);
   $this->db->set('cli_obs_tel1',   $clientes['cli_obs_tel1']);
   $this->db->set('cli_telefono2',  $clientes['cli_telefono2']);
   $this->db->set('cli_obs_tel2',   $clientes['cli_obs_tel2']);
   $this->db->set('cli_conocio',    $clientes['cli_conocio']);
   $this->db->set('cli_email',      $clientes['cli_email']);
   $this->db->set('cli_lpd',        $clientes['cli_lpd']);
   $this->db->set('cli_contacto2',  $clientes['cli_contacto2']);
   $this->db->set('cli_telefono_contacto2', $clientes['cli_telefono_contacto2']);
   $this->db->set('cli_debe',        $clientes['cli_debe']);
	
	$this->db->where('id_cliente', $clientes['id_cliente']);

   
	$this->db->update('clientes');
 }
 
 // FIN CLIENTES
 
}


?>