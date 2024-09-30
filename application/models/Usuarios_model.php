<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios_model extends CI_Model {

    public function listadeusuarios()
    {
        $this->db->select('*');
		$this->db->from('usuario');
		$this->db->where('estado','1');
		return $this->db->get(); //devuelve el resultado
     } 
     //public function agregarusuario($data)
     //{
       // $this->db->insert('usuario',$data);
     //}
	 public function agregarusuario($data) {
		if ($this->db->insert('usuario', $data)) {
			return true;
		} else {
			// Captura y devuelve el error
			return $this->db->error(); // Esto te dará información sobre el error
		}
	}

     public function eliminarusuario($id)
     {
        $this->db->where('id',$id);
        $this->db->delete('usuario');
     } 
     public function recuperarusuario($id)
	{
		$this->db->select('*');
		$this->db->from('usuario');
		$this->db->where('id',$id);
		return $this->db->get(); //devuelve el resultado
	}

	public function modificarusuario($id,$data)
	{
		$this->db->where('id', $id);
		if ($this->db->update('usuario', $data)) {
			return true; // Modificación exitosa
		} else {
			return $this->db->error(); // Devolver el error si falla
		}
	}
    public function listausuariosdeshabilitados()
	{
		$this->db->select('*'); // slecet *
		$this->db->from('usuario'); //tabla
		$this->db->where('estado','0');
		return $this->db->get(); //devolución del resultado de la consulta
	}




}
 
