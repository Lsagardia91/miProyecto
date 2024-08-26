<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_usuario extends CI_Controller {


    public function m_listar()
	{
        $this->load->model('Usuarios_model'); // Cargar el modelo
        $listar=$this->Usuarios_model->listadeusuarios();
        $data['usuarios']=$listar;
        //$this->load->view('temp/head');
	      //$this->load->view('temp/menu');
        $this->load->view('temp/v_listausuarios',$data);
        // $this->load->view('temp/test');
	      // $this->load->view('temp/footer');
    }
     public function agregar()
  {
      //$this->load->view('temp/head');
     // $this->load->view('temp/menu');
      $this->load->view('temp/v_agregarUsuario');
     // $this->load->view('temp/test');
     // $this->load->view('temp/footer');
  }
  public function agregarbd()
  {
    //$this->load->model('Libros_model'); 
    $this->load->model('Usuarios_model');
    $data['nombres']=strtoupper($_POST['nombresv']);
    $data['apellidos']=strtoupper($_POST['apellidosv']);
    $data['direccion']=strtoupper($_POST['direccionv']);
    $data['telefono']=strtoupper($_POST['telefonov']);
    $data['carnetIdentidad']=$_POST['carnetIdentidadv'];
    $data['genero']=strtoupper($_POST['generov']);
    $data['estado']=strtoupper($_POST['estadov']);
    $data['userName']=$_POST['userNamev'];
    $data['password']=$_POST['passwordv'];
    $data['rol']=strtoupper($_POST['rolv']);

    $this->Usuarios_model->agregarusuario($data);
    redirect('C_usuario/m_listar','refresh');//REDIRECIONA
  }
  public function eliminarbd()
  {
  $this->load->model('Usuarios_model'); 
  $idUsuario=$_POST['idUsuario'];
  $this->Usuarios_model->eliminarusuario($idUsuario);
  redirect('C_usuario/m_listar','refresh');//REDIRECIONA
  }
  public function modificar()
  {
    $this->load->model('Usuarios_model');
    $idUsuario=$_POST['idUsuario'];
    //echo $idlibro;
	  $data['infousuario']=$this->Usuarios_model->recuperarusuario($idUsuario);
   // $this->load->view('temp/head');
    //$this->load->view('temp/menu');
    $this->load->view('temp/v_modificarUsuario',$data);
    //$this->load->view('temp/test');
   // $this->load->view('temp/footer');
  }
	public function modificarbd()
	{
    $this->load->model('Usuarios_model');
	  $idUsuario=$_POST['idUsuario'];
    $data['nombres']=strtoupper($_POST['nombresv']);
    $data['apellidos']=strtoupper($_POST['apellidosv']);
    $data['direccion']=strtoupper($_POST['direccionv']);
    $data['telefono']=strtoupper($_POST['telefonov']);
    $data['carnetIdentidad']=$_POST['carnetIdentidadv'];
    $data['genero']=strtoupper($_POST['generov']);
    $data['estado']=strtoupper($_POST['estadov']);
    $data['username']=$_POST['userNamev'];
    $data['password']=$_POST['passwordv'];
    $data['rol']=strtoupper($_POST['rolv']);

		$this->Usuarios_model->modificarusuario($idUsuario,$data);
		redirect('C_usuario/m_listar','refresh');
	}
  public function deshabilitarbd()
	{
		$idjugador=$_POST['idjugador'];
		$data['estado']='0';

		$this->estudiante_model->modificarestudiante($idjugador,$data);
		redirect('estudiante/index','refresh');
	}

	public function deshabilitados()
	{
		$lista=$this->estudiante_model->listaestudiantesdeshabilitados();
		$data['estudiantes']=$lista;
		

		$this->load->view('inc/header');
		$this->load->view('listadeshabilitados',$data);
		$this->load->view('inc/footer');
	}

	public function habilitarbd()
	{
		$idjugador=$_POST['idjugador'];
		$data['habilitado']='1';

		$this->estudiante_model->modificarestudiante($idjugador,$data);
		redirect('estudiante/deshabilitados','refresh');
	}

}