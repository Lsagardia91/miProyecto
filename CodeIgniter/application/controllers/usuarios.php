<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

	public function index(){
      
		$this->load->view('temp/login');
		//$this->load->view('temp/footer');
	}
   public function validarusuario()
    {
        $login=$_POST['login'];
        $password=md5($_POST['password']);


        echo $login;
        echo $password;

        $consulta=$this->usuario_model->validar($login,$password);
   
        echo $consulta->num_rows();
        if($consulta->num_rows()>0)
        {
            
            //usuario valido
            
            foreach($consulta->result()as $row)
            {
                $this->session->set_userdata('idUsuario',$row->idusuario);
                $this->session->set_userdata('login',$row->login);
                $this->session->set_userdata('tipo',$row->tipo);
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
        if($this->session->userdata('login'))
        {
            redirect('C_libro/m_listar','refresh');
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
