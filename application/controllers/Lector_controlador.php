<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Lector_controlador extends CI_Controller {

   public function index()
  {
    // $this->load->model('Libros_model'); // Cargar el modelo
    // $data['libros'] = $this->Libros_model->obtenerLibros(); // Obtener libros
     $this->load->view('inicio');
     $this->load->view('inclectores/header');
    // $this->load->view('lectores/panellector', $data);
     $this->load->view('inclectores/footer');
  }

  public function listaLibros()
  {
     $this->load->model('Libros_model'); // Cargar el modelo
     $data['libros'] = $this->Libros_model->obtenerLibros(); // Obtener libros

     $this->load->view('inclectores/header');
     $this->load->view('lectores/panellector', $data);
     $this->load->view('inclectores/footer');
  }

  public function solicitarPrestamo($libro_id)
  {
     $this->load->model('Libros_model');
     $resultado = $this->Libros_model->registrarPrestamo($libro_id); // Llamar al método para registrar el préstamo

     if($resultado) {
        // Redirigir a una página de éxito o mostrar un mensaje
        $this->session->set_flashdata('mensaje', 'Solicitud de préstamo realizada con éxito.');
     } else {
        // Manejo de error
        $this->session->set_flashdata('mensaje', 'Error al realizar la solicitud de préstamo.');
     }

     redirect('Lector_controlador/listaLibros'); // Redirigir a la lista de libros
  }
}



