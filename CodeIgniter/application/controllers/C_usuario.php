<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_usuario extends CI_Controller {


    public function m_listar()
	{
        //$this->load->model('Libros_model'); // Cargar el modelo
        $listar=$this->Usuarios_model->listadeusuarios();
        $data['usuarios']=$listar;
        //$this->load->view('temp/head');
	    //$this->load->view('temp/menu');
        $this->load->view('v_listadeusuarios',$data);
       // $this->load->view('temp/test');
	 // $this->load->view('temp/footer');
    }
  /*public function agregar()
  {
      //$this->load->view('temp/head');
     // $this->load->view('temp/menu');
      $this->load->view('v_formulario');
     // $this->load->view('temp/test');
     // $this->load->view('temp/footer');
  }
  public function agregarbd()
  {
    //$this->load->model('Libros_model'); 
    $data['titulo']=strtoupper($_POST['titulov']);
    $data['autor']=strtoupper($_POST['autorv']);
    $data['isbn']=($_POST['isbnv']);
    $data['categoria']=strtoupper($_POST['categoriav']);
    $data['numeroPaginas']=$_POST['numeroPaginasv'];
    $data['editorial']=strtoupper($_POST['editorialv']);
    $data['anioPublicacion']=$_POST['anioPublicacionv'];

    $this->Libros_model->agregarlibro($data);
    redirect('C_libro/m_listar','refresh');//REDIRECIONA
  }
  public function eliminarbd()
  {
  $idlibro=$_POST['idlibro'];
  $this->Libros_model->eliminarlibro($idlibro);
  redirect('C_libro/m_listar','refresh');//REDIRECIONA
  }
  public function modificar()
  {
    $idlibro=$_POST['idlibro'];
    //echo $idlibro;
	  $data['infolibro']=$this->Libros_model->recuperarlibro($idlibro);
   // $this->load->view('temp/head');
    //$this->load->view('temp/menu');
    $this->load->view('formulario2',$data);
    //$this->load->view('temp/test');
   // $this->load->view('temp/footer');
  }
	public function modificarbd()
	{
	  $idlibro=$_POST['idlibro'];
    $data['titulo']=strtoupper($_POST['titulov']);
    $data['autor']=strtoupper($_POST['autorv']);
    $data['isbn']=($_POST['isbnv']);
    $data['categoria']=strtoupper($_POST['categoriav']);
    $data['numeroPaginas']=$_POST['numeroPaginasv'];
    $data['editorial']=strtoupper($_POST['editorialv']);
    $data['anioPublicacion']=$_POST['anioPublicacionv'];

		$this->Libros_model->modificarlibro($idlibro,$data);
		redirect('C_libro/m_listar','refresh');
	}*/
}