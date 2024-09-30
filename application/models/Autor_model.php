<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Autor_model extends CI_Model {
    
    public function listadeautores()
    {
        $this->db->select('*');
        $this->db->from('autor');
        return $this->db->get()->result(); // devuelve resultado
     }
     public function agregarautor($data)
     {
         $this->db->insert('autor',$data);
     }
     public function eliminarautor($id)
     {
        $this->db->where('id',$id);
        $this->db->delete('autor');
     } 
     public function recuperarautor($id)
	{
		$this->db->select('*');
		$this->db->from('autor');
		$this->db->where('id',$id);
		return $this->db->get(); //devuelve el resultado
	}

	public function modificarautor($id,$data)
	{
		$this->db->where('id',$id);
		$this->db->update('autor',$data);
	}

}
 
