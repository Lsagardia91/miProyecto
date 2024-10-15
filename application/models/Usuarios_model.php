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
	// PARA RECUPERAR CONTRASEÑA ////	// PARA RECUPERAR CONTRASEÑA ////
	public function get_user_by_email($email) {
		
		// Asegurarse de que el correo electrónico no esté vacío antes de consultar
		if (!empty($email)) {
		
			return $this->db->get_where('usuario', ['email' => $email])->row_array();
		} else {
			return false; // Retorna false si el correo electrónico está vacío
		}
	}
	public function store_reset_token($user_id, $token) {
		if (!empty($user_id) && !empty($token)) {
			$data = array(
				'token' => $token,
				'token_expiry' => date('Y-m-d H:i:s', strtotime('+1 hour')) // Establecer 1 hora de expiración
			);
	
			// Asegurarse de que el ID del usuario existe antes de actualizar
			$this->db->where('id', $user_id);
			return $this->db->update('usuario', $data); // Actualizar el token y expiración
		} else {
			return false; // Retorna false si el ID de usuario o el token están vacíos
		}
	}
	public function get_user_by_token($token) {
		if (!empty($token)) {
			// Definir la consulta para obtener el usuario por el token y asegurarse que no ha expirado
			$this->db->where('token', $token);
			$this->db->where('token_expiry >', date('Y-m-d H:i:s')); // Verificar que el token aún no ha expirado
			$query = $this->db->get('usuario'); // Consulta a la tabla de usuarios
	
			// Verificar si se encontró el usuario
			if ($query->num_rows() > 0) {
				return $query->row_array(); // Retorna los datos del usuario como array
			} else {
				return false; // Retorna false si no se encuentra o el token ha expirado
			}
		} else {
			return false; // Retorna false si el token está vacío
		}
	}
	
	public function get_user_id_by_email($email) {
		$this->db->select('id'); // Selecciona solo el id_usuario
		$this->db->from('usuario');
		$this->db->where('email', $email);
		$query = $this->db->get();
	
		// Si se encuentra el usuario, retorna el id_usuario
		if ($query->num_rows() > 0) {
			return $query->row()->id;
		} else {
			return false; // Si no se encuentra, devuelve false
		}
	}
	public function get_token_by_user_id($user_id) {
		$this->db->select('token');
		$this->db->from('usuario');
		$this->db->where('id', $user_id);
		$this->db->where('token_expiry >', date('Y-m-d H:i:s')); // Verificar que el token no haya expirado
		$query = $this->db->get();
	
		// Si se encuentra el token, retorna su valor
		if ($query->num_rows() > 0) {
			return $query->row()->token;
		} else {
			return false; // Si no se encuentra token válido, devuelve false
		}
	}
	
	
	public function clear_reset_token($user_id) {
		// Preparar datos para actualizar el usuario
		$data = array(
			'token' => NULL,
			'token_expiry' => NULL
		);
	
		// Actualizar el usuario en la base de datos
		$this->db->where('id', $user_id);
		return $this->db->update('usuario', $data);
	}
	public function update_password($user_id, $hashed_password) {
		$data = array(
			'password' => $hashed_password,
			'ultimaactualizacion' => date('Y-m-d H:i:s') // Fecha y hora actual
		);
		$this->db->where('id', $user_id);
		return $this->db->update('usuario', $data);

	}
	
	public function remove_token($user_id) {
		$data = array(
			'token' => null,
			'token_expiry' => null
		);
		$this->db->where('id', $user_id);
		return $this->db->update('usuario', $data);
	}

    // PARA ACTUALIZAR DATOS DEL PERFIL//
	public function obtener_usuario_por_id($id)
{
    $this->db->where('id', $id);
    $query = $this->db->get('usuario');
    return $query->row(); // Retornar solo una fila (el usuario)
}

public function actualizar_usuario($id, $data)
{
    $this->db->where('id', $id);
    return $this->db->update('usuario', $data);

}
public function buscarPorCI($carnetidentidad) {
	$this->db->where('carnetidentidad', $carnetidentidad);
	$query = $this->db->get('usuario');

	if ($query->num_rows() > 0) {
		return $query->row(); // Devolver el usuario si existe
	} else {
		return false; // No existe el usuario
	}
}

public function insertarUsuario($data_usuario) {
    if ($this->db->insert('usuario', $data_usuario)) {
        return $this->db->insert_id(); // Retorna el ID del nuevo usuario
    } else {
        log_message('error', 'Error al insertar usuario: ' . print_r($this->db->error(), true));
        return false; // O maneja el error según lo necesites
    }
}


}
 
