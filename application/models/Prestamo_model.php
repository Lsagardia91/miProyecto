<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prestamo_model extends CI_Model {

   public function registrarPrestamo($usuario_lector_id, $libro_id)
   {
       // Datos para la tabla 'prestamo'
       $data_prestamo = array(
           'idUsuarioLector' => $usuario_lector_id,
           'idUsuarioBibliotecario' => null, // Se llenará cuando el bibliotecario haga el préstamo
           'fechaprestamo' => date('Y-m-d H:i:s'),
           'estado' => 0, // Estado 0 significa "pendiente"
       );
   
       // Insertar el préstamo en la tabla 'prestamo'
       $this->db->insert('prestamo', $data_prestamo);
       $prestamo_id = $this->db->insert_id(); // Obtener el ID del préstamo recién insertado
   
       // Ahora insertar en la tabla intermedia 'libro_prestamo'
       $data_libro_prestamo = array(
           'prestamo_id' => $prestamo_id,
           'libro_id' => $libro_id
       );
   
       // Insertar la relación libro-prestamo en la tabla intermedia
       $this->db->insert('libro_prestamo', $data_libro_prestamo);
   
       return $prestamo_id;
   }
   public function obtenerSolicitudesPendientes() {
       // Suponiendo que la tabla 'prestamo' tiene una relación con 'usuario' y hay una tabla intermedia 'libro_prestamo'
    $this->db->select('prestamo.*, usuario.nombres, usuario.carnetidentidad, libro.titulo');
    $this->db->from('prestamo');
    $this->db->join('usuario', 'prestamo.idUsuarioLector = usuario.id');
    $this->db->join('libro_prestamo', 'prestamo.id = libro_prestamo.prestamo_id'); // Join con la tabla intermedia
    $this->db->join('libro', 'libro_prestamo.libro_id = libro.id'); // Join con la tabla de libros
    $this->db->where('prestamo.estado', 0); // Solo préstamos pendientes
    $query = $this->db->get();

    return $query->result();
  }
   
 }
 