<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prestamo_model extends CI_Model {

    public function registrarPrestamo($libro_id)
    {
       $data = array(
          'libro_id' => $libro_id, // Cambiado a 'libro_id'
          'prestamo_id' => $this->session->userdata('idusuario'), // Usar la columna correcta 'prestamo_id'
          'fechaprestamo' => date('Y-m-d H:i:s'),
          'estado' => 'prestado'
       );
    
       return $this->db->insert('libro_has_prestamo', $data);
    }
    
 }
 