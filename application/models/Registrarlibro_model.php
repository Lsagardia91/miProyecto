<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registrarlibro_model extends CI_Model { // DESDE AQUI HICE LA TRANSACCION DE CATEGORIA //
// DESDE AQUI HICE LA TRANSACCION DE CATEGORIA //
	public function listaCategorias()
	{
		$this->db->select('*'); // select *
		$this->db->from('categoria'); //tabla
		return $this->db->get(); //devolución del resultado de la consulta
	}

	public function registrar($idCategoria,$data)
	{
		$this->db->trans_start();
		$this->db->insert('libro',$data);
		$idLibro=$this->db->insert_id();

		$data2['idCategoria']=$idCategoria;
		$data2['idLibro']=$idLibro;
		$this->db->insert('librocategoria',$data2);

		$this->db->trans_complete();

	    if($this->db->trans_status()===FALSE)
		{
			return false;
		}
	}
}
