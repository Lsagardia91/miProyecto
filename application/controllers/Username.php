<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Username extends CI_Controller {

/*	public function index()
   {
      $this->load->model('Username_model');
       // $this->load->view('inc/header');
		$this->load->view('login');
		//$this->load->view('inc/footer');
	}
   public function validarusuario()
    {
     $this->load->model('Username_model');
      $username=$_POST['username'];
      $password=sha1($_POST['password']);

     // echo 'Username: ' . htmlspecialchars($username) . '<br>';
     // echo 'Password: ' . htmlspecialchars($password) . '<br>';

      //  echo $username;
       // echo $password;

       $consulta=$this->Username_model->validar($username,$password);
   
       echo $consulta->num_rows();
       if($consulta->num_rows()>0)
       {         
            //usuario valido           
            foreach($consulta->result()as $row)
           {
                $this->session->set_userdata('idUsuario',$row->idUsuario);
                $this->session->set_userdata('username',$row->username);
                redirect('Username/panel','refresh');
            }
        }
        else
       {
             //usuario incorrecto-volvemos a login
               redirect('Username/index','refresh');
        }
    }
       public function panel()
    {
       $this->load->model('Username_model');
        if($this->session->userdata('username'))
        {
           $this->load->view('catalogo'); 
          // redirect('C_libro/m_listar','refresh');
              
        }
        else
        {
           redirect('Username/index','refresh');
        }
    }
    public function logout()
    {
       $this->load->model('Username_model');
       $this->session->sess_destroy();
        redirect('Username/index','refresh');
    }
  
}
*/

public function index()
{
   $this->load->model('Username_model');
   $data['msg']=$this->uri->segment(3);

   if($this->session->userdata('login'))
   {
      //el usr ya esta logueado
      redirect('Username/panel','refresh');
   }
   else
   {
      //usuario no esta logueado
      $this->load->view('inc/header');
      $this->load->view('login',$data);
      $this->load->view('inc/footer');
   }
}

public function validarusuario()
{
   $this->load->model('Username_model');
   $username=$_POST['username'];
   $password=sha1($_POST['password']);

   $consulta=$this->Username_model->validar($username,$password);

   if($consulta->num_rows()>0)
   {
      //tenemos una validacion efectiva
      foreach ($consulta->result() as $row)
      {
         $this->session->set_userdata('idusuario',$row->id);
         $this->session->set_userdata('username',$row->username);
         $this->session->set_userdata('tipo',$row->tipousuario_id);

         // Depuración
         log_message('info', 'ID de usuario guardado en la sesión: ' . $row->id);

         redirect('Username/panel','refresh');
      }
   }
   else
   {
      //no hay validacion efectiva y redirigimos a login
      redirect('Username/index/2','refresh');
   }
}

public function panel()
{
   if($this->session->userdata('username'))
   {
      // Verificamos el tipo de usuario
      $tipo_usuario = $this->session->userdata('tipo');

      if($tipo_usuario == 1) // Administrador
      {
         $this->load->view('catalogo'); // Aquí cargarías el panel completo del administrador
      }
      elseif($tipo_usuario == 2) // Bibliotecario
      {
         $this->load->view('panelbibliotecario'); // Panel donde puede agregar libros
      }
      elseif($tipo_usuario == 3) // Lector
      {
         $this->load->view('panellector'); // Panel donde solo puede ver la lista de libros
      }
      else
      {
         redirect('Username/index','refresh'); // Por si algo falla, redirigir al login
      }
   }
   else
   {
      // Usuario no está logueado, lo redirigimos al login
      redirect('Username/index/3','refresh');
   }
}

public function logout()
{

   $this->session->sess_destroy();
   redirect('Username/index/1','refresh');
}
}






