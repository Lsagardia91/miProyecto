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
   
    // Verificamos si el lector quiere acceder
    /*if ($this->input->post('lector')) {
        $this->session->set_userdata('rol', 'lector');
        redirect('Username/panel', 'refresh');
    }*/

    // Verificamos si el usuario ya está logueado

        $this->load->view('inc/header');
        $this->load->view('home');//login
        $this->load->view('inc/footer');
    
    }
    public function login()
    {
        // Verificamos si el usuario ya está logueado
        if ($this->session->userdata('login')) {
            // Si ya está logueado, redirigir al panel
            redirect('Username/panel', 'refresh');
        } else {
            // Si no está logueado, mostrar la vista de login
            $data['msg'] = $this->uri->segment(3);  // Para manejar mensajes
            $this->load->view('inc/header');
            $this->load->view('login', $data);  // Mostrar la vista login
            $this->load->view('inc/footer');
        }
    }



public function validarusuario()
{
    $this->load->model('Username_model');
    $username = $this->input->post('username');
    $password = sha1($this->input->post('password'));

    $consulta = $this->Username_model->validar($username, $password);

    if ($consulta->num_rows() > 0) {
        foreach ($consulta->result() as $row) {
            $this->session->set_userdata('idusuario', $row->id);
            $this->session->set_userdata('username', $row->username);
            $this->session->set_userdata('rol', $row->rol);
            $this->session->set_userdata('login', TRUE); // Establecer login aquí


            redirect('Username/panel', 'refresh');
        }
    } else {
        redirect('Username/index/2', 'refresh');
    }
}

public function panel()
{
     // Depurar el contenido de la sesión
    // echo "<pre>";
     //print_r($this->session->userdata());
    // echo "</pre>";
    if ($this->session->userdata('login')) {
        log_message('debug', 'Usuario logueado con rol: ' . $this->session->userdata('rol')); // Log para depurar
        $rol_usuario = $this->session->userdata('rol');

        // Cargar la vista correspondiente según el rol del usuario
        if ($rol_usuario == 'administrador') {
            $this->load->view('catalogo');
        } elseif ($rol_usuario == 'bibliotecario') {
           $this->load->view('catalogo');
        } elseif ($rol_usuario == 'lector') {
            $this->load->view('panellector');
        } else {
            //log_message('debug', 'Rol desconocido, redirigiendo a login');
            redirect('Username/index', 'refresh');
        }
    } else {
        // Si no está logueado, redirigir al login (index/3)
        log_message('debug', 'No hay sesión, redirigiendo a login');
        redirect('Username/index/3', 'refresh');
    }
}

public function logout()
{
    $this->session->sess_destroy();
    redirect('Username/index/1', 'refresh');
}
}