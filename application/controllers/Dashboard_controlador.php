<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('America/La_Paz');
class Dashboard_controlador extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // Cargar los modelos necesarios
        $this->load->model('Libros_model');
        $this->load->model('Prestamo_model');
        $this->load->model('Usuarios_model');
    }

    public function dashboard() // O dashboard()
    {
        // Obtener todos los libros
        $total_libros = $this->Libros_model->countLibros();
        echo 'Total libros: ' . $total_libros; // Agrega esto para ver el conteo
        // Obtener todos los préstamos
        $total_prestamos = $this->Prestamo_model->countPrestamos();

        // Obtener todas las devoluciones
        $total_devoluciones = $this->Prestamo_model->countDevoluciones();

        // Obtener todos los usuarios (solo lectores)
        $total_lectores = $this->Usuarios_model->countLectores();

        // Cargar la vista del dashboard y pasar los datos
        $data = [
            'total_libros' => $total_libros,
            'total_prestamos' => $total_prestamos,
            'total_devoluciones' => $total_devoluciones,
            'total_lectores' => $total_lectores
        ];
        $this->load->view('catalogo', $data);
    }
}
