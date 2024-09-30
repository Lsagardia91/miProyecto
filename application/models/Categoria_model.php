<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categoria_model extends CI_Model {
    
    public function listadecategorias()
    {
        $this->db->select('*');
        $this->db->from('categoria');
        return $this->db->get()->result(); // devuelve resultado
     }
     public function agregarcategoria($data)
     {
         $this->db->insert('categoria',$data);
     }
     public function eliminarcategoria($id)
     {
        $this->db->where('id',$id);
        $this->db->delete('categoria');
     } 
     public function recuperarcategoria($id)
	{
		$this->db->select('*');
		$this->db->from('categoria');
		$this->db->where('id',$id);
		return $this->db->get(); //devuelve el resultado
	}

	public function modificarcategoria($id,$data)
	{
		$this->db->where('id',$id);
		$this->db->update('categoria',$data);
	}

}
 
