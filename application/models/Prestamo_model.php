<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prestamo_model extends CI_Model {

    public function registrarPrestamo()
{
    // Suponiendo que los datos vienen de una solicitud POST
    $usuario_lector_id = $this->input->post('usuario_lector_id');
    $libro_id = $this->input->post('libro_id');
    $id_bibliotecario = $this->session->userdata('id_usuario'); // ID del bibliotecario logueado

// Validar que el lector existe y es un lector
$this->db->where('id', $usuario_lector_id);
$this->db->where('rol', 'lector'); // Asegúrate de que sea un lector
$lector = $this->db->get('usuario');

if ($lector->num_rows() == 0) {
    log_message('error', 'El usuario con ID ' . $usuario_lector_id . ' no es un lector válido.');
    return false; // No es un lector válido
}
        // Iniciar la transacción
    $this->db->trans_start();

    // Verificar que el libro realmente existe antes de proceder
    $this->db->where('id', $libro_id);
    $existeLibro = $this->db->get('libro');

    if ($existeLibro->num_rows() == 0) {
        log_message('error', 'El libro con ID ' . $libro_id . ' no existe.');
        $this->db->trans_complete();
        return false; // El libro no existe
    }

    // Verificar que el libro esté disponible
    $this->db->select('libro_prestamo.*');
    $this->db->from('libro_prestamo');
    $this->db->join('prestamo', 'prestamo.id = libro_prestamo.prestamo_id');
    $this->db->where('libro_prestamo.libro_id', $libro_id);
    $this->db->where('prestamo.estado', 1); // Estado 1 significa que está prestado
    $existePrestamo = $this->db->get();

    if ($existePrestamo->num_rows() > 0) {
        log_message('error', 'El libro con ID ' . $libro_id . ' ya está prestado.');
        $this->db->trans_complete();
        return false; // El libro ya está prestado
    }
   
    // Datos para la tabla 'prestamo'
    $data_prestamo = array(
        'idUsuarioLector' => $usuario_lector_id,
        'idUsuarioBibliotecario' => $id_bibliotecario, // Bibliotecario logueado
        'fechaprestamo' => date('Y-m-d H:i:s'),
        'estado' => 0, // Estado 0 significa "pendiente"
    );

    // Insertar el préstamo
    if (!$this->db->insert('prestamo', $data_prestamo)) {
        log_message('error', 'Error al insertar en prestamo: ' . print_r($this->db->error(), true));
        $this->db->trans_complete();
        return false; 
    }
    
    $prestamo_id = $this->db->insert_id(); // Obtener el ID del préstamo recién insertado

    // Insertar la relación libro-prestamo en la tabla intermedia
    $data_libro_prestamo = array(
        'prestamo_id' => $prestamo_id,
        'libro_id' => $libro_id
    );

    // Insertar en libro_prestamo
    if (!$this->db->insert('libro_prestamo', $data_libro_prestamo)) {
        log_message('error', 'Error al insertar en libro_prestamo: ' . print_r($this->db->error(), true));
        $this->db->trans_complete();
        return false; 
    }

    // Completar la transacción
    $this->db->trans_complete();

    // Verificar si la transacción fue exitosa
    if ($this->db->trans_status() === FALSE) {
        log_message('error', 'Error en la transacción de préstamo: ' . print_r($this->db->error(), true));
        return false; 
    }

    return $prestamo_id; // Retorna el ID del préstamo registrado
}

    // Método para actualizar un préstamo
    public function actualizarPrestamo($prestamo_id, $data_update) {
   
      // Suponiendo que el ID del bibliotecario está almacenado en la sesión
    $idBibliotecario = $this->session->userdata('id_usuario'); // Cambia 'id_usuario' por la clave que uses para el ID en la sesión
    $prestamo_id = $this->input->post('prestamo_id');

    // Verifica que el ID del bibliotecario sea válido
    if (!$idBibliotecario) {
        log_message('error', 'No se encontró el ID del bibliotecario en la sesión.');
        return false; // Manejo de error si no hay un bibliotecario logueado
    }

    // Iniciar la transacción
    $this->db->trans_start();

    // Datos para actualizar
    $data_update = array(
        'idUsuarioBibliotecario' => $idBibliotecario, // ID del bibliotecario que aprueba
        'estado' => 1, // Cambiar a "aprobado" o el estado que uses
        'fechadevolucion' => null, // Si es necesario, puedes establecer esto también
    );

    // Actualizar el préstamo con los datos proporcionados
    $this->db->where('id', $prestamo_id);
    $this->db->update('prestamo', $data_update);

    // Completar la transacción
    $this->db->trans_complete();

    // Verificar si la transacción fue exitosa
    if ($this->db->trans_status() === FALSE) {
        log_message('error', 'Error en la transacción de actualización de préstamo: ' . print_r($this->db->error(), true));
        return false; 
    }

    return true; // Retorna verdadero si fue exitosa
}   
 
    public function obtenerSolicitudesPendientes() {
        // Suponiendo que la tabla 'prestamo' tiene una relación con 'usuario' y 'libro_prestamo'
        $this->db->select('prestamo.*, usuario.nombres, usuario.carnetidentidad, libro.titulo');
        $this->db->from('prestamo');
        $this->db->join('usuario', 'prestamo.idUsuarioLector = usuario.id');
        $this->db->join('libro_prestamo', 'prestamo.id = libro_prestamo.prestamo_id'); // Join con la tabla intermedia
        $this->db->join('libro', 'libro_prestamo.libro_id = libro.id'); // Join con la tabla de libros
        $this->db->where('prestamo.estado', 0); // Solo préstamos pendientes
        $query = $this->db->get();
        return $query->result();
    }
    public function obtenerLibrosPrestados() {
      $this->db->select('prestamo.id,usuario.nombres, usuario.carnetidentidad, libro.titulo, prestamo.fechaprestamo, prestamo.fechadevolucion');
      $this->db->from('prestamo');
      $this->db->join('usuario', 'prestamo.idUsuarioLector = usuario.id'); // Relación entre préstamo y usuario
      $this->db->join('libro_prestamo', 'prestamo.id = libro_prestamo.prestamo_id'); // Relación entre préstamo y libros prestados
      $this->db->join('libro', 'libro_prestamo.libro_id = libro.id'); // Relación entre libro_prestamo y libro
      $this->db->where('prestamo.estado', 1);  // Solo los préstamos que han sido realizados
      $query = $this->db->get();
      
      if ($query->num_rows() > 0) {
          return $query->result();
      } else {
          return false;
      }
  }
  public function registrarDevolucion() {
      // Verifica si se ha enviado el ID del préstamo
    $prestamo_id = $this->input->post('prestamo_id');

    if ($prestamo_id) {
        // Iniciar la transacción
        $this->db->trans_start();

        // Obtener la fecha y hora actual
        $fecha_devolucion = date('Y-m-d H:i:s');

        // Crear un array con los datos a actualizar
        $data = array(
            'fechadevolucion' => $fecha_devolucion,
            'estado' => 0 // Asumiendo que 1 significa "devuelto"
        );

        // Actualizar la tabla de préstamos usando el ID del préstamo
        $this->db->where('id', $prestamo_id);
        $this->db->update('prestamo', $data); // Captura el resultado de la actualización

        // Finalizar la transacción
        $this->db->trans_complete();

        // Verificar si la transacción fue exitosa
        if ($this->db->trans_status() === FALSE) {
            // Manejo de error si la actualización falla
            $this->session->set_flashdata('error', 'No se pudo registrar la devolución. Inténtalo de nuevo.');
        } else {
            // Redirigir a la vista de libros prestados con un mensaje de éxito
            $this->session->set_flashdata('success', 'El libro ha sido devuelto con éxito.');
        }
    } else {
        // Manejo de error si no se recibe el ID
        $this->session->set_flashdata('error', 'No se pudo registrar la devolución. ID de préstamo no recibido.');
    }

    redirect('Prestamo_controlador/librosPrestados');
    }
  

}
