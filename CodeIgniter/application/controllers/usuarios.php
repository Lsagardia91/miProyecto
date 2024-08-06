<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

	public function index(){
      
		$this->load->view('temp/login');
		//$this->load->view('temp/footer');
	}
   public function validarusuario()
    {
      $username=$_POST['username'];
      $password=sha1($_POST['password']);

     // echo 'Username: ' . htmlspecialchars($username) . '<br>';
     // echo 'Password: ' . htmlspecialchars($password) . '<br>';

      //  echo $username;
       // echo $password;

       $consulta=$this->usuario_model->validar($username,$password);
   
       echo $consulta->num_rows();
       if($consulta->num_rows()>0)
       {         
            //usuario valido           
            foreach($consulta->result()as $row)
           {
                $this->session->set_userdata('idUsuario',$row->idUsuario);
                $this->session->set_userdata('username',$row->username);
                redirect('usuarios/panel','refresh');
            }
        }
        else
       {
             //usuario incorrecto-volvemos a login
               redirect('usuarios/index','refresh');
        }
    }
       public function panel()
    {
        if($this->session->userdata('username'))
        {
           $this->load->view('v_catalogo'); 
          // redirect('C_libro/m_listar','refresh');
              
        }
        else
        {
           redirect('usuarios/index','refresh');
        }
    }
    public function logout()
    {
       $this->session->sess_destroy();
        redirect('usuarios/index','refresh');
    }

}



