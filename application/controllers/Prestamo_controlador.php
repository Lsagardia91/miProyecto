<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prestamo_controlador extends CI_Controller {

    public function m_listarprestamo()
	{
        $this->load->model('Prestamo_model');
        $listar=$this->Prestamo_model->listadeprestamos();
        $data['prestamos']=$listar;
        $this->load->view('inc/header');
	     // $this->load->view('inc/menu');
        $this->load->view('lista_prestamo',$data);
        $this->load->view('inc/footer');
  }
  public function agregar()
  {
      $this->load->view('inc/header');
      //$this->load->view('inc/menu');
      $this->load->view('vistaprestamo');
      $this->load->view('inc/footer');
     
  }
  public function agregarbd()
  {
    //$this->load->model('Libros_model'); 
    $this->load->model('Prestamo_model');
    $data['autor']=strtoupper($_POST['autorv']);
    $data['titulo']=strtoupper($_POST['titulov']);
    $data['nombre_lector']=strtoupper($_POST['nombreLectorv']);
    $data['direccion']=strtoupper($_POST['direccionv']);
    $data['colegio_univ']=$_POST['colegioUnivv'];
    $data['curso']=$_POST['cursov'];
    $data['ci']=strtoupper($_POST['civ']);
    $data['fecha']=strtoupper($_POST['fechav']);
  

    $this->Prestamo_model->agregarprestamo($data);
    redirect('Prestamo_controlador/m_listarprestamo','refresh');//REDIRECIONA
  }
}