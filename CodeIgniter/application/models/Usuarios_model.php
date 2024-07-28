<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios_model extends CI_Model {
    
    public function listadeusuarioss()
    {
        $this->db->select('*');
        $this->db->from('usuario');
        return $this->db->get(); // devuelve resultado
     }
  /*   public function agregarlibro($data)
     {
         $this->db->insert('libro',$data);
     }
     public function eliminarlibro($idlibro)
     {
        $this->db->where('idlibro',$idlibro);
        $this->db->delete('libro');
     } 
     public function recuperarlibro($idlibro)
	{
		$this->db->select('*');
		$this->db->from('libro');
		$this->db->where('idlibro',$idlibro);
		return $this->db->get(); //devuelve el resultado
	}

	public function modificarlibro($idlibro,$data)
	{
		$this->db->where('idlibro',$idlibro);
		$this->db->update('libro',$data);
	}*/

}
 
