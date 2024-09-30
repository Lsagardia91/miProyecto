<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categoria_controlador extends CI_Controller {

    public function m_listar()
	{
        $this->load->model('Categoria_model');
        $listar=$this->Categoria_model->listadecategorias();
        $data['categoriass']=$listar;
        $this->load->view('inc/header');
	    $this->load->view('inc/menu');
        $this->load->view('categoria/lista_categorias',$data);
        $this->load->view('inc/footer');
  }
  public function agregar()
  {
       $this->load->view('inc/header');
     //  $this->load->view('inc/menu');
       $this->load->view('categoria/agregar_categoria');
       $this->load->view('inc/footer');
  }
  public function agregarbd()
  { 
    $this->load->model('Categoria_model');
    $data['nombrecategoria']=strtoupper($_POST['nombrecategoriav']);
    $data['codigodewey']=strtoupper($_POST['codigodeweyv']);
    $data['fechacreacion']=date('Y-m-d H:i:s');
    $data['usuariocreador'] = $this->session->userdata('idusuario'); // ID del usuario logueado
 
    $this->Categoria_model->agregarcategoria($data);
    redirect('Categoria_controlador/m_listar','refresh');//REDIRECIONA
  }

  public function eliminarbd()
  {
    $this->load->model('Categoria_model');
    $id=$_POST['idcategoria'];
    $this->Categoria_model->eliminarcategoria($id);
    redirect('Categoria_controlador/m_listar','refresh');//REDIRECIONA
  }
  public function modificar()
  {
    $this->load->model('Categoria_model');
    $id=$_POST['idcategoria'];
    //echo $id;
	  $data['infocategoria']=$this->Categoria_model->recuperarcategoria($id);
    $this->load->view('inc/header');
    $this->load->view('categoria/modificar_categoria',$data);
    $this->load->view('inc/footer');
  }
	public function modificarbd()
	{
    $this->load->model('Categoria_model');
	  $id=$_POST['idcategoria'];
    $data['nombrecategoria']=strtoupper($_POST['nombrecategoriav']);
    $data['codigodewey']=strtoupper($_POST['codigodeweyv']);
    $data['ultimaactualizacion']=date('Y-m-d H:i:s');
    
	$this->Categoria_model->modificarcategoria($id,$data);
		redirect('Categoria_controlador/m_listar','refresh');
	}
}