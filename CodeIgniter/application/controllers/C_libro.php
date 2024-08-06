<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_libro extends CI_Controller {


    public function m_listar()
	{
        //$this->load->model('Libros_model'); // Cargar el modelo
        $listar=$this->Libros_model->listadelibros();
        $data['libross']=$listar;
        //$this->load->view('temp/head');
	    	//$this->load->view('temp/menu');
        $this->load->view('temp/v_listadelibros',$data);
       // $this->load->view('temp/test');
		   // $this->load->view('temp/footer');
  }
  public function agregar()
  {
      //$this->load->view('temp/head');
      // $this->load->view('temp/menu');
       $this->load->view('temp/v_formulario');
       //$this->load->view('v_formulario');
     // $this->load->view('temp/test');
     // $this->load->view('temp/footer');
  }
  public function agregarbd()
  {
    //$this->load->model('Libros_model'); 
    $data['titulo']=strtoupper($_POST['titulov']);
    $data['autor']=strtoupper($_POST['autorv']);
    $data['isbn']=($_POST['isbnv']);
    $data['anioPublicacion']=$_POST['anioPublicacionv'];
    $data['categoria']=strtoupper($_POST['categoriav']);
    $data['ubicacion']=strtoupper($_POST['ubicacionv']);
    $data['editorial']=strtoupper($_POST['editorialv']);
    $data['dewey']=strtoupper($_POST['dewayv']);
    $data['cutter']=strtoupper($_POST['cutterv']);

    $this->Libros_model->agregarlibro($data);
    redirect('C_libro/m_listar','refresh');//REDIRECIONA
  }
  public function eliminarbd()
  {
  $idLibro=$_POST['idlibro'];
  $this->Libros_model->eliminarlibro($idLibro);
  redirect('C_libro/m_listar','refresh');//REDIRECIONA
  }
  public function modificar()
  {
    $idLibro=$_POST['idlibro'];
    //echo $idlibro;
	  $data['infolibro']=$this->Libros_model->recuperarlibro($idLibro);
   // $this->load->view('temp/head');
    //$this->load->view('temp/menu');
    $this->load->view('temp/formulario2',$data);
    //$this->load->view('temp/test');
   // $this->load->view('temp/footer');
  }
	public function modificarbd()
	{
	  $idLibro=$_POST['idlibro'];
    $data['titulo']=strtoupper($_POST['titulov']);
    $data['autor']=strtoupper($_POST['autorv']);
    $data['isbn']=($_POST['isbnv']);
    $data['anioPublicacion']=$_POST['anioPublicacionv'];
    $data['categoria']=strtoupper($_POST['categoriav']);
    $data['ubicacion']=strtoupper($_POST['ubicacionv']);
    $data['editorial']=strtoupper($_POST['editorialv']);
    $data['dewey']=strtoupper($_POST['dewayv']);
    $data['cutter']=strtoupper($_POST['cutterv']);

		$this->Libros_model->modificarlibro($idLibro,$data);
		redirect('C_libro/m_listar','refresh');
	}
}