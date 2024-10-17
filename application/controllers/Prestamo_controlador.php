<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prestamo_controlador extends CI_Controller {

  public function __construct() {
      parent::__construct();
      log_message('debug', 'Prestamo_controlador cargado.');
  }

  // Método para mostrar las solicitudes pendientes
  // Método para mostrar las solicitudes pendientes
public function solicitudesPendientes() {
  $this->load->model('Prestamo_model');

  // Obtener las solicitudes de préstamo pendientes (estado = 0)
  $data['prestamos_pendientes'] = $this->Prestamo_model->obtenerSolicitudesPendientes();

  // Verificar si se obtienen datos
  if (empty($data['prestamos_pendientes'])) {
      log_message('error', 'No se encontraron préstamos pendientes.');
      $data['mensaje'] = 'No hay solicitudes de préstamo pendientes.';
  }

  // Cargar la vista para mostrar las solicitudes pendientes
  $this->load->view('bibliotecario/solicitudes_pendientes', $data);
}


  // Método para procesar un préstamo
  public function procesarPrestamo() {
      $this->load->model('Prestamo_model');

      // Obtener el prestamo_id desde el POST
      $prestamo_id = $this->input->post('prestamo_id');

      // Verifica si el usuario está logueado y es bibliotecario
      if (!$this->session->userdata('login') || $this->session->userdata('rol') !== 'bibliotecario') {
          $this->session->set_flashdata('error', 'Debes iniciar sesión como bibliotecario.');
          redirect('Username/index'); // Redirige al login si no está logueado
          return;
      }

      // Obtener el ID del bibliotecario desde la sesión
      $idBibliotecario = $this->session->userdata('idusuario');

      // Actualizar el préstamo para asignar el bibliotecario y cambiar el estado a "realizado"
      $data_update = array(
          'usuario_id' => $idBibliotecario, // ID del bibliotecario logueado
          'estado' => 1, // Estado 1 significa "préstamo realizado"
          'fechadevolucion' => null // La fecha de devolución puede ser establecida más adelante
      );

      // Llamar al modelo para actualizar el préstamo
      $actualizado = $this->Prestamo_model->actualizarPrestamo($prestamo_id, $data_update);

      // Verificar si la actualización fue exitosa
      if ($actualizado) {
          $this->session->set_flashdata('mensaje', 'Préstamo procesado con éxito.');
      } else {
          $this->session->set_flashdata('error', 'Error al procesar el préstamo. Inténtalo de nuevo.');
      }

      // Redirigir a las solicitudes pendientes
      redirect('Prestamo_controlador/solicitudesPendientes');
  }

  // Método para ver los libros prestados
  public function librosPrestados() {
      $this->load->model('Prestamo_model');

      // Obtener los libros prestados desde el modelo
      $data['libros_prestados'] = $this->Prestamo_model->obtenerLibrosPrestados();

      // Comprobar si no se obtuvieron resultados
      if (empty($data['libros_prestados'])) {
          $data['mensaje'] = 'No hay libros prestados actualmente.';
      }

      // Cargar la vista y pasar los datos
      $this->load->view('bibliotecario/libros_prestados', $data);
  }

  // Método para devolver un libro
  public function devolverLibro() {
      $this->load->model('Prestamo_model');

      // Verificar si se ha enviado el ID del préstamo
      $prestamo_id = $this->input->post('prestamo_id');

      if ($prestamo_id) {
          // Llamar al método registrarDevolucion en el modelo
          $resultado = $this->Prestamo_model->registrarDevolucion($prestamo_id);

          // Verificar si la devolución fue registrada correctamente
          if ($resultado) {
              $this->session->set_flashdata('mensaje', 'Devolución registrada con éxito.');
          } else {
              $this->session->set_flashdata('error', 'Error al registrar la devolución. Inténtalo de nuevo.');
          }
      } else {
          // Manejo de error si no se recibe el ID del préstamo
          $this->session->set_flashdata('error', 'No se pudo registrar la devolución. ID de préstamo no recibido.');
      }

      // Redirigir a la vista de libros prestados
      redirect('Prestamo_controlador/librosPrestados');
  }
}
