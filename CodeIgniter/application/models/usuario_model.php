<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model {

	public function validar($username,$password)
	{
		$this->db->select('*');
		$this->db->from('usuario');
		$this->db->where('username',$username);
		$this->db->where('password',$password);
		return $this->db->get(); //devuelve el resultado
	}

	
}