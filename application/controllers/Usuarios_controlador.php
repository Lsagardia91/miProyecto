


<?php
defined('BASEPATH') OR exit('No direct script access allowed');

date_default_timezone_set('America/La_Paz');

class Usuarios_controlador extends CI_Controller {

  public function index()
{
   var_dump($this->session->userdata('tipo'));

    if($this->session->userdata('tipo') == 1)
    { 
        $lista = $this->Usuarios_model->listadeusuarios();
        $data['usuario'] = $lista;
        
        $this->load->view('inc/header');
        $this->load->view('inc/menu');
        $this->load->view('usuario/lista_usuarios', $data);
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
	      $this->load->view('inc/menu');
        $this->load->view('usuario/lista_usuarios',$data);
	      $this->load->view('inc/footer');
    }
  //  public function  verificarusuario() {
   
      // Verificar si el usuario está logueado
    //  if (!$this->session->userdata('login')) {
      //    redirect('Username/index', 'refresh'); // Redirigir al login si no está logueado
      //}
  //}
    public function agregar()
    {     
        $data['arrayidusuario']=$_POST['idusuario'];
        $this->load->view('inc/header');
        $this->load->view('inc/menu');
        $this->load->view('usuario/agregar_usuario',$data);
        $this->load->view('inc/footer');
       
    }
    public function agregarbd()
    {
      $this->load->model('Usuarios_model');
   

      if (!$this->session->userdata('idusuario')) {
        echo "No estás logueado o no se encuentra el ID de usuario.";
        // Redirigir al login si no está logueado
       // redirect('Username/index', 'refresh');
        exit();
    }
    // Recopilar los datos del formulario
    
    $data['carnetidentidad'] = $_POST['carnetidentidadv'];
    $data['nombres'] = strtoupper($_POST['nombresv']);
    $data['apellidos'] = strtoupper($_POST['apellidosv']);
    $data['direccion'] = strtoupper($_POST['direccionv']);
    $data['telefono'] = strtoupper($_POST['telefonov']);
    $data['email'] = $_POST['emailv'];
    $data['coluniins'] = $_POST['coluniinsv'];
    $data['username'] = $_POST['usernamev'];
    $data['password'] = sha1($_POST['passwordv']);
    $data['rol'] = $_POST['rolv'];
    $data['foto'] = $_POST['fotov'];
    // Obtener el id del usuario logueado
    $data['idusuario'] = $this->session->userdata('idusuario');
    // Agregar este punto para ver qué datos se están enviando
    // echo '<pre>';
    //print_r($data);
    //echo '</pre>';
    //exit(); // Esto detiene la ejecución para que puedas ver los datos
      // Llamar al método del modelo para agregar usuario
      $arrayidusuario=$_POST['idusuario'];   // RECEPCION DEL IDENTIFICADOR DEL ESTUDIANTE
      $nombrearchivo=$arrayidusuario.".jpg";
      //ruta donde se guardan loa archivos
      $config['upload_path']='./uploads/usuarios/';
      //nombre del archivo
      $config['file_name']=$nombrearchivo;
  
      $direccion="./uploads/usuarios/".$nombrearchivo;
  
      if(file_exists($direccion)) // si se necesitara editar
      {
        unLink($direccion);// SI EXISTR EL ARCHIVO
      }
      $config['allowed_types']='jpg|jpeg|jfif';
      $this->load->library('upload',$config);
  
      if(!$this->upload->do_upload()){
      {
        $data['error']=$this->upload->display_errors();
      }
      echo "Error: " . $data['error'];
    }
      else
      {
        $data['foto']=$nombrearchivo;
        $this->Usuarios_model->modificarusuario($arrayidusuario,$data);
        $this->upload->data();
      }



      if ($this->Usuarios_model->agregarusuario($data)) {
        // Redirigir a una página de éxito o lista de usuarios
        redirect('Usuarios_controlador/m_listar', 'refresh');
    } else {
        // Mostrar un mensaje de error
        echo "Error al agregar usuario: " . $this->db->last_query();
    }
      
    }
    public function eliminarbd()
    {
    $this->load->model('Usuarios_model'); 
    $id=$_POST['idusuario'];
    $this->Usuarios_model->eliminarusuario($id);
    redirect('usuarios_controlador/m_listar','refresh');//REDIRECIONA
    }
    public function modificar()
    {
      $this->load->model('Usuarios_model'); // Cargar el modelo

    // Obtener el ID del usuario desde el POST
     $id = $this->input->post('idusuario'); 

    // Verificar si el ID fue pasado correctamente
    if (!$id) {
        // Manejar el caso en que no se recibió un ID válido
        echo "ID de usuario no proporcionado";
        return;  // Detener la ejecución si no se tiene un ID válido
    }

    // Recuperar los datos del usuario con el ID proporcionado
    $data['infousuario'] = $this->Usuarios_model->recuperarusuario($id);

    // Cargar las vistas junto con los datos del usuario
    $this->load->view('inc/header');
    $this->load->view('inc/menu');
    $this->load->view('usuario/modificar_usuario', $data);
    $this->load->view('inc/footer');
    }
      public function modificarbd()
      {
          // Cargar el modelo de usuarios
    $this->load->model('Usuarios_model');
    
    // Obtener el ID del usuario a modificar
    $id = $this->input->post('idusuario');

    if (!$id) {
        echo "ID de usuario no proporcionado";
        return;
    }

    // Obtener los datos del formulario
    $data['carnetidentidad'] = $this->input->post('carnetidentidadv');
    $data['nombres'] = strtoupper($this->input->post('nombresv'));
    $data['apellidos'] = strtoupper($this->input->post('apellidosv'));
    $data['direccion'] = strtoupper($this->input->post('direccionv'));
    $data['telefono'] = strtoupper($this->input->post('telefonov'));
    $data['email'] = $this->input->post('emailv');
    $data['coluniins'] = $this->input->post('coluniinsv');
    $data['username'] = $this->input->post('usernamev');
    $data['ultimaactualizacion'] = date('Y-m-d H:i:s');
    $data['rol'] = $this->input->post('rolv');

    // Manejo de la contraseña
    $passwordInput = $this->input->post('passwordv');
    if (!empty($passwordInput)) {
        $data['password'] = sha1($passwordInput);
    }

    // Llamar al método del modelo para modificar el usuario
    $resultado = $this->Usuarios_model->modificarusuario($id, $data);

    if ($resultado) {
        // Redirigir a la lista de usuarios o a una página de éxito
        redirect('Usuarios_controlador/m_listar', 'refresh');
    } else {
        // Manejar el error, por ejemplo, mostrar un mensaje de error
        echo "Error al modificar el usuario: " . json_encode($resultado);
    }
        
      }  
  public function deshabilitarbd()
	{
    $this->load->model('Usuarios_model');
		$id=$_POST['idusuario'];
		$data['estado']='0';

		$this->Usuarios_model->modificarusuario($id,$data);
	  redirect('Usuarios_controlador/deshabilitados','refresh');
	}

	public function deshabilitados()
	{
    $this->load->model('Usuarios_model');
		$lista=$this->Usuarios_model->listausuariosdeshabilitados();
		$data['usuario']=$lista;
		
		$this->load->view('inc/header');
		$this->load->view('usuario/listadeshabilitados',$data);
		$this->load->view('inc/footer');
	}

	public function habilitarbd()
	{
    $this->load->model('Usuarios_model');
		$id=$_POST['idusuario'];
		$data['estado']='1';

		$this->Usuarios_model->modificarusuario($id,$data);
		redirect('Usuarios_controlador/deshabilitados','refresh');
	}
  
  public function subirfoto()
	{
		
		$data['arrayidusuario']=$_POST['idusuario'];
		$this->load->view('inc/header');
		//$this->load->view('inc/vistaslte/menu');
		$this->load->view('usuario/subirform',$data);
    $this->load->view('inc/menu');
    $this->load->view('inc/footer');
	}
	public function subir()
	{
    // Debug para verificar que los datos están siendo enviados
    //var_dump($_POST); // Para verificar que 'idusuario' está presente
   // var_dump($_FILES); // Para verificar que 'userfile' está presente
		$arrayidusuario=$_POST['idusuario'];   // RECEPCION DEL IDENTIFICADOR DEL ESTUDIANTE
		$nombrearchivo=$arrayidusuario.".jpg";
		//ruta donde se guardan loa archivos
		$config['upload_path']='./uploads/usuarios/';
		//nombre del archivo
		$config['file_name']=$nombrearchivo;

		$direccion="./uploads/usuarios/".$nombrearchivo;

		if(file_exists($direccion)) // si se necesitara editar
		{
			unLink($direccion);// SI EXISTR EL ARCHIVO
		}
		$config['allowed_types']='jpg|jpeg|jfif';
		$this->load->library('upload',$config);

		if(!$this->upload->do_upload()){
		{
			$data['error']=$this->upload->display_errors();
		}
    echo "Error: " . $data['error'];
  }
		else
		{
			$data['foto']=$nombrearchivo;
			$this->Usuarios_model->modificarusuario($arrayidusuario,$data);
			$this->upload->data();
		}
		redirect('Usuarios_controlador/index','refresh');
	}
}
  
  


