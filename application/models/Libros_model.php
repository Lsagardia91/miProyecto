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
         return $this->db->insert_id(); // Devuelve el ID del libro insertado
     }
     public function eliminarlibro($id)
     {
        $this->db->where('id',$id);
        $this->db->delete('libro');
     } 
     public function recuperarlibro($id)
	{
		$this->db->select('*');
		$this->db->from('libro');
		$this->db->where('id',$id);
		return $this->db->get(); //devuelve el resultado
	}

	public function modificarlibro($id,$data)
	{
		$this->db->where('id',$id);
		$this->db->update('libro',$data);
	}
    public function agregarAutorLibro($libro_id, $autor_id)
{
    $data = array(
        'libro_id' => $libro_id,
        'autor_id' => $autor_id
    );
    $this->db->insert('libro_has_autor', $data);
}
public function obtener_autores_por_libro($id)
{
    // Selecciona los autores asociados al libro
    $this->db->select('a.id, a.nombreautor');
    $this->db->from('libro_has_autor la');
    $this->db->join('autor a', 'la.autor_id = a.id');
    $this->db->where('la.libro_id', $id);
    
    return $this->db->get()->result(); // devuelve los autores asociados
}
public function eliminarAutoresLibro($libro_id)
{
    $this->db->where('libro_id', $libro_id);
    $this->db->delete('libro_has_autor');
}
public function agregarEjemplar($libro_id)
{
    $data = array(
        'libro_id' => $libro_id,
        // Puedes agregar otros campos como estado, fecha de creación, etc.
    );

    $this->db->insert('ejemplares', $data);
}


public function obtenerLibros()
{
   $query = $this->db->get('libro'); // Asegúrate de que sea el nombre correcto de tu tabla
   return $query->result();
}

public function registrarPrestamo($libro_id)
{
    $this->db->trans_start();

    // Suponiendo que también necesitas el ID del lector, debes obtenerlo de la sesión o pasarlo como parámetro
    $lector_id = $this->session->userdata('idUsuario'); // Cambia esto según tu lógica

    // Datos para insertar en libro_has_prestamo
    $data = [
        'libro_id' => $libro_id,
        'prestamo_id' => $lector_id, // Asumiendo que tienes esta columna en tu tabla libro_has_prestamo
        'fechaprestamo' => date('Y-m-d H:i:s'),
        'estado' => 'prestado', // Un campo que podría indicar el estado del préstamo
    ];

    $this->db->insert('libro_has_prestamo', $data); // Inserta el préstamo en la tabla intermedia

    $this->db->trans_complete();

    return $this->db->trans_status(); // Devuelve el estado de la transacción
}
 }
 




 

 


    
