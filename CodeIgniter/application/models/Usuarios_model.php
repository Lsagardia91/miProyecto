<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios_model extends CI_Model {
    
    public function listadeusuarios()
    {
        $this->db->select('*');
        $this->db->from('usuario');
        return $this->db->get(); // devuelve resultado
     }
     public function agregarusuario($data)
     {
         $this->db->insert('usuario',$data);
     }
     public function eliminarusuario($idUsuario)
     {
        $this->db->where('idUsuario',$idUsuario);
        $this->db->delete('usuario');
     } 
     public function recuperarusuario($idUsuario)
	{
		$this->db->select('*');
		$this->db->from('usuario');
		$this->db->where('idUsuario',$idUsuario);
		return $this->db->get(); //devuelve el resultado
	}

	public function modificarusuario($idUsuario,$data)
	{
		$this->db->where('idUsuario',$idUsuario);
		$this->db->update('usuario',$data);
	}

}
 
