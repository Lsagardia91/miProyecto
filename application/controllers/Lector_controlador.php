<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Lector_controlador extends CI_Controller {

   public function listaLibros()
   {
      $this->load->model('Libros_model');
      $data['libros'] = $this->Libros_model->obtenerLibros(); 
 
      $this->load->view('inclectores/header');
      $this->load->view('lectores/panellector', $data);
      $this->load->view('inclectores/footer');
   }
 
   public function solicitarPrestamo($libro_id)
   {
      // Cargar la vista del formulario de solicitud de préstamo, pasando el id del libro
      $data['libro_id'] = $libro_id;
      $this->load->view('inclectores/header');
      $this->load->view('lectores/form_solicitar_prestamo', $data);
      $this->load->view('inclectores/footer');
   }
 
   public function procesarSolicitudPrestamo() {
      $this->load->model('Usuarios_model');
      $this->load->model('Prestamo_model');
  
      // Obtener los datos del formulario
      $nombre_lector = $this->input->post('nombre_lector');
      $ci_lector = $this->input->post('ci_lector');
      $email_lector = $this->input->post('email_lector');
      $libro_id = $this->input->post('libro_id'); // Asegúrate de que este dato venga del formulario
  
      // Verificar si el lector ya está registrado
      $lector = $this->Usuarios_model->buscarPorCI($ci_lector);
  
      if (!$lector) {
          // Si no existe, crear nuevo usuario (lector)
          $data_usuario = array(
              'carnetidentidad' => $ci_lector,
              'nombres' => $nombre_lector,
              'email' => $email_lector,
              'rol' => 'lector', // Define el rol del usuario
              'fechacreacion' => date('Y-m-d H:i:s'),
              'ultimaactualizacion' => date('Y-m-d H:i:s'),
          );
  
          // Insertar nuevo lector
          $usuario_id = $this->Usuarios_model->insertarUsuario($data_usuario);
      } else {
          // Si existe, obtener el ID del usuario lector
          $usuario_id = $lector->id;
      }
  
      // Registrar el préstamo usando la tabla intermedia
      $prestamo_id = $this->Prestamo_model->registrarPrestamo($usuario_id, $libro_id);
  
      // Redirigir con un mensaje de éxito o error
      if ($prestamo_id) {
          $this->session->set_flashdata('mensaje', 'Solicitud de préstamo enviada con éxito.');
      } else {
          $this->session->set_flashdata('mensaje', 'Error al enviar la solicitud de préstamo.');
      }
  
      redirect('Lector_controlador/listaLibros');
  }
  
  
}
