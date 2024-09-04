<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Username extends CI_Controller {

	public function index()
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






