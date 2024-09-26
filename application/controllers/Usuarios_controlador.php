<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios_controlador extends CI_Controller {

  public function index()
{
    if($this->session->userdata('tipo') == 1)
    { 
        $lista = $this->Usuarios_model->listadeusuarios();
        $data['usuario'] = $lista;
        
        $this->load->view('inc/header');
        $this->load->view('lista_usuarios', $data);
        $this->load->view('inc/footer');
    }
    else
    {
        redirect('Username/panel', 'refresh');
    }
}

public function bibliotecario()
{
    if($this->session->userdata('tipo') == 'bibliotecario')
    { 
        $this->load->view('inc/header');
        $this->load->view('panelbibliotecario');
        $this->load->view('inc/footer');
    }
    else
    {
        redirect('Usuarios_controlador/m_listar', 'refresh'); // Redirigir si no es bibliotecario
    }
}

public function lector()
{
    if($this->session->userdata('tipo') == 'lector')
    { 
        $this->load->view('inc/header');
        $this->load->view('panellector'); // Asegúrate de que esta vista existe
        $this->load->view('inc/footer');
    }
    else
    {
        redirect('Usuarios_controlador/m_listar', 'refresh'); // Redirigir si no es lector
    }
}
    public function m_listar()
	{
        $this->load->model('Usuarios_model'); // Cargar el modelo
        $listar=$this->Usuarios_model->listadeusuarios();
        $data['usuarios']=$listar;
        $this->load->view('inc/header');
	      //$this->load->view('inc/menu');
        $this->load->view('lista_usuarios',$data);
	      $this->load->view('inc/footer');
    }
    public function agregar()
    {
        $this->load->view('inc/header');
        //$this->load->view('inc/menu');
        $this->load->view('agregar_Usuario');
        $this->load->view('inc/footer');
       
    }
    public function agregarbd()
    {
      //$this->load->model('Libros_model'); 
      $this->load->model('Usuarios_model');
      $data['carnetIdentidad']=$_POST['carnetIdentidadv'];
      $data['nombres']=strtoupper($_POST['nombresv']);
      $data['apellidos']=strtoupper($_POST['apellidosv']);
      $data['direccion']=strtoupper($_POST['direccionv']);
      $data['telefono']=strtoupper($_POST['telefonov']);
      $data['email']=$_POST['correoElectronicov'];
      $data['coluniins']=$_POST['coluniinsv'];  
      $data['username']=$_POST['userNamev'];
      $data['password']=sha1($_POST['passwordv']);
      $data['estado']=($_POST['estadov']);
      $data['fechacreacion']=($_POST['fechacreacionv']);
      $data['ultimaactualizacion']=($_POST['ultimaactualizacionv']);
      $data['usuariocreador']=($_POST['usuariocreadorv']);
      $data['tipousuario_id']=($_POST['tipousuario_idv']);
  
      $this->Usuarios_model->agregarusuario($data);
      redirect('Usuarios_controlador/m_listar','refresh');//REDIRECIONA
    }
    public function eliminarbd()
    {
    $this->load->model('Usuarios_model'); 
    $idUsuario=$_POST['idUsuario'];
    $this->Usuarios_model->eliminarusuario($idUsuario);
    redirect('usuarios_controlador/m_listar','refresh');//REDIRECIONA
    }
    public function modificar()
    {
      $this->load->model('Usuarios_model');
      $idUsuario=$_POST['idUsuario'];
     // echo $idUsuario;
        $data['infousuario']=$this->Usuarios_model->recuperarusuario($idUsuario);
      $this->load->view('inc/header');
      //$this->load->view('temp/menu');
      $this->load->view('modificar_usuario',$data);
      $this->load->view('inc/footer');
    }
      public function modificarbd()
      {
      $this->load->model('Usuarios_model');
      $id=$_POST['idUsuario'];
      $data['carnetIdentidad']=$_POST['carnetIdentidadv'];
      $data['nombres']=strtoupper($_POST['nombresv']);
      $data['apellidos']=strtoupper($_POST['apellidosv']);
      $data['direccion']=strtoupper($_POST['direccionv']);
      $data['telefono']=strtoupper($_POST['telefonov']);
      $data['email']=$_POST['correoElectronicov'];
      $data['coluniins']=$_POST['coluniinsv'];  
      $data['username']=$_POST['userNamev'];
      $data['password']=sha1($_POST['passwordv']);
      $data['estado']=($_POST['estadov']);
      $data['fechacreacion']=($_POST['fechacreacionv']);
      $data['ultimaactualizacion']=($_POST['ultimaactualizacionv']);
      $data['usuariocreador']=($_POST['usuariocreadorv']);
      $data['tipousuario_id']=($_POST['tipousuario_idv']);
  
          $this->Usuarios_model->modificarusuario($idUsuario,$data);
          redirect('Usuarios_controlador/m_listar','refresh');
      }
      public function deshabilitarbd()
	{
    $this->load->model('Usuarios_model');
		$idUsuario=$_POST['idUsuario'];
		$data['habilitado']='0';

		$this->Usuarios_model->modificarusuario($idUsuario,$data);
	  redirect('Usuarios_controlador/index','refresh');
	}

	public function deshabilitados()
	{
    $this->load->model('Usuarios_model');
		$lista=$this->Usuarios_model->listausuariosdeshabilitados();
		$data['usuario']=$lista;
		
		$this->load->view('inc/header');
		$this->load->view('listadeshabilitados',$data);
		$this->load->view('inc/footer');
	}

	public function habilitarbd()
	{
    $this->load->model('Usuarios_model');
		$idUsuario=$_POST['idUsuario'];
		$data['habilitado']='1';

		$this->Usuarios_model->modificarusuario($idUsuario,$data);
		redirect('Usuarios_controlador/deshabilitados','refresh');
	}
  }

