<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prestamo_model extends CI_Model {

    public function listadeprestamos()
    {
        $this->db->select('*');
        $this->db->from('pedidoprestamo');
        return $this->db->get(); // devuelve resultado
     }
     public function agregarprestamo($data)
     {
         $this->db->insert('pedidoprestamo',$data);
     }
    }