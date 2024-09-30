<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Editorial_model extends CI_Model {
    
    public function listadeeditoriales()
    {
        $this->db->select('*');
        $this->db->from('editorial');
        return $this->db->get()->result(); // devuelve resultado
     }
     public function agregareditorial($data)
     {
         $this->db->insert('editorial',$data);
     }
     public function eliminareditorial($id)
     {
        $this->db->where('id',$id);
        $this->db->delete('editorial');
     } 
     public function recuperareditorial($id)
	{
		$this->db->select('*');
		$this->db->from('editorial');
		$this->db->where('id',$id);
		return $this->db->get(); //devuelve el resultado
	}

	public function modificareditorial($id,$data)
	{
		$this->db->where('id',$id);
		$this->db->update('editorial',$data);
	}

}
 