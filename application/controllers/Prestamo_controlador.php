<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prestamo_controlador extends CI_Controller {

  public function solicitudesPendientes() {
    $this->load->model('Prestamo_model');

    // Obtener las solicitudes de préstamo pendientes (estado = 0)
    $data['prestamos_pendientes'] = $this->Prestamo_model->obtenerSolicitudesPendientes();

    // Cargar la vista para mostrar las solicitudes pendientes
    $this->load->view('bibliotecario/solicitudes_pendientes', $data);
}
public function prueba() {
  echo "Esto es una prueba";
  die();
}
public function procesarPrestamo($prestamo_id) {
  $this->load->model('Prestamo_model');
  echo "Procesando préstamo con ID: " . $prestamo_id;
  die(); // Esto debe mostrar el ID en la pantalla y detener la ejecución

  // Actualizar el préstamo para asignar el bibliotecario y cambiar el estado a "realizado"
  $data_update = array(
      'idUsuarioBibliotecario' => $this->session->userdata('id'), // ID del bibliotecario logueado
      'estado' => 1, // Estado 1 significa "préstamo realizado"
  );

  $this->Prestamo_model->actualizarPrestamo($prestamo_id, $data_update);

  // Redirigir con un mensaje de éxito
  $this->session->set_flashdata('mensaje', 'Préstamo procesado con éxito.');
  redirect('Prestamo_controlador/solicitudesPendientes');
}
}