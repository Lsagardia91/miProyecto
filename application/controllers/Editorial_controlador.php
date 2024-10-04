<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Editorial_controlador extends CI_Controller {

    public function m_listar()
	{
        $this->load->model('Editorial_model');
        $listar=$this->Editorial_model->listadeeditoriales();
        $data['editorialess']=$listar;
        $this->load->view('inc/header');
	      $this->load->view('inc/menu');
        $this->load->view('editorial/lista_editoriales',$data);
        $this->load->view('inc/footer');
  }
  public function agregar()
  {
       $this->load->view('inc/header');
     //  $this->load->view('inc/menu');
       $this->load->view('editorial/agregar_editorial');
       $this->load->view('inc/footer');
  }
  public function agregarbd()
  { 
    $this->load->model('Editorial_model');
    $data['nombreeditorial']=strtoupper($_POST['nombreeditorialv']);
    $data['fechacreacion']=date('Y-m-d H:i:s');
    $data['idusuario'] = $this->session->userdata('idusuario'); // ID del usuario logueado
 
    $this->Editorial_model->agregareditorial($data);
    redirect('Editorial_controlador/m_listar','refresh');//REDIRECIONA
  }

  public function eliminarbd()
  {
    $this->load->model('Editorial_model');
    $id=$_POST['ideditorial'];
    $this->Editorial_model->eliminareditorial($id);
    redirect('Editorial_controlador/m_listar','refresh');//REDIRECIONA
  }
  public function modificar()
  {
    $this->load->model('Editorial_model');
    $id=$_POST['ideditorial'];
    //echo $id;
	$data['infoeditorial']=$this->Editorial_model->recuperareditorial($id);
    $this->load->view('inc/header');
    $this->load->view('editorial/modificar_editorial',$data);
    $this->load->view('inc/footer');
  }
	public function modificarbd()
	{
    $this->load->model('Editorial_model');
    $id=$_POST['ideditorial'];
    $data['nombreeditorial']=strtoupper($_POST['nombreeditorialv']);
    $data['ultimaactualizacion']=date('Y-m-d H:i:s');
    
	$this->Editorial_model->modificareditorial($id,$data);
		redirect('Editorial_controlador/m_listar','refresh');
	}
}