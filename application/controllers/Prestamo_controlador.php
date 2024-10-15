<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prestamo_controlador extends CI_Controller {

  public function __construct() {
    parent::__construct();
    log_message('debug', 'Prestamo_controlador cargado.');
}

  
 // Método para mostrar las solicitudes pendientes
 public function solicitudesPendientes() {
  $this->load->model('Prestamo_model');

  // Obtener las solicitudes de préstamo pendientes (estado = 0)
  $data['prestamos_pendientes'] = $this->Prestamo_model->obtenerSolicitudesPendientes();
 // Para depuración
 var_dump($data['prestamos_pendientes']); // Verifica si se obtienen datos
  // Cargar la vista para mostrar las solicitudes pendientes
  $this->load->view('bibliotecario/solicitudes_pendientes', $data);
}

// Método para procesar un préstamo
public function procesarPrestamo() {
  $this->load->model('Prestamo_model');

   // Obtener el prestamo_id desde el POST
   $prestamo_id = $this->input->post('prestamo_id');

  /// Verifica si el usuario está logueado y es bibliotecario
  if (!$this->session->userdata('login') || $this->session->userdata('rol') !== 'bibliotecario') {
    redirect('Username/index/3', 'refresh'); // Redirige al login si no está logueado
    return;
}

// Depuración: muestra el ID del préstamo que se está procesando
log_message('debug', 'Procesando préstamo con ID: ' . $prestamo_id);

// Actualizar el préstamo para asignar el bibliotecario y cambiar el estado a "realizado"
$data_update = array(
    'idUsuarioBibliotecario' => $this->session->userdata('idusuario'), // ID del bibliotecario logueado
    'estado' => 1, // Estado 1 significa "préstamo realizado"
    'fechadevolucion' => null // Puedes establecer la fecha de devolución si es necesario
);

// Llamar al modelo para actualizar el préstamo
$actualizado = $this->Prestamo_model->actualizarPrestamo($prestamo_id, $data_update);

// Verificar si la actualización fue exitosa
if ($actualizado) {
  log_message('error', 'Error al actualizar el préstamo con ID: ' . $prestamo_id);
    // Redirigir con un mensaje de éxito
    $this->session->set_flashdata('mensaje', 'Préstamo procesado con éxito.');
} else {
    // Redirigir con un mensaje de error
    $this->session->set_flashdata('mensaje', 'Error al procesar el préstamo. Inténtalo de nuevo.');
}
redirect('Prestamo_controlador/solicitudesPendientes');
}
public function librosPrestados() {
  // Cargar el modelo de préstamos
  $this->load->model('Prestamo_model');

  // Obtener los libros prestados desde el modelo
  $data['libros_prestados'] = $this->Prestamo_model->obtenerLibrosPrestados();

  // Comprobar si se han obtenido resultados
  if ($data['libros_prestados'] === false) {
      $data['mensaje'] = 'No hay libros prestados actualmente.';
  }

  // Cargar la vista y pasar los datos
  $this->load->view('bibliotecario/libros_prestados', $data);
}
public function devolverLibro() {
  $this->load->model('Prestamo_model');
  // Verifica si se ha enviado el ID del préstamo
  $prestamo_id = $this->input->post('prestamo_id');

  if ($prestamo_id) {
      // Llamar al método registrarDevolucion en el modelo
      $this->Prestamo_model->registrarDevolucion($prestamo_id);
  } else {
      // Manejo de error si no se recibe el ID
      $this->session->set_flashdata('error', 'No se pudo registrar la devolución. ID de préstamo no recibido.');
  }

  // Redirigir a la vista de libros prestados
  redirect('Prestamo_controlador/librosPrestados');

  
}
}