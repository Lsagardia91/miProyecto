<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Libros_model extends CI_Model {
    
    public function listadelibros()
    {
        $this->db->select('*');
        $this->db->from('libro');
        return $this->db->get(); // devuelve resultado
     }
     public function agregarlibro($data)
     {
         $this->db->insert('libro',$data);
     }
     public function eliminarlibro($idLibro)
     {
        $this->db->where('idlibro',$idLibro);
        $this->db->delete('libro');
     } 
     public function recuperarlibro($idLibro)
	{
		$this->db->select('*');
		$this->db->from('libro');
		$this->db->where('idlibro',$idLibro);
		return $this->db->get(); //devuelve el resultado
	}

	public function modificarlibro($idLibro,$data)
	{
		$this->db->where('idlibro',$idLibro);
		$this->db->update('libro',$data);
	}

}
 

 


    
