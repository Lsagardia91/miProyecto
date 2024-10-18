<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('America/La_Paz');
class Autor_controlador extends CI_Controller {

    public function m_listar()
	{
        $this->load->model('Autor_model');
        $listar=$this->Autor_model->listadeautores();
        $data['autoress']=$listar;
        $this->load->view('inc/header');
	      $this->load->view('inc/menu');
        $this->load->view('autor/lista_autores',$data);
        $this->load->view('inc/footer');
  }
  public function agregar()
  {
       $this->load->view('inc/header');
     //  $this->load->view('inc/menu');
       $this->load->view('autor/agregar_autor');
       $this->load->view('inc/footer');
  }
  public function agregarbd()
  { 
    $this->load->model('Autor_model');
    $data['nombreautor']=strtoupper($_POST['nombreautorv']);
    $data['fechacreacion']=date('Y-m-d H:i:s');
    $data['idusuario'] = $this->session->userdata('idusuario'); // ID del usuario logueado
 
    $this->Autor_model->agregarautor($data);
    redirect('Autor_controlador/m_listar','refresh');//REDIRECIONA
  }

  public function eliminarbd()
  {
    $this->load->model('Autor_model');
    $id=$_POST['idautor'];
    $this->Autor_model->eliminarautor($id);
    redirect('Autor_controlador/m_listar','refresh');//REDIRECIONA
  }
  public function modificar()
  {
    $this->load->model('Autor_model');
    $id=$_POST['idautor'];
    //echo $id;
	  $data['infoautor']=$this->Autor_model->recuperarautor($id);
    $this->load->view('inc/header');
    $this->load->view('autor/modificar_autor',$data);
    $this->load->view('inc/footer');
  }
	public function modificarbd()
	{
    $this->load->model('Autor_model');
	  $id=$_POST['idautor'];
    $data['nombreautor']=strtoupper($_POST['nombreautorv']);
    $data['ultimaactualizacion']=date('Y-m-d H:i:s');
    
	$this->Autor_model->modificarautor($id,$data);
		redirect('Autor_controlador/m_listar','refresh');
	}
}