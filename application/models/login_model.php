<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model
{
     function __construct()
     {
          // Call the Model constructor
          parent::__construct();
     }

     //get the username & password from usuarios
     function get_user($usr, $pwd)
     {
          $sql = "select usuario,password from usuarios where usuario = '" . $usr . "' and password = '" . $pwd . "' and status = 'active'";
          $query = $this->db->query($sql);
          return $query->num_rows();
     }
}?>