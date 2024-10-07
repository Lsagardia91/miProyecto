<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Username_model extends CI_Model {

	public function validar($username,$password)
	{
		$this->db->select('*');
		$this->db->from('usuario');
		$this->db->where('username',$username);
		$this->db->where('password',$password);
		return $this->db->get(); //devuelve el resultado
		// Depurar el resultado
		log_message('debug', 'Consulta SQL: ' . $this->db->last_query());
		log_message('debug', 'Número de filas devueltas: ' . $query->num_rows());
	}

	
}